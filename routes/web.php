<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\ComplainInboxController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ComplainController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfographicController;
use App\Http\Controllers\InnovationProposalController;
use App\Http\Controllers\VideoGalleryController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('admin')
    ->namespace('operator')
    ->middleware(['auth', 'operator'])
    ->group(function () {
        Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])
            ->name('dashboard');

        Route::resource('user', '\App\Http\Controllers\Admin\UserController')->middleware((['auth', 'admin']));
        Route::get('/resetpassword/{id}', '\App\Http\Controllers\Admin\UserController@resetpassword')->middleware((['auth', 'admin']));

        Route::resource('innovation-proposal', '\App\Http\Controllers\Admin\InnovationProposalController');
        Route::get('/actionedit/{id}', '\App\Http\Controllers\Admin\InnovationProposalController@actionedit');
        Route::get('/actioneditt/{id}', '\App\Http\Controllers\Admin\InnovationProposalController@actioneditt');

        Route::resource('review-proposal', '\App\Http\Controllers\Admin\ReviewProposalController')->middleware((['auth', 'admin']));
        Route::put('/simpan/{id}', '\App\Http\Controllers\Admin\ReviewProposalController@simpan')->name('review-proposal.simpan')->middleware((['auth', 'admin']));

        Route::resource('innovation-profile', '\App\Http\Controllers\Admin\InnovationProfileController');
        Route::get('/actioneditt/{id}', '\App\Http\Controllers\Admin\InnovationProposalController@actioneditt');


        Route::resource('innovation-report', '\App\Http\Controllers\Admin\InnovationReportController');
        Route::get('/innovation-report.create0', '\App\Http\Controllers\Admin\InnovationReportController@create0')->name('innovation-report.create0');
        Route::post('/innovation-report.store0', '\App\Http\Controllers\Admin\InnovationReportController@store0')->name('innovation-report.store0');


        Route::resource('complain-inbox', '\App\Http\Controllers\Admin\ComplainInboxController');
        Route::resource('chat-inbox', '\App\Http\Controllers\Admin\ChatInboxController');

        Route::resource('about', '\App\Http\Controllers\Admin\AboutController')->middleware((['auth', 'admin']));

        Route::resource('video', '\App\Http\Controllers\Admin\VideoController')->middleware((['auth', 'admin']));

        Route::resource('carousel', '\App\Http\Controllers\Admin\CarouselController')->middleware((['auth', 'admin']));

        Route::resource('infographic-content', '\App\Http\Controllers\Admin\InfographicController')->middleware((['auth', 'admin']));
        Route::get('/editinfographic/{id}', '\App\Http\Controllers\Admin\InfographicController@editinfographic');
        Route::get('/editinfographicc/{id}', '\App\Http\Controllers\Admin\InfographicController@editinfographicc');

        Route::resource('change-password', '\App\Http\Controllers\Admin\ChangePasswordController');
    });

Auth::routes();

Route::resource('complain', ComplainController::class)->only([
    'index', 'create', 'store',
]);


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/infographic', [InfographicController::class, 'index'])->name('infographic');
Route::get('/infographic/{id}', [InfographicController::class, 'show'])->name('infographic-detail');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/video', [VideoGalleryController::class, 'index'])->name('video');
Route::get('/video/{id}', [VideoGalleryController::class, 'show'])->name('video-detail');

Route::resource('chat', ChatController::class)->only(['store']);
