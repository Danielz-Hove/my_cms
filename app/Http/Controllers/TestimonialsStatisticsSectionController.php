<?php

namespace App\Http\Controllers;

use App\Models\TestimonialsStatisticsSection;
use Illuminate\View\View;

class TestimonialsStatisticsSectionController extends Controller
{
    public function index(): View
    {
        $testimonialsStatisticsSections = TestimonialsStatisticsSection::all();

        return view('testimonials-statistics-sections', ['testimonialsStatisticsSections' => $testimonialsStatisticsSections]);
    }
}