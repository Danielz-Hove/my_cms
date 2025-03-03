<?php

namespace App\Http\Controllers;

use App\Models\PricingSection;
use Illuminate\View\View;

class PricingSectionController extends Controller
{
    public function index(): View
    {
        $pricingSections = PricingSection::all();

        return view('pricing-sections', ['pricingSections' => $pricingSections]);
    }
}