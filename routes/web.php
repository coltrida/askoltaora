<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ConfigurationController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', [FrontController::class, 'index'])->name('index');

//-------------------Configurazione------------------------------
Route::get('/configuration', [ConfigurationController::class, 'index'])->name('configuration');
Route::post('/configuration', [ConfigurationController::class, 'saveConfiguration'])->name('configuration.save');

//-------------------Admin------------------------------
Route::group(
    [
        'middleware' => ['auth','verifyIsAdmin'],
        'prefix' => 'admin'
    ],
    function() {
        Route::get('/home', [AdminController::class, 'home'])->name('admin.home');
        Route::get('/ruoli', [AdminController::class, 'ruoli'])->name('admin.ruoli');
        Route::post('/ruoli', [AdminController::class, 'addRuolo'])->name('admin.ruoli.add');
        Route::get('/statoApa', [AdminController::class, 'statoApa'])->name('admin.statoApa');
        Route::post('/statoApa', [AdminController::class, 'addStatoApa'])->name('admin.statoApa.add');
        Route::get('/categorie', [AdminController::class, 'categorie'])->name('admin.categorie');
        Route::post('/categorie', [AdminController::class, 'addCategoria'])->name('admin.categorie.add');
        Route::get('/tipologie', [AdminController::class, 'tipologie'])->name('admin.tipologie');
        Route::post('/tipologie', [AdminController::class, 'addTipologia'])->name('admin.tipologie.add');
        Route::get('/canali', [AdminController::class, 'canali'])->name('admin.canali');
        Route::post('/canali', [AdminController::class, 'addCanale'])->name('admin.canali.add');
        Route::get('/filiali', [AdminController::class, 'filiali'])->name('admin.filiali');
        Route::post('/filiali', [AdminController::class, 'addFiliali'])->name('admin.filiali.add');
        Route::get('/recapiti', [AdminController::class, 'recapiti'])->name('admin.recapiti');
        Route::post('/recapiti', [AdminController::class, 'addRecapito'])->name('admin.recapiti.add');
        Route::get('/fornitori', [AdminController::class, 'fornitori'])->name('admin.fornitori');
        Route::post('/fornitori', [AdminController::class, 'addFornitore'])->name('admin.fornitori.add');
        Route::get('/clienti/{idFiliale}', [UserController::class, 'clienti'])->name('user.clienti');
    });

//-------------------User------------------------------
Route::group(
    [
        'middleware' => ['auth'],
        'prefix' => 'user'
    ],
    function() {
        Route::get('/home', [UserController::class, 'home'])->name('user.home');

    });



Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
