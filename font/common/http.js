import encrypt from './aes.js'
import Vue from 'vue'
let host = 'http://192.168.43.237/2676624343/';

const install = (Vue, vm) => {
	// 此为自定义配置参数，具体参数见上方说明
	Vue.prototype.$u.http.setConfig({
		baseUrl: host,
		loadingText: '努力加载中~',
		loadingTime: 800,
		// ......   
	});

	// 请求拦截，配置Token等参数
	Vue.prototype.$u.http.interceptor.request = (config) => {
		if(Object.keys(config.data).length != 0){
			config.data = encrypt.encrypt(config.data);
		}
		console.log(config);
		return config;
	}

	// 响应拦截，判断状态码是否通过
	Vue.prototype.$u.http.interceptor.response = (res) => {
		// res为服务端返回值，可能有code，result等字段
		// 这里对res.result进行返回，将会在this.$u.post(url).then(res => {})的then回调中的res的到
		// 如果配置了originalData为true，请留意这里的返回值
		if(typeof(res) == "string"){
			result = encrypt.decrypt(res)
			return result;
			console.log(result);  
		}else{
			console.log(res)
			
			if(res.code == 50000){
							vm.$u.toast(res.msg)
							return false;
						}else
						if(res.code == 500){
							vm.$u.toast(res.msg)
							return false;
						}
						else
						{
							return res
						}

		}
		
	}
}

export default {
	install
}
