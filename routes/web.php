<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PrivateChatController;

/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register.process');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


/*
|--------------------------------------------------------------------------
| ADMIN ROUTES
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('dokter', DokterController::class);
    Route::resource('pasien', PasienController::class);

    Route::get('/pendaftaran', [PendaftaranController::class, 'index'])->name('pendaftaran.index');
    Route::post('/pendaftaran/{id}/approve', [PendaftaranController::class, 'approve'])->name('pendaftaran.approve');
    Route::post('/pendaftaran/{id}/reject', [PendaftaranController::class, 'reject'])->name('pendaftaran.reject');

    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
    Route::get('/laporan/pdf', [LaporanController::class, 'pdf'])->name('laporan.pdf');

    Route::get('/chat', [PrivateChatController::class, 'listPasien'])->name('chat.list');
    Route::get('/chat/{id}', [PrivateChatController::class, 'chatRoom'])->name('chat.room');
    Route::post('/chat/send/{id}', [PrivateChatController::class, 'sendMessage'])->name('chat.send');
});


/*
|--------------------------------------------------------------------------
| PASIEN ROUTES
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:pasien'])
    ->prefix('pasien')
    ->name('pasien.')
    ->group(function () {

    Route::get('/dashboard', [PasienController::class, 'dashboard'])->name('dashboard');

    Route::get('/profil', [PasienController::class, 'profil'])->name('profil');
    Route::get('/profil/edit', [PasienController::class, 'editProfil'])->name('profil.edit');
    Route::post('/profil/update', [PasienController::class, 'updateProfil'])->name('profil.update');

    Route::resource('pendaftaran', PendaftaranController::class)
        ->except(['destroy']);

    Route::get('/chat', function () {
        return redirect('/pasien/chat/' . auth::id());
    })->name('chat');

    Route::get('/chat/{id}', [PrivateChatController::class, 'chatRoom'])->name('chat.room');

    Route::post('/chat/send/{id}', [PrivateChatController::class, 'sendMessage'])->name('chat.send');
});
