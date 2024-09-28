<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\WebsiteController::class, 'index'])->name('index');
Route::get('about', [App\Http\Controllers\WebsiteController::class, 'about'])->name('about');
Route::get('contact', [App\Http\Controllers\WebsiteController::class, 'contact'])->name('contact');
Route::get('services', [App\Http\Controllers\WebsiteController::class, 'services'])->name('services');
Route::get('blog', [App\Http\Controllers\WebsiteController::class, 'blog'])->name('blog');
Route::get('shop', [App\Http\Controllers\WebsiteController::class, 'shop'])->name('shop');

Route::resource('posts', App\Http\Controllers\PostController::class);
