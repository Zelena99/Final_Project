<?php

// use App\Http\Controllers\Ad;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\App;
use App\Http\Controllers\AdController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RevisorController;
use App\Http\Controllers\UserController;

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

Route::get('/ads/create', [AdController::class,'create'])->name('ads.create');
Route::get('/', [PublicController::class,'index'])->name('inicio');
Route::get('/category/{category:name}/ads', [PublicController::class,'adsByCategory'])->name('category.ads');
Route::get('/ads/{ad}', [AdController::class,'show'])->name('ads.show');
Route::get('/aboutUs', [PublicController::class,'aboutUs'])->name('aboutUs');


Route::middleware(['isRevisor'])->group(function(){
Route::get('/revisor', [RevisorController::class,'index'])->name('revisor.home');
Route::patch('/revisor/ad/{ad}/accept',[RevisorController::class,'acceptAd'])->name('revisor.ad.accept');
Route::patch('/revisor/ad/{ad}/reject',[RevisorController::class,'rejectAd'])->name('revisor.ad.reject');
});


Route::get('/revisor/become', [RevisorController::class,'becomeRevisor'])->middleware('auth') ->name('revisor.become');

Route::get('/revisor/{user}/make',[RevisorController::class,'makeRevisor'])->middleware('auth') ->name('revisor.make');

Route::post('/locale/{locale}', [PublicController::class,'setLocale'])->name('locale.set');

// para el buscador

Route::get('/search', [PublicController::class, 'search'])->name('search');

// users registrados

Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard');
Route::delete('ad/{id}', [UserController::class, 'destroy'])->name('ad.destroy');