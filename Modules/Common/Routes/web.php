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


Route::get('admin/profile', 'CommonController@profile')->name('profile.index');
Route::post('admin/profile', 'CommonController@updateProfile')->name('profile.save');

Route::get('admin/generalSetting', 'CommonController@generalSetting')->name('generalSetting.index');
Route::post('admin/generalSetting', 'CommonController@updatGeneralSetting')->name('generalSetting.save');

Route::get('admin/manageInvoice', 'CommonController@manageInvoice')->name('manageInvoice.index');
Route::post('admin/manageInvoice', 'CommonController@updatManageInvoice')->name('manageInvoice.save');


Route::get('admin/change/{color}','CommonController@change_color')->name('admin.change_color');