<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// ----------------------登录功能-------------------------
// 登陆
Route::get('/admin/login', 'Admin\LoginController@login');

// 退出登录 
Route::get('/admin/logout', 'Admin\LoginController@logout');

// 执行登陆
Route::post('/admin/dologin', 'Admin\LoginController@doLogin');

// 验证码
Route::get('/kit/captcha/{tmp}', 'Admin\KitController@captcha');

// ------------------------登录功能--------------------------------

//----------------------用户禁言功能-----------------
//主页路由
Route::get('admin/index','Admin\IndexController@index');

//用户评论管理路由
Route::get('admin/gog','Admin\GogController@index');

//添加禁言用户路由
Route::get('admin/gog/add','Admin\GogController@add');

//执行添加禁言用户动作路由
Route::post('admin/gog/insert','Admin\GogController@insert');

//解禁路由
Route::get('admin/gog/out/{id}','Admin\GogController@out');

//----------------------用户禁言功能-----------------

//===================后台模块========================

//投诉列表
Route::get('/admin/cpt', 'Admin\ComplaintController@index');

//投诉信息删除
Route::get('/admin/cpt/delete/{id}', 'Admin\ComplaintController@delete');

//分类管理 资源型
Route::resource('/admin/category', 'Admin\CategoryController');

//拍卖列表
Route::resource('/admin/auct', 'Admin\AuctionController');

//===================================================


/*======================用户管理路由===================*/
// 用户添加路由
Route::get('/admin/user/add', 'Admin\UserController@add');

// 执行添加路由
Route::post('/admin/user/insert', 'Admin\UserController@insert');

// 普通用户列表 
Route::get('/admin/user/index', 'Admin\UserController@index');

// 管理员列表
Route::get('/admin/user/manage', 'Admin\UserController@manage');

// 修改页面路由
Route::get('/admin/user/edit/{id}', 'Admin\UserController@edit');

// 执行修改
Route::post('/admin/user/update', 'Admin\UserController@update');

// 执行删除
Route::get('/admin/user/delete/{id}', 'Admin\UserController@delete');

/*======================用户管理路由=========================*/

//----------------------广告管理---------------------
//广告主页路由
Route::get('admin/advert/index', 'Admin\AdvertController@index');

//添加广告页面路由
Route::get('admin/advert/add', 'Admin\AdvertController@add');

// 广告执行添加
Route::post('admin/advert/insert', 'Admin\AdvertController@insert');

// 修改权限
Route::get('admin/advert/upstatus/{id}/{status}', 'Admin\AdvertController@upstatus');

// 获取修改信息
Route::get('admin/advert/edit/{id}', 'Admin\AdvertController@edit');

// 执行修改
Route::post('admin/advert/update', 'Admin\AdvertController@update');

// 执行删除
Route::get('admin/advert/delete/{id}', 'Admin\AdvertController@delete');


//----------------------广告管理---------------------

