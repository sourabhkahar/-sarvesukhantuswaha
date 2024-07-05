<?php

use App\Livewire\User\About;
use App\Livewire\User\Contact;
use App\Livewire\User\Gallery;
use App\Livewire\User\SocialMedia;
use App\Livewire\User\Home;
use Illuminate\Support\Facades\Route;


Route::get('/', Home::class)->name('home');
Route::get('about', About::class)->name('about');
Route::get('contact-us', Contact::class)->name('contact-us');
Route::get('gallery', Gallery::class)->name('gallery');
Route::get('social-media', SocialMedia::class)->name('social-media');
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

    Route::get('pageentry/{pid}/{tid}/{cid?}/{act?}', function ($pid, $tid, $cid = 0, $act = 'edit') {
        return view('pageentry', ['pid' => $pid, 'tid' => $tid, 'cid' => $cid, 'act' => $act]);
    })->name('pageentry');

    Route::get('subpageentry/{cid}/{tid}', function ($cid, $tid) {
        return view('subpageentry', ['cid' => $cid, 'tid' => $tid]);
    })->name('sub-pageentry');

    Route::get('membermanagment/', function () {
        return view('membermanagment');
    })->name('membermanagment');

    Route::get('/create-symbolic-link', function () {
        Artisan::call('storage:link');
    });
});
require __DIR__ . '/auth.php';
