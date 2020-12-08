<template>
	<view class="mine">
		<!--顶部设置-->
		<u-toast ref="uToast" />
				
		<view class="mine-card">
			<view class="mine-user">
				<view class="mine-user-head">
					<u-avatar   @tap="addImg" :src="user_avatar" size="150" :show-sex="true" :sex-icon="icon_sex" :show-level=level_icon class="mine-user-head-avatar">
					</u-avatar>
					<text style="margin-left: 5px;font-size: 22px;color: #ffffff;">{{userInfo.user_name}}</text>					
					<text style="margin-left: 5px;margin-top: 10px;font-size: 15px;color: #ffffff;">当前积分:{{userInfo.user_mark}}</text>
					<text @click="rankTip" style="margin-left: 5px;margin-top: 10px;font-size: 15px;color: #ffffff;">当前排名:{{userInfo.ranks}}</text>
				</view>
			</view>
		</view>
		
		<!-- <view class="message-subsection">
				<u-button style="width: 80%;"  @click="toLogin" type="primary">退出登录</u-button>	
		</view> -->
		
		
		<view class="message-subsection">
			<u-subsection class="message-subsection-main" :list="[{name: '我参加的活动'}]" :current="subsectionCurrent"
			 active-color="#2979ff"></u-subsection>				
		</view>		
		<swiper class="swiper" :current="swiperCurrent">
			<swiper-item class="swiper-activityList">
				<scroll-view scroll-y="true" style="height: 100%;">
					<view class="activity-list-button" v-for="(val,key) in activityList" :key="val.act_id">
						<u-button :custom-style="activityButtonStyle" :disabled="val.user_status == 2 ? true:val.user_status == 3 ? true:false" :hair-line="false" @click="getActivityRank(val.act_id,val.act_title)">
							<text style="width: calc(70% - 45px); text-align: left;padding-left: 5%;">{{val.act_title}}</text>
							<text style="width: calc(30% + 45px); text-align: right;padding-right: 10%;">{{val.user_status == 2 ? '等待审核':val.user_status == 3 ? '申请被拒绝':''}}</text>
							<u-button shape="circle" ripple-bg-color="#a0cfff" :custom-style="activityButtonViceStyle" :hair-line="false" plain
							 :ripple="true">
								<u-icon name="arrow-right"></u-icon>
							</u-button>
						</u-button>
						<u-line></u-line>
					</view>
				</scroll-view>
			</swiper-item>
		</swiper>
		
		<view class="activity-back-button">
			<u-button  @click="toLogin" :hair-line="false" :custom-style="activityAddButtonStyle" shape="circle" ripple ripple-bg-color="rgba(152, 245, 255, 0.25)">
				<view style="font-size: 12px;color: #ffffff;">退出</view>
			</u-button>
		</view>
		
		
	</view>
</template>

