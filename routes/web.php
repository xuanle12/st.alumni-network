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
//Admin
Route::get('/admin', \App\Livewire\Admin\Dashboard::class);