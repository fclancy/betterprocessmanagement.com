<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ContactController;

/*
|--------------------------------------------------------------------------
| Public Web Routes
|--------------------------------------------------------------------------
|
| Public-facing routes for betterprocessmanagement.com
|
*/

// Homepage
Route::get('/', [PageController::class, 'home'])->name('home');

// Dynamic Static Pages (CMS)
Route::get('/aboutus', [PageController::class, 'show'])->name('aboutus');
Route::get('/services', [PageController::class, 'show'])->name('services');
Route::get('/contact', [PageController::class, 'show'])->name('contact');
Route::get('/faq', [PageController::class, 'show'])->name('faq');
Route::get('/privacy', [PageController::class, 'show'])->name('privacy');
Route::get('/terms', [PageController::class, 'show'])->name('terms');
Route::get('/blue-ocean-review', [PageController::class, 'show'])->name('blue-ocean');

// Gallery (Public)
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');
Route::get('/gallery/{galleryItem:slug}', [GalleryController::class, 'show'])->name('gallery.show');

// Contact Form Submission (Public)
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

/*
|--------------------------------------------------------------------------
| Fortify & Filament
|--------------------------------------------------------------------------
|
| Laravel Fortify and Filament automatically register their routes.
// Fortify: GET/POST /login, /register, /password/*, /email/verify-* (if views enabled)
// Filament: /admin (panel), /admin/{resource}
|
*/
