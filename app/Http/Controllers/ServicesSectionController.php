<?php

namespace App\Http\Controllers;

use App\Models\ServicesSection;
use Illuminate\View\View;

class ServicesSectionController extends Controller
{
    public function index(): View
    {
        $servicesSections = ServicesSection::all();

        return view('services-sections', ['servicesSections' => $servicesSections]);
    }
}