<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iLanding - Awesome Landing Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <!--Hero Section-->
    <section id="hero" class="py-0">
        @foreach($heroSections as $heroSection)
        <section style="background-image: url('{{ $heroSection->hero_background_image ? asset('storage/' . $heroSection->hero_background_image) : 'https://placehold.co/1920x1080' }}'); background-size: cover; background-position: center; min-height: 100vh; position:relative; display: flex; flex-direction: column;">

            <!-- Navigation Bar Wrapped in a Div -->
            <div style="z-index: 1000;">
                <div style="padding: 10px;">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light rounded-pill">
                        <div class="container">
                            <a class="navbar-brand" href="#">iLanding</a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarNav">
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item">
                                        <a class="nav-link" href="#about">About</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#features">Features</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#services">Services</a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Dropdown
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#contact">Contact</a>
                                    </li>
                                </ul>
                                <a href="#" class="btn btn-primary rounded-pill ml-3">Get Started</a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>

            <div class="container mt-auto" style=" padding: 20px;">
                <div class="row">
                    <div class="col-md-6">
                        @if($heroSection->hero_subtitle_icon)
                        <small style="background-color: #e1eefe; color: #007bff; padding: 5px 10px; border-radius: 10px;">
                            <i class="fa {{ $heroSection->hero_subtitle_icon }} fa-spin"></i> {{ $heroSection->hero_subtitle }}
                        </small>
                        @else
                        <small style="background-color: #e1eefe; color: #007bff; padding: 5px 10px; border-radius: 10px;">
                            {{ $heroSection->hero_subtitle }}
                        </small>
                        @endif

                        <h1>{{ $heroSection->hero_title }}</h1>
                        <h2>{{ $heroSection->page_title }}</h2>
                        <p>{{ $heroSection->hero_description }}</p>
                        <a href="{{ $heroSection->hero_button_url }}" class="btn btn-primary">{{ $heroSection->hero_button_text }}</a>
                        <a href="{{ $heroSection->hero_video_url }}" class="btn btn-secondary"> <i class="fa fa-play-circle" aria-hidden="true"></i> Play Video</a>
                    </div>
                    <div class="col-md-6">
                        <img src="{{ $heroSection->hero_foreground_image ? asset('storage/' . $heroSection->hero_foreground_image) : 'https://placehold.co/600x400' }}" alt="Hero Image" class="img-fluid">
                    </div>
                </div>
                <br>
                <div class="row text-center award-block">
                    @if(is_array($heroSection->hero_features) && count($heroSection->hero_features) > 0)
                    @foreach($heroSection->hero_features as $feature)
                    <div class="col-md-3">
                        <div>
                            @if(isset($feature['icon']) && $feature['icon'])
                            <i class="fa {{ $feature['icon'] }} fa-2x mb-2 text-primary"></i>
                            @endif
                            <div><b>{{ $feature['heading'] ?? '' }}</b></div>
                            <small>{{ $feature['paragraph'] ?? '' }}</small>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <div class="col-md-12">No features available.</div>
                    @endif
                </div>
            </div>
        </section>
        @endforeach
    </section>
    <!-- About Us Section -->
    <section id="about" class="py-5 bg-light">
        <div class="container">
            @foreach($aboutUsSections as $section)
            <small class="text-primary" style="font-weight: 700; padding-bottom:10px;">{{ $section->about_us_subheading }}</small>
            <div class="row">
                <div class="col-md-6">
                    <h2>{{ $section->about_us_title }}</h2>
                    <p>{!! $section->about_us_description !!}</p> <!-- Use !! for HTML from RichEditor -->
                    <ul style="list-style: none;">
                        <div class="row">
                            <div class="col-md-6">
                                @if(isset($section->about_us_iconlist))
                                @foreach($section->about_us_iconlist as $item)
                                <li>
                                    @if(isset($item['icon']))
                                    <i class="{{ $item['icon'] }} text-primary"></i>
                                    @else
                                    <i class="fa fa-check text-primary"></i> <!-- Default if no icon -->
                                    @endif
                                    {{ $item['text'] }}
                                </li>
                                @endforeach
                                @endif
                            </div>

                        </div>
                    </ul>
                    <div class="row" style="padding-top: 10px;">
                        <div class="col-md-6 d-flex align-items-center">
                            <img src="https://placehold.co/75x75" alt="Team Image" class="img-fluid rounded-circle mr-2">
                            <div>
                                Mario Smith
                                <br>
                                CEO & Founder
                            </div>
                        </div>
                        <div class="col-md-6 d-flex align-items-center">
                            <i class="fa fa-phone text-primary mr-2"></i>
                            <div>
                                Call us anytime
                                <br>
                                +1 1333 456-789
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="about-image-container">
                        @if($section->about_us_meeting_image)
                        <img src="{{ asset('storage/' . $section->about_us_meeting_image) }}" alt="About Us Image" class="img-fluid">
                        @else
                        <img src="https://placehold.co/600x400" alt="Placeholder Image" class="img-fluid">
                        @endif
                        <div class="experience-badge">
                            {{ $section->experience_years }}+ Years
                            <br>
                            {{ $section->experience_description }}
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    <!-- Features Section with Tabs -->
    @foreach ($featuresTabbedSections as $section)
    <section id="features-{{ $section->id }}" class="py-5">
        <div class="container">
            <div class="text-center">
                <h2>{{ $section->features_headline ?? 'Features' }}</h2>
                <div style="width: 50px; height: 3px; background-color: #3498db; margin: 0.5rem auto;"></div>
                <p class="text-muted">{{ $section->features_subheading ?? 'Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit.' }}</p>
            </div>

            <ul class="nav nav-pills justify-content-center bg-light rounded flex-wrap" id="myTab" role="tablist" style="padding: 5px;">
                @foreach($section->tabs as $key => $tab)
                @php
                // Generate a unique ID for each tab based on section ID and tab title
                $tabId = Str::slug($section->id . '-' . $tab['title']);
                @endphp
                <li class="nav-item">
                    <a class="nav-link {{ $loop->parent->first && $loop->first ? 'active' : '' }}"
                        id="{{ $tabId }}-tab"
                        data-toggle="tab"
                        href="#{{ $tabId }}"
                        role="tab"
                        aria-controls="{{ $tabId }}"
                        aria-selected="{{ $loop->parent->first && $loop->first ? 'true' : 'false' }}">
                        {{ $tab['title'] }}
                    </a>
                </li>
                @endforeach
            </ul>

            <div class="tab-content mt-4" id="myTabContent">
                @foreach($section->tabs as $tab)
                @php
                // Generate a unique ID for each tab based on section ID and tab title
                $tabId = Str::slug($section->id . '-' . $tab['title']);
                @endphp
                <div class="tab-pane fade {{ $loop->parent->first && $loop->first ? 'show active' : '' }}"
                    id="{{ $tabId }}"
                    role="tabpanel"
                    aria-labelledby="{{ $tabId }}-tab">
                    <div class="row">
                        <div class="col-md-6">
                            <h3>{{ $tab['subtitle'] ?? $tab['title'] }}</h3>
                            <div class="content">
                                {!! Str::markdown($tab['content'] ?? '') !!}
                            </div>
                            @if(isset($tab['icon_list']))
                            <ul style="list-style: none;">
                                @foreach($tab['icon_list'] as $iconItem)
                                <li><i class="fa {{ $iconItem['icon'] }} text-success"></i> {{ $iconItem['text'] }}</li>
                                @endforeach
                            </ul>
                            @endif
                        </div>
                        <div class="col-md-6">
                            @if(isset($tab['image']))
                            <img src="{{ \Illuminate\Support\Facades\Storage::url($tab['image']) }}" alt="{{ $tab['title'] }}" class="img-fluid">
                            @else
                            <img src="https://placehold.co/600x400/ADD8E6/000000" alt="{{ $tab['title'] }}" class="img-fluid">
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endforeach

    <!-- Key Features (Four Colored Boxes) -->
    <section id="key-features" class="py-5">
        <div class="container">
            <div class="row">
                @if(isset($featuresSections) && count($featuresSections) > 0)
                @foreach($featuresSections as $featuresSection)
                @if(isset($featuresSection->features) && is_array($featuresSection->features) && count($featuresSection->features) > 0)
                @foreach($featuresSection->features as $key => $feature)
                <div class="col-md-3 mb-4">
                    <div class="card text-black h-100" style="background-color: {{ $key % 4 == 0 ? '#fff4e2' : ($key % 4 == 1 ? '#deedfe' : ($key % 4 == 2 ? '#d5f1e5' : '#fdefed')) }};">
                        <div class="card-body text-center">
                            @if(isset($feature['icon']) && !empty($feature['icon']))
                            <i class="{{ $feature['icon'] }} fa-3x mb-2"></i>
                            @else
                            <i class="fa fa-question-circle fa-3x mb-2"></i> {{-- Default icon if none provided --}}
                            @endif

                            @if(isset($feature['heading']) && !empty($feature['heading']))
                            <h5 class="card-title">{{ $feature['heading'] }}</h5>
                            @endif

                            @if(isset($feature['text']) && !empty($feature['text']))
                            <p class="card-text">{{ $feature['text'] }}</p>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                <div class="col-12">
                    <p>No features defined for this section: {{ $featuresSection->page_title }}</p>
                </div>
                @endif
                @endforeach
                @else
                <div class="col-12">
                    <p>No feature sections defined.</p>
                </div>
                @endif
            </div>
        </div>
    </section>

    @foreach($callToActionClientsSections as $section)
    <!-- Call to Action (Large Blue Section) -->
    <section id="cta" class="py-5" style="background-color: #007bff; /* Example Blue Color */">
        <div class="container" style="color: white;">
            <div class="text-center cta-content"> <!-- Added cta-content for styling -->
                <h2 style="color: white;">{{ $section->cta_headline ?? 'Default Headline' }}</h2>
                <p>{{ $section->cta_description ?? 'Default Description' }}</p>
                <a href="{{ $section->cta_button_url ?? '#' }}" class="btn btn-outline-light btn-lg rounded-pill">{{ $section->cta_button_text ?? 'Call To Action' }}</a>
            </div>
        </div>
    </section>

    <!-- Company Logos Carousel -->
    <section id="company-logos" class="py-3 bg-white">
        <div class="container">
            <div id="logoCarousel_{{ $section->id }}" class="carousel slide" data-ride="carousel"> <!-- Unique ID for each carousel -->
                <div class="carousel-inner">
                    @if($section->clientLogos) <!-- Check if clientLogos exist -->
                    @foreach(collect($section->clientLogos)->chunk(5) as $key => $logoGroup)
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                        <div class="logo-group">
                            @foreach ($logoGroup as $logo)
                            @if (isset($logo['logo']) && $logo['logo'])
                            <img src="{{ asset('storage/' . $logo['logo']) }}" alt="Client Logo" class="img-fluid">
                            @endif
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                    @else
                    <div class="carousel-item active">
                        <p>No client logos available for this section.</p>
                    </div>
                    @endif
                </div>
                <a class="carousel-control-prev" href="#logoCarousel_{{ $section->id }}" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#logoCarousel_{{ $section->id }}" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </section>
    @endforeach
   <!-- Testimonials Section -->
