<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\ApplyNowController;
use App\Http\Controllers\CareersController;
use App\Http\Controllers\ServicesController;
use App\Models\Services;

/*
|--------------------------------------------------------------------------
| Web Routes
|-------{{ ---- }}---------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'home']);
Route::get('/about', [AboutUsController::class, 'about']);
Route::get('/apply', [ApplyNowController::class, 'apply']);
Route::get('/careers', [CareersController::class, 'careers']);
Route::get('/services/{id}', [ServicesController::class, 'services']);
Route::get('/apply/application', [ApplyNowController::class, 'application']);
Route::post('/careers/application', [CareersController::class, 'application']);

Route::prefix('/admin')->group(function () {
    Route::prefix('/')->group(function () {
        Route::get('', [HomeController::class, 'homeAdmin']);
        Route::post('/add', [HomeController::class, 'homeAddAdmin']);
        Route::get('/visibility/{id}', [HomeController::class, 'homeVisibilityAdmin'])->name('admin.home.visibility');
        Route::get('/delete/{id}', [HomeController::class, 'homeDeleteAdmin'])->name('admin.home.delete');
    });

    Route::prefix('/services')->group(function () {
        Route::get('/', [ServicesController::class, 'servicesAdmin']);
        Route::post('/add', [ServicesController::class, 'servicesAddAdmin']);
        Route::get('/edit/{id}', [ServicesController::class, 'servicesEditAdmin'])->name('admin.services.edit');
        Route::get('/delete/{id}', [ServicesController::class, 'servicesDeleteAdmin'])->name('admin.services.delete');
        Route::post('/update/{id}', [ServicesController::class, 'servicesUpdateAdmin']);

        Route::prefix('/documents')->group(function () {
            Route::get('/', [ServicesController::class, 'documentsAdmin']);
            Route::get('/add', [ServicesController::class, 'documentsAddAdmin']);
            Route::get('/delete/{id}', [ServicesController::class, 'documentsDeleteAdmin'])->name('admin.services.documents.delete');
        });
    });

    Route::prefix('/about')->group(function () {
        Route::prefix('/awards')->group(function () {
            Route::get('/', [AboutUsController::class, 'awardsAdmin']);
            Route::post('/add', [AboutUsController::class, 'awardsAddAdmin']);
            Route::get('/edit/{id}', [AboutUsController::class, 'awardsEditAdmin'])->name('admin.about.awards.edit');
            Route::get('/delete/{id}', [AboutUsController::class, 'awardsDeleteAdmin'])->name('admin.about.awards.delete');
            Route::post('/update/{id}', [AboutUsController::class, 'awardsUpdateAdmin']);
        });

        Route::prefix('/principals')->group(function () {
            Route::get('/', [AboutUsController::class, 'principalsAdmin']);
            Route::post('/add', [AboutUsController::class, 'principalsAddAdmin']);
            Route::get('/delete/{id}', [AboutUsController::class, 'principalsDeleteAdmin'])->name('admin.about.principals.delete');
        });

        Route::prefix('/testimonials')->group(function () {
            Route::get('/', [AboutUsController::class, 'testimonialsAdmin']);
            Route::post('/add', [AboutUsController::class, 'testimonialsAddAdmin']);
            Route::get('/visibility/{id}', [AboutUsController::class, 'testimonialsVisibilityAdmin'])->name('admin.about.testimonials.visibility');
            Route::get('/edit/{id}', [AboutUsController::class, 'testimonialsEditAdmin'])->name('admin.about.testimonials.edit');
            Route::get('/delete/{id}', [AboutUsController::class, 'testimonialsDeleteAdmin'])->name('admin.about.testimonials.delete');
            Route::post('/update/{id}', [AboutUsController::class, 'testimonialsUpdateAdmin']);
        });
    });

    Route::prefix('/apply')->group(function () {
        Route::get('/', [ApplyNowController::class, 'applyAdmin']);
        Route::get('/delete/{id}', [ApplyNowController::class, 'deleteAdmin'])->name('admin.applynow.delete');
        Route::get('/view/{id}', [ApplyNowController::class, 'viewAdmin'])->name('admin.applynow.view');
    });

    Route::prefix('/careers')->group(function () {
        Route::get('/application', [CareersController::class, 'careersApplicationAdmin']);
        Route::get('/information', [CareersController::class, 'careersInformationAdmin']);
        Route::get('/delete/{id}', [CareersController::class, 'deleteAdmin'])->name('admin.careers.delete');
        Route::get('/download/{id}', [CareersController::class, 'downloadAdmin'])->name('admin.careers.download');
        Route::get('/visibility/{id}', [CareersController::class, 'visibilityAdmin'])->name('admin.careers.visibility');
        Route::get('/informationdelete/{id}', [CareersController::class, 'InformationDeleteAdmin'])->name('admin.careers.informationdelete');
        Route::get('/informationedit/{id}', [CareersController::class, 'InformationEditAdmin'])->name('admin.careers.informationedit');
        Route::get('/information/edit', [CareersController::class, 'editAdmin']);
        Route::get('/information/update/{id}', [CareersController::class, 'updateAdmin']);
    });
});
Auth::routes();
