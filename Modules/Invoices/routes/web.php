<?php

use Illuminate\Support\Facades\Route;
use Modules\Invoices\App\Http\Controllers\InvoicesController;

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

Route::group(['namespace' => 'invoices'], function () {
    Route::get('admin/allInvoices',  [InvoicesController::class,'index'])->name('admin.allInvoices');
    Route::get('admin/userInvoice/{id}',  [InvoicesController::class,'userInvoice'])->name('admin.userInvoice');
    Route::get('admin/companyInvoice/{id}',  [InvoicesController::class,'companyInvoice'])->name('admin.companyInvoice');
    Route::get('admin/InvoicePayment/{id}',  [InvoicesController::class,'InvoicePayment'])->name('admin.InvoicePayment');
    Route::get('admin/editUserInvoice/{id}',  [InvoicesController::class,'editUserInvoice'])->name('admin.editUserInvoice');
    Route::get('admin/editCompanyInvoice/{id}',  [InvoicesController::class,'editCompanyInvoice'])->name('admin.editCompanyInvoice');
    Route::post('admin/updateCompanyInvoice',  [InvoicesController::class,'updateCompanyInvoice'])->name('admin.updateCompanyInvoice');
    Route::get('admin/printUserInvoice/{id}',  [InvoicesController::class,'printUserInvoice'])->name('admin.printUserInvoice');
    Route::get('admin/printCompanyInvoice/{id}',  [InvoicesController::class,'printCompanyInvoice'])->name('admin.printCompanyInvoice');
});