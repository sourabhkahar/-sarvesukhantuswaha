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

    Route::group(['middleware' => ['role:dev']], function () { 

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
    });

    Route::group(['middleware' => ['permission:create-site|delete-site|view-site|edit-site']], function () { 
        Route::get('pageentry/{pid}/{tid}/{cid?}/{act?}', function ($pid, $tid, $cid = 0, $act = 'edit') {
            return view('pageentry', ['pid' => $pid, 'tid' => $tid, 'cid' => $cid, 'act' => $act]);
        })->name('pageentry');
        
        Route::get('subpageentry/{cid}/{tid}', function ($cid, $tid) {
            return view('subpageentry', ['cid' => $cid, 'tid' => $tid]);
        })->name('sub-pageentry');
    });

    Route::get('member-managment/', function () {
        return view('member-managment.index');
    })->middleware('permission:view-user')->name('membermanagment.index');

    Route::get('member-managment/create', function () {
        return view('member-managment.create');
    })->middleware('permission:create-user')->name('member-managment.create');

    Route::get('roles/', function () {
        return view('roles.index');
    })->middleware('permission:view-role')->name('roles.index');

    Route::get('roles/create', function () {
        return view('roles.create');
    })->middleware('permission:create-role')->name('roles.create');

    Route::get('roles/edit/{id}', function ($id) {
        return view('roles.edit', ['id' => $id]);
    })->middleware('permission:edit-role')->name('roles.edit');

    Route::get('job-management/', function () {
        return view('job-management.index');
    })->middleware('permission:view-role')->name('job-management.index');

    Route::get('job-management/create', function () {
        return view('job-management.create');
    })->middleware('permission:create-role')->name('job-management.create');

    Route::get('job-management/edit/{id}', function ($id) {
        return view('job-management.edit', ['id' => $id]);
    })->middleware('permission:edit-role')->name('job-management.edit');

    Route::get('admin-user/', function () {
        return view('admin-user.index');
    })->middleware('permission:view-admin-user')->name('admin-user.index');
    
    Route::get('admin-user/create', function () {
        return view('admin-user.create');
    })->middleware('permission:create-admin-user')->name('admin-user.create');

    Route::get('admin-user/edit/{id}', function ($id) {
        return view('admin-user.edit', ['id' => $id]);
    })->middleware('permission:edit-admin-user')->name('admin-user.edit');
});
require __DIR__ . '/auth.php';
