<?php

use Illuminate\Support\Facades\Route;
use Modules\Companies\App\Http\Controllers\CompanyController;
use Modules\Companies\App\Http\Controllers\ReceiptsController;
use Modules\Companies\App\Http\Controllers\ExpensesController;
use Modules\Companies\App\Http\Controllers\PaymentsController;
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

 Route::group(['namespace' => 'company'], function () {
   Route::get('admin/companies',  [CompanyController::class,'index'])->name('admin.companies');
   Route::get('admin/companies/create', [CompanyController::class, 'create'])->name('admin.createCompany');
   Route::post('admin/companies/new/save', [CompanyController::class, 'store'])->name('admin.post.saveNewCompany');
   Route::get('admin/companies/{id}/edit', [CompanyController::class, 'edit'])->name('admin.getEditCompany');
   Route::PUT('admin/companies/edit/save', [CompanyController::class, 'update'])->name('admin.updateCompany');

   Route::get('admin/companies/{id}/confirmTransaction', [CompanyController::class, 'confirmTransaction'])->name('admin.confirmTransaction');
   Route::delete('admin/companies/{id}', [CompanyController::class, 'delete'])->name('admin.deleteCompany');


   Route::get('admin/companies/addTransaction', [CompanyController::class, 'addTransaction'])->name('admin.addTransaction');
   Route::post('admin/companies/createTransaction', [CompanyController::class, 'createTransaction'])->name('admin.createTransaction');
   Route::get('admin/companies/viewTransaction', [CompanyController::class, 'viewTransaction'])->name('admin.viewTransaction');



   Route::get('admin/addReceipts', [ReceiptsController::class, 'addReceipts'])->name('admin.addReceipts');
   Route::post('admin/createReceipt', [ReceiptsController::class, 'createReceipt'])->name('admin.createReceipt');
   Route::get('admin/viewReceipts', [ReceiptsController::class, 'viewReceipts'])->name('admin.viewReceipts');
   Route::get('admin/viewReceipts/edit/{id}', [ReceiptsController::class, 'edit'])->name('admin.editReceipts');
   Route::PUT('admin/receipts/edit/save', [ReceiptsController::class, 'update'])->name('admin.updateReceipt');


   Route::get('admin/addExpenses', [ExpensesController::class, 'addExpenses'])->name('admin.addExpenses');
   Route::post('admin/createExpenses', [ExpensesController::class, 'createExpenses'])->name('admin.createExpenses');
   Route::get('admin/viewExpenses', [ExpensesController::class, 'viewExpenses'])->name('admin.viewExpenses');
   


   Route::get('admin/addPayments', [PaymentsController::class, 'addPayments'])->name('admin.addPayments');
    Route::post('admin/createPayments', [PaymentsController::class, 'createPayments'])->name('admin.createPayments');
    Route::get('admin/viewPayments', [PaymentsController::class, 'viewPayments'])->name('admin.viewPayments');
    
    Route::get('admin/companies/{id}/confirmPayment', [PaymentsController::class, 'confirmPayment'])->name('admin.confirmPayment');
 });
