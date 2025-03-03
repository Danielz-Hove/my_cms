<?php

namespace App\Http\Controllers;

use App\Models\CallToActionClientsSection;
use Illuminate\View\View;

class CallToActionClientsSectionController extends Controller
{
    public function index(): View
    {
        $callToActionClientsSections = CallToActionClientsSection::all();

        return view('call-to-action-clients', ['callToActionClientsSections' => $callToActionClientsSections]);
    }
}