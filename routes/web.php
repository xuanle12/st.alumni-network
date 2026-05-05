<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', \App\Livewire\User\Home::class)->name('home');

//Auth
Route::get('/login', \App\Livewire\Auth\Login::class) ->name('login');
Route::get('/register', \App\Livewire\Auth\Register::class)->name('register');

//User
Route::get('/csv', \App\Livewire\User\Csv::class)->middleware('auth')->name('csv');
Route::get('/job', \App\Livewire\User\Jobs::class)->name('job');
Route::get('/job/{id}', \App\Livewire\User\Jobsdetail::class)->name('job.show');
Route::get('/event', \App\Livewire\User\Event::class)->name('event');
Route::get('/event/{id}', \App\Livewire\User\Eventdetail::class)->name('event.show');
Route::get('/profile', \App\Livewire\User\Profile::class)->name('profile');
Route::get('/post', \App\Livewire\User\Post::class)->name('post');

//Admin
Route::get('/admin', \App\Livewire\Admin\Dashboard::class)->name('admin');
Route::get('/admin/Csv', \App\Livewire\Admin\Csv::class)->name('admin.csv');
Route::get('/admin/company', \App\Livewire\Admin\Company::class)->name('admin.company');
Route::get('/admin/job', \App\Livewire\Admin\Job::class)->name('admin.job');
Route::get('/admin/thongk', \App\Livewire\Admin\Thongk::class)->name('admin.thongk');
Route::get('/admin/post', \App\Livewire\Admin\Posts::class)->name('admin.post');
