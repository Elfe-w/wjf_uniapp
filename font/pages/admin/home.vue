<template>
	<view class="admin-main">
		<view class="satus-bar-height"></view>
		<view class="message-subsection">
			<u-subsection class="message-subsection-main" :list="list" :current="subsectionCurrent" @change="change"
			 active-color="#2979ff"></u-subsection>
		</view>
		<swiper class="swiper" @change="swiperChange" :current="swiperCurrent">
			<swiper-item class="swiper-activityList">
				<scroll-view scroll-y="true" class="scroll">
					<view v-if="activityList == 0">
						<u-empty text="当前没有活动!" mode="message"></u-empty>
					</view>
					<view v-for="(val,key) in activityList" :key="val.act_id" class="activity-list-box">
						<!-- 活动列表 -->
						<view class="activity-list">
							<view :class="(new Date().getTime() /1000) > (new Date(val.act_end_date).getTime()/1000) ? 'activity-status-end':'activity-status'">
							</view>
							<u-button @click="getActivityDetail(val.act_id,val.act_count)" class="activity-button" :hair-line="false"
							 :ripple="true" :custom-style="activityButtonStyle">
								<view class="activity-title">
									<text class="activity-title-t">{{val.act_title}}</text>
									<text class="activity-title-v">活动创建者: <text style="color: #19be6b;">{{val.su_name}}</text></text>
									<view style="display: flex;width: 100%;position: relative;height: 40px;">
										<text style="margin-top: 10px;font-size: 20rpx;position: absolute;left: 0;">参与人数:{{val.act_count}}</text>
										<text style="margin-top: 10px;font-size: 20rpx;position: absolute;right: 0;">截止日期: {{val.act_end_date.split(' ')[0]}}</text>
									</view>
								</view>
								<view class="activity-action">
								
									<u-icon name="arrow-right" color="#a1a3a6" size="40"></u-icon>
								</view>
							</u-button>
						</view>
						
					</view>
				</scroll-view>
			</swiper-item>
		</swiper>
		<view class="activity-add-button">
			<u-button @click="getAddActivity()" :hair-line="false" :custom-style="activityAddButtonStyle" shape="circle" ripple ripple-bg-color="rgba(152, 245, 255, 0.25)">
				<u-icon name="plus" color="#ffffff" size="50"></u-icon>
			</u-button>
		</view>
		<view class="activity-rank-button">
			<u-button @click="getAllRank()" :hair-line="false" :custom-style="activityAddButtonStyle" shape="circle" ripple ripple-bg-color="rgba(152, 245, 255, 0.25)">
				<view style="font-size: 12px;color: #ffffff;">总排名</view> 
			</u-button>
		</view>
		<view class="activity-back-button">
			<u-button @click="getLogin()" :hair-line="false" :custom-style="activityAddButtonStyle" shape="circle" ripple ripple-bg-color="rgba(152, 245, 255, 0.25)">
				<view style="font-size: 12px;color: #ffffff;">退出</view>
			</u-button>
		</view>
		<u-button type="primary" @click="getAuditUser()" :ripple="true" style="position: absolute;bottom: 0;width: 100%;border-radius: 0;">审核活动用户</u-button>
	</view>
</template>
 
<script>
	export default {
		data() {
			return {
				page: 1,
				list: [{
					name: "管理所有活动"
				}],
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
				swiperCurrent: 0,
				subsectionCurrent: 0,
				activityList: [],
				myActivityList: []
			}
		},
		onShow() {
			this.getAdminActivityList()
		},
		methods: {
			
			change(index) {
				this.subsectionCurrent = index;
				this.swiperCurrent = index;
			},
			swiperChange(index) {
				this.subsectionCurrent = index.detail.current;
				
				
				this.swiperCurrent = index.detail.current;
			},
			async getAdminActivityList() {
				await uni.$u.api.AdminActivityList({
					"page": this.page
				}).then((res) => {
					console.log(res);
					this.activityList = res.data;
				})	
			},
			getActivityDetail(act_id,act_count) {
				uni.navigateTo({
					url: '/pages/admin/adminActivityDetail?act_id=' + act_id+'&act_count=' + act_count
				})
			},
			getAddActivity(){
				uni.navigateTo({
					url: '/pages/admin/addActivity'
				})
			},
			getAuditUser(){
				uni.navigateTo({
					url: '/pages/admin/auditUser'
				})
			},
			getAllRank(){
				uni.navigateTo({
					url: '/pages/activity/Rank'
				})
			},
			getLogin(){
				uni.navigateTo({
					
					url: '/pages/login/login/login'
				})
			}
		}
	}
</script>

<style>
	page {
		width: 100%;
		height: 100%;
	}

	.admin-main {
		width: 100%;
		height: 100%;
	}

	.message {
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
		height: calc(100% - var(--status-bar-height) - 102rpx - 80rpx);
	}
	
	.scroll{
		height: 100%;
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
		background-color: #09BB07;
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
		margin-top: 20px;
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
	
	.activity-back-button{
		width: 100rpx;
		height: 100rpx;
		position: absolute;
		z-index: 999;
		bottom: 150rpx;
		right: 30rpx;
		border-radius: 50%;
		overflow: hidden;
		box-shadow: 0 0 100rpx 0 rgba(152, 245, 255, .3);
	}

	.activity-add-button {
		width: 100rpx;
		height: 100rpx;
		position: absolute;
		z-index: 999;
		bottom: 280rpx;
		right: 30rpx;
		border-radius: 50%;
		overflow: hidden;
		box-shadow: 0 0 100rpx 0 rgba(152, 245, 255, .3);
	}
	
	.activity-rank-button{
		width: 100rpx;
		height: 100rpx;
		position: absolute;
		z-index: 999;
		bottom: 410rpx;
		right: 30rpx;
		border-radius: 50%;
		overflow: hidden;
		box-shadow: 0 0 100rpx 0 rgba(152, 245, 255, .3);
	}
</style>
