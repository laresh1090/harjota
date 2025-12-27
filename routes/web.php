<?php

use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

// =================================================================
// MAIN ROUTES - New Site Structure
// =================================================================

Route::get('/', fn() => view('index'))->name('home');
Route::get('/about', fn() => view('about'))->name('about');
Route::get('/services', fn() => view('services'))->name('services');
Route::get('/products', fn() => view('products'))->name('products');
Route::get('/insights', fn() => view('insights'))->name('insights');
Route::get('/insights/{slug}', fn($slug) => view('insights.show', ['slug' => $slug]))->name('insights.show');

// Contact Routes
Route::get('/contact', [ContactController::class, 'showContactForm'])->name('contact');
Route::post('/contact', [ContactController::class, 'store']);

// Newsletter Subscription
Route::post('/subscribe', fn() => redirect()->back()->with('success', 'Subscribed!'))->name('subscribe');

// =================================================================
// 301 REDIRECTS - Old URLs to New Structure
// =================================================================

// Old Services Pages -> Consolidated Services
Route::permanentRedirect('/services/business-intelligence', '/services');
Route::permanentRedirect('/services/industrial-strength', '/services');
Route::permanentRedirect('/services/cybersecurity', '/services');
Route::permanentRedirect('/services/smart-home', '/services');
Route::permanentRedirect('/services/business-development', '/services');

// Old Consultation Pages -> Consolidated Services
Route::permanentRedirect('/consultation/it-strategy', '/services');
Route::permanentRedirect('/consultation/digital-branding', '/services');
Route::permanentRedirect('/consultation/business-optimization', '/services');
Route::permanentRedirect('/consultation/cybersecurity', '/services');

// Portfolio -> About (Methodology Showcase)
Route::permanentRedirect('/portfolio', '/about');

// Blog -> Insights
Route::permanentRedirect('/blog', '/insights');

// Legacy Routes
Route::permanentRedirect('/projects', '/products');
Route::permanentRedirect('/quote', '/contact');

// =================================================================
// UTILITY ROUTES
// =================================================================

Route::get('/send', function(){
    Mail::to('info@harjota.com')->send(new ContactMail());
    return 'Email sent successfully!';
});
