<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\HeroSectionController;
use App\Http\Controllers\CallToActionClientsSectionController;
use App\Http\Controllers\ContactSectionController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\FeaturesSectionController;
use App\Http\Controllers\FeaturesTabbedSectionController;
use App\Http\Controllers\PricingSectionController;
use App\Http\Controllers\ServicesSectionController;
use App\Http\Controllers\TestimonialsStatisticsSectionController;
use App\Http\Controllers\CombinedSectionsController;

Route::get('/', function () {
    return view('welcome'); // Or your desired view for the homepage
});

Route::get('/all-hero-sections', [HeroSectionController::class, 'showAll'])->name('hero.all');  // Change route
Route::get('/about-us', [AboutUsController::class, 'index'])->name('about-us');
Route::get('/call-to-action-clients', [CallToActionClientsSectionController::class, 'index'])->name('call-to-action-clients');
Route::get('/contact-sections', [ContactSectionController::class, 'index'])->name('contact-sections');
Route::get('/faqs', [FaqController::class, 'index'])->name('faqs');
Route::get('/features-sections', [FeaturesSectionController::class, 'index'])->name('features-sections');
Route::get('/features-tabbed-sections', [FeaturesTabbedSectionController::class, 'index'])->name('features-tabbed-sections');
Route::get('/pricing-sections', [PricingSectionController::class, 'index'])->name('pricing-sections');
Route::get('/services-sections', [ServicesSectionController::class, 'index'])->name('services-sections');
Route::get('/testimonials-statistics-sections', [TestimonialsStatisticsSectionController::class, 'index'])->name('testimonials-statistics-sections');

Route::get('/all-sections', [CombinedSectionsController::class, 'index']);