<?php

use Illuminate\Support\Facades\Route;
use Modules\User\App\Http\Controllers\AuthController;
use Modules\User\App\Http\Controllers\ClientController;
use Modules\User\App\Http\Controllers\AdminController;
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

/* Auth Routes */
Route::group(['namespace' => 'adminAuth'], function () {
  Route::get('/login',  [AuthController::class, 'showLoginForm'])->name('login');
  Route::post('/login',  [AuthController::class, 'login'])->name('login.submit');
  Route::get('/logout',  [AuthController::class, 'logout'])->name('logout');
  Route::get('forgetPassword',  [AuthController::class, 'showForgetPassword'])->name('show_forget_password');;
  Route::POST('forget_password', [AuthController::class, 'forget_password'])->name('forget_password');
  Route::get('resetPassword/{token}', [AuthController::class, 'showResetPassword'])->name('reset_password');
  Route::post('resetPassword',  [AuthController::class, 'resetPassword'])->name('resetPassword');
});
Route::group(['namespace' => 'client'], function () {
   Route::get('admin/clients',  [ClientController::class,'index'])->name('admin.clients')->middleware('can:View_User');
   Route::get('admin/clients/create', [ClientController::class, 'create'])->name('admin.createClient')->middleware('can:View_User');
   Route::post('admin/clients/new/save', [ClientController::class, 'store'])->name('admin.post.saveNewClient')->middleware('can:View_User');
   Route::get('admin/clients/{id}/edit', [ClientController::class, 'edit'])->name('admin.getEditClient')->middleware('can:View_User');
   Route::PUT('admin/clients/edit/save', [ClientController::class, 'update'])->name('admin.updateClient')->middleware('can:View_User');
   Route::delete('admin/clients/{id}', [ClientController::class, 'destroy'])->name('admin.deleteClient')->middleware('can:View_User');
   Route::get('admin/clients/activate/{id}',  [ClientController::class,'activate'])->name('activate')->middleware('can:View_User');
   Route::post('admin/clients/unActiveClients',[ClientController::class,'unActiveClients'] )->name('unActiveClients')->middleware('can:View_User');
});

Route::group(['namespace' => 'admin'], function () {
  Route::get('admin/admins',  [AdminController::class,'index'])->middleware('can:isSuperAdmin');
  Route::get('admin/admins/create', [AdminController::class, 'create'])->name('admin.createAdmin')->middleware('can:isSuperAdmin');
  Route::post('admin/admins/new/save', [AdminController::class, 'store'])->name('admin.post.saveNewAdmin')->middleware('can:isSuperAdmin');
  Route::get('admin/admins/{id}/edit', [AdminController::class, 'edit'])->name('admin.getEditAdmin')->middleware('can:isSuperAdmin');
  Route::PUT('admin/admins/edit/save', [AdminController::class, 'update'])->name('admin.updateAdmin')->middleware('can:isSuperAdmin');
  Route::delete('admin/admins/{id}', [AdminController::class, 'destroy'])->name('admin.deleteAdmin')->middleware('can:isSuperAdmin');
  Route::get('admin/admins/activate/{id}',  [AdminController::class,'activate'])->name('activate')->middleware('can:isSuperAdmin');
  Route::post('admin/admins/unActiveAdmins',[AdminController::class,'unActiveAdmins'] )->name('unActiveAdmins')->middleware('can:isSuperAdmin');
});