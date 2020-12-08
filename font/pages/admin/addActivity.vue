<template>
	<view class="editInfo">
		<view>
			<u-toast ref="uToast" />
		</view> 
		<u-navbar :back-text= "navbar.backText" :title="navbar.title">
		</u-navbar>  
		<view class="editInfo-form">
			<u-form :model="form" ref="uForm" label-width="140">
				<u-form-item label="名称">
					<u-input v-model="form.act_title" placeholder="请输入活动名称" />
				</u-form-item>
				<u-form-item label="内容" style="position: relative;"> 
					<u-input v-model="act_contentStatus" type="select" @click="popupShow = true" placeholder="点击输入活动内容" />
					<u-icon name="arrow-right" style="position: absolute;right: 10px;"></u-icon>
					<u-popup v-model="popupShow" mode="bottom">
						<view class="popup-action-sub">
						</view>
						<view class="popup-view">
							<u-input :custom-style="inputStyle" v-model="form.act_content" type="textarea" placeholder="请输入活动内容" maxlength="300" />
							<u-button type="primary" @click="setContentStatus()" :ripple="true" style="position: absolute;bottom: 0;width: 100%;border-radius: 0;">提交</u-button>
						</view>
					</u-popup>
				</u-form-item>
				
				
				<u-form-item label="宣传图片" style="position: relative;">
					<u-input v-model="act_imgStatus" type="select" @click="popupImgShow = true" placeholder="点击上传宣传图片" />
					<u-icon name="arrow-right" style="position: absolute;right: 10px;"></u-icon>
					<u-popup v-model="popupImgShow" mode="bottom">
						<view class="popup-action-sub">
						</view>
						<view class="popup-view">
							<!-- 内容展示 -->
							<view class="artList" >
								<block v-for="(item, index) in artList" :key="index"> 
									<view class="item" v-if="item.type == 'image'">
										<u-image width="190rpx" height="190rpx" @tap="removeImg" :src="item.content" :data-index="index" mode="widthFix"></u-image>
										</view>
								</block>   
						 	</view>  
							
							<!-- 内容上传--> 
								<u-image width="190rpx" height="190rpx" :src="imgUrl"@tap="addImg"></u-image>
							<u-button type="primary" @click="setimgStatus()" :ripple="true" style="position: absolute;bottom: 0;width: 100%;border-radius: 0;">提交</u-button>
						</view>
					</u-popup>
				</u-form-item>
				
				
				
				<u-form-item label="类别" style="position: relative;">
					<u-input v-model="form.act_tag" type="select" @click="actionSheetShow = true" placeholder="请选择活动类别" />
					<u-icon name="arrow-right" style="position: absolute;right: 10px;"></u-icon>
					<u-select :list="actionSheetList" v-model="actionSheetShow" @confirm="actionSheetCallback"></u-select>
				</u-form-item>
				
				<!-- 自己写的  -->
				<u-form-item label="开始时间" style="position: relative;">
					<u-input  v-model ="form.act_begin_date" type="select" @click="pickerBeginShow = true" placeholder="请选择活动开始时间" />
					<u-icon name="arrow-right" style="position: absolute;right: 10px;"></u-icon>
					<u-picker :start-year="new Date().getFullYear()" :params="params" v-model="pickerBeginShow" mode="time" @confirm="getBeginTime"></u-picker>
				</u-form-item>
				
				<u-form-item label="结束时间" style="position: relative;">
					<u-input v-model="form.act_end_date" type="select" @click="pickerShow = true" placeholder="请选择活动结束时间" />
					<u-icon name="arrow-right" style="position: absolute;right: 10px;"></u-icon>
					<u-picker :start-year="new Date().getFullYear()" :params="params" v-model="pickerShow" mode="time" @confirm="getTime"></u-picker>
				</u-form-item>
				<u-form-item label="积分">
					<u-input v-model="form.act_integral" placeholder="请输入活动积分" />
				</u-form-item>
			</u-form>
		</view>
		<view>
			<u-button type="primary" @click="subActivity()" :ripple="true" style="position: absolute;bottom: 0;width: 100%;border-radius: 0;">立即提交</u-button>
		</view>
	</view>
