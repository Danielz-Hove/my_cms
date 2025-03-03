<?php

namespace App\Http\Controllers;

use App\Models\AboutUsSection;
use Illuminate\View\View;

class AboutUsController extends Controller
{
    public function index(): View
    {
        $aboutUsSections = AboutUsSection::all();  // Fetch all AboutUsSection records

        return view('about-us', ['aboutUsSections' => $aboutUsSections]);
    }
}