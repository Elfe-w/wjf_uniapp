
var isReady=false;var onReadyCallbacks=[];
var isServiceReady=false;var onServiceReadyCallbacks=[];
var __uniConfig = {"pages":["pages/login/login/login","pages/home/home","pages/home/activityDetail","pages/my/my","pages/activity/activityRank","pages/admin/home","pages/admin/adminActivityDetail","pages/admin/addActivity","pages/admin/auditUser","pages/register/register","pages/resetPassword/resetPassword","pages/activity/Rank"],"window":{"navigationBarTextStyle":"black","navigationBarTitleText":"德育分管家","navigationBarBackgroundColor":"#F8F8F8","backgroundColor":"#F8F8F8","backgroundColorTop":"#F4F5F6","backgroundColorBottom":"#F4F5F6"},"tabBar":{"color":"#7A7E83","selectedColor":"#007AFF","borderStyle":"black","backgroundColor":"#ffffff","list":[{"pagePath":"pages/home/home","iconPath":"static/images_m/index.png","selectedIconPath":"static/images_m/index1.png","text":"首页"},{"pagePath":"pages/my/my","iconPath":"static/images_m/gift.png","selectedIconPath":"static/images_m/gift1.png","text":"我的"}]},"nvueCompiler":"uni-app","renderer":"auto","splashscreen":{"alwaysShowBeforeRender":true,"autoclose":false},"appname":"德育分管家","compilerVersion":"2.9.8","entryPagePath":"pages/login/login/login","networkTimeout":{"request":60000,"connectSocket":60000,"uploadFile":60000,"downloadFile":60000}};
var __uniRoutes = [{"path":"/pages/login/login/login","meta":{"isQuit":true},"window":{"navigationStyle":"custom"}},{"path":"/pages/home/home","meta":{"isQuit":true,"isTabBar":true},"window":{"navigationStyle":"custom"}},{"path":"/pages/home/activityDetail","meta":{},"window":{"navigationStyle":"custom"}},{"path":"/pages/my/my","meta":{"isQuit":true,"isTabBar":true},"window":{"navigationStyle":"custom"}},{"path":"/pages/activity/activityRank","meta":{},"window":{"navigationStyle":"custom"}},{"path":"/pages/admin/home","meta":{},"window":{"navigationStyle":"custom"}},{"path":"/pages/admin/adminActivityDetail","meta":{},"window":{"navigationStyle":"custom"}},{"path":"/pages/admin/addActivity","meta":{},"window":{"navigationStyle":"custom"}},{"path":"/pages/admin/auditUser","meta":{},"window":{"navigationStyle":"custom"}},{"path":"/pages/register/register","meta":{},"window":{"navigationStyle":"custom"}},{"path":"/pages/resetPassword/resetPassword","meta":{},"window":{"navigationStyle":"custom"}},{"path":"/pages/activity/Rank","meta":{},"window":{"navigationStyle":"custom"}}];
__uniConfig.onReady=function(callback){if(__uniConfig.ready){callback()}else{onReadyCallbacks.push(callback)}};Object.defineProperty(__uniConfig,"ready",{get:function(){return isReady},set:function(val){isReady=val;if(!isReady){return}const callbacks=onReadyCallbacks.slice(0);onReadyCallbacks.length=0;callbacks.forEach(function(callback){callback()})}});
__uniConfig.onServiceReady=function(callback){if(__uniConfig.serviceReady){callback()}else{onServiceReadyCallbacks.push(callback)}};Object.defineProperty(__uniConfig,"serviceReady",{get:function(){return isServiceReady},set:function(val){isServiceReady=val;if(!isServiceReady){return}const callbacks=onServiceReadyCallbacks.slice(0);onServiceReadyCallbacks.length=0;callbacks.forEach(function(callback){callback()})}});
service.register("uni-app-config",{create(a,b,c){if(!__uniConfig.viewport){var d=b.weex.config.env.scale,e=b.weex.config.env.deviceWidth,f=Math.ceil(e/d);Object.assign(__uniConfig,{viewport:f,defaultFontSize:Math.round(f/20)})}return{instance:{__uniConfig:__uniConfig,__uniRoutes:__uniRoutes,global:void 0,window:void 0,document:void 0,frames:void 0,self:void 0,location:void 0,navigator:void 0,localStorage:void 0,history:void 0,Caches:void 0,screen:void 0,alert:void 0,confirm:void 0,prompt:void 0,fetch:void 0,XMLHttpRequest:void 0,WebSocket:void 0,webkit:void 0,print:void 0}}}});
