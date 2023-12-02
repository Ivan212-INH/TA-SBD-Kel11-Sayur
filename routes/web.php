<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//login
Route::get('/', [TransactionController::class, 'viewLogin'])->name('login');
Route::post('/', [TransactionController::class, 'auth'])->name('auth');

//Penjualan
Route::get('addJual', [TransactionController::class, 'createJual'])->name('admin.createJual');
Route::post('storeJual', [TransactionController::class, 'storeJual'])->name('admin.storeJual');
Route::get('/jual', [TransactionController::class, 'indexJual'])->name('admin.indexJual');
Route::get('editJual/{id}', [TransactionController::class, 'editJual'])->name('admin.editJual');
Route::post('updateJual/{id}', [TransactionController::class, 'updateJual'])->name('admin.updateJual');

//Pembelian
Route::get('addBeli', [TransactionController::class, 'createBeli'])->name('admin.createBeli');
Route::post('storeBeli', [TransactionController::class, 'storeBeli'])->name('admin.storeBeli');
Route::get('/beli', [TransactionController::class, 'indexBeli'])->name('admin.indexBeli');
Route::get('editBeli/{id}', [TransactionController::class, 'editBeli'])->name('admin.editBeli');
Route::post('updateBeli/{id}', [TransactionController::class, 'updateBeli'])->name('admin.updateBeli');

//search
Route::get('searchJual', [TransactionController::class, 'searchJual'])->name('admin.searchJual');
Route::get('searchBeli', [TransactionController::class, 'searchBeli'])->name('admin.searchBeli');
Route::get('searchUsers', [TransactionController::class, 'searchUsers'])->name('admin.searchUsers');
Route::get('searchProduk', [TransactionController::class, 'searchProduk'])->name('admin.searchProduk');

//index
Route::get('/users', [TransactionController::class, 'indexUsers'])->name('admin.indexUsers');
Route::get('/produk', [TransactionController::class, 'indexProduk'])->name('admin.indexProduk');

//Wastebin
Route::get('/wastebin', [TransactionController::class, 'wastebin'])->name('admin.wastebin');
Route::post('trashJual/{id}', [TransactionController::class, 'trashJual'])->name('admin.trashJual');
Route::get('restoreJual/{id}', [TransactionController::class, 'restoreJual'])->name('admin.restoreJual');
Route::post('deleteJual/{id}', [TransactionController::class, 'deleteJual'])->name('admin.deleteJual');
Route::post('trashBeli/{id}', [TransactionController::class, 'trashBeli'])->name('admin.trashBeli');
Route::get('restoreBeli/{id}', [TransactionController::class, 'restoreBeli'])->name('admin.restoreBeli');
Route::post('deleteBeli/{id}', [TransactionController::class, 'deleteBeli'])->name('admin.deleteBeli');
