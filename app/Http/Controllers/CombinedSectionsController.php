<?php

namespace App\Http\Controllers;

use App\Models\AboutUsSection;
use App\Models\CallToActionClientsSection;
use App\Models\ContactSection;
use App\Models\Faq;
use App\Models\FeaturesSection;
use App\Models\FeaturesTabbedSection;
use App\Models\HeroSection;
use App\Models\PricingSection;
use App\Models\ServicesSection;
use App\Models\TestimonialsStatisticsSection;
use App\Models\WebsiteSettings; // Import the WebsiteSettings model
use Illuminate\View\View;

class CombinedSectionsController extends Controller
{
    public function index(): View
    {
        $data = $this->getSectionData();

        return view('combined-sections', $data);
    }

    public function showcase(): View
    {
        $data = $this->getSectionData();

        return view('show-case', $data);
    }

    private function getSectionData(): array
    {
        $aboutUsSections = AboutUsSection::all();
        $callToActionClientsSections = CallToActionClientsSection::all();
        $contactSections = ContactSection::all();
        $faqs = Faq::all();
        $featuresSections = FeaturesSection::all();
        $featuresTabbedSections = FeaturesTabbedSection::all();
        $heroSections = HeroSection::all();
        $pricingSections = PricingSection::all();
        $servicesSections = ServicesSection::all();
        $testimonialsStatisticsSections = TestimonialsStatisticsSection::all();
        $websiteSettings = WebsiteSettings::first(); // Get the first (or only) settings record

        return [
            'aboutUsSections' => $aboutUsSections,
            'callToActionClientsSections' => $callToActionClientsSections,
            'contactSections' => $contactSections,
            'faqs' => $faqs,
            'featuresSections' => $featuresSections,
            'featuresTabbedSections' => $featuresTabbedSections,
            'heroSections' => $heroSections,
            'pricingSections' => $pricingSections,
            'servicesSections' => $servicesSections,
            'testimonialsStatisticsSections' => $testimonialsStatisticsSections,
            'websiteSettings' => $websiteSettings, // Pass the settings to the view
        ];
    }
}