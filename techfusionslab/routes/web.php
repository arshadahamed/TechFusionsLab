<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\ReviewController;
use App\Http\Controllers\Backend\HeroController;
use App\Http\Controllers\Backend\ServiceController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Backend\CompanyInfoController;
use App\Http\Controllers\Backend\TeamController;
use App\Http\Controllers\Backend\EmailController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Backend\FaqController;
use App\Http\Controllers\Backend\BlogController;


// Homepage
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/login', [HomeController::class, 'showLogin'])->name('login');

Route::get('/team', [FrontendController::class, 'team'])->name('our.team');

Route::get('/about', [FrontendController::class, 'about'])->name('about');

Route::get('/service', [FrontendController::class, 'service'])->name('service');

Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');

Route::post('/contact', [FrontendController::class, 'sendContact'])->name('contact.send');


Route::get('/notifications', [App\Http\Controllers\FrontendController::class, 'getNotifications'])->name('notifications.get');





Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name
('admin.logout');

Route::post('/admin/login', [AdminController::class, 'AdminLogin'])->name
('admin.login');

Route::get('/verify', [AdminController::class, 'ShowVerification'])->name
('custom.verification.form');

Route::post('/verify', [AdminController::class, 'VerificationVerify'])->name
('custom.verification.verify');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('/profile/store', [AdminController::class, 'ProfileStore'])->name('profile.store');
    Route::post('/admin/password/update', [AdminController::class, 'PasswordUpdate'])->name('admin.password.update');

});

Route::middleware('auth')->group(function () {

    Route::controller(ReviewController::class)->group(function()
    {
        Route::get('/all/review','AllReview' )->name('all.review');
        Route::get('/add/review','AddReview' )->name('add.review');
        Route::post('/store/review','StoreReview' )->name('store.review');
        Route::get('/edit/review/{id}','EditReview' )->name('edit.review');
        Route::post('/update/review/{id}','UpdateReview' )->name('update.review');
        Route::get('/delete/review/{id}','DeleteReview' )->name('delete.review');

    });

    Route::controller(HeroController::class)->group(function()
    {
        Route::get('/admin/hero/edit','editHero')->name('edit.hero');
        Route::post('/admin/hero/update/{id}', 'updateHero')->name('update.hero');
    });

    Route::controller(ServiceController::class)->group(function()
    {
        Route::get('/all/service','AllService' )->name('all.services');
        Route::get('/add/service','AddService' )->name('add.service');
        Route::post('/store/service','StoreService' )->name('store.service');
        Route::get('/edit/service/{id}', 'EditService')->name('edit.service')->whereNumber('id');
        Route::put('/update/service/{id}', 'UpdateService')->name('update.service');
        Route::get('/delete/service/{id}','DeleteService' )->name('delete.service');
    });


    Route::controller(CompanyInfoController::class)->group(function()
    {
        Route::get('/admin/company/edit','editCompany')->name('edit.info');
        Route::post('/admin/company/update/{id}', 'updateCompany')->name('update.info');
    });

    Route::controller(TeamController::class)->group(function() {
        Route::get('/all/team','AllTeam')->name('all.team');
        Route::get('/add/team','AddTeam')->name('add.team');
        Route::post('/store/team','StoreTeam')->name('store.team');
        Route::get('/edit/team/{id}','EditTeam')->name('edit.team');
        Route::put('/update/team/{id}', 'UpdateTeam')->name('update.team');
        Route::get('/delete/team/{id}','DeleteTeam')->name('delete.team');
    });

     Route::controller(EmailController::class)->group(function()
    {
        Route::get('/all/email','AllEmails' )->name('emails');
        Route::get('/delete/email/{id}','DeleteEmail' )->name('delete.email');
        Route::get('/email/clear-all', 'ClearAll')->name('email.clearAll');


    });

    Route::controller(FaqController::class)->group(function () {
    // Normal FAQs
        Route::get('/all/faq', 'index')->name('all.faqs');
        Route::get('/add/faq', 'create')->name('add.faq');
        Route::post('/store/faq', 'store')->name('store.faq');
        Route::get('/edit/faq/{faq}', 'edit')->name('edit.faq');
        Route::post('/update/faq/{faq}', 'update')->name('update.faq');
        Route::get('/delete/faq/{faq}', 'destroy')->name('delete.faq');

        // Trashed FAQs
        Route::get('/trashed/faq', 'trashed')->name('trashed.faqs');
        Route::get('/trashed/faq/restore/{id}', 'restore')->name('faq.restore');
        Route::get('/trashed/faq/delete/{id}', 'forceDelete')->name('faq.forceDelete');
    });


    // Blog routes
    Route::resource('blogs', BlogController::class)->except(['show']);

   // SEO-friendly show route with ID + slug
    Route::get('/blog/{id}-{slug}', [BlogController::class, 'show'])->name('blogs.show');





});

Route::fallback(function () {
    return response()->view('home.errors.404', [], 404);
});

