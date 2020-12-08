const install = (Vue, vm) => {
	// 此处使用了传入的params参数，一切自定义即可
	let Login = (params = {}) => vm.$u.post('Login/UserLogin', params);
	let UserRegister = (params = {}) => vm.$u.post('Login/UserRegister', params);
	let ResetPassword = (params = {}) => vm.$u.post('Login/ResetPassword', params);
	let ResetAvatar = (params = {}) => vm.$u.post('Login/ResetAvatar', params);
	let AdminLogin = (params = {}) => vm.$u.post('Admin/AdminLogin', params);
	let ActivityList = (params = {}) => vm.$u.post('Home/ActivityList', params);
	let ActivityDetail = (params = {}) => vm.$u.post('Home/ActivityDetail', params);
	let joinActivity = (params = {}) => vm.$u.post('Home/joinActivity', params);
	let MyInfo = (params = {}) => vm.$u.post('My/Info', params);
	let ActivityRank = (params = {}) => vm.$u.post('My/ActivityRank', params);
	let AdminActivityList = (params = {}) => vm.$u.post('Admin/ActivityList', params);
	let AdminActivityDetail = (params = {}) => vm.$u.post('Admin/ActivityDetail', params);
	let AdminAddActivity = (params = {}) => vm.$u.post('Admin/AddActivity', params);
	let AdminChangeActivityUser = (params = {}) => vm.$u.post('Admin/ChangeActivityUser', params);
	let AdminChangeActivityList = (params = {}) => vm.$u.post('Admin/ChangeActivityList', params);
	let AdminAllRank = (params = {}) => vm.$u.post('Admin/AllRank', params);
	  
	
	let AdminStoreImg = (params = {}) => vm.$u.post('Admin/Add', params);
	
	// 将各个定义的接口名称，统一放进对象挂载到vm.$u.api(因为vm就是this，也即this.$u.api)下
	vm.$u.api = {
		Login,
		UserRegister,
		ResetPassword,
		ResetAvatar,
		AdminLogin,
		ActivityList,
		ActivityDetail,
		joinActivity,
		MyInfo,
		ActivityRank,
		AdminActivityList,
		AdminActivityDetail,
		AdminAddActivity,
		AdminChangeActivityUser,
		AdminChangeActivityList,
		AdminAllRank,
		AdminStoreImg
		};
}

export default {
	install
}