<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', \App\Livewire\User\Home::class);

//Auth
Route::get('/login', \App\Livewire\Auth\Login::class);

//User
Route::get('/csv', \App\Livewire\User\Csv::class);
Route::get('/job', \App\Livewire\User\Jobs::class);
Route::get('/event', \App\Livewire\User\event::class);
Route::get('/profile', \App\Livewire\User\profile::class);

//Admin
Route::get('/admin', \App\Livewire\Admin\Dashboard::class);
Route::get('/admin/Csv', \App\Livewire\Admin\csv::class);
Route::get('/admin/company', \App\Livewire\Admin\company::class);
Route::get('/admin/job', \App\Livewire\Admin\job::class);
Route::get('/admin/thongk', \App\Livewire\Admin\thongk::class);