<script>
	export default {
		data() {
			return {
				
				icon_sex:"",
				totalNum:0,
				level_icon:true,
				imgPath:"http://192.168.43.237/uploads/",
				user_avatar:"",
				avatarLocalPath:"",
				avatarOnlinePath:"",
				userInfo: {},
				activityList:[],
				swiperCurrent: 0,
				subsectionCurrent: 0,
				activityButtonStyle: {
					width: '100%',
					height: '60px',
					padding: '0',
					border: '0',
				},
				activityButtonViceStyle: {
					width: '45px',
					height: '45px',
					padding: '0',
					border: '0',
					backgroundColor: 'transparent',
					position: 'absolute',
					right:'0'
				},
				activityAddButtonStyle: {
					width: '100rpx',
					height: '100rpx',
					border: '0',
					background: '#007AFF',
				},
			}
		},
		onLoad() {

		},
		onShow() {
			this.myInfo()
		},
		methods: {
			rankTip:function(){
				console.log("hhhhhhh");
				uni.showModal({
					content:"您当前排名超过"+((1-(this.userInfo.ranks/this.totalNum))*100)+"%的用户啦~",
					title:'恭喜(#^.^#)',
					showCancel:false,
					success(e) {
					}
				});
			},
			
			addImg : function(){
				var canUpLoad=false;
				self=this; 
					uni.chooseImage({
						count: 1,
						sizeType: ['compressed'],
						success: function(res) {
							this.avatarLocalPath= res.tempFilePaths[0],
							canUpLoad=true;							
							self.upLoadImage(this.avatarLocalPath);
						}
					})
					
			},
			
						
			upLoadImage : function(path){
				var self=this;
				console.log(path);
				// 如果没有图片 或者已经上传完成 则执行提交
					uni.showLoading({title:"正在提交"});
					var uploader = uni.uploadFile({
						url      : "http://192.168.43.237/api//Admin/upLoadImg",
						filePath : path,
						name     : 'file',
						header:{"Content-Type": "multipart/form-data"},
						success: (uploadFileRes) => { 
							console.log(uploadFileRes);
							uploadFileRes = JSON.parse(uploadFileRes.data);
							console.log(uploadFileRes);
							if(uploadFileRes.code != 20000){ 
								uni.showToast({title:"上传头像失败,请重试!", icon:"none"});
								return false;
							}
							// 将已经上传的文件地址赋值给文章数据
							self.avatarOnlinePath=uploadFileRes.data
							console.log(self.avatarOnlinePath);
							self.user_avatar=self.imgPath+self.avatarOnlinePath;
							console.log(self.user_avatar);
							//并将新的图片地址返回后台传给数据库保存起来
							self.resetAvatar();
							
						},
						fail: (e) => {
							console.log(e);
							uni.showToast({title:"上传头像失败,请重试!", icon:"none"});
						}
					})  
					  setTimeout(()=>{
						uni.hideLoading()
					},1000)
				
			},
			async resetAvatar(){
				console.log(this.imgPath);
				await uni.$u.api.ResetAvatar({"user_avatar":this.user_avatar}).then((res)=>{
					console.log(res);
				})
			},

			async myInfo(){
				await uni.$u.api.MyInfo().then((res)=>{
					console.log(res);
					this.totalNum=res.data.totalNum;
					console.log(res.data.totalNum);
					this.userInfo = res.data.info;		
					this.user_avatar=this.userInfo.user_avatar;
					 
					if(this.userInfo.ranks<=1){
						this.level_icon=true;
						console.log(this.level_icon)
					}else{
						this.level_icon=false;
						console.log(this.level_icon)
					}
					if(this.userInfo.user_sex=="小姐姐"){
					
						this.icon_sex="woman";
						console.log(this.icon_sex);
					}
					else{
						
						this.icon_sex="man";
						console.log("icon_sex");
					}
					this.activityList = res.data.activity
				})
			},
			getActivityRank(act_id,act_title){
				uni.showModal({
					content:"活动详情请到广场查看哦~",
					title:'提示',
					showCancel:false,
					success(e) {
					}
				});
				// uni.navigateTo({
				// 	url:'/pages/activity/activityRank?act_id='+act_id+'&act_title='+act_title
				// })
			},
			toLogin(){
				uni.reLaunch({
					url:'/pages/login/login/login' 
				})
			}
		}

	}
</script>

<style lang="scss">
	page {
		height: 100%;
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

	.satus-bar-height {
		height: var(--status-bar-height);
	}

	.mine {
		
		position: relative;
		background-color: #fffff;
		display: flex;
		flex-direction: column;
		// justify-content: center;
		align-items: center;
		height: 100%;
	}
	
	
	.mine-card{
		
		width: 100%;
		height: 30%;
		display: flex;
		flex-direction: column;
		justify-content: center;
		align-items: center;
		background-color: #8EC5FC;
		background-image: linear-gradient(62deg, #8EC5FC 0%, #E0C3FC 100%);
	}

	.mine-user {
		width: 100%;
		height: 40%;
		display: flex;
		align-items: center;
		justify-content: center;
		flex-direction: column;
	}

	.mine-user-head {
		margin-top: 30rpx;
		width: 100%;
		height: 40%;
		display: flex;
		justify-content: center;
		align-items: center;
		flex-direction: column;
	}

	.mine-user-info {
		width: 100%;
		height: 60%;
		display: flex;
		justify-content: center;
		flex-direction: row;
	}

	.mine-user-head-avatar {
		box-shadow: 0 0 10px 0 rgba(43, 86, 112, .2);
		margin-left: 5px;
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
	.activity-list-button {
		height: 60px;
	}
	.swiper {
		width: 100%;
		height: calc(100% - var(--status-bar-height) - 102rpx - 30%);
	}

</style>
