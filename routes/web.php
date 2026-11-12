<?php

use App\Http\Controllers\SearchController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SiteController::class, 'home'])->name('home');
Route::get('/blog', [SiteController::class, 'blog'])->name('blog');
Route::get('/blog/{post:slug}', [SiteController::class, 'post'])->name('post');
Route::get('/videos', [SiteController::class, 'videos'])->name('videos');
Route::get('/videos/{video:slug}', [SiteController::class, 'video'])->name('video');
Route::get('/about', [SiteController::class, 'about'])->name('about');
Route::get('/search', SearchController::class)->name('search');