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
    return view('landing_page.landing');
});

// Route::get('/landing', function () {
//     return view('landing_page.landing');
// });

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
Route::get('/dashboard/user-form/{id}{key}', [OrderController::class, 'detail'])->name('orders.detail')->middleware('auth');
Route::get('/dashboard/user-form/delete/{id}', [OrderController::class, 'hapus'])->name('orders.hapus')->middleware(['auth', 'role:shipper|admin|super-admin']);
Route::post('/store-input-fields', [OrderController::class, 'tambah'])->name('user.order');
Route::post('/store-input-fields2', [OrderController::class, 'tambah2'])->name('user.order2');


// admin
Route::get('/dashboard/admin', [AdminController::class, 'dashboard'])->name('admin.index')->middleware(['auth', 'permission:dashboard-admin']);
Route::get('/dashboard/admin/akun-saya', [AdminController::class, 'akunSaya'])->name('admin.akun_saya')->middleware(['auth', 'permission:dashboard-admin']);
Route::get('/dashboard/admin/daftar-admin', [AdminController::class, 'daftarAdmin'])->name('admin.table_admin')->middleware(['auth', 'permission:melihat-data-admin']);
Route::get('/dashboard/admin/daftar-driver', [AdminController::class, 'daftarDriver'])->name('admin.table_driver')->middleware(['auth', 'permission:melihat-data-driver']);
Route::get('/dashboard/admin/daftar-shipper', [AdminController::class, 'daftarShipper'])->name('admin.table_shipper')->middleware(['auth', 'permission:melihat-data-shipper']);
Route::get('/dashboard/admin/add-user', [AdminController::class, 'addUser'])->name('admin.add_user')->middleware(['auth', 'permission:register-user']);
Route::post('/dashboard/admin/registrasi', [RegisteredByAdminController::class, 'registerByAdmin'])->name('admin.register')->middleware(['auth', 'permission:register-user']);
Route::post('/dashboard/admin/edit-admin/{id}', [AdminController::class, 'editAdmin'])->name('admin.edit_admin')->middleware(['auth', 'permission:mengelola-data-admin']);
Route::post('/dashboard/admin/edit-driver/{id}', [AdminController::class, 'editDriver'])->name('admin.edit_driver')->middleware(['auth', 'permission:mengelola-data-driver']);
Route::post('/dashboard/admin/edit-shipper/{id}', [AdminController::class, 'editShipper'])->name('admin.edit_shipper')->middleware(['auth', 'permission:mengelola-data-shipper']);

// shipper
Route::get('/dashboard/shipper', [ShipperController::class, 'dashboard'])->name('user.index')->middleware(['auth', 'role:shipper']);
Route::get('/dashboard/shipper/pesanan', [ShipperController::class, 'pesananAnda'])->name('user.pesanan_anda')->middleware(['auth', 'role:shipper|admin|super-admin']);
Route::get('/dashboard/shipper/pesanan-diproses', [ShipperController::class, 'pesananDiproses'])->name('user.pesanan_diproses')->middleware(['auth', 'role:shipper|admin|super-admin']);
Route::get('/dashboard/shipper/pesanan-dibatalkan', [ShipperController::class, 'pesananDibatalkan'])->name('user.pesanan_dibatalkan')->middleware(['auth', 'role:shipper|admin|super-admin']);
// shipper akses
Route::post('/store-input-fields/konfirmasi-barang/{id}', [ShipperController::class, 'konfirmasiBarang'])->name('shipper.konfirmasi')->middleware(['auth', 'role:shipper|admin|super-admin']);
Route::post('/store-input-fields/driver/{id}', [FindDriverController::class, 'find'])->name('driver.find')->middleware(['auth', 'role:shipper|admin|super-admin']);


// driver
Route::get('/dashboard/driver', [DriverController::class, 'akunSaya'])->name('driver.index')->middleware(['auth', 'role:driver']);
Route::get('/dashboard/driver/pesanan', [DriverController::class, 'pesananMasuk'])->name('driver.pesanan_masuk')->middleware(['auth', 'role:driver']);
Route::get('/dashboard/driver/pesanan-diproses', [DriverController::class, 'pesananDiproses'])->name('driver.pesanan_diproses')->middleware(['auth', 'role:driver']);
Route::get('/dashboard/driver/pesanan-dibatalkan', [DriverController::class, 'pesananDibatalkan'])->name('driver.pesanan_dibatalkan')->middleware(['auth', 'role:driver']);
Route::post('/dashboard/driver/cancel/{id}', [DriverController::class, 'tolak'])->name('driver.tolak')->middleware('auth');

// Route::get('/store-input-fields/checkout/{id}{key}', [DriverController::class, 'tolak'])->name('driver.delete');
// Route::post('/store-input-fields/checkout/{id}{key}', [DriverController::class, 'tolak'])->name('driver.delete');
Route::post('/store-input-fields/feed-manager/{id}{key}', [FeedManagerController::class, 'deleteFeed'])->name('feed.delete');
// driver akses
Route::post('/store-input-fields/terima-orderan/{id}', [DriverController::class, 'terima'])->name('driver.terima');
Route::post('/store-input-fields/jemput-barang/{id}', [DriverController::class, 'jemputBarang'])->name('driver.jemput');
Route::post('/store-input-fields/antar-barang/{id}', [DriverController::class, 'antarBarang'])->name('driver.antar');
Route::post('/store-input-fields/sampai-barang/{id}', [DriverController::class, 'sampaiBarang'])->name('driver.sampai');

// chatting

Route::get('/driver/status/tracking/chatting/tambah/{id}', [ChattingController::class, 'tambah'])->name('chat.tambah');
Route::get('/dashboard/driver/pesanan-diproses/store/{id}', [ChattingController::class, 'store'])->name('chat.store');
Route::get('/driver/status/tracking/chatting/read/{id}', [ChattingController::class, 'read'])->name('orders.modal.elements.read');

Route::post('/store-input-fields/feed_manager/{id}', [FindChecker::class, 'find'])->name('feed_manager.find');

// tracking
Route::get('/orders/status/tracking/{id}', [TrackingController::class, 'tracking'])->name('orders.tracking');

// Route::get('/orders/proses/{id}', [TrackingController::class, 'timeline'])->name('orders.proses.timeline');

Route::get('/orders/proses-track/{id}', [TrackingController::class, 'prosesTrack'])->name('orders.proses.proses_track');
Route::get('/orders/modal-track/{id}', [TrackingController::class, 'modalTrack'])->name('user.modal.elements.modal_track');
Route::get('/orders/proses-modal/{id}', [TrackingController::class, 'timelineModal'])->name('user.modal.elements.timeline_modal');
// chatting page
Route::get('/chatting/{id}', [ChattingController::class, 'chatting'])->name('chat.index');
Route::get('/chatting/read/{id}', [ChattingController::class, 'readPage'])->name('chat.elements.read');
Route::get('/chatting/store/{id}', [ChattingController::class, 'store'])->name('chat.elements.store');
