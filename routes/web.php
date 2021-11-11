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


Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['referral']], function() {

    Route::get('/', \App\Http\Livewire\App\Main\Index::class)->name('home');
    Route::group(['middleware' => ['auth:sanctum', 'verified']], function() {
        Route::group(['prefix' => config('bap.panel-prefix-url')], function() {
            Route::get('/dashboard/index', \App\Http\Livewire\Panel\Dashboard\Index::class)->name('panel.dashboard.index');
        });


        Route::group(['prefix' => config('bap.admin-prefix-url'), 'middleware' => ['auth:sanctum', 'verified', 'admin']], function () {
            Route::get('/dashboard/index', \App\Http\Livewire\Admin\Dashboard\Index::class)->name('admin.dashboard.index');
        });
    });

});


