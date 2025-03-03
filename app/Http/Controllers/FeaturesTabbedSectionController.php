<?php

namespace App\Http\Controllers;

use App\Models\FeaturesTabbedSection;
use Illuminate\View\View;

class FeaturesTabbedSectionController extends Controller
{
    public function index(): View
    {
        $featuresTabbedSections = FeaturesTabbedSection::all();

        return view('features-tabbed-sections', ['featuresTabbedSections' => $featuresTabbedSections]);
    }
}