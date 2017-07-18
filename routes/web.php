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

/**
	后台路由
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

// 路由群组
Route::group(['middleware' => 'adminlogin'], function(){



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

	//===================后台模块========================//

	//投诉列表
	Route::get('/admin/cpt', 'Admin\ComplaintController@index');

	//投诉信息删除
	Route::get('/admin/cpt/delete/{id}', 'Admin\ComplaintController@delete');

	//分类管理 资源型
	Route::resource('/admin/category', 'Admin\CategoryController');

	//拍卖列表
	Route::resource('/admin/auct', 'Admin\AuctionController');

	//积分页面
	Route::get('/admin/nums/index', 'Admin\NumController@index');

	//积分修改
	Route::post('/admin/num/edit', 'Admin\NumController@edit');

	//积分状态修改
	Route::get('/admin/nums/update/{id}', 'Admin\NumController@update');

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

	// 禁用按钮
	Route::get('/admin/user/upstatus/{id}/{status}', 'Admin\UserController@upstatus');

	/*======================用户管理路由=========================*/


	/*======================活动发布管理=========================*/
	//活动展示页路由
	Route::get('/admin/pop/index','Admin\PopController@index');

	//活动添加页路由
	Route::get('/admin/pop/add','Admin\PopController@add');

	//活动添加动作路由
	Route::post('/admin/pop/insert','Admin\PopController@insert');

	//改变活动状态的路由
	Route::get('/admin/pop/upp/{id}/{status}','Admin\PopController@upp');

	//删除活动路由
	Route::get('/admin/pop/delete/{id}','Admin\PopController@delete');

	//编辑页面路由
	Route::get('/admin/pop/edit/{id}','Admin\PopController@edit');

	//执行编辑
	Route::post('/admin/pop/update','Admin\PopController@update');

	/*======================活动发布管理=========================*/

	/*======================友情链接管理=========================*/

	//展示友情链接
	Route::get('/admin/friendlink/index','Admin\FriendlinkController@index');

	//添加友情链接
	Route::get('/admin/friendlink/add','Admin\FriendlinkController@add');

	//执行用户添加路由
	Route::post('/admin/friendlink/insert','Admin\FriendlinkController@insert');

	//用户编辑页面
	Route::get('/admin/friendlink/edit/{id}','Admin\FriendlinkController@edit');

	//执行编辑动作路由
	Route::post('/admin/friendlink/update','Admin\FriendlinkController@update');

	//执行删除友情练级路由
	Route::get('/admin/friendlink/delete/{id}','Admin\FriendlinkController@delete');

	/*======================友情链接管理=========================*/


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


	//展示网站配置路由
	Route::get('admin/config/index','Admin\ConfigController@index');

	//修改网站配置路由
	Route::get('admin/config/edit','Admin\ConfigController@edit');

	//执行网站修改路由
	Route::post('admin/config/update','Admin\ConfigController@update');

	//修改网站状态路由
	Route::get('admin/config/change/{status}','Admin\ConfigController@change');

	
	//----------------------市场管理---------------------

	//市场管理代理人展示页
	Route::get('admin/manage/index','Admin\ManageController@index');

	//市场管理添加页面
	Route::get('admin/manage/add','Admin\ManageController@add');

	//市场管理添加动作
	Route::post('admin/manage/insert','Admin\ManageController@insert');

	//修改页面路由
	Route::get('admin/manage/edit','Admin\ManageController@edit');

	//删除动作路由
	Route::get('admin/manage/delete','Admin\ManageController@delete');

	//修改动作路由
	Route::post('admin/manage/update','Admin\ManageController@update');

	//----------------------市场管理---------------------

});

/**
	前台路由
*/


// -----------------------前台投诉----------------------------

// 前台联系客服 
Route::get('home/complaint/index', 'Home\ComplaintController@index');

// 执行添加
Route::post('home/complaint/insert', 'Home\ComplaintController@insert');


// -----------------------前台投诉----------------------------

// ----------------------前台拍卖-------------------------------

// 前台拍卖路由
Route::get('home/auct/add', 'Home\AuctionController@add');

// 执行添加页面
Route::post('home/auct/insert', 'Home\AuctionController@insert');

// ----------------------前台拍卖结束--------------------------

// -----------------------前台收货地址---------------------------

// 收货地址列表
Route::get('home/address/index', 'Home\AddressController@index');

// 添加收货地址
Route::get('home/address/add', 'Home\AddressController@add');

// 执行添加方法
Route::post('home/address/insert', 'Home\AddressController@insert');

// 修改收货地址
Route::get('home/address/edit/{id}', 'Home\AddressController@edit');

// 执行修改
Route::post('home/address/update', 'Home\AddressController@update');

