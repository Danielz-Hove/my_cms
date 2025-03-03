<?php

namespace App\Http\Controllers;

use App\Models\ContactSection;
use Illuminate\View\View;

class ContactSectionController extends Controller
{
    public function index(): View
    {
        $contactSections = ContactSection::all();

        return view('contact-sections', ['contactSections' => $contactSections]);
    }
}