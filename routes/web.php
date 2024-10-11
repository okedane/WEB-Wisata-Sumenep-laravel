<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\backend\ImageController as BackendImageController;
use App\Http\Controllers\backend\KategoriController;
use App\Http\Controllers\backend\TravelController as BackendTravelController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\TravelController;
use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });




Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('login-proses', [LoginController::class, 'login_proses'])->name('login-proses');
});


Route::get('/home', function () {
    return redirect('admin');
});

//Login



Route::middleware(['auth'])->group(
    function () {
        //BE admin

        Route::get('logout', [LoginController::class, 'logout'])->name('logout');

        Route::get('/admin', [AdminController::class, 'index'])->name('admin');

        //BE category
        Route::get('/admin/category', [KategoriController::class, 'index'])->name('beCategory');
        Route::get('admin/category/create', [KategoriController::class, 'create'])->name('beCategori.create');
        Route::post('/admin/category', [KategoriController::class, 'store'])->name('beCategory.store');

        Route::get('/admin/kategori-edit/{id}', [KategoriController::class, 'edit'])->name('beCategory.edit');
        Route::put('/admin/kategori-update/{id}', [KategoriController::class, 'update'])->name('beCategory.update');

        Route::delete('/admin/kategori-Delete/{id}', [KategoriController::class, 'destroy'])->name('beCategory.destroy');

        //BE Travel 
        Route::get('/admin/wisata/{id}', [BackendTravelController::class, 'index'])->name('beTravel.index');
        Route::get('/admin/wisata-create/{id}', [BackendTravelController::class, 'create'])->name('beTravel.create');
        Route::post('/admin/wisata-store', [BackendTravelController::class, 'store'])->name('beTravel.store');

        Route::get('/admin/wisata-edit/{id}', [BackendTravelController::class, 'edit'])->name('beTravel.edit');
        Route::put('/admin/wisata-update/{id}', [BackendTravelController::class, 'update'])->name('beTravel.update');


        
        Route::delete('/admin/wisata-Delete/{id}', [BackendTravelController::class, 'destroy'])->name('beTravel.destroy');


        //BE Image

        Route::get('/admin/image/{id}', [BackendImageController::class, 'index'])->name('beImage.index');
        Route::get('/admin/image-create/{id}', [BackendImageController::class, 'create'])->name('beImage.create');
        Route::post('/admin/image-store', [BackendImageController::class, 'store'])->name('beImage.store');

        Route::get('/admin/image-edit/{id}', [BackendImageController::class, 'edit'])->name('beImage.edit');
        Route::put('/admin/image-update/{id}', [BackendImageController::class, 'update'])->name('beImage.update');
        Route::delete('/admin/image-Delete/{id}', [BackendImageController::class, 'destroy'])->name('beImage.destroy');
    }
);



Route::resource('/', HomeController::class);
// FE 
Route::get('/kategori/{id}', [TravelController::class, 'index'])->name('feTravel');

Route::get('/kategori/show/{id}', [TravelController::class, 'show'])->name('feShow');