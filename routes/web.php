<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\ComplainInboxController;
use App\Http\Controllers\ComplainController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfographicController;
use App\Http\Controllers\InnovationProposalController;
use App\Http\Controllers\VideoController;

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
    ->namespace('Admin')
    ->middleware(['auth', 'admin'])
    ->group(function () {
        Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])
            ->name('dashboard');

        Route::resource('user', '\App\Http\Controllers\Admin\UserController')->middleware((['auth', 'superadmin']));

        Route::resource('innovation-proposal', '\App\Http\Controllers\Admin\InnovationProposalController');
        Route::get('/actionedit/{id}', '\App\Http\Controllers\Admin\InnovationProposalController@actionedit');
        Route::get('/actioneditt/{id}', '\App\Http\Controllers\Admin\InnovationProposalController@actioneditt');

        Route::resource('innovation-profile', '\App\Http\Controllers\Admin\InnovationProfileController');

        Route::resource('innovation-report', '\App\Http\Controllers\Admin\InnovationReportController');

        Route::resource('complain-inbox', '\App\Http\Controllers\Admin\ComplainInboxController');

        Route::resource('about', '\App\Http\Controllers\Admin\AboutController')->middleware((['auth', 'superadmin']));

        Route::resource('carousel', '\App\Http\Controllers\Admin\CarouselController')->middleware((['auth', 'superadmin']));

        Route::resource('infographic-content', '\App\Http\Controllers\Admin\InfographicController')->middleware((['auth', 'superadmin']));
        Route::get('/editinfographic/{id}', '\App\Http\Controllers\Admin\InfographicController@editinfographic');
        Route::get('/editinfographicc/{id}', '\App\Http\Controllers\Admin\InfographicController@editinfographicc');
    });

Auth::routes();

Route::resource('complain', ComplainController::class)->only([
    'index', 'create', 'store',
]);


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/infographic', [InfographicController::class, 'index'])->name('infographic');
Route::get('/infographic/{id}', [InfographicController::class, 'show'])->name('infographic-detail');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/video', [VideoController::class, 'index'])->name('video');
