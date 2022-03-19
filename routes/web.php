<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\ChattingController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\FeedManagerController;
use App\Http\Controllers\FieldManagerController;
use App\Http\Controllers\FindChecker;
use App\Http\Controllers\FindDriverController;
use App\Http\Controllers\LandingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RegisteredByAdmin;
use App\Http\Controllers\RegisteredByAdminController;
use App\Http\Controllers\ShipperController;
use App\Http\Controllers\TrackingController;
use App\Models\Role;
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

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');
Route::get('/', function () {
    return view('landing_page.landing');
});

Route::get('/pesan-armada', function () {
    return view('landing_page.pesan_armada');
});
Route::get('/mitra-driver', function () {
    return view('landing_page.mitra_driver');
});
Route::get('/contact', function () {
    return view('landing_page.contact');
});

Route::get('/laman-profil', function () {
    return view('test.profile');
})->name('profile');

Route::get('/laman-inbox', function () {
    return view('test.inbox');
})->name('inbox');

Route::get('/blog', [LandingController::class, 'blog'])->name('landing_page.blog');
Route::get('/v/{slug}', [LandingController::class, 'preview'])->name('landing_page.preview');
Route::get('/pesan-masuk', [ChattingController::class, 'inbox'])->name('inbox.kontak');

Route::get('/buka/pesan/{id}/{nama}', [ChattingController::class, 'buka'])->name('inbox.buka');
Route::get('/buka/driver/pesan/{id}', [ChattingController::class, 'bukaDriver'])->name('inbox.bukadriver');

Route::get('/pesan/{id}', [ChattingController::class, 'readChat'])->name('inbox.pesan');

