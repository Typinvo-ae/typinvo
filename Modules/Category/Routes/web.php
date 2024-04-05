<?php
use Modules\Category\Http\Controllers\CategoryController;
use Modules\Category\Http\Controllers\InvoiceCategoryController;
use Modules\Category\Http\Controllers\InvoiceCompanyCategoryController;

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

Route::prefix('admin')->group(function() {
 
      Route::group(['namespace' => 'CardCategory'], function () {
      Route::get('categories/createCardCategory', [CategoryController::class, 'createCardCategory'])->name('admin.createCardCategory');
      Route::get('categories/{id}/editCardCategory', [CategoryController::class, 'editCardCategory'])->name('admin.getEditCardCategory');
      Route::PUT('categories/edit/updateCardCategory', [CategoryController::class, 'updateCardCategory'])->name('admin.updateCardCategory');
      Route::post('categories/saveCardCategory',   [CategoryController::class,'saveCardCategory'])->name('admin.saveCardCategory');
      Route::get('admin/DeleteCardCategory/{id}', [CategoryController::class, 'deleteCardCategory'])->name('admin.DeleteCardCategory');
  
    });

  
     Route::group(['namespace' => 'categories'], function () {
      Route::get('categories/{id}/edit', [CategoryController::class, 'edit'])->name('admin.getEditCategory');
      Route::PUT('categories/edit/save', [CategoryController::class, 'update'])->name('admin.updateCategory');
      Route::get('allcategories/{id}',  [CategoryController::class,'index'])->name('admin.categories');
    });

     Route::group(['namespace' => 'ServiceCategory'], function () {
      Route::get('categories/{id}/editServiceCategory', [CategoryController::class, 'editServiceCategory'])->name('admin.getEditServiceCategory');
      Route::get('categories/createServiceCategory', [CategoryController::class, 'createServiceCategory'])->name('admin.createServiceCategory');
      Route::post('categories/saveServiceCategory',   [CategoryController::class,'saveServiceCategory'])->name('admin.saveServiceCategory');
      Route::PUT('categories/edit/updateServiceCategory', [CategoryController::class, 'updateServiceCategory'])->name('admin.updateServiceCategory');
      Route::get('admin/DeleteServiceCategory/{id}', [CategoryController::class, 'DeleteServiceCategory'])->name('admin.deleteServiceCategory');
  
    });

    Route::group(['namespace' => 'subCategories'], function () {
      
      Route::get('categories/viewSubDataCategory/{id}', [CategoryController::class, 'viewSubDataCategory'])->name('admin.viewSubDataCategory');
      Route::get('categories/{id}/editSubCardCategory', [CategoryController::class, 'editSubCardCategory'])->name('admin.getEditSubCardCategory');
      Route::get('categories/createSubCardCategory', [CategoryController::class, 'createSubCardCategory'])->name('admin.createSubCardCategory');
      Route::PUT('categories/edit/updateSubCardCategory', [CategoryController::class, 'updateSubCardCategory'])->name('admin.updateSubCardCategory');
      Route::post('categories/saveSubCardCategory',   [CategoryController::class,'saveSubCardCategory'])->name('admin.saveSubCardCategory');
      Route::get('admin/DeleteSubCardCategory/{id}', [CategoryController::class, 'deleteSubCardCategory'])->name('admin.DeleteSubCardCategory');
      Route::get('categories/{id}/editSubServiceCategory', [CategoryController::class, 'editSubServiceCategory'])->name('admin.getEditSubServiceCategory');
      Route::get('categories/createSubServiceCategory', [CategoryController::class, 'createSubServiceCategory'])->name('admin.createSubServiceCategory');
      Route::post('categories/saveSubServiceCategory',   [CategoryController::class,'saveSubServiceCategory'])->name('admin.saveSubServiceCategory');
      Route::PUT('categories/edit/updateSubServiceCategory', [CategoryController::class, 'updateSubServiceCategory'])->name('admin.updateSubServiceCategory');
      Route::get('admin/DeleteSubServiceCategory/{id}', [CategoryController::class, 'DeleteSubServiceCategory'])->name('admin.DeleteSubServiceCategory');
    
    });

    Route::group(['namespace' => 'invoiceCategories'], function () {
      Route::get('invoiceCategories/{id}',  [InvoiceCategoryController::class,'index'])->name('admin.invoiceCategories');
      Route::post('invoiceCategories/addServiceToCart',   [InvoiceCategoryController::class,'addServiceToCart'])->name('admin.addServiceToCart');
      Route::get('currentInvoice',   [InvoiceCategoryController::class,'currentInvoice'])->name('admin.currentInvoice');
      Route::post('delete_cart',  [InvoiceCategoryController::class, 'delete_cart'])->name('admin.delete_cart');
      Route::post('saveInvoice',  [InvoiceCategoryController::class, 'saveInvoice'])->name('admin.saveInvoice');
      Route::get('trackInvoice',   [InvoiceCategoryController::class,'trackInvoice'])->name('admin.trackInvoice');
      Route::get('deleteInvoice',   [InvoiceCategoryController::class,'deleteInvoice'])->name('admin.deleteInvoice');
    });

    Route::group(['namespace' => 'invoiceCompanyCategories'], function () {
      Route::get('invoiceCompanyCategories/{categoryId}/{companyId}',  [InvoiceCompanyCategoryController::class,'index'])->name('admin.invoiceCompanyCategories');
      Route::post('invoiceCategories/addServiceToCompanyCart',   [InvoiceCompanyCategoryController::class,'addServiceToCompanyCart'])->name('admin.addServiceToCompanyCart');
      Route::get('currentCompanyInvoice',   [InvoiceCompanyCategoryController::class,'currentCompanyInvoice'])->name('admin.currentCompanyInvoice');
      Route::post('invoiceCategories/payWithCompanyAccount',   [InvoiceCompanyCategoryController::class,'payWithCompanyAccount'])->name('admin.payWithCompanyAccount');
      Route::get('trackCompanyInvoice',   [InvoiceCompanyCategoryController::class,'trackCompanyInvoice'])->name('admin.trackCompanyInvoice');
      Route::get('admin/viewControlSubCategory/{categoryId}/{companyId}',  [InvoiceCompanyCategoryController::class,'viewControlSubCategory'])->name('admin.viewControlSubCategory');
      Route::post('saveCompanyInvoice',  [InvoiceCompanyCategoryController::class, 'saveCompanyInvoice'])->name('admin.saveCompanyInvoice');

    });


});

