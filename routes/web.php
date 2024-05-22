<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Counter;

Route::view('/', 'welcome');
Route::group(['prefix' => 'admin','middleware' => 'auth'], function() {
    Route::view('dashboard', 'dashboard')
        ->name('dashboard');
    Route::view('profile', 'profile')
        ->name('profile');

    Route::view('pages', 'pages')
        ->name('pages');
    Route::view('taxonomy', 'taxonomy')
        ->name('taxonomy');
});
require __DIR__.'/auth.php';

