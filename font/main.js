import Vue from 'vue'
import App from './App'
import uView from "uview-ui";


Vue.use(uView);
Vue.config.productionTip = false

App.mpType = 'app'

const app = new Vue({
    ...App
})


import httpInterceptor from '@/common/http.js'
Vue.use(httpInterceptor, app)

// http接口API集中管理引入部分
import httpApi from '@/common/api.js'
Vue.use(httpApi, app)

app.$mount()


Vue.prototype.staticServer='http://192.168.43.237/2676624343/'
