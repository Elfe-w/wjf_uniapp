<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

use think\Route;
Route::rule('2676624343/Login/UserLogin','api/Login/UserLogin');
Route::rule('2676624343/Login/UserRegister','api/Login/UserRegister');
Route::rule('2676624343/Login/ResetAvatar','api/Login/ResetAvatar');
Route::rule('2676624343/Login/ResetPassword','api/Login/ResetPassword');


Route::rule('2676624343/Home/ActivityList','api/Home/ActivityList');
Route::rule('2676624343/Home/ActivityDetail','api/Home/ActivityDetail');
Route::rule('2676624343/Home/JoinActivity','api/Home/JoinActivity');


Route::rule('2676624343/My/Info','api/My/Info');
Route::rule('2676624343/My/ActivityRank','api/My/ActivityRank');


Route::rule('2676624343/Admin/AdminLogin','api/Admin/AdminLogin');
Route::rule('2676624343/Admin/AddAdmin','api/Admin/AddAdmin');
Route::rule('2676624343/Admin/AddActivity','api/Admin/AddActivity');
Route::rule('2676624343/Admin/ActivityList','api/Admin/ActivityList');
Route::rule('2676624343/Admin/ActivityDetail','api/Admin/ActivityDetail');
Route::rule('2676624343/Admin/ChangeActivityList','api/Admin/ChangeActivityList');
Route::rule('2676624343/Admin/ChangeActivityUser','api/Admin/ChangeActivityUser');
Route::rule('2676624343/Admin/AllActivity','api/Admin/AllActivity');
Route::rule('2676624343/Admin/AllRank','api/Admin/AllRank');

