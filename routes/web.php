<?php

use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::view('dashboard', 'dashboard')
        ->name('dashboard');

    Route::view('profile', 'profile')
        ->name('profile');

    Route::view('pages', 'pages')
        ->name('pages');

    Route::get('taxonomy', function () {
        return view('taxonomy');
    })->name('taxonomy');

    Route::get('addblock/{pid}', function ($pid) {
        return view('htmlblock', ['pid' => $pid]);
    })->name('addhtmlblock');

    Route::get('addsubblock/{pid}', function ($pid) {
        return view('htmlsubblock', ['pid' => $pid]);
    })->name('addhtmlsubblock');

    Route::get('pageentry/{pid}/{tid}', function ($pid, $tid) {
        return view('pageentry', ['pid' => $pid, 'tid' => $tid]);
    })->name('pagentry');
});
require __DIR__ . '/auth.php';