</template>

<script>
	var _self, loginRes;
	export default {
		data() {
			return {
								
				// filesArr: [],  关于图片上传
				title : '',
				artList : [],
				inputContent : "",
				needUploadImg : [],
				uploadIndex : 0,
				imgPath:{},
				imgUrl:'/static/chooseImg.png',
				canUpload:true,
				currentCateIndex : 0,
				
					
				navbar: {
					title: '添加活动',
					backText: '',
					checkmark: true,
					loading: false
				},
				act_contentStatus: '',
				act_imgStatus:'',
				inputStyle: {
					width: 'calc(100% - 20px)',
					minHeight: '150px',
					maxHeight: '300px',
					margin: '0 10px',
					backgroundColor: '#f4f4f5',
					borderRadius: '25px',
				},
				pickerShow: false,
				popupImgShow:false,
				pickerBeginShow: false,
				popupShow: false,
				form: {},
				params: {
					year: true,
					month: true,
					day: true,
					hour: true,
					minute: true,
					second: true
				},
				actionSheetShow: false,
				actionSheetList: [{ 
						value:"1",
						label: '学习'
					},
					{
						value:"2",
						label: '文娱'
					},
					{
						value:"3",
						label: '体育'
					},
					{
						value:"4",
						label: '志愿者'
					},
					{
						value:"5",
						label: '其它'
					}
				]
			}
		},
		components: {

		},
		onLoad() {
				_self = this;
		},
		methods: {
			
			addImg : function(){
				
				if(this.artList.length >= 1 )
				{
					uni.showModal({
						content:"最多上传一张图片哦~",
						title:'提示',
						showCancel:false,
						success(e) {
							if (e.confirm) {
								this.canUpload=false;
								return false;
							}							
						}
					});
				}
				else{
					this.canUpload=true;
				}
				if(this.canUpload){
					this.canUpload=false;
					uni.chooseImage({
						count: 1,
						sizeType: ['compressed'],
						success: function(res) {
							_self.artList.push({"type":"image", "content" : res.tempFilePaths[0]})
						}
					})
				}
			},
			
			   
				 
			actionSheetCallback(index) {
				this.form.act_tag = index[0].label				
			},
			setContentStatus() {
				this.popupShow = false
				this.act_contentStatus = '已填写'
				
			},
			setimgStatus() {	
				this.popupImgShow = false
				this.act_imgStatus = '已上传活动宣传图片'					 
				
				// b站来试试
				this.needUploadImg = [];
				for(var i = 0; i < this.artList.length; i++){
					if(this.artList[i].type == 'image'){
						this.needUploadImg.push({"tmpurl" : this.artList[i].content , "indexID" : i});
					}
				}
				console.log(this.needUploadImg);
				this.uploadImg();
			
			}, 
			
			
			removeImg : function(e){
				
				uni.showModal({
					content:"确定要删除此图片吗",
					title:'提示',
					success(e) {
						if (e.confirm) {
							_self.artList.splice(0, 1);
						}
					}
				});
			},
			
			
			uploadImg : function(){
				// 如果没有图片 或者已经上传完成 则执行提交
				if(this.needUploadImg.length < 1 || this.uploadIndex >=  this.needUploadImg.length){
					//
					uni.showLoading({title:"正在提交"});
					console.log("hhhhh");	 
				   setTimeout(()=>{
								uni.hideLoading()
							},1000)
				}else{ 
					// 上传图片 
					
					uni.showLoading({title:"上传图片"});
					var uploader = uni.uploadFile({
						url      : "http://192.168.43.237/api//Admin/upLoadImg",
						filePath : _self.needUploadImg[_self.uploadIndex].tmpurl,
						name     : 'file',
						header:{"Content-Type": "multipart/form-data"},
						success: (uploadFileRes) => { 
							console.log(uploadFileRes);
							uploadFileRes = JSON.parse(uploadFileRes.data);
							console.log(uploadFileRes);
							if(uploadFileRes.code != 20000){ 
								uni.showToast({title:"上传图片失败,请重试!", icon:"none"});
								return false;
							}
							// 将已经上传的文件地址赋值给文章数据
							var index = _self.needUploadImg[_self.uploadIndex].indexID;
							
							_self.uploadIndex ++;
							
							this.$set(_self.imgPath,"act_img",uploadFileRes.data);
							this.$set(_self.form,"act_img",uploadFileRes.data);
							console.log(_self.form)
							console.log(_self.imgPath.act_img);
							// 递归上传
							setTimeout(function(){_self.uploadImg();}, 1000);
						},
						fail: (e) => {
							console.log(e);
							uni.showToast({title:"上传图片失败,请重试!", icon:"none"});
						}
					})    
				}
			},
				
			
			async subActivity() {
				if(this.form.act_title == undefined || this.form.act_title.length <= 0){
					this.$refs.uToast.show({
						title: '请填写活动名称!',
						type:"error",
						duration: 1000
					})
					return;
				}
				if(this.form.act_content == undefined || this.form.act_content.length <= 0){
					this.$refs.uToast.show({
						title: '请填写活动内容!',
						type:"error",
						duration: 1000
					})
					return;
				}
				if(this.form.act_integral == undefined || this.form.act_integral.length < 0){
					this.$refs.uToast.show({
						title: '请填写活动积分!',
						type:"error",
						duration: 1000
					})
					return;
				}
				if(this.form.act_tag == undefined || this.form.act_tag.length <= 0){
					this.$refs.uToast.show({
						title: '请选择活动类别!',
						type:"error",
						duration: 1000 
					})
					return;
				}
				
				if(this.form.act_begin_date == undefined || this.form.act_begin_date.length <= 0){
					this.$refs.uToast.show({
						title: '请选择活动开始时间!',
						type:"error",
						duration: 1000
					})
					return;
				}
				
				
				if(this.form.act_end_date == undefined || this.form.act_end_date.length <= 0){
					this.$refs.uToast.show({
						title: '请选择活动结束时间!',
						type:"error",
						duration: 1000
					})
					return;
				}
				
				if(this.form.act_begin_date == undefined || this.form.act_begin_date.length <= 0){
					this.$refs.uToast.show({
						title: '请选择活动开始时间!',
						type:"error",
						duration: 1000 
					})
					return;
				}
				
				
				
				await uni.$u.api.AdminAddActivity(this.form,this.imgPath).then((res) => {
					this.$refs.uToast.show({
						title: '活动添加成功!',
						type:"success",
						duration: 1500,
						callback() {
							uni.navigateTo({
								url: '/pages/admin/home',
							})
						}
					})
				})

			},
			getBeginTime(e){
				this.form.act_begin_date = e.year + '-' + e.month + '-' + e.day + ' '+e.hour+':'+e.minute+':'+e.second
			},
			getTime(e) {
				this.form.act_end_date = e.year + '-' + e.month + '-' + e.day + ' '+e.hour+':'+e.minute+':'+e.second					
		},		
			},
			
	}
</script>

<style lang="scss">
	page {
		height: 100%;
		// display: inline-flex;
	}

	.editInfo {
		height: 100%;
	}

	.navbar-right {
		margin-right: 24rpx;
		display: flex;

	}

	.editInfo-form {
		width: 100%;
	}

	/deep/ .u-input__right-icon {
		display: none !important;
	}

	.popup-view {
		display: flex;
		// justify-content: space-around;
		padding-top: 20px;
		width: 100%;
		height: 400px;
		position: relative;
	}

	.popup-action-sub {
		width: 100%;
		height: 30px;
		position: absolute;
	}

	/deep/ .uni-textarea-wrapper {
		width: calc(100% - 30px);
		margin: 0 15px;
	}

	/deep/ .uni-textarea-compute>div {
		text-align: justify;
		text-justify: newspaper;
		word-break: break-all;
	}
</style>
