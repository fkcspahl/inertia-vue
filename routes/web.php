<?php

use App\Http\Controllers\AboutController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Home');
})->name('home');

Route::get('about', AboutController::class)->name('about');
Route::post('about', [AboutController::class, "update"])->name('about.update');
