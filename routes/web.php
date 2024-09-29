<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubscriptionController;
use App\Models\Post;
use App\Models\Category;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;




Route::get('/', [HomeController::class, 'index'])->name('home');

Route::resource('posts', PostController::class);
Route::resource('categories', CategoryController::class);
Route::get('posts/{slug}', [PostController::class, 'show'])->name('posts.show');
Route::get('/categories/{slug}', [CategoryController::class, 'show'])->name('categories.show');



// Kullanıcı kayıt rotası
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Giriş rotası
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// Çıkış rotası
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Abonelik rotası
Route::post('/subscribe', [SubscriptionController::class, 'subscribe'])->name('subscribe');


// Oturum açmış kullanıcılar için korunan rotalar
Route::group(['middleware' => 'auth'], function () {
    Route::resource('posts', PostController::class)->except(['index', 'show']);
    Route::resource('categories', CategoryController::class)->except(['index', 'show']);
});

Route::get('/contact', [ContactController::class, 'index'])->name('contact');

Route::get('/popular-posts', [HomeController::class, 'popularPosts'])->name('popular.posts');