Route::view('inbox', 'test.chatting');


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
Route::post('sunting-profil', [NewPasswordController::class, 'sunting'])->name('auth.sunting')->middleware('auth');
// form-orders
Route::get('/form-jemput', [OrderController::class, 'form1'])->name('orders.form_1');
Route::get('/form-tujuan', [OrderController::class, 'form2'])->name('orders.form_2');
Route::get('/dashboard/user-form/{id}{key}', [OrderController::class, 'detail'])->name('orders.detail')->middleware('auth');
Route::get('/dashboard/user-form/delete/{id}', [OrderController::class, 'hapus'])->name('orders.hapus')->middleware('auth');
Route::get('/store-pesanan-1', [OrderController::class, 'tambah'])->name('user.order');
Route::post('/store-pesanan-2', [OrderController::class, 'tambah2'])->name('user.order2');

    Route::group(['prefix' => 'admin', 'middleware' => ['role:admin|super-admin']], function()
    {
        // admin
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.index')->middleware(['auth', 'permission:dashboard-admin']);
        Route::get('/akun-saya', [AdminController::class, 'akunSaya'])->name('admin.akun_saya')->middleware(['auth', 'permission:dashboard-admin']);
        Route::get('/daftar-admin', [AdminController::class, 'daftarAdmin'])->name('admin.table_admin')->middleware(['auth', 'permission:melihat-data-admin']);
        Route::get('/daftar-driver', [AdminController::class, 'daftarDriver'])->name('admin.table_driver')->middleware(['auth', 'permission:melihat-data-driver']);
        Route::get('/daftar-shipper', [AdminController::class, 'daftarShipper'])->name('admin.table_shipper')->middleware(['auth', 'permission:melihat-data-shipper']);
        Route::get('/registrasi-user', [AdminController::class, 'addUser'])->name('admin.add_user')->middleware(['auth', 'permission:register-user']);
        Route::get('/registrasi-user-proses', [RegisteredByAdminController::class, 'registerByAdmin'])->name('admin.register')->middleware(['auth', 'permission:register-user']);
        Route::post('/edit-admin/{id}', [AdminController::class, 'editAdmin'])->name('admin.edit_admin')->middleware(['auth', 'permission:mengelola-data-admin']);
        Route::post('/edit-driver/{id}', [AdminController::class, 'editDriver'])->name('admin.edit_driver')->middleware(['auth', 'permission:mengelola-data-driver']);
        Route::post('/edit-shipper/{id}', [AdminController::class, 'editShipper'])->name('admin.edit_shipper')->middleware(['auth', 'permission:mengelola-data-shipper']);
        Route::resource('/berita/post', BeritaController::class);
        Route::get('/berita', [BeritaController::class, 'show'])->name('admin.berita.index');
        Route::get('/berita/edit/{slug}', [BeritaController::class, 'update'])->name('admin.berita.edit');
        // pesanan
        
    });
    Route::get('/article/u/{slug}', [BeritaController::class, 'showUpdate'])->name('admin.berita.update');
    Route::get('/article/{slug}', [BeritaController::class, 'detail'])->name('admin.berita.detail');
    Route::get('/pesanan', [ShipperController::class, 'pesanan'])->name('user.pesanan');
    Route::get('/table-masuk', [ShipperController::class, 'tableMasuk'])->name('user.partial.table_masuk');
    Route::get('/table-proses', [ShipperController::class, 'tableProses'])->name('user.partial.table_proses');
    Route::get('/table-selesai', [ShipperController::class, 'tableSelesai'])->name('user.partial.table_selesai');
    Route::get('/table-batal', [ShipperController::class, 'tableBatal'])->name('user.partial.table_batal');
    // shipper akses
    Route::get('/hapus-pesanan/{id}', [ShipperController::class, 'hapusPesanan'])->name('user.hapus_pesanan');
    Route::post('/konfirmasi-pesanan/{id}', [ShipperController::class, 'konfirmasiBarang'])->name('shipper.konfirmasi');
    Route::get('/cari-driver/{id}', [FindDriverController::class, 'find'])->name('shipper.find_driver');
    
    Route::group(['prefix' => 'shipper', 'middleware' => ['role:shipper']], function()
    {
        // shipper
        Route::get('/akun-saya', [ShipperController::class, 'akunSaya'])->name('user.akun_saya');
    });

    Route::group(['prefix' => 'driver', 'middleware' => ['role:driver']], function()
    {
        // driver
        Route::get('/pesanan', [DriverController::class, 'pesanan'])->name('driver.pesanan');
        Route::get('/table-masuk', [DriverController::class, 'tableMasuk'])->name('driver.partial.table_masuk');
        Route::get('/table-proses', [DriverController::class, 'tableProses'])->name('driver.partial.table_proses');
        Route::get('/table-selesai', [DriverController::class, 'tableSelesai'])->name('driver.partial.table_selesai');
        Route::get('/akun-saya', [DriverController::class, 'akunSaya'])->name('driver.akun_saya');
        Route::get('/pesanan-masuk', [DriverController::class, 'pesananMasuk'])->name('driver.pesanan_masuk');
        Route::get('/pesanan-diproses', [DriverController::class, 'pesananDiproses'])->name('driver.pesanan_diproses');
        Route::get('/pesanan-dibatalkan', [DriverController::class, 'pesananDibatalkan'])->name('driver.pesanan_dibatalkan');
        
        
        // driver akses
        Route::post('/armada', [DriverController::class, 'armada'])->name('driver.armada');
        Route::get('/v/tolak-orderan/{id}', [DriverController::class, 'tolak'])->name('driver.tolak');
        Route::get('/v/terima-orderan/{id}', [DriverController::class, 'terima'])->name('driver.terima');
        Route::get('/v/jemput-barang/{id}', [DriverController::class, 'jemputBarang'])->name('driver.jemput');
        Route::get('/v/antar-barang/{id}', [DriverController::class, 'antarBarang'])->name('driver.antar');
        Route::get('/v/sampai-barang/{id}', [DriverController::class, 'sampaiBarang'])->name('driver.sampai');
    });
    Route::group(['prefix' => 'field-manager', 'middleware' => ['role:feed-manager']], function()
    {
        Route::get('/akun-saya', [FieldManagerController::class, 'akunSaya'])->name('checker.akun_saya');
        Route::get('/pesanan', [FieldManagerController::class, 'pesanan'])->name('checker.pesanan');
        Route::get('/cari-driver-by-field/{id}', [FindDriverController::class, 'findByField'])->name('driver.findByField');
    });


// chatting

Route::get('/driver/status/tracking/chatting/tambah/{id}', [ChattingController::class, 'tambah'])->name('chat.tambah');
Route::get('/dashboard/driver/pesanan-diproses/store/{id}', [ChattingController::class, 'store'])->name('chat.store');
Route::get('/chatting/read/{id}', [ChattingController::class, 'read'])->name('orders.modal.elements.read');

// tracking
Route::get('/orders/status/tracking/{id}', [TrackingController::class, 'tracking'])->name('orders.tracking');
Route::get('/orders/proses-track/{id}', [TrackingController::class, 'prosesTrack'])->name('orders.proses.proses_track');
Route::get('/orders/modal-track/{id}', [TrackingController::class, 'modalTrack'])->name('user.modal.elements.modal_track');
Route::get('/orders/proses-modal/{id}', [TrackingController::class, 'timelineModal'])->name('user.modal.elements.timeline_modal');
// chatting page
// Route::get('/chatting/{id}', [ChattingController::class, 'chatting'])->name('chat.index');
// Route::get('/chatting/read/{id}', [ChattingController::class, 'readPage'])->name('chat.elements.read');
// Route::get('/chatting/store/{id}', [ChattingController::class, 'store'])->name('chat.elements.store');


// vue
