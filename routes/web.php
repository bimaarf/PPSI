<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ChattingController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\FeedManagerController;
use App\Http\Controllers\FindChecker;
use App\Http\Controllers\FindDriverController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RegisteredByAdmin;
use App\Http\Controllers\RegisteredByAdminController;
use App\Http\Controllers\ShipperController;
use App\Http\Controllers\TrackingController;
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

Route::get('/landing', function () {
    return view('landing_page.landing');
});

Route::get('/laman-login', function () {
    return view('akun.login');
});

Route::get('/laman-regis', function () {
    return view('akun.register');
});

Route::get('/laman-dashboard', function () {
    return view('dashboard.index');
});


require __DIR__ . '/auth.php';
Route::get('/bundamaria', function () {
    Artisan::call('migrate');
});
Route::get('/link-storage', function () {
    Artisan::call('storage:link');
});
Route::get('/foo', function () {
    Artisan::call('vendor:publish --tag=laratrust-assets --force');
});

Route::get('/clear-cache', function () {
    $output = [];
    Artisan::call('cache:clear', $output);
    dd($output);
});
// form-orders
Route::get('/user-form-jemput', [OrderController::class, 'form1'])->name('orders.form_1');
Route::get('/user-form-tujuan', [OrderController::class, 'form2'])->name('orders.form_2');
Route::get('/dashboard/user-form/{id}{key}', [OrderController::class, 'detail'])->name('orders.detail');
Route::get('/dashboard/user-form/delete/{id}{key}', [OrderController::class, 'hapus'])->name('orders.hapus');
// admin
Route::get('/dashboard/admin', [AdminController::class, 'dashboard'])->name('admin.index')->middleware('auth');
Route::get('/dashboard/admin/daftar-driver', [AdminController::class, 'daftarDriver'])->name('admin.table_driver')->middleware('auth');
Route::get('/dashboard/admin/daftar-shipper', [AdminController::class, 'daftarShipper'])->name('admin.table_shipper')->middleware('auth');
Route::get('/dashboard/admin/add-user', [AdminController::class, 'addUser'])->name('admin.add_user')->middleware('auth');

Route::post('/registered-by-admin', [RegisteredByAdminController::class, 'registerByAdmin'])->name('admin.register');
Route::post('/admin-edit-user/{id}', [AdminController::class, 'editUser'])->name('admin.edit_user');


Route::get('/dashboard', [ShipperController::class, 'dashboard'])->name('user.index')->middleware('auth');
Route::get('/dashboard/driver', [DriverController::class, 'dashboardDriver'])->name('driver.index')->middleware('auth');

Route::get('/store-input-fields/checkout/{id}{key}', [DriverController::class, 'tolak'])->name('driver.delete');
Route::post('/store-input-fields/checkout/{id}{key}', [DriverController::class, 'tolak'])->name('driver.delete');
Route::post('/store-input-fields/feed-manager/{id}{key}', [FeedManagerController::class, 'deleteFeed'])->name('feed.delete');



// chatting
Route::get('/store-input-fields/chatting/{id}', [ChattingController::class, 'chatting'])->name('chat.index');
Route::post('/store-input-fields/chatting/tambah/{id}', [ChattingController::class, 'tambah'])->name('chat.tambah');



Route::post('/store-input-fields/driver/{id}', [FindDriverController::class, 'find'])->name('driver.find');
Route::post('/store-input-fields/driver/update/{id}', [FindDriverController::class, 'update'])->name('driver.update');
Route::post('/store-input-fields/feed_manager/{id}', [FindChecker::class, 'find'])->name('feed_manager.find');

// orders
Route::post('/store-input-fields', [OrderController::class, 'tambah'])->name('user.order');
Route::post('/store-input-fields2', [OrderController::class, 'tambah2'])->name('user.order2');

Route::post('/store-input-fields/terima-orderan/{id}', [DriverController::class, 'terima'])->name('driver.terima');
Route::post('/store-input-fields/jemput-barang/{id}', [DriverController::class, 'jemputBarang'])->name('driver.jemput');
Route::post('/store-input-fields/antar-barang/{id}', [DriverController::class, 'antarBarang'])->name('driver.antar');
Route::post('/store-input-fields/sampai-barang/{id}', [DriverController::class, 'sampaiBarang'])->name('driver.sampai');
Route::post('/store-input-fields/konfirmasi-barang/{id}', [ShipperController::class, 'konfirmasiBarang'])->name('shipper.konfirmasi');


// tracking
Route::get('/driver/status/tracking/{id}', [TrackingController::class, 'tracking'])->name('orders.tracking');
