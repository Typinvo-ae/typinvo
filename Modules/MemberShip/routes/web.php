<?php

use Illuminate\Support\Facades\Route;
use Modules\MemberShip\App\Http\Controllers\MemberShipController;

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


Route::group(['namespace' => 'membership'], function () {
    Route::get('admin/memberships',  [MemberShipController::class,'index'])->middleware('can:isSuperAdmin');
    Route::get('admin/memberships/{id}/edit', [MemberShipController::class, 'edit'])->name('admin.getEditMembership')->middleware('can:isSuperAdmin');
    Route::PUT('admin/memberships/edit/save', [MemberShipController::class, 'update'])->name('admin.updateMembership')->middleware('can:isSuperAdmin');
  });