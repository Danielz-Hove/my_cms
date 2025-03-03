<?php

namespace App\Http\Controllers;

use App\Models\FeaturesSection;
use Illuminate\View\View;

class FeaturesSectionController extends Controller
{
    public function index(): View
    {
        $featuresSections = FeaturesSection::all();

        return view('features-sections', ['featuresSections' => $featuresSections]);
    }
}