// 执行删除
Route::get('home/address/delete/{id}', 'Home\AddressController@delete');

//----------------------广告管理---------------------



//-------------------------主页----------------------

Route::get('/','Home\IndexController@index');

//-------------------------主页----------------------

//-------------------------登录部分-----------------

//登录主页路由
Route::get('home/login/index','Home\LoginController@login');

//登录动作路由
Route::post('home/login/dologin','Home\LoginController@dologin');

//表单验证ajax
Route::get('home/login/ajax','Home\LoginController@ajax');

//注销登录
Route::get('home/login/outlogin','Home\LoginController@outlogin');

//-------------------------登录部分-----------------

//------------------------密码找回---------------------

//找回密码页面
Route::get('home/forgetpass','Home\ForgetController@forget');

//找回密码动作
Route::post('home/forget/forget','Home\ForgetController@doforget');

//检查邮箱是否存在ajax
Route::get('home/forget/ajax','Home\ForgetController@ajax');

//声明验证token路由
Route::get('home/link/{token}','Home\ForgetController@link');

//不合法来源路由
Route::get('home/info','Home\ForgetController@info');

//修改密码模板路由
Route::get('home/newpass/{id}','Home\ForgetController@newpass');

//执行修改密码路由
Route::post('home/forget/updatepass','Home\ForgetController@updatepass');

//------------------------密码找回---------------------


//-------------------------注册部分-----------------
Route::get('home/register/register','Home\RegisterController@register');

//验证手机号是否存在ajax路由
Route::get('home/register/pajax','Home\RegisterController@pajax');

//验证用户名是否存在
Route::get('home/register/name','Home\RegisterController@name');

//用户添加路由
Route::post('home/register/insert','Home\RegisterController@insert');


// -----------------------前台收货地址结束---------------------------





// -----------------------前台投诉----------------------------

// 前台联系客服 
Route::get('home/complaint/index', 'Home\ComplaintController@index');


// 执行添加
Route::post('home/complaint/insert', 'Home\ComplaintController@insert');

// -----------------------前台投诉----------------------------

// ----------------------前台拍卖-------------------------------

// 前台拍卖路由
Route::get('home/auct/index', 'Home\AuctionController@index');

// 执行添加页面
Route::post('home/auct/insert', 'Home\AuctionController@insert');



// ----------------------前台拍卖结束--------------------------


//-----------------------用户添加出售商品-------------

//展示页面路由
Route::get('home/addshop/index','Home\AddshopController@index');

//查询二级分类
Route::get('home/addshop/ajaxone','Home\AddshopController@ajaxone');

//查询三级分类
Route::get('home/addshop/ajaxtwo','Home\AddshopController@ajaxtwo');

//执行添加动作
Route::post('home/addshop/insert','Home\AddshopController@insert');

//--------------------------------------------------------

//--------------------个人信息----------------------------

Route::get('home/user/index','Home\UserController@index');

// 修改页面
Route::get('home/userdetail/edit', 'Home\UserdetailController@edit');

// 执行修改页
Route::post('home/userdetail/update', 'Home\UserdetailController@update');

// 个人收藏页面
Route::get('home/favorite/index', 'Home\FavoriteController@index');

// 商品列表收藏ajax
Route::get('home/favorite/getajax', 'Home\FavoriteController@getajax');

// 个人收藏删除页
Route::get('home/favorite/delete/{id}', 'Home\FavoriteController@delete');

// 个人中心购物车表
Route::get('home/shopping/index', 'Home\ShoppingController@index');

//绑定邮箱
Route::get('home/email/index', 'Home\UserdetailController@email');
// ----------------------------个人详情-------------------------



//======================前台购物流程========================

//商品列表
Route::get('/home/list/index', 'Home\ListController@index');

//商品搜索
Route::get('/home/list/show', 'Home\ListController@show');

//商品添加session列表
Route::get('/home/list/create/{id}', 'Home\ListController@create');

//购物车表
Route::get('/home/details/shopcar', 'Home\ShopcarController@index');

//删除session商品
Route::get('/home/details/shopcar/{id}', 'Home\ShopcarController@delete');

//商品详细列表
Route::get('/home/details/{id}', 'Home\DetailController@index');

//拍卖列表
Route::get('/home/auct', 'Home\AuctionController@index');

//拍卖商品详情列表
Route::get('/home/auct/details/{id}', 'Home\AuctionController@show');

//添加购物车
Route::get('/home/auct/create/{id}', 'Home\AuctionController@create');

//订单页面
Route::get('/home/num', 'Home\NumController@index');

//我的下单
Route::get('/home/num/my', 'Home\NumController@myding');

//生成订单
Route::post('/home/num/my/insert', 'Home\NumController@insert');

//======================前台购物流程=========================

