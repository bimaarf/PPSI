<?php

use App\Http\Controllers\FindDriverController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
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

Route::get('/user-form', [OrderController::class, 'index'])->name('user.index');
Route::get('/dashboard', [OrderController::class, 'dashboard'])->name('user.dashboard')->middleware('auth');
Route::get('/dashboard/user-form/{id}{key}', [OrderController::class, 'detail'])->name('user.detail');
Route::get('/dashboard/user-form/delete/{id}{key}', [OrderController::class, 'hapus'])->name('user.hapus');
Route::post('/store-input-fields/driver/{id}', [FindDriverController::class, 'find'])->name('driver.find');
Route::post('/store-input-fields', [OrderController::class, 'tambah'])->name('user.order');
