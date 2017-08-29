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

Route::get('/', 'IndexController@index');

//後台登入區塊
Route::any('admin/login', 'Admin\LoginController@login');
Route::get('admin/code', 'Admin\LoginController@code');
Route::get('gg', 'Admin\LoginController@crypt');
Route::get('di', 'Admin\TestController@index');
Route::post('ff', 'Admin\TestController@gettest');

//後台
Route::group(['middleware' => ['admin.login'], 'prefix' => 'admin', 'namespace' => 'Admin'], function(){

    //登出
    Route::get('logout', 'LoginController@logout');

    //後臺首頁
    Route::get('index', 'IndexController@index');

    //分類---新聞
    Route::post('postcategory/changesort', 'AjaxController@postCategorySort');
    Route::resource('news/category', 'PostCategoryController');

    //文章---新聞
    Route::post('post/changesort', 'AjaxController@postSort');
    Route::resource('news', 'PostController');

    //外部連結
    Route::post('links/changesort', 'AjaxController@linksSort');
    Route::resource('links', 'LinksController');

    //網站設定
    Route::post('setting/changesort', 'AjaxController@settingSort');
    Route::post('setting/changecontent', 'SettingController@changeContent');
    Route::resource('setting', 'SettingController');

    //刪除檔案
    Route::post('del_file', 'AjaxController@deleteFile');

    //上傳檔案
    Route::any('upload', 'CommonController@upload');
});