<section id="testimonials" class="py-5">
    <div class="container">
        <div class="text-center">
            <h2>Testimonials</h2>
            <div style="width: 50px; height: 3px; background-color: #3498db; margin: 0.5rem auto;"></div>
            <p class="text-muted">Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit.</p>
        </div>
        <div class="row">
            @forelse ($testimonialsStatisticsSections as $testimonialSection)
                @if ($testimonialSection->testimonials)
                    @foreach ($testimonialSection->testimonials as $testimonial)
                        <div class="col-md-6 mb-4">
                            <div class="card">
                                @if ($testimonial['image'])
                                    <img src="{{ asset('storage/' . $testimonial['image']) }}" class="card-img-top" alt="{{ $testimonial['testimonial_title'] ?? 'Testimonial Image' }}" style="max-height: 150px; object-fit: cover;">
                                @else
                                    <img src="https://placehold.co/75x75" class="card-img-top" alt="Placeholder Image">
                                @endif

                                <div class="card-body">
                                    <h5 class="card-title">{{ $testimonial['testimonial_title'] ?? 'No Title' }}</h5>
                                    <p class="card-text">{{ $testimonial['position'] ?? 'Ceo & Founder' }}</p> <!-- Added position field -->
                                    <div class="star-rating">
                                        @for ($i = 0; $i < ($testimonial['star_rating'] ?? 5); $i++)
                                            <i class="fa fa-star"></i>
                                        @endfor
                                        @for ($i = 0; $i < (5 - ($testimonial['star_rating'] ?? 5)); $i++)
                                            <i class="fa fa-star-o"></i> <!-- Or a different empty star icon -->
                                        @endfor
                                    </div>
                                    <p>{{ $testimonial['paragraph'] ?? 'No content available.' }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            @empty
                <div class="col-12">
                    <p class="text-center">No testimonial sections available.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>
   <!-- Stats/Counters Section -->
<section id="stats" class="py-5 bg-light">
    <div class="container">
        <div class="row text-center">
            @if ($testimonialsStatisticsSections->isNotEmpty())
                @foreach ($testimonialsStatisticsSections as $testimonialSection)
                    @if ($testimonialSection->statistics)
                        @foreach ($testimonialSection->statistics as $statistic)
                            <div class="col-md-3">
                                <span class="display-4" style="color: black;">{{ $statistic['statistic_number'] ?? '0' }}</span>
                                <div style="width: 50px; height: 3px; background-color: #3498db; margin: 0.5rem auto;"></div>
                                <p>{{ $statistic['statistic_text'] ?? 'Statistic' }}</p>
                            </div>
                        @endforeach
                    @else
                        <div class="col-12">
                            <p class="text-center">No statistics available for this section.</p>
                        </div>
                    @endif
                @endforeach
            @else
                <div class="col-12">
                    <p class="text-center">No testimonial/statistic sections available.</p>
                </div>
            @endif
        </div>
    </div>
</section>
  <!-- Pricing Plans -->
<section id="pricing" class="py-5 bg-light">
    <div class="container">
        <div class="text-center">
            <h2>{{ $pricingSections->first()->pricing_title ?? 'Pricing' }}</h2>
            <div style="width: 50px; height: 3px; background-color: #3498db; margin: 0.5rem auto;"></div>
            <p class="text-muted" style="padding-bottom: 20px;">
                {{ $pricingSections->first()->pricing_subtext ?? 'Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit.' }}
            </p>
        </div>
        <div class="row justify-content-center">

            @foreach($pricingSections->first()->pricing_plans ?? [] as $plan)
                <div class="col-md-4">
                    <div class="card" style="padding:20px; @if($loop->index === 1) background-color: #0d83fd; color: white; @endif">
                        @if($loop->index === 1)
                            <span class="badge badge-light" style="position: absolute; top: -10px; right: 50%; transform: translateX(50%); padding:10px; border-radius:10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);">Most Popular</span>
                        @endif
                        <div class="card-body">
                            <h2 class="card-title" style="@if($loop->index === 1) color: white; @endif">{{ $plan['plan_heading'] }}</h2>
                            <p class="card-text price" style="@if($loop->index === 1) color: white; @endif">${{ $plan['plan_amount'] }}<small>/month</small></p>
                            <p class="card-text">{{ $plan['plan_paragraph'] }}</p>
                            <b>Featured Included:</b>
                            <ul style="list-style: none;">
                                @foreach($plan['plan_features'] ?? [] as $feature)
                                    <li><i class="{{ $feature['feature_icon'] ?? 'fa fa-check-circle' }} @if($loop->parent->index === 1) text-light @else text-primary @endif"></i> {{ $feature['feature_text'] }}</li>
                                @endforeach
                            </ul>
                            <a href="{{ $plan['plan_button_url'] ?? '#' }}" class="btn @if($loop->index === 1) btn-light @else btn-primary @endif">{{ $plan['plan_button_text'] ?? 'Buy Now' }} <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
 <!-- FAQ Section -->
<section id="faq" class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>{{ $faqs->first()->faq_section_heading ?? 'Have a question? Check out the FAQ' }}</h2>
                <p class="text-muted">{{ $faqs->first()->faq_short_description ?? 'Manomium tempus tellus eget condimentum rhoncus sem quam semper libero sit amet adipiscing sem neque sod ipsum.' }}</p>
            </div>
            <div class="col-md-6">
                <div class="accordion" id="faqAccordion">
                    @foreach ($faqs as $faq)
                        @foreach ($faq->faq_accordion as $key => $accordionItem)
                            <div class="card">
                                <div class="card-header" id="heading{{ $key }}" style="background-color: white;">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-left {{ $key === 0 ? '' : 'collapsed' }}" type="button" data-toggle="collapse" data-target="#collapse{{ $key }}" aria-expanded="{{ $key === 0 ? 'true' : 'false' }}" aria-controls="collapse{{ $key }}">
                                            {{ $accordionItem['question_title'] }}
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapse{{ $key }}" class="collapse {{ $key === 0 ? 'show' : '' }}" aria-labelledby="heading{{ $key }}" data-parent="#faqAccordion" style="background-color: white;">
                                    <div class="card-body">
                                        {{ $accordionItem['answer_text'] }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Call to Action (Bottom) -->
<section id="cta-bottom" class="py-5" style="background-color:#1A98F2;color:white;">
    <div class="container text-center" style="padding:60px;">
        <h2 style="color: white;">{{ $faq->faq_cta_button_text ? 'Call To Action' : '' }}</h2>
        <p>{{ $faq->faq_cta_short_description ?? 'Dam dolore ir representarit in voluptate cum dolore cula qualogo qui cula offies deserunts molliti anim id est laborum.' }}</p>
        @if($faq->faq_cta_button_text && $faq->faq_cta_button_url)
            <a href="{{ $faq->faq_cta_button_url }}" class="btn btn-outline-light btn-lg rounded-pill">{{ $faq->faq_cta_button_text }}</a>
        @endif
    </div>
</section>

<!-- Contact Section -->
<section id="contact" class="py-5">
    <div class="container">

        @foreach($contactSections as $contactSection)
            <div class="text-center">
                <h2>{{ $contactSection->contact_title ?? 'Contact' }}</h2>
                <div style="width: 50px; height: 3px; background-color: #3498db; margin: 0.5rem auto;"></div>
                <p class="text-muted">{{ $contactSection->contact_subtitle ?? 'Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit.' }}</p>
            </div>
            <div class="row">
                <div class="col-md-4 contact-info" style="background-color:#1A98F2;color:white; padding:40px; border-radius:20px;">
                    <h3 style="color: white;">{{ $contactSection->contact_sidebar_title ?? 'Contact Info' }}</h3>
                    <p>{{ $contactSection->contact_paragraph ?? 'Prassent sacies massia cousulls o pellentesque ness, egestas non essi. Vestibulum ante ipsum perilis.' }}</p>

                    @if($contactSection->contact_features)
                        @foreach($contactSection->contact_features as $feature)
                            @if(isset($feature['icon']) && isset($feature['heading']) && isset($feature['description']))
                                <p>
                                    <i class="{{ $feature['icon'] }}"></i>
                                    <strong>{{ $feature['heading'] }}</strong> <br>
                                    {{ $feature['description'] }}
                                </p>
                            @endif
                        @endforeach
                    @endif

                </div>
                <div class="col-md-1"></div>
                <div class="col-md-7" style=" border-radius:10px; padding:40px; background-color:white;">
                    <h3>Get In Touch</h3>
                    <form id="contactForm">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" id="name" placeholder="Your Name">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="email" class="form-control" id="email" placeholder="Your Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="subject" placeholder="Subject">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" id="message" rows="5" placeholder="Message"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Send Message</button>
                    </form>
                </div>
            </div>
         @endforeach <!-- End the loop -->
    </div>
</section>
    <!-- Footer -->
    <footer class="py-5 bg-white">
        <div class="container">
            <div class="row">
                <!-- Left Footer - iLanding details -->
                <div class="col-md-3">
                    <h5 class="footer-text" style="padding-bottom:10px;">iLanding</h5>
                    <p class="footer-text">A108 Adam Street <br>New York, NY 535022</p>
                    <p class="footer-text">Phone: +1 5555 98488 55 <br>Email: info@example.com</p>

                    <a href="#" class="text-black mr-2"><i class="fab fa-facebook-square fa-2x"></i></a>
                    <a href="#" class="text-black mr-2"><i class="fab fa-twitter-square fa-2x"></i></a>
                    <a href="#" class="text-black mr-2"><i class="fab fa-linkedin fa-2x"></i></a>
                    <a href="#" class="text-black mr-2"><i class="fab fa-instagram fa-2x"></i></a>
                </div>

                <!-- Middle Left Footer - Useful Links -->
                <div class="col-md-3">
                    <h5 class="footer-text" style="padding-bottom:10px;">Useful Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" style="color:black;">Home</a></li>
                        <li><a href="#" style="color:black;">About Us</a></li>
                        <li><a href="#" style="color:black;">Services</a></li>
                        <li><a href="#" style="color:black;">Terms of Service</a></li>
                        <li><a href="#" style="color:black;">Privacy Policy</a></li>
                    </ul>
                </div>

                <!-- Middle Right Footer - Our Services -->
                <div class="col-md-3">
                    <h5 class="footer-text" style="padding-bottom:10px;">Our Services</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" style="color:black;">Web Design</a></li>
                        <li><a href="#" style="color:black;">Web Development</a></li>
                        <li><a href="#" style="color:black;">Product Management</a></li>
                        <li><a href="#" style="color:black;">Marketing</a></li>
                        <li><a href="#" style="color:black;">Graphic Design</a></li>
                    </ul>
                </div>

                <!-- Right Footer - Other Stuff-->
                <div class="col-md-3">
                    <h5 class="footer-text" style="padding-bottom:10px;">His scelerisque</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" style="color:black;">Modestiar accusamus lasm</a></li>
                        <li><a href="#" style="color:black;">Exceputri dignisimus</a></li>
                        <li><a href="#" style="color:black;">Directa</a></li>
                        <li><a href="#" style="color:black;">35 quain consectetr</a></li>
                    </ul>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 text-center mt-3">
                    <p class="footer-text">© Copyright <b>iLanding</b>. All Rights Reserved</p>
                    <p class="footer-text">Composed by Danielz Hove</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#contactForm").submit(function(event) {
                // Prevent the form from submitting normally
                event.preventDefault();

                // Basic form validation (you can expand this)
                var name = $("#name").val();
                var email = $("#email").val();
                var message = $("#message").val();

                if (name === "" || email === "" || message === "") {
                    alert("Please fill in all fields.");
                    return;
                }

                // You would typically use AJAX here to submit the form to a server
                // For demonstration, we'll just show an alert
                alert("Form submitted (but not really sent)!");
            });
        });
    </script>
    <!-- JavaScript to handle tab switching -->
</body>

</html>