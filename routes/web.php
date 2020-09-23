<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShowcaseController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;

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
