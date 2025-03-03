<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>

<body>
<section class="hero-section">
    @foreach($heroSections as $heroSection)
        <div class="hero">
            <div class="hero-content">
                @if($heroSection->hero_subtitle_icon)
                    <img src="{{ Storage::url($heroSection->hero_subtitle_icon) }}" alt="Subheading Icon" class="hero-subtitle-icon">
                @endif
                <h1 class="hero-title">{{ $heroSection->hero_title }}</h1>
                @if($heroSection->hero_subtitle)
                    <h2 class="hero-subtitle">{{ $heroSection->hero_subtitle }}</h2>
                @endif
                @if($heroSection->hero_description)
                    <p class="hero-description">{!! $heroSection->hero_description !!}</p>
                @endif

                @if($heroSection->hero_button_text && $heroSection->hero_button_url)
                    <a href="{{ $heroSection->hero_button_url }}" class="hero-button">{{ $heroSection->hero_button_text }}</a>
                @endif

                @if($heroSection->hero_video_url)
                    <a href="{{ $heroSection->hero_video_url }}" class="hero-video-link">Watch Video</a>
                @endif
            </div>

            <div class="hero-images">
                @if($heroSection->hero_background_image)
                    <img src="{{ Storage::url($heroSection->hero_background_image) }}" alt="Background Image" class="hero-background-image">
                @endif

                @if($heroSection->hero_foreground_image)
                    <img src="{{ Storage::url($heroSection->hero_foreground_image) }}" alt="Foreground Image" class="hero-foreground-image">
                @endif
            </div>

            @if($heroSection->hero_features)
                <div class="hero-features">
                    @foreach($heroSection->hero_features as $feature)
                        <div class="hero-feature">
                            @if(isset($feature['icon']))
                                <img src="{{ Storage::url($feature['icon']) }}" alt="Feature Icon" class="feature-icon">
                            @endif
                            <h3>{{ $feature['heading'] }}</h3>
                            <p>{{ $feature['paragraph'] }}</p>
                        </div>
                    @endforeach
                </div>
            @endif
        </div> <!-- Close hero div -->
    @endforeach
