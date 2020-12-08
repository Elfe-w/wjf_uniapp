<template>
	<view class="login">
		<view class="login-box">
			<!--用户表单-->
			<view style="position: absolute;top: -40px; font-size: 20px;color: #007AFF;">微积分</view>
			<span class="login-line-top"></span>
			<swiper class="swiper">      
				<swiper-item>
					<u-form :model="loginForm" ref= "loginFormRef" :error-type="errorType" :v-show="true">

						<u-form-item label-width="10" :border-bottom="false" prop="user_name">
							<u-input class="login-input" :custom-style="inputStyle" :clearable="false" v-model="loginForm.user_name" type="text"
							 placeholder="请输入用户名" />
						</u-form-item>
  
						<u-form-item label-width="0" :border-bottom="false" prop="user_password">
							<u-input class="login-input" :custom-style="inputStyle" v-model="loginForm.user_password" type="password"
							 :clearable="false" placeholder="请输入密码" />
						</u-form-item>  
						<u-button :ripple="true" ripple-bg-color="#4e72b8" shape="circle" :plain="true" type="primary" :hair-line="false"
						 class="login-button" :custom-style="buttonStyle" @click="LoginSubmit">登录</u-button>
					</u-form>
				</swiper-item>
			</swiper>
			<view>
				<u-radio-group  size="30" v-model="RoleValue">
					<u-radio v-for="(item, index) in Rolelist" :key="index" :name="item.name" :disabled="item.disabled">
						{{item.name}}
					</u-radio>
				</u-radio-group>
			</view>
			<!--其它-分割线-->
			<span class="login-line"></span>
			<u-checkbox-group class="login-agreement">
				<u-checkbox size="30" icon-size="20" shape="circle" v-model="agreement">勾选则默认同意本APP协议</u-checkbox>
			</u-checkbox-group>
			<view>
				<u-toast ref="uToast" />
			</view>
			<view style="width: 100%;padding-top: 20px;display: flex;justify-content:space-between;">
				<view style="color: #007AFF;" @click="getRegister">注册账户</view>
				<view style="color: #007AFF;" @click="getReset">忘记密码</view>
			</view>
		</view>
	</view>

</template>

<script>
	export default {
		data() {
			return {
				loginForm: {
					user_name: "yiarce",
					user_password: "6353453wcR"
				},
				agreement: true,
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
				Rolelist: [{
						name: '普通用户',
						disabled: false
					},
					{
						name: '管理员',
						disabled: false
					}
				],
				// u-radio-group的v-model绑定的值如果设置为某个radio的name，就会被默认选中
				RoleValue: '普通用户',
			}
		},
		methods: {
			async LoginSubmit() {
				if (this.loginForm.user_name == '' || this.loginForm.user_password == '') {
					this.$refs.uToast.show({
						title: '用户名或密码不能为空',
						type: 'warning',
					})
					return
				}
				if (this.agreement) {
					// if (this.loginForm.user_name.length < 5) {
					// 	this.$refs.uToast.show({
					// 		title: '用户名必须大于5位',
					// 		type: 'warning',
					// 	})
					// 	return
					// }
					// if (this.loginForm.user_password.length < 6) {
					// 	this.$refs.uToast.show({
					// 		title: '密码不能小于6位',
					// 		type: 'warning',
					// 	})
					// 	return
					// }
				} else {
					this.$refs.uToast.show({
						title: '请先同意本APP协议',
						type: 'warning',
					})
					return
				}
				if(this.RoleValue == '普通用户'){
					await uni.$u.api.Login(this.loginForm).then((res) => {
						uni.switchTab({
							url: '/pages/home/home' 
						})
					})
				}else{
					await uni.$u.api.AdminLogin({su_name:this.loginForm.user_name,su_password:this.loginForm.user_password}).then((res) => {
						uni.navigateTo({
							url: '/pages/admin/home'
						})
					}) 
				}   
			},
			getRegister(){
				uni.navigateTo({
					url: '/pages/register/register'
				})
			},
			getReset(){
				uni.navigateTo({ 
					url: '/pages/resetPassword/resetPassword'
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
		height: 215px;
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
