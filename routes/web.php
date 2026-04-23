<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', \App\Livewire\User\Home::class)->name('home');

//Auth
Route::get('/login', \App\Livewire\Auth\Login::class) ->name('login');
Route::get('/register', \App\Livewire\Auth\register::class)->name('register');

//User
Route::get('/csv', \App\Livewire\User\Csv::class)->name('csv');
Route::get('/job', \App\Livewire\User\Jobs::class)->name('job');
Route::get('/event', \App\Livewire\User\event::class)->name('event');
Route::get('/event/{id}', \App\Livewire\User\eventdetail::class)->name('event.show');
Route::get('/profile', \App\Livewire\User\profile::class)->name('profile');
Route::get('/post', \App\Livewire\User\post::class)->name('post');

//Admin
Route::get('/admin', \App\Livewire\Admin\Dashboard::class)->name('admin');
Route::get('/admin/Csv', \App\Livewire\Admin\csv::class)->name('admin.csv');
Route::get('/admin/company', \App\Livewire\Admin\company::class)->name('admin.company');
Route::get('/admin/job', \App\Livewire\Admin\job::class)->name('admin.job');
Route::get('/admin/thongk', \App\Livewire\Admin\thongk::class)->name('admin.thongk');
Route::get('/admin/post', \App\Livewire\Admin\posts::class)->name('admin.post');
