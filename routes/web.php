<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');
Route::group(['prefix' => 'admin','middleware' => 'auth'], function() {
    Route::view('dashboard', 'dashboard')
        ->name('dashboard');
    Route::view('profile', 'profile')
        ->name('profile');
});
require __DIR__.'/auth.php';

