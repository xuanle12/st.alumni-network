<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\SSOController;
use Laravel\Socialite\Facades\Socialite;
use League\OAuth2\Client\Provider\GenericProvider;
Route::get('/', \App\Livewire\User\Home::class)->name('home');

//Auth
Route::get('/login', \App\Livewire\Auth\Login::class)->name('login');
Route::get('/register', \App\Livewire\Auth\Register::class)->name('register');
Route::get('/forgot-password', \App\Livewire\Auth\ForgotPassword::class)->name('password.request');
Route::get('/reset-password/{token}', \App\Livewire\Auth\ResetPassword::class)->name('password.reset');

Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('home');
})->name('logout');

//User
Route::middleware('auth')->group(function () {
    Route::get('/csv', \App\Livewire\User\Csv::class)->middleware('auth')->name('csv');
    Route::get('/job', \App\Livewire\User\Jobs::class)->name('job');
    Route::get('/job/create', \App\Livewire\User\JobForm::class)->name('job.create');
    Route::get('/job/{id}', \App\Livewire\User\Jobsdetail::class)->name('job.show');
    Route::get('/event', \App\Livewire\User\Event::class)->name('event');
    Route::get('/event/create', \App\Livewire\User\EventForm::class)->middleware('role:admin')->name('event.create');
    Route::get('/event/{id}', \App\Livewire\User\Eventdetail::class)->name('event.show');
    Route::get('/profile', \App\Livewire\User\Profile::class)->name('profile');
    Route::get('/cv/tao', \App\Livewire\User\CvBuilderForm::class)->name('cv.builder');

    // Trang in CV: không layout, chỉ có tờ CV → in ra đúng số trang nội dung
    Route::get('/cv/in', function () {
        $cv = \App\Models\CvBuilder::where('user_id', \Illuminate\Support\Facades\Auth::id())->first();

        if (!$cv) {
            return redirect()->route('cv.builder');
        }

        return view('cv-print', [
            'full_name'    => (string) $cv->full_name,
            'job_title'    => (string) $cv->job_title,
            'email'        => (string) $cv->email,
            'phone'        => (string) $cv->phone,
            'address'      => (string) $cv->address,
            'website'      => (string) $cv->website,
            'summary'      => (string) $cv->summary,
            'education'    => $cv->education    ?? [],
            'experience'   => $cv->experience   ?? [],
            'skills'       => $cv->skills       ?? [],
            'projects'     => $cv->projects     ?? [],
            'certificates' => $cv->certificates ?? [],
        ]);
    })->name('cv.print');
    Route::get('/company/profile', \App\Livewire\User\CompanyProfile::class)->name('company.profile');
    Route::get('/post', \App\Livewire\User\Post::class)->name('post');
    Route::get('/my-posts', \App\Livewire\User\MyPosts::class)->name('my.posts');
    Route::get('/mentor', \App\Livewire\User\Mentor::class)->name('mentor');
    Route::get('/job-recommendation', \App\Livewire\User\JobRecommendation::class)->name('job.recommendation');
 
});

//Admin
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', \App\Livewire\Admin\Dashboard::class)->name('admin');
    Route::get('/admin/Csv', \App\Livewire\Admin\Csv::class)->name('admin.csv');
    Route::get('/admin/company', \App\Livewire\Admin\Company::class)->name('admin.company');
    Route::get('/admin/job', \App\Livewire\Admin\Job::class)->name('admin.job');
    Route::get('/admin/event', \App\Livewire\Admin\Event::class)->name('admin.event');
    Route::get('/admin/thongk', \App\Livewire\Admin\Thongk::class)->name('admin.thongk');
    Route::get('/admin/post', \App\Livewire\Admin\Posts::class)->name('admin.post');
    Route::get('/admin/user', \App\Livewire\Admin\User::class)->name('admin.user');
    Route::get('/admin/mentor', \App\Livewire\Admin\Mentor::class)->name('admin.mentor');
    Route::get('/admin/mail-config', \App\Livewire\Admin\MailConfig::class)->name('admin.mail-config');
});
// Route để bắt đầu quá trình redirect sang SSO
// Route::get('/auth/redirect', function () {
//     return Socialite::driver('sso')->with(['?client_id' => env('SSO_CLIENT_ID'), '&redirect_uri' => env('SSO_REDIRECT_URL')])->redirect();
// };
Route::get('/auth/redirect', [SSOController::class, 'redirect'])->name('sso.login');
Route::get('/auth/callback', [SSOController::class, 'callback']);