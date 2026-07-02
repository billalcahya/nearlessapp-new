<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PricingController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\CollaborationController;
use App\Http\Controllers\DropPointController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/services', [ServiceController::class, 'index'])
    ->name('services.index');

Route::get('/services/{slug}', [ServiceController::class, 'show'])->name('services.show');

Route::get('/pricing', [PricingController::class, 'index'])->name('pricing.index');

Route::get('/promotions', [PromotionController::class, 'index'])->name('promotions.index');

Route::get('/collaborations', [CollaborationController::class, 'index'])->name('collaborations.index');

Route::get('/droppoint', [DropPointController::class, 'index'])->name('droppoint.index');