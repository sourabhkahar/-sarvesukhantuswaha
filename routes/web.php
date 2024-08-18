<?php

use App\Livewire\User\About;
use App\Livewire\User\Contact;
use App\Livewire\User\Gallery;
use App\Livewire\User\MembershipForm;
use App\Livewire\User\SocialMedia;
use App\Livewire\User\Home;
use Illuminate\Support\Facades\Route;


Route::get('/', Home::class)->name('home');
Route::get('about', About::class)->name('about');
Route::get('contact-us', Contact::class)->name('contact-us');
Route::get('gallery', Gallery::class)->name('gallery');
Route::get('membership-form', MembershipForm::class)->name('membership-form');
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

    Route::get('roles/', function () {
        return view('roles.index');
    })->name('roles.index');

    Route::get('roles/create', function () {
        return view('roles.create');
    })->name('roles.create');

    Route::get('roles/edit/{id}', function ($id) {
        return view('roles.edit', ['id' => $id]);
    })->name('roles.edit');

    Route::get('admin-user/', function () {
        return view('admin-user.index');
    })->name('admin-user.index');
    
    Route::get('admin-user/create', function () {
        return view('admin-user.create');
    })->name('admin-user.create');

    Route::get('admin-user/edit/{id}', function ($id) {
        return view('admin-user.edit', ['id' => $id]);
    })->name('admin-user.edit');
});
require __DIR__ . '/auth.php';
