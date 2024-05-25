<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');
Route::group(['prefix' => 'admin','middleware' => 'auth'], function() {
    Route::view('dashboard', 'dashboard')
        ->name('dashboard');
    Route::view('profile', 'profile')
        ->name('profile');

    Route::view('pages', 'pages')
        ->name('pages');


    Route::get('taxonomy', function(){
        return view('taxonomy');
    })->name('taxonomy');

    Route::get('addblock/{id}', function(){
        return view('taxonomy');
    })->name('addhtmlblock');
});
require __DIR__.'/auth.php';

