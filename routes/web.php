<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShowcaseController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;

//admin
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\auth\RegisteredController;
use App\Http\Controllers\admin\auth\LoginController;
// use App\Http\Controllers\admin\ProductCategoryController;
//use App\Http\Controllers\admin\ProductController;
// use App\Http\Controllers\admin\TeamController;
use App\Http\Controllers\admin\ArticleCategoryController;
use App\Http\Controllers\admin\ArticleController as AdminArticleController;
use App\Http\Controllers\admin\AboutController as AdminAboutController;

use App\Http\Controllers\zyk_admin\ProductCategoryController;
use App\Http\Controllers\zyk_admin\ProductController;
<<<<<<< HEAD
use App\Http\Controllers\zyk_admin\TeamController;
=======
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
>>>>>>> 8b7d765ae0c4c37f5dea8b24db90f81f081f6bf1

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

Route::get('/', [HomeController::class, 'countdown'])->name('countdown');

Route::prefix('beta')->group(function(){
    Route::get('/', [HomeController::class, 'home'])->name('home');

    Route::group(['prefix' => '/san-pham'], function () {
        Route::get('/', [ShowcaseController::class, 'index'])->name('showcase');
        Route::get('/chi-tiet/{slug}', [ShowcaseController::class, 'detail'])->name('showcase_detail');
    });

    Route::group(['prefix' => '/bai-viet'], function () {
        Route::get('/', [ArticleController::class, 'index'])->name('article');
        Route::get('/category/{id}', [ArticleController::class, 'articleByCategory'])->name('article_by_category');
        Route::get('/chi-tiet/{slug}', [ArticleController::class, 'detail'])->name('article_detail');
    });

    Route::group(['prefix' => '/tuyen-dung'], function () {
        Route::get('/', [CareerController::class, 'index'])->name('career');
        Route::get('/chi-tiet-cong-viec', [CareerController::class, 'getJobDetail'])->name('career_getJobDetail');
    });

    Route::get('/gioi-thieu', [AboutController::class, 'index'])->name('about');

    Route::get('/lien-he', [ContactController::class, 'index'])->name('contact');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
// Route::get('/register', function (){
//     return '404 page';
// });
// Route::get('/login', function (){
//     return '404 page';
// });
// Route::post('/logout', function (){
//     return '404 page';
// });
// Route::get('/forgot-password', function (){
//     return '404 page';
// });
// Route::post('/forgot-password', function (){
//     return '404 page';
// });
// Route::get('/reset-password/{token}', function (){
//     return '404 page';
// });
// Route::post('/reset-password', function (){
//     return '404 page';
// });

Route::prefix('admin')->group(function(){
    Route::get('/dang-ky', [RegisteredController::class, 'create'])
        ->middleware(['guest'])
        ->name('register');
    Route::post('/dang-ky', [RegisteredController::class, 'store'])
        ->middleware(['guest']);

    Route::get('/dang-nhap', [LoginController::class, 'create'])
        ->middleware(['guest'])
        ->name('login');
    $limiter = config('fortify.limiters.login');
    Route::post('/dang-nhap', [LoginController::class, 'store'])
        ->middleware(array_filter([
            'guest',
            $limiter ? 'throttle:'.$limiter : null,
        ]));
    Route::group(['middleware' => 'adminLogin'], function () {
        Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        Route::get('danh-muc-san-pham/remove/{danh_muc_san_pham}', [ProductCategoryController::class, 'remove'])->name('danh-muc-san-pham.remove');
        Route::resource('/danh-muc-san-pham', ProductCategoryController::class);

        Route::get('san-pham/remove/{san_pham}', [ProductController::class, 'remove'])->name('san-pham.remove');
        Route::resource('/san-pham', ProductController::class);

        Route::resource('/thanh-vien', TeamController::class);

        Route::get('danh-muc-bai-viet/remove/{danh_muc_bai_viet}', [ArticleCategoryController::class, 'remove'])->name('danh-muc-bai-viet.remove');
        Route::resource('/danh-muc-bai-viet', ArticleCategoryController::class);

        Route::get('bai-viet/remove/{bai_viet}', [AdminArticleController::class, 'remove'])->name('bai-viet.remove');
        Route::resource('/bai-viet', AdminArticleController::class);

<<<<<<< HEAD
        Route::resource('/gioi-thieu', AdminAboutController::class);

=======
        Route::get('/gioi-thieu', [AdminAboutController::class, 'index'])->name('gioi-thieu.index');
        Route::get('/gioi-thieu/{gioi_thieu}/edit', [AdminAboutController::class, 'edit'])->name('gioi-thieu.edit');
        Route::post('/gioi-thieu/{gioi_thieu}', [AdminAboutController::class, 'update'])->name('gioi-thieu.update');
>>>>>>> 8b7d765ae0c4c37f5dea8b24db90f81f081f6bf1
        Route::prefix('zyk')->group(function(){
            Route::resource('/danh-muc-san-pham', ProductCategoryController::class);
            Route::resource('/san-pham', ProductController::class);
            Route::resource('/thanh-vien', TeamController::class);
        });
    });
});
