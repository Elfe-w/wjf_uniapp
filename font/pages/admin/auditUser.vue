<template>
	<view class="audit-main">
		<view>
			<u-toast ref="uToast" />
		</view>
		<view class="satus-bar-height"></view>
		<view class="message-subsection">
			<u-subsection class="message-subsection-main" :list="list" :current="0" @change="change"
			 active-color="#2979ff"></u-subsection>
		</view>
		<swiper class="swiper">
			<swiper-item>
				<view v-if="auditUserList == 0" style="width: 100%;height: calc(100% - var(--status-bar-height));display: flex;align-items: center;">
					<u-empty text="当前没有用户申请参加活动!" mode="message" style="width: 100%;"></u-empty>
				</view>
				<view v-for="(val,key) in auditUserList" :key="val.act_id" class="activity-list-box">
					<!-- 用户列表 -->
					<view class="activity-list">
						<view class="activity-status">
						</view>
						<u-button @click="getModelShow(val.au_id,val.user_name)" class="activity-button" :hair-line="false"
						 :ripple="true" :custom-style="activityButtonStyle">
							<view class="activity-title">
								<text class="activity-title-t">{{val.act_title}}</text>
								<text class="activity-title-v">申请用户: <text style="color: #19be6b;">{{val.user_name}}</text></text>
								<view style="display: flex;width: 100%;position: relative;height: 40px;">
									<text style="margin-top: 5px;font-size: 20rpx;position: absolute;display: flex;justify-content: center;align-items: center;width: 100%;">申请时间: {{val.au_date}}</text>
								</view>
							</view>
							<view class="activity-action">
								<u-icon name="arrow-right" color="#a1a3a6" size="40"></u-icon>
							</view>
						</u-button>
					</view>
				</view>
			</swiper-item>
		</swiper>
		<u-modal :show-cancel-button="true"  cancel-text="拒绝" v-model="modelShow" title="审核" :content="modelcontent" @confirm="getAudit(au_id,1)" @cancel="getAudit(au_id,3)"></u-modal>
	</view>
</template>

<script>
	export default{
		data(){
			return{
				list: [{
					name: "审核活动用户"
				}],
				checkmark:true,
				loading:false,
				au_id:'',
				callTitle:'',
				modelShow:false,
				modelcontent:'',
				auditUserList:[],
				activityButtonStyle: {
					width: '96%',
					height: '100%',
					padding: '0',
					border: '0',
				},
				activityAddButtonStyle: {
					width: '100rpx',
					height: '100rpx',
					border: '0',
					background: '#007AFF',
				},
				
			}
		},
		onShow() {
			this.getUserList()
		},
		methods:{
			async getUserList(){
				await uni.$u.api.AdminChangeActivityList({}).then((res)=>{
					this.auditUserList = res.data
				})
			},
			async getAudit(id,status){
				if(status == 1){
					this.callTitle = '审核通过!';
				}else{
					this.callTitle = '审核拒绝!';
				}
				self = this
				await uni.$u.api.AdminChangeActivityUser({au_id:id,"status":status}).then((res)=>{
					this.$refs.uToast.show({
						title: self.callTitle,
						type:"success",
						duration: 1500,
						callback() {
							self.getUserList()
						}
					})
				})
			},
			getModelShow(id,name){
				this.modelcontent = '审核参加用户:'+name;
				this.au_id = id;
				this.modelShow = true;
			}
		}
	}
</script>

<style>
	.audit-main{
		width: 100%;
		height: 100%;
	}
	.satus-bar-height {
		height: var(--status-bar-height);
	}
	
	.message-subsection {
		padding-top: 8px;
		padding-bottom: 8px;
		width: 100%;
		display: flex;
		justify-content: center;
		align-items: center;
	}
	
	.message-subsection-main {
		width: 80%;
		border-radius: 25px !important;
	}
	
	/deep/ .u-item-bg {
		border-radius: 25px !important;
	}
	
	.swiper {
		height: calc(100% - var(--status-bar-height) - 102rpx);
	}
	
	.activity-list-box {
		padding-top: 25rpx;
		margin-left: 20rpx;
		margin-right: 20rpx;
	}

	.activity-list {
		height: 130px;
		border-radius: 50rpx;
		box-shadow: 0 0 120rpx 0 rgba(43, 86, 112, .2);
		overflow: hidden;
		flex-direction: row;
		display: flex;
	}

	.activity-status {
		width: 4%;
		height: 100%;
		background-color: #ffffff;
		margin: 0;
	}
	
	.activity-status-end {
		width: 4%;
		height: 100%;
		background-color: #ff9900;
		margin: 0;
	}

	.activity-title {
		width: 84%;
		height: 100%;
		display: flex;
		justify-content: center;
		align-items: center;
		flex-direction: column;
	}

	.activity-title-t {
		margin-top: 10px;
	}

	.activity-title-v {
		font-size: 30rpx;
		margin-top: -8px;
		height: 25px;
		color: #8a8c8e;
	}

	.activity-title-date {
		margin-top: 13px;
		margin-left: 70%;
		font-size: 20rpx;
	}

	.activity-action {
		width: 12%;
		height: 100%;
		display: flex;
		justify-content: center;
		align-items: center;
	}
</style>
