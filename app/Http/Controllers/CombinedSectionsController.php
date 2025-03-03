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
use Illuminate\View\View;

class CombinedSectionsController extends Controller
{
    public function index(): View
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

        return view('combined-sections', [
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
        ]);
    }
}