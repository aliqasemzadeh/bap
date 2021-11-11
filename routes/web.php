<?php

use Illuminate\Support\Facades\Route;

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

Route::middleware(['referral'])->group(function(){
    Route::get('/', \App\Http\Livewire\App\Main\Index::class)->name('home');

    Route::middleware(['auth:sanctum', 'verified'])->group(function () {
        Route::get('/panel/dashboard/index', \App\Http\Livewire\Panel\Dashboard\Index::class)->name('panel.dashboard.index');
    });
});


