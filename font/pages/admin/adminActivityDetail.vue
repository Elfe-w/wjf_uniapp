<template>
	
	<view class="activityDetail-main">
		<view>
			<u-toast ref="uToast" />
		</view>
		<u-navbar back-text="" title="活动详情">
		</u-navbar>
		<view class="activityDetail-box">
			<view class="activity-title">
				<view>
				<text style="font-size: 20px;">
				{{data.act_title}}
				</text>
				<u-tag :text="data.act_tag" style="position: absolute;right:-43px;margin-top: 3px;" type="success" shape="circle" :closeable="false" size="mini" />
				</view>
				<u-line style="margin-top: 2px;position: absolute;bottom: 0;width: calc(100% + 40px);"></u-line>
			</view>
			<view class="scroll-activity-content">
				<scroll-view class="activity-content" :scroll-y="true">
					<text class="activity-content-text">
						{{data.act_content}}
					</text>
					<image  width="100%" height:auto  :src="imgPath"></image >
				</scroll-view>
				<u-line style="width: 200%;margin-bottom: 5px;"></u-line>
				<view style="display: flex;width: 100%;position: relative;height: 20px;">
					<view style="position: absolute;left: 0;">发布者:<text style="color: #09BB07;">{{data.su_name}}</text></view>
					<view style="display: flex;flex-direction: row-reverse;position: absolute;right: 0;"><text style="color: #09BB07;">{{data.act_integral}}</text>可获得积分:</view>
				</view>
				<view style="margin-top: 10px;font-size: 12px;display: flex;">
					开始时间:<view style="color: #09BB07;">{{data.act_start_date}}</view>
				</view>
				<view style="margin-top: 10px;font-size: 12px;display: flex;">
					结束时间:<view style="color: #09BB07;">{{data.act_end_date}}</view>
				</view>
			</view>
		</view>
		<u-button type="primary" @click="getActivityRank()" :disabled="data.user_status != null ? true : false" :ripple="true" style="position: absolute;bottom: 0;width: 100%;border-radius: 0;">查看排名(参与人数:{{this.act_count > 99 ? '99+':this.act_count}})</u-button>
	</view>
</template>

<script>
	export default {
		data(){
			return{
				imgPath:"http://192.168.43.237/uploads/",
				act_count:0,
				data:{},
				rank:[],
				
			}
		},
		onLoad(options) {
			this.act_count = options.act_count
			this.getActivityDetail(options.act_id)
		},
		methods:{
			async getActivityDetail(id){
				uni.$u.api.AdminActivityDetail({act_id:id}).then((res)=>{
					this.data = res.data;
					this.imgPath=this.imgPath+this.data.act_img
				})
			},
			getActivityRank(){
				uni.navigateTo({
					url:'../activity/activityRank?act_id='+this.data.act_id+'&act_title='+this.data.act_title
				})
			}
		}
	}
</script>

<style>
	
	.activityDetail-main{
		width: 100%;
		height: 100%;
	}
	
	.activityDetail-box{
		width: 100%;
		height: calc(100% - 44px);
		display: flex;
		align-items: center;
		flex-direction: column;
	}
	
	.scroll-activity-content{
		width: calc(100% - 30px);
		min-height: 200px;
		max-height: 500px;
		overflow: hidden;
		position: relative;
	}
	
	.activity-content{
		width: 100%;
		margin-top: 10px;
		min-height: 400px;
		max-height: 400px;
	}
	
	.activity-content-text{
		width: 100%;
		min-height: 100px;
		text-align: justify;
		text-justify: newspaper;
		word-break: break-all;
		font-size: 16px;
	}
	
	.activity-title{
		padding:5px 0;
		position: relative;
		display: flex;
		flex-direction: column;
		justify-content: center;
		align-items: center;

	}
</style>
