<?php

use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\QuestionnaireController;
use App\Http\Controllers\Admin\QuestionnaireAdminController;
use App\Http\Controllers\Admin\QuestionnaireSectionController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\ResponseController;
use App\Http\Controllers\Auth\LoginController;

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

// =================================================================
// AUTHENTICATION ROUTES - Simple
// =================================================================

Route::middleware('guest')->group(function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login']);
});

Route::post('logout', [LoginController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

// =================================================================
// ASSESSMENT ROUTES - Public (with rate limiting)
// =================================================================

Route::prefix('assessment')->name('assessment.')->group(function () {
    // Show assessment start page
    Route::get('/{questionnaire}', [QuestionnaireController::class, 'show'])
        ->name('show');

    // Start assessment (create response) - Rate limited to prevent spam
    Route::post('/{questionnaire}/start', [QuestionnaireController::class, 'start'])
        ->middleware('throttle:10,1') // 10 attempts per minute
        ->name('start');

    // Show section
    Route::get('/{questionnaire}/section/{section}', [QuestionnaireController::class, 'section'])
        ->name('section');

    // Submit section answers - Rate limited
    Route::post('/{questionnaire}/section/{section}', [QuestionnaireController::class, 'submitSection'])
        ->middleware('throttle:30,1') // 30 submissions per minute
        ->name('section.submit');

    // Get section content via AJAX (for seamless navigation)
    Route::get('/{questionnaire}/section/{section}/content', [QuestionnaireController::class, 'getSectionContent'])
        ->name('section.content');

    // Complete assessment (supports both POST and GET for AJAX redirect)
    Route::match(['get', 'post'], '/{questionnaire}/complete', [QuestionnaireController::class, 'complete'])
        ->middleware('throttle:10,1')
        ->name('complete');

    // Thank you page
    Route::get('/{questionnaire}/thank-you', [QuestionnaireController::class, 'thankYou'])
        ->name('thank-you');
});

// =================================================================
// ADMIN ROUTES - Protected
// =================================================================

Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {

    // Questionnaire Management
    Route::resource('questionnaires', QuestionnaireAdminController::class);

    // Toggle questionnaire active status
    Route::post('questionnaires/{questionnaire}/toggle-status', [QuestionnaireAdminController::class, 'toggleStatus'])
        ->name('questionnaires.toggle-status');

    // Duplicate questionnaire
    Route::post('questionnaires/{questionnaire}/duplicate', [QuestionnaireAdminController::class, 'duplicate'])
        ->name('questionnaires.duplicate');

    // Section Management (nested under questionnaire)
    Route::prefix('questionnaires/{questionnaire}')->name('questionnaires.')->group(function () {
        Route::resource('sections', QuestionnaireSectionController::class)->except(['index', 'show']);

        // Reorder sections
        Route::post('sections/reorder', [QuestionnaireSectionController::class, 'reorder'])
            ->name('sections.reorder');
    });

    // Question Management (nested under section)
    Route::prefix('questionnaires/{questionnaire}/sections/{section}')->name('questionnaires.sections.')->group(function () {
        Route::resource('questions', QuestionController::class)->except(['index', 'show']);

        // Reorder questions
        Route::post('questions/reorder', [QuestionController::class, 'reorder'])
            ->name('questions.reorder');
    });

    // Response Management
    Route::prefix('questionnaires/{questionnaire}')->name('questionnaires.')->group(function () {
        Route::get('responses', [ResponseController::class, 'index'])
            ->name('responses.index');

        Route::get('responses/{response}', [ResponseController::class, 'show'])
            ->name('responses.show');

        Route::delete('responses/{response}', [ResponseController::class, 'destroy'])
            ->name('responses.destroy');

        // Export responses
        Route::get('responses-export', [ResponseController::class, 'export'])
            ->name('responses.export');

        // Response statistics
        Route::get('responses-stats', [ResponseController::class, 'stats'])
            ->name('responses.stats');
    });
});
