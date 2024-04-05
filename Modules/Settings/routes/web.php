<?php

use Illuminate\Support\Facades\Route;
use Modules\Settings\App\Http\Controllers\PaymentTypeController;
use Modules\Settings\App\Http\Controllers\PermissionController;
use Modules\Settings\App\Http\Controllers\MainCategoryController;
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

Route::group([], function () {
  
  Route::resource('admin/paymentType', PaymentTypeController::class);
  Route::get('admin/permissions',[PermissionController::class,'index'] );
  Route::get('admin/permissions/{id}/edit',[PermissionController::class,'edit'] );
  Route::get('admin/getEditPermissions/{id}',  [PermissionController::class,'getEditPermissions'])->name('admin.getEditPermissions');
  Route::PUT('admin/updatePermission/edit/save', [PermissionController::class, 'updatePermission'])->name('admin.updatePermission');


  Route::get('admin/mainCategory',  [MainCategoryController::class,'index'])->name('admin.mainCategory');
  Route::get('admin/mainCategory/create', [MainCategoryController::class, 'create'])->name('admin.crateMainCategory');
  Route::post('admin/mainCategory/save', [MainCategoryController::class, 'store'])->name('admin.saveMainCategory');
  Route::get('admin/mainCategory/{id}/edit', [MainCategoryController::class, 'edit'])->name('admin.getEditMainCategory');
  Route::PUT('admin/mainCategory/edit/save', [MainCategoryController::class, 'update'])->name('admin.updateMainCategory');
 
  Route::get('admin/DeleteMainCategory/{id}', [MainCategoryController::class, 'delete'])->name('admin.DeleteMainCategory');
  
  Route::get('admin/mainCategory/{id}',  [MainCategoryController::class,'invoiceMainCategory'])->name('admin.invoiceMainCategory');
  
  Route::get('admin/mainCompanies/{id}',  [MainCategoryController::class,'mainCompanies'])->name('admin.mainCompanies');

  Route::get('admin/companyCategory/{companyId}',  [MainCategoryController::class,'companyCategory'])->name('admin.companyCategory');

  Route::get('admin/dashboard',  [MainCategoryController::class,'dashboard'])->name('dashboard.index');
  
});
