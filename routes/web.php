<?php

use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

Route::get('/', function () {
    return view('index');
});
Route::get('/', fn() => view('index'))->name('home');
Route::get('/about', fn() => view('about'))->name('about');
// contact-page
Route::get('/contact', [ContactController::class, 'showContactForm'])->name('contact');

Route::post('/contact', [ContactController::class, 'store']);

Route::get('/send', function(){
Mail::to('skyllaxtechnology@gmail.com')->send(new ContactMail());
return 'Email sent successfully!'; // You can customize this response as needed
});


Route::get('/services/business-intelligence', fn() => view('services.business-intelligence'))->name('services.business-intelligence');
Route::get('/services/industrial-strength', fn() => view('services.industrial-strength'))->name('services.industrial');
Route::get('/services/cybersecurity', fn() => view('services.cybersecurity'))->name('services.cybersecurity');
Route::get('/services/business-development', fn() => view('services.business-development'))->name('services.business-development');
Route::get('/services/smart-home', fn() => view('services.smart-home'))->name('services.smart-home');
Route::get('/consultation/it-strategy', fn() => view('consultation.it-strategy'))->name('consultation.it-strategy');
Route::get('/consultation/digital-branding', fn() => view('consultation.digital-branding'))->name('consultation.digital-branding');
Route::get('/consultation/business-optimization', fn() => view('consultation.business-optimization'))->name('consultation.business-optimization');
Route::get('/consultation/cybersecurity', fn() => view('consultation.cybersecurity'))->name('consultation.cybersecurity');
Route::get('/blog', fn() => view('blog'))->name('blog');
Route::get('/portfolio', fn() => view('portfolio'))->name('portfolio');
Route::get('/projects', fn() => view('projects'))->name('projects');
Route::get('/project/{id}', fn($id) => view('project', ['id' => $id]))->name('project');
Route::get('/employee/{id}', fn($id) => view('employee', ['id' => $id]))->name('employee');
Route::post('/subscribe', fn() => redirect()->back()->with('success', 'Subscribed!'))->name('subscribe');
Route::get('/quote', fn() => view('quote'))->name('quote');