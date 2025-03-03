<?php
namespace App\Http\Controllers;

use App\Models\HeroSection;
use Illuminate\View\View;

class HeroSectionController extends Controller
{
    public function showAll(): View
    {
        $heroSections = HeroSection::all();  // Fetch all HeroSection records

        return view('hero_section', ['heroSections' => $heroSections]);
    }
}