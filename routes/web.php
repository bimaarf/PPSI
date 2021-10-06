<?php

use App\Http\Controllers\ChattingController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\FeedManagerController;
use App\Http\Controllers\FindChecker;
use App\Http\Controllers\FindDriverController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ShipperController;
use Illuminate\Support\Facades\Artisan;
use SebastianBergmann\CodeCoverage\Driver\Driver;

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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
Route::get('/bundamaria', function () {
    Artisan::call('migrate');
});
Route::get('/link-storage', function () {
    Artisan::call('storage:link');
});
Route::get('/foo', function () {
    Artisan::call('vendor:publish --tag=laratrust-assets --force');
});

Route::get('/clear-cache', function() {
    $output = [];
    Artisan::call('cache:clear', $output);
    dd($output);
});
// form-orders
Route::get('/user-form', [OrderController::class, 'index'])->name('user.index');
Route::get('/user-form2', [OrderController::class, 'index2'])->name('user.index2');

Route::get('/dashboard', [OrderController::class, 'dashboard'])->name('user.dashboard')->middleware('auth');
Route::get('/dashboard/user-form/{id}{key}', [OrderController::class, 'detail'])->name('user.detail');
Route::get('/dashboard/user-form/delete/{id}{key}', [OrderController::class, 'hapus'])->name('user.hapus');
Route::get('/store-input-fields/checkout/{id}{key}', [DriverController::class, 'deleteCheckout'])->name('driver.delete');
Route::post('/store-input-fields/checkout/{id}{key}', [DriverController::class, 'deleteCheckout'])->name('driver.delete');
Route::post('/store-input-fields/feed-manager/{id}{key}', [FeedManagerController::class, 'deleteFeed'])->name('feed.delete');


// chatting
Route::get('/store-input-fields/chatting/{id}', [ChattingController::class, 'chatting'])->name('chat.index');
Route::post('/store-input-fields/chatting/tambah/{id}', [ChattingController::class, 'tambah'])->name('chat.tambah');



// Route::post('/store-input-fields/checkout/orders{id}{key}', [DriverController::class, 'ordersUpdate'])->name('orders.update');
Route::post('/store-input-fields/driver/{id}', [FindDriverController::class, 'find'])->name('driver.find');
Route::post('/store-input-fields/feed_manager/{id}', [FindChecker::class, 'find'])->name('feed_manager.find');

// orders
Route::post('/store-input-fields', [OrderController::class, 'tambah'])->name('user.order');
Route::post('/store-input-fields2', [OrderController::class, 'tambah2'])->name('user.order2');

Route::post('/store-input-fields/terima-orderan/{id}', [DriverController::class, 'terima'])->name('driver.terima');
Route::post('/store-input-fields/jemput-barang/{id}', [DriverController::class, 'jemputBarang'])->name('driver.jemput');
Route::post('/store-input-fields/antar-barang/{id}', [DriverController::class, 'antarBarang'])->name('driver.antar');
Route::post('/store-input-fields/sampai-barang/{id}', [DriverController::class, 'sampaiBarang'])->name('driver.sampai');
Route::post('/store-input-fields/konfirmasi-barang/{id}', [ShipperController::class, 'konfirmasiBarang'])->name('shipper.konfirmasi');


