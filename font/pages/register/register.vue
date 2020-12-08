<template>
	<view class="login">
		<view class="login-box">
			<!--用户表单-->
			<view style="position: absolute;top: -40px; font-size: 20px;color: #007AFF;">微积分</view>
			<span class="login-line-top"></span>
			<swiper class="swiper">
				<swiper-item>
					<u-form :model="loginForm" ref="loginFormRef" :error-type="errorType" :v-show="true">

						<u-form-item label-width="10" :border-bottom="false" prop="user_name">
							<u-input class="login-input" :custom-style="inputStyle" :clearable="false" v-model="loginForm.user_name" type="text"
							 placeholder="请输入用户名" />
						</u-form-item>

						<u-form-item label-width="0" :border-bottom="false" prop="user_password">
							<u-input class="login-input" :custom-style="inputStyle" v-model="loginForm.user_password" type="password"
							 :clearable="false" placeholder="请输入密码" />
						</u-form-item>
						<u-form-item label-width="0" :border-bottom="false" prop="user_email">
							<u-input class="login-input" :custom-style="inputStyle" v-model="loginForm.user_email"
							 :clearable="false" placeholder="密保邮箱" />
						</u-form-item>
						<u-radio-group  class="uSex"  v-model="sexValue" @change="radioGroupChange">
							<u-radio 
								@change="radioChange" 
								v-for="(item, index) in list" :key="index" 
								:name="item.name"
								:disabled="item.disabled"
							>
								{{item.name}}
							</u-radio>
						</u-radio-group>
						<u-button :ripple="true" ripple-bg-color="#4e72b8" shape="circle" :plain="true" type="primary" :hair-line="false"
						 class="login-button" :custom-style="buttonStyle" @click="registerSubmit">立即注册</u-button>
					</u-form>
				</swiper-item>
			</swiper>
			<!--其它-分割线-->
			<span class="login-line"></span>
			<view>
				<u-toast ref="uToast" />
			</view>
		</view>
	</view>

</template>

<script>
	export default {
		data() {
			return {
				
				list: [
						{
							name: '小哥哥',
							disabled: false
						},
						{
							name: '小姐姐',
							disabled: false
						},
					],
							// u-radio-group的v-model绑定的值如果设置为某个radio的name，就会被默认选中
					sexValue: '小姐姐',
					
					
				loginForm: {
					user_name: "",
					user_password: "",
					user_email:'',
				},
				inputStyle: {
					paddingLeft: '15px',
					paddingRight: '5px',
					height: '50px',
				},
				buttonStyle: {
					border: '0px'
				},
				errorType: ['toast'],
				typeMessageStyle: {
					position: "absolute"
				},
			}
		},
		methods: {
			radioChange(e) {
						// console.log(e);
					},
					// 选中任一radio时，由radio-group触发
			radioGroupChange(e) {
				// console.log(e);
			},
			async registerSubmit() {
				if (this.loginForm.user_name == '') {
					this.$refs.uToast.show({
						title: '用户名不能为空',
						type: 'warning',
					})
					return
				}
				if (this.loginForm.user_password == '') {
					this.$refs.uToast.show({
						title: '密码不能为空',
						type: 'warning',
					})
					return
				}
				if (this.loginForm.user_email == '') {
					this.$refs.uToast.show({
						title: '密保邮箱不能为空',
						type: 'warning',
					})
					return
				}
				this.$set(this.loginForm,"user_sex",this.sexValue);
				await uni.$u.api.UserRegister(this.loginForm).then((res)=>{
					this.$refs.uToast.show({
						title: '注册成功!',
						type:"success",
						duration: 1500,
						callback() {
							uni.reLaunch({
								url: '/pages/login/login/login',
							})
						}
					})
				})
			}
		},

		// 必须要在onReady生命周期，因为onLoad生命周期组件可能尚未创建完毕
		onReady() {

		}
	}
</script>

<style lang="scss">
	page {
		height: 100%;
	}

	.login {
		display: flex;
		flex-direction: column;
		justify-content: center;
		align-items: center;
		height: 100%;
		background-color: #f8f8f8;
	}

	.login-box {
		display: flex;
		flex-direction: column;
		justify-content: center;
		align-items: center;
		position: relative;
		margin-top: -30%;
	}

	.swiper {
		width: 250px;
		min-height: 290px;
		background-color: transparent;
	}

	// /deep/uni-swiper {
	// 	overflow: visible;
	// }

	// /deep/uni-swiper-item{
	// 	overflow: visible;
	// }
	// /deep/uni-swiper .uni-swiper-wrapper{
	// 	overflow: visible;
	// }

	.login-logo {
		width: 120rpx;
		height: 120rpx;
		margin-bottom: 20rpx;
	}

	.login-input {
		border-radius: 2.5rem;
		background-color: #FFFFFF;
	}

	/deep/ .u-form-item--left__content {
		padding-right: 0 !important;
		padding-left: 0 !important;
	}

	/deep/ .u-form-item--left {
		width: 0;
		height: 0;
	}

	/deep/ .u-form-item__message {
		position: absolute;
		top: 47px;
	}

	.login-button {
		margin-top: 20rpx;
		background-color: #FFFFFF;
	}

	.login-line-top {
		margin-top: 5rpx;
		border-top: rgba(43, 86, 112, .1) 1px solid;
		width: 180px;
		height: 1px;
	}

	.login-line {
		margin-top: 20rpx;
		border-top: rgba(43, 86, 112, .1) 1px solid;
		width: 180px;
		height: 1px;
	}

	.login-agreement {
		margin-top: 5px;
	}
</style>