</section>
<section id="about-us">
    <div class="container">
        @foreach($aboutUsSections as $aboutUsSection)
            <div class="about-us-section"> <!-- Added a container for each section -->
                @if($aboutUsSection->about_us_subheading)
                    <h2>{{ $aboutUsSection->about_us_subheading }}</h2>
                @endif

                @if($aboutUsSection->about_us_title)
                    <h1>{{ $aboutUsSection->about_us_title }}</h1>
                @endif

                @if($aboutUsSection->about_us_description)
                    <p>{!! $aboutUsSection->about_us_description !!}</p>
                @endif

                @if($aboutUsSection->about_us_meeting_image)
                    <img src="{{ Storage::url($aboutUsSection->about_us_meeting_image) }}" alt="About Us Image">
                @endif

                @if($aboutUsSection->experience_years || $aboutUsSection->experience_description)
                    <div class="experience">
                        @if($aboutUsSection->experience_years)
                            <p>Experience: {{ $aboutUsSection->experience_years }} years</p>
                        @endif
                        @if($aboutUsSection->experience_description)
                            <p>{{ $aboutUsSection->experience_description }}</p>
                        @endif
                    </div>
                @endif

                @if($aboutUsSection->about_us_features)
                    <div class="features">
                        <h3>Key Features</h3>
                        <ul>
                            @foreach($aboutUsSection->about_us_features as $feature)
                                <li>
                                    @if(isset($feature['image']))
                                        <img src="{{ Storage::url($feature['image']) }}" alt="Feature Image" style="max-width: 50px;">
                                    @endif
                                    <strong>{{ $feature['heading'] }}</strong>: {{ $feature['paragraph'] }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if($aboutUsSection->about_us_iconlist)
                    <div class="icon-list">
                        @foreach($aboutUsSection->about_us_iconlist as $iconItem)
                            <div class="icon-item">
                                @if(isset($iconItem['icon']))
                                    <img src="{{ Storage::url($iconItem['icon']) }}" alt="Icon" style="max-width: 30px;">
                                @endif
                                <span>{{ $iconItem['text'] }}</span>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div> <!-- End of about-us-section container -->
        @endforeach
    </div>
</section>
<section id="Features-tabbed-section">
@if (count($featuresTabbedSections) > 0)
        @foreach ($featuresTabbedSections as $section)
            <section>
                <h2>{{ $section->features_headline }}</h2>
                <h3>{{ $section->features_subheading }}</h3>

                @if ($section->tabs)
                    <div class="tab-container">
                        <div class="tab-headers">
                            @foreach ($section->tabs as $key => $tab)
                                <div class="tab-header" data-tab="{{ $key }}">
                                    {{ $tab['title'] }}
                                </div>
                            @endforeach
                        </div>

                        @foreach ($section->tabs as $key => $tab)
                            <div class="tab-content" data-tab="{{ $key }}">
                                <h4>{{ $tab['subtitle'] }}</h4>
                                @if ($tab['image'])
                                    <img src="{{ asset('storage/' . $tab['image']) }}" alt="Tab Image">
                                @endif
                                <div class="tab-content-markdown">{!! Str::markdown($tab['content']) !!}</div>

                                @if ($tab['icon_list'])
                                    <ul class="icon-list">
                                        @foreach ($tab['icon_list'] as $iconItem)
                                            <li><i class="{{ $iconItem['icon'] }}"></i> {{ $iconItem['text'] }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        @endforeach
                    </div>
                @endif
            </section>
        @endforeach
    @else
        <p>No features tabbed sections available.</p>
    @endif
</section>
<section id="Features-section">
@if (count($featuresSections) > 0)
        @foreach ($featuresSections as $featuresSection)
            <section>
                <div class="features-container">
                    @if ($featuresSection->features)
                        @foreach ($featuresSection->features as $feature)
                            <div class="feature">
                                @if ($feature['icon'])
                                    <img src="{{ asset('storage/' . $feature['icon']) }}" alt="Feature Icon">
                                @endif
                                <h4>{{ $feature['heading'] }}</h4>
                                <p>{{ $feature['text'] }}</p>
                            </div>
                        @endforeach
                    @endif
                </div>
            </section>
        @endforeach
    @else
        <p>No features sections available.</p>
    @endif

</section>
    <section id="Call-to-Action">

        @if (count($callToActionClientsSections) > 0)
        @foreach ($callToActionClientsSections as $section)
        <section>
            <h2>{{ $section->cta_headline }}</h2>
            <p>{{ $section->cta_description }}</p>

            @if ($section->cta_button_text && $section->cta_button_url)
            <a href="{{ $section->cta_button_url }}">{{ $section->cta_button_text }}</a>
            @endif

            <h3>Our Clients</h3>

            @if ($section->client_logos)
            <div class="client-logos">
                @foreach ($section->client_logos as $logo)
                @if ($logo['logo'])
                <img src="{{ asset('storage/' . $logo['logo']) }}" alt="Client Logo">
                @endif
                @endforeach
            </div>
            @endif
        </section>
        @endforeach
        @else
        <p>No Call to Action and Client sections available.</p>
        @endif
    </section>
    <section id="Testimonials-and-Statistics">
    @if (count($testimonialsStatisticsSections) > 0)
        @foreach ($testimonialsStatisticsSections as $section)
            <section>
                <h2>{{ $section->title }}</h2>
                <p>{{ $section->subtext }}</p>

                <h3>Testimonials</h3>
                <div class="testimonials-container">
                    @if ($section->testimonials)
                        @foreach ($section->testimonials as $testimonial)
                            <div class="testimonial">
                                @if ($testimonial['image'])
                                    <img src="{{ asset('storage/' . $testimonial['image']) }}" alt="Testimonial Image">
                                @endif
                                <h4>{{ $testimonial['testimonial_title'] }}</h4>

                                @php
                                    $starRating = (int) $testimonial['star_rating']; // Ensure integer type
                                @endphp
                                @for ($i = 0; $i < $starRating; $i++)
                                    <span>★</span>  {{-- Use a star character --}}
                                @endfor

                                <p>{{ $testimonial['paragraph'] }}</p>
                            </div>
                        @endforeach
                    @endif
                </div>

                <h3>Statistics</h3>
                <div class="statistics-container">
                    @if ($section->statistics)
                        @foreach ($section->statistics as $statistic)
                            <div class="statistic">
                                <h4>{{ $statistic['statistic_number'] }}</h4>
                                <p>{{ $statistic['statistic_text'] }}</p>
                            </div>
                        @endforeach
                    @endif
                </div>
            </section>
        @endforeach
    @else
        <p>No testimonials & statistics sections available.</p>
    @endif
    </section>
    <section id="Services-section">
    @if (count($servicesSections) > 0)
        @foreach ($servicesSections as $section)
            <section>
                <h2>{{ $section->services_title }}</h2>
                <p>{{ $section->services_subtext }}</p>

                <div class="services-container">
                    @if ($section->service_cards)
                        @foreach ($section->service_cards as $card)
                            <div class="service-card">
                                <h3>{{ $card['card_title'] }}</h3>
                                <p>{{ $card['card_description'] }}</p>
                                @if ($card['card_image'])
                                    <img src="{{ asset('storage/' . $card['card_image']) }}" alt="Card Image" class="card-image">
                                @endif
                                @if ($card['card_button_text'] && $card['card_button_url'])
                                    <a href="{{ $card['card_button_url'] }}">{{ $card['card_button_text'] }}</a>
                                @endif
                            </div>
                        @endforeach
                    @endif
                </div>
            </section>
        @endforeach
    @else
        <p>No services sections available.</p>
    @endif
    </section>
    <section id="Pricing-section">
    @if (count($pricingSections) > 0)
        @foreach ($pricingSections as $section)
            <section>
                <h2>{{ $section->pricing_title }}</h2>
                <p>{{ $section->pricing_subtext }}</p>

                <div class="pricing-container">
                    @if ($section->pricing_plans)
                        @foreach ($section->pricing_plans as $plan)
                            <div class="pricing-plan">
                                <h3>{{ $plan['plan_heading'] }}</h3>
                                <p>Amount: ${{ $plan['plan_amount'] }}</p>
                                <p>{{ $plan['plan_paragraph'] }}</p>

                                <ul class="plan-features">
                                    @if ($plan['plan_features'])
                                        @foreach ($plan['plan_features'] as $feature)
                                            <li>
                                                @if ($feature['feature_icon'])
                                                    <img src="{{ asset('storage/' . $feature['feature_icon']) }}" alt="Feature Icon" class="feature-icon">
                                                @endif
                                                {{ $feature['feature_text'] }}
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>

                                @if ($plan['plan_button_text'] && $plan['plan_button_url'])
                                    <a href="{{ $plan['plan_button_url'] }}">{{ $plan['plan_button_text'] }}</a>
                                @endif
                            </div>
                        @endforeach
                    @endif
                </div>
            </section>
        @endforeach
    @else
        <p>No pricing sections available.</p>
    @endif
    </section>
    <section id="faq-section">
    @if (count($faqs) > 0)
        @foreach ($faqs as $faq)
            <section>
                <h2>{{ $faq->faq_section_heading }}</h2>
                <p>{{ $faq->faq_short_description }}</p>

                @if ($faq->faq_accordion)
                    <div class="faq-accordion-container">
                        @foreach ($faq->faq_accordion as $accordionItem)
                            <div class="accordion">
                                <div class="accordion-header">{{ $accordionItem['question_title'] }}</div>
                                <div class="accordion-content">{{ $accordionItem['answer_text'] }}</div>
                            </div>
                        @endforeach
                    </div>
                @endif

                <h3>Call To Action</h3>
                <p>{{ $faq->faq_cta_short_description }}</p>

                @if ($faq->faq_cta_button_text && $faq->faq_cta_button_url)
                    <a href="{{ $faq->faq_cta_button_url }}">{{ $faq->faq_cta_button_text }}</a>
                @endif
            </section>
        @endforeach
    @else
        <p>No FAQs available.</p>
    @endif
    </section>
    <section id="Contact-section">
    @if (count($contactSections) > 0)
        @foreach ($contactSections as $contactSection)
            <section>
                <h2>{{ $contactSection->contact_title }}</h2>
                <h3>{{ $contactSection->contact_subtitle }}</h3>
                <h3>{{ $contactSection->contact_sidebar_title }}</h3>
                <p>{{ $contactSection->contact_paragraph }}</p>

                @if ($contactSection->contact_features)
                    <div class="contact-features">
                        @foreach ($contactSection->contact_features as $feature)
                            <div class="contact-feature">
                                @if ($feature['icon'])
                                    <img src="{{ asset('storage/' . $feature['icon']) }}" alt="Feature Icon">
                                @endif
                                <h4>{{ $feature['heading'] }}</h4>
                                <p>{{ $feature['description'] }}</p>
                            </div>
                        @endforeach
                    </div>
                @endif
            </section>
        @endforeach
    @else
        <p>No contact sections available.</p>
    @endif
    </section>
</body>