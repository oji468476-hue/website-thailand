<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PaketController;

use App\Http\Controllers\Customer\BookingController;
use App\Http\Controllers\Customer\PembayaranController;
use App\Http\Controllers\Customer\ProfileController;

use App\Http\Controllers\DashboardController;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;


use App\Http\Controllers\Admin\PaketController as AdminPaketController;
use App\Http\Controllers\Mitra\PaketController as MitraPaketController;

/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES
|--------------------------------------------------------------------------
*/

Route::get('/', [PaketController::class, 'index'])
    ->name('home');

Route::get('/detail/{id}', [PaketController::class, 'detail'])
    ->name('detail');


/*
|--------------------------------------------------------------------------
| CUSTOMER ROUTES
|--------------------------------------------------------------------------
*/

/*
|--------------------------------------------------------------------------
| CUSTOMER ROUTES
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:customer'])
    ->prefix('customer')
    ->name('customer.')
    ->group(function () {

        /*
        |--------------------------------------------------------------------------
        | PROFIL
        |--------------------------------------------------------------------------
        */

        Route::get('/profil', [ProfileController::class, 'index'])
            ->name('profil');

        Route::get('/profil/edit', [ProfileController::class, 'edit'])
            ->name('profil.edit');

        Route::put('/profil/update', [ProfileController::class, 'update'])
            ->name('profil.update');

        /*
        |--------------------------------------------------------------------------
        | PASSWORD
        |--------------------------------------------------------------------------
        */

        Route::get('/password', [ProfileController::class, 'editPassword'])
            ->name('password.edit');

        Route::put('/password/update', [ProfileController::class, 'updatePassword'])
            ->name('password.update');

        /*
        |--------------------------------------------------------------------------
        | BOOKING
        |--------------------------------------------------------------------------
        */

        Route::get('/booking/history', [BookingController::class, 'history'])
            ->name('booking.history');

        Route::get('/booking/{paket}', [BookingController::class, 'create'])
            ->name('booking.create');

        Route::post('/booking', [BookingController::class, 'store'])
            ->name('booking.store');

        /*
        |--------------------------------------------------------------------------
        | PEMBAYARAN
        |--------------------------------------------------------------------------
        */

        Route::get('/pembayaran', [PembayaranController::class, 'index'])
            ->name('pembayaran.index');

        Route::get('/pembayaran/{booking}', [PembayaranController::class, 'create'])
            ->name('pembayaran.create');

        Route::post('/pembayaran/{booking}', [PembayaranController::class, 'store'])
            ->name('pembayaran.store');

    });

/*
|--------------------------------------------------------------------------
| ADMIN ROUTES
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/', [AdminController::class, 'index'])
            ->name('dashboard');

        /*
        |--------------------------------------------------------------------------
        | VERIFIKASI PEMBAYARAN
        |--------------------------------------------------------------------------
        */

        Route::get('/verifikasi', [AdminController::class, 'verifikasi'])
            ->name('verifikasi');

        Route::post('/verifikasi/{id}/verify', [AdminController::class, 'verifikasiStore'])
            ->name('verifikasi.verify');

        Route::post('/verifikasi/{id}/tolak', [AdminController::class, 'tolakPembayaran'])
            ->name('verifikasi.tolak');


        /*
        |--------------------------------------------------------------------------
        | USER MANAGEMENT
        |--------------------------------------------------------------------------
        */

        Route::resource('users', UserController::class)
            ->except(['show']);


        /*
        |--------------------------------------------------------------------------
        | PAKET MANAGEMENT
        |--------------------------------------------------------------------------
        */

        Route::resource('pakets', AdminPaketController::class)
            ->except(['show']);
    });


/*
|--------------------------------------------------------------------------
| MITRA ROUTES
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:mitra'])
    ->prefix('mitra')
    ->name('mitra.')
    ->group(function () {

        Route::get('/', [DashboardController::class, 'mitra'])
            ->name('dashboard');

        Route::get('/bookings', [DashboardController::class, 'bookingMitra'])
            ->name('bookings');

        Route::get('/paket', [MitraPaketController::class, 'index'])
            ->name('paket.index');

        Route::get('/paket/create', [MitraPaketController::class, 'create'])
            ->name('paket.create');

        Route::post('/paket/store', [MitraPaketController::class, 'store'])
            ->name('paket.store');

        Route::get('/paket/{paket}/edit', [MitraPaketController::class, 'edit'])
            ->name('paket.edit');

        Route::put('/paket/{paket}', [MitraPaketController::class, 'update'])
            ->name('paket.update');

        Route::delete('/paket/{paket}', [MitraPaketController::class, 'destroy'])
            ->name('paket.destroy');
        Route::get(
    '/pendapatan',
    [DashboardController::class, 'pendapatanMitra']
)->name('pendapatan');

    });

/*
|--------------------------------------------------------------------------
| DASHBOARD ROUTES
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard/customer', [DashboardController::class, 'customer'])
        ->middleware('role:customer')
        ->name('dashboard.customer');

    Route::get('/dashboard/admin', [DashboardController::class, 'admin'])
        ->middleware('role:admin')
        ->name('dashboard.admin');

    Route::get('/dashboard/mitra', [DashboardController::class, 'mitra'])
        ->middleware('role:mitra')
        ->name('dashboard.mitra');

});


/*
|--------------------------------------------------------------------------
| AUTH ROUTES
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';