<template>
	<view class="message">	
		<view class="satus-bar-height"></view>		
		<view class="message-subsection">
			<u-subsection class="message-subsection-main" :list="list" :current="subsectionCurrent" @change="change"
			 active-color="#2979ff"></u-subsection>
		</view>
		
		<view class="wrap">
				<u-swiper :title="true" :effect3d="true" :list="imglist" mode="round" ></u-swiper>
		</view>
		
		<swiper class="swiper" @change="swiperChange" :current="swiperCurrent">
			<swiper-item class="swiper-activityList">
				<scroll-view scroll-y="true" style="height: 100%;">
					<view v-if="activityList == 0"><u-empty text="当前还有活动!敬请期待哦~" mode="message"></u-empty></view>
					<view v-for="(val,key) in activityList" :key="val.act_id" class="activity-list-box">
						<!-- 活动列表 -->
						<view class="activity-list">
							<view :class="(new Date().getTime() /1000) > (new Date(val.act_end_date).getTime()/1000) ? 'activity-colose-status':'activity-status'">
							</view>
							<u-button @click="getActivityDetail(val.act_id,val.act_end_date)" class="activity-button" :hair-line="false" :ripple="true"
							 :custom-style="diaryButtonStyle">
								<view class="activity-title">
									<text class="activity-title-t">{{val.act_title}}</text>
									<text class="activity-title-v">可获得积分:<text style="color: #19be6b;">{{val.act_integral}}</text></text>
									<text class="activity-title-date">截止日期: {{val.act_end_date.split(' ')[0]}}</text>						
									<text class="activity-title-loading">{{(new Date().getTime() /1000) > (new Date(val.act_end_date).getTime()/1000) ? '已结束':'进行中'}}</text>
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
		<view>
			<u-toast ref="uToast" />
		</view>
	</view>
</template>

<script>
	export default {
		data() {
			return {
				page: 1,
				list: [
					{
						name: "所有活动"
					}
				],
				
				imglist: [{
							image: '/static/s1.png',
							title: '昨夜星辰昨夜风，画楼西畔桂堂东'
						},
						{
							image: '/static/s2.png',
							title: '身无彩凤双飞翼，心有灵犀一点通'
						},
						{
							image: '/static/s3.png',
							title: '谁念西风独自凉，萧萧黄叶闭疏窗，沉思往事立残阳'
						},
						{
							image: '/static/s4.png',
							title: '慕然回首那人却在灯火阑珊处'
						}
					],
					
					
				diaryButtonStyle: {
					width: '96%',
					height: '100%',
					padding: '0',
					border: '0',
				},
				swiperCurrent: 0,
				subsectionCurrent: 0,
				activityList: [],
				myActivityList: []
			}
		},
		onShow() {
			this.getActivityList()
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
			async getActivityList() {
				await uni.$u.api.ActivityList({
					"page": this.page
				}).then((res) => {
					this.activityList = res.data;
				})

			},
			getActivityDetail(act_id,act_end_date){
				if((new Date().getTime() /1000) > (new Date(act_end_date).getTime()/1000)){
					this.$refs.uToast.show({
						title: '该活动已经结束啦!',
						type: 'info'
					})
					return
				}
				uni.navigateTo({
					url:'/pages/home/activityDetail?act_id='+act_id
				})
			}
		}
	}
</script>

<style>
	page {
		height: 100%;
	}
.wrap {
		padding: 40rpx;
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
		background-color: #09BB07;
		margin: 0;
	}
	
	.activity-colose-status{
		width: 4%;
		height: 100%;
		background-color: #FF9900;
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
	
	.activity-title-loading{
		margin-top: -40px;
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
