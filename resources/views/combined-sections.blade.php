<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iLanding - Awesome Landing Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <!--Hero Section-->
<section id="hero" class="py-5" style="background-image: url('{{ $heroSections->count() > 0 && $heroSections->first()->hero_background_image ? Storage::url($heroSections->first()->hero_background_image) : 'https://placehold.co/1920x1080' }}'); background-size: cover; background-position: center; padding-bottom: 100px;">
    <!-- Header/Navigation Bar Moved Inside -->
    <header style="position: absolute; top: 0; left: 0; width: 100%; z-index: 1000; margin-top:10px;">
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
                            <li class="nav-item">
                                <a class="nav-link" href="#pricing">Pricing</a>
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
        </header>
        <div class="container" style="margin-top: 90px;">
            @if ($heroSections->count() > 0)
            <div class="row">
                <div class="col-md-6" style="background-color: rgba(255, 255, 255, 0.8); padding: 20px;">
                    <small style="background-color: #e1eefe; color: #007bff; padding: 5px 10px; border-radius: 10px;">
                        <i class="fa {{ $heroSections->first()->hero_subtitle_icon ?: 'fa-gear fa-spin' }}"></i> {{ $heroSections->first()->hero_subtitle }}
                    </small>
                    <h1>{{ $heroSections->first()->hero_title }}</h1>
                    <h2>{{ $heroSections->first()->page_title }}</h2>
                    <p>{{ $heroSections->first()->hero_description }}</p>
                    <a href="{{ $heroSections->first()->hero_button_url }}" class="btn btn-primary">{{ $heroSections->first()->hero_button_text }}</a>
                    @if($heroSections->first()->hero_video_url)
                        <a href="{{ $heroSections->first()->hero_video_url }}" class="btn btn-secondary">
                            <i class="fa fa-play-circle" aria-hidden="true"></i> Play Video
                        </a>
                    @endif
                </div>
                <div class="col-md-6">
                    <img src="{{ $heroSections->count() > 0 && $heroSections->first()->hero_foreground_image ? Storage::url($heroSections->first()->hero_foreground_image) : 'https://placehold.co/600x400' }}" alt="Hero Image" class="img-fluid">
                </div>
            </div>
            <br>
            @if (is_array($heroSections->first()->hero_features) && count($heroSections->first()->hero_features) > 0)
            <div class="row text-center award-block">
                @foreach ($heroSections->first()->hero_features as $feature)
                <div class="col-md-3">
                    <div>
                        <i class="fa fa-trophy fa-2x mb-2 text-primary"></i>
                        <div><b>{{ $feature['title'] ?? 'Title Here' }}</b></div>
                        <small>{{ $feature['description'] ?? 'Description Here' }}</small>
                    </div>
                </div>
                @endforeach
            </div>
            @endif
            @else
            <p>No Hero Section Found.</p>
            @endif
        </div>
    </section>
    <!-- About Us Section -->
    <section id="about" class="py-5 bg-light">
        <div class="container">
            <small class="text-primary">MORE ABOUT US</small>
            <div class="row">
                <div class="col-md-6">
                    <h2>Voluptas enim suscipit temporibus</h2>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                    <ul style="list-style: none;">
                        <div class="row">
                            <div class="col-md-6">
                                <li><i class="fa fa-check text-primary"></i> Lorem ipsum dolor sit amet</li>
                                <li><i class="fa fa-check text-primary"></i> Consectetur adipiscing elit</li>
                                <li><i class="fa fa-check text-primary"></i> Sed do eiusmod tempor</li>
                            </div>
                            <div class="col-md-6">
                                <li><i class="fa fa-check text-primary"></i> Valid incididunt ut labore et</li>
                                <li><i class="fa fa-check text-primary"></i> Dolore magna aliqua</li>
                                <li><i class="fa fa-check text-primary"></i> Ut enim ad minim veniam</li>
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
                        <img src="https://placehold.co/600x400" alt="Team Image" class="img-fluid">
                        <div class="experience-badge">
                            15+ Years
                            <br>
                            Of experience in business service
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section with Tabs -->
    <section id="features" class="py-5">
        <div class="container">
            <div class="text-center"> <!-- Added text-center here -->
                <h2>Features</h2>
                <div style="width: 50px; height: 3px; background-color: #3498db; margin: 0.5rem auto;"></div> <!-- Added line -->
                <p class="text-muted">Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit.</p>
            </div>
            <ul class="nav nav-pills justify-content-center bg-light rounded flex-wrap" id="myTab" role="tablist" style="padding: 5px;">
                <li class="nav-item">
                    <a class="nav-link active" id="media-tab" data-toggle="tab" href="#media" role="tab" aria-controls="media"
                        aria-selected="true">Media</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="process-tab" data-toggle="tab" href="#process" role="tab" aria-controls="process"
                        aria-selected="false">Process</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="explores-tab" data-toggle="tab" href="#explores" role="tab" aria-controls="explores"
                        aria-selected="false">Explores</a>
                </li>
            </ul>
            <div class="tab-content mt-4" id="myTabContent">
                <div class="tab-pane fade show active" id="media" role="tabpanel" aria-labelledby="media-tab">
                    <div class="row">
                        <div class="col-md-6">
                            <h3>Voluptatem dignissimos provident</h3>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                            <ul style="list-style: none;">
                                <li><i class="fa fa-check text-success"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                                <li><i class="fa fa-check text-success"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
                                <li><i class="fa fa-check text-success"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                                <li><i class="fa fa-check text-success"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <img src="https://placehold.co/600x400/ADD8E6/000000" alt="Media Image" class="img-fluid">
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="process" role="tabpanel" aria-labelledby="process-tab">
                    <p>Content for the Process tab goes here. Add your process-related information and images.</p>
                </div>

                <div class="tab-pane fade" id="explores" role="tabpanel" aria-labelledby="explores-tab">
                    <p>Content for the Explores tab goes here. Add your exploration-related information and images.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Key Features (Four Colored Boxes) -->
    <section id="key-features" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-3 mb-4">
                    <div class="card text-black h-100" style="background-color: #fff4e2;">
                        <div class="card-body text-center">
                            <i class="fa fa-lightbulb fa-3x mb-2"></i>
                            <h5 class="card-title">Corporis voluptatibus</h5>
                            <p class="card-text">Aut rerum necessitatibus saepe.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-4">
                    <div class="card text-black h-100" style="background-color: #deedfe;">
                        <div class="card-body text-center">
                            <i class="fa fa-check-circle fa-3x mb-2"></i>
                            <h5 class="card-title">Explicabo consectetur</h5>
                            <p class="card-text">Est dicta illo at aut reiciendis excepturi. Sed.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-4">
                    <div class="card text-black h-100" style="background-color: #d5f1e5;">
                        <div class="card-body text-center">
                            <i class="fa fa-tree fa-3x mb-2"></i>
                            <h5 class="card-title">Utiamco laboria</h5>
                            <p class="card-text">Excepteur sint occaecat cupidatat.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-4">
                    <div class="card text-black h-100" style="background-color: #fdefed;">
                        <div class="card-body text-center">
                            <i class="fa fa-shield-alt fa-3x mb-2"></i>
                            <h5 class="card-title">Labore consequatur</h5>
                            <p class="card-text">Aut omnis dolores. Dolores similique facilis.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action (Large Blue Section) -->
    <section id="cta" class="py-5">
        <div class="container" style="color: white;">
            <div class="text-center cta-content"> <!-- Added cta-content for styling -->
                <h2 style="color: white;">Maecenas tempus tellus eget condimentum</h2>
                <p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel.</p>
                <a href="#" class="btn btn-outline-light btn-lg rounded-pill">Call To Action</a>
            </div>
        </div>
    </section>

    <!-- Company Logos Carousel -->
    <section id="company-logos" class="py-3 bg-white">
        <div class="container">
            <div id="logoCarousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="logo-group">
                            <img src="https://placehold.co/100x50" alt="Logo 1" class="img-fluid">
                            <img src="https://placehold.co/100x50" alt="Logo 2" class="img-fluid">
                            <img src="https://placehold.co/100x50" alt="Logo 3" class="img-fluid">
                            <img src="https://placehold.co/100x50" alt="Logo 4" class="img-fluid">
                            <img src="https://placehold.co/100x50" alt="Logo 5" class="img-fluid">
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="logo-group">
                            <img src="https://placehold.co/100x50" alt="Logo 6" class="img-fluid">
                            <img src="https://placehold.co/100x50" alt="Logo 7" class="img-fluid">
                            <img src="https://placehold.co/100x50" alt="Logo 8" class="img-fluid">
                            <img src="https://placehold.co/100x50" alt="Logo 9" class="img-fluid">
                            <img src="https://placehold.co/100x50" alt="Logo 10" class="img-fluid">
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#logoCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#logoCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonials" class="py-5">
        <div class="container">
            <div class="text-center"> <!-- Added text-center here -->
                <h2>Testimonials</h2>
                <div style="width: 50px; height: 3px; background-color: #3498db; margin: 0.5rem auto;"></div> <!-- Added line -->
                <p class="text-muted">Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit.</p>
            </div>
            <div class="row">
                <div class="col-md-6 mb-4"> <!-- Added mb-4 here -->
                    <div class="card">
                        <img src="https://placehold.co/75x75" class="card-img-top" alt="Testimonial 1">
                        <div class="card-body">
                            <h5 class="card-title">Saul Goodman</h5>
                            <p class="card-text">Ceo & Founder</p>
                            <div class="star-rating">
                                <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                            </div>
                            <p>Praesent iaculis parasol consequat sem cursus eget. Accumsan cous quenci slicies egestas diam. Aliquam eget nib et.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4"> <!-- Added mb-4 here -->
                    <div class="card">
                        <img src="https://placehold.co/75x75" class="card-img-top" alt="Testimonial 2">
                        <div class="card-body">
                            <h5 class="card-title">Sara wilson</h5>
                            <p class="card-text">Designer</p>
                            <div class="star-rating">
                                <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                            </div>
                            <p>Exsport fugiat lorem ipsum mattis crasis mattis crasis quae eram nolae dolor quenci cillum quidi eram molis quenum quam lore eram velit simi aliqua nesciunt.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-4"> <!-- Added mb-4 here -->
                    <div class="card">
                        <img src="https://placehold.co/75x75" class="card-img-top" alt="Testimonial 2">
                        <div class="card-body">
                            <h5 class="card-title">Jone Kerlis</h5>
                            <p class="card-text">Mare Danler</p>
                            <div class="star-rating">
                                <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                            </div>
                            <p>Iours quidi iours querit export clabo dolore laborare culture quena magna aliqua quous quta forem quin seds quis nesciunt culture.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4"> <!-- Added mb-4 here -->
                    <div class="card">
                        <img src="https://placehold.co/75x75" class="card-img-top" alt="Testimonial 2">
                        <div class="card-body">
                            <h5 class="card-title">Matt Brandon</h5>
                            <p class="card-text">Invester</p>
                            <div class="star-rating">
                                <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                            </div>
                            <p>Fugiat wisim eram quase culture dolore dolor culture quasi culture dolore dolorum larem quin lore quem quta wisim culture sunt quiba.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats/Counters Section -->
    <section id="stats" class="py-5 bg-light">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-3">
                    <span class="display-4" style="color: black;">232</span>
                    <div style="width: 50px; height: 3px; background-color: #3498db; margin: 0.5rem auto;"></div> <!-- Added line -->
                    <p>Clients</p>
                </div>
                <div class="col-md-3">
                    <span class="display-4" style="color: black;">521</span>
                    <div style="width: 50px; height: 3px; background-color: #3498db; margin: 0.5rem auto;"></div> <!-- Added line -->
                    <p>Projects</p>
                </div>
                <div class="col-md-3">
                    <span class="display-4" style="color: black;">1453</span>
                    <div style="width: 50px; height: 3px; background-color: #3498db; margin: 0.5rem auto;"></div> <!-- Added line -->
                    <p>Hours of Support</p>
                </div>
                <div class="col-md-3">
                    <span class="display-4" style="color: black;">32</span>
                    <div style="width: 50px; height: 3px; background-color: #3498db; margin: 0.5rem auto;"></div> <!-- Added line -->
                    <p>Workers</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Services Section -->
    <section id="services" class="py-5">
        <div class="container">
            <div class="text-center"> <!-- Added text-center here -->
                <h2>Services</h2>
                <div style="width: 50px; height: 3px; background-color: #3498db; margin: 0.5rem auto;"></div> <!-- Added line -->
                <p class="text-muted" style="padding-bottom: 20px;">Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit.</p>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="service-box d-flex align-items-center">
                        <div class="icon-box">
                            <i class="fa fa-line-chart fa-3x text-primary"></i>
                        </div>
                        <div>
                            <h2>Nescunt mete</h2>
                            <p>Provident nihil nisi qui consequatur non omnis maiores. Eos animi assumuam lore minis tempore quis perferendis tempore et consequatur.</p>
                            <a href="#">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="service-box d-flex align-items-center">
                        <div class="icon-box">
                            <i class="fa fa-share-alt fa-3x text-primary"></i>
                        </div>
                        <div>
                            <h2>Eosle Commodi</h2>
                            <p>Ut autem aute num a. Sinti sit facilis num tam libero. Libero quispil neque eum his non lore nesciunt culture.</p>
                            <a href="#">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="service-box d-flex align-items-center">
                        <div class="icon-box">
                            <i class="fa fa-shopping-cart fa-3x text-primary"></i>
                        </div>
                        <div>
                            <h2>Ledo markt</h2>
                            <p>Ut excepturi voluptatem lore sedi. Quiden fuga consequuntur minus aliquid exiqui rot quia quidlores consequat minus</p>
                            <a href="#">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="service-box d-flex align-items-center">
                        <div class="icon-box">
                            <i class="fa fa-bar-chart fa-3x text-primary"></i>
                        </div>
                        <div>
                            <h2>Asperiores Commodt</h2>
                            <p>Non et tempus ilios minus abore essi lore consequatur. Cupiditate sed error eus fugiat sit provident adiposi neque.</p>
                            <a href="#">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Pricing Plans -->
    <section id="pricing" class="py-5 bg-light">
        <div class="container">
            <div class="text-center">
                <h2>Pricing</h2>
                <div style="width: 50px; height: 3px; background-color: #3498db; margin: 0.5rem auto;"></div>
                <p class="text-muted" style="padding-bottom: 20px;">Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit.</p>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card" style="padding:20px;">
                        <div class="card-body">
                            <h2 class="card-title">Basic Plan</h2>
                            <p class="card-text price">$9.9<small>/month</small></p>
                            <p class="card-text">Sedi uti perspiciatis unde omnis ite natis error sit voluptatem lausantium doloremque deliciosa.</p>
                            <b>Featured Included:</b>
                            <ul style="list-style: none;">
                                <li><i class="fa fa-check-circle text-primary"></i> Duis aute irure dolor</li>
                                <li><i class="fa fa-check-circle text-primary"></i> Excepteur sint occaecat</li>
                                <li><i class="fa fa-check-circle text-primary"></i> Nemo enim ipsam voluptatem</li>
                            </ul>
                            <a href="#" class="btn btn-primary">Buy Now <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card" style="background-color: #0d83fd; color: white; padding:20px">
                        <span class="badge badge-light" style="position: absolute; top: -10px; right: 50%; transform: translateX(50%); padding:10px; border-radius:10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);">Most Popular</span>
                        <div class="card-body">
                            <h2 class="card-title" style="color: white;">Standard Plan</h2>
                            <p class="card-text price" style="color: white;">$19.9<small>/month</small></p>
                            <p class="card-text">At vero eos et accusamus eti iusto odio dignissimuss dolorous qui menditi presentatio voluptatum.</p>
                            <b>Featured Included:</b>
                            <ul style="list-style: none;">
                                <li><i class="fa fa-check-circle text-light"></i> Lorem ipsum dolor sit amet</li>
                                <li><i class="fa fa-check-circle text-light"></i> Consectetur adipiscing elit</li>
                                <li><i class="fa fa-check-circle text-light"></i> Sed do eiusmod tempor</li>
                                <li><i class="fa fa-check-circle text-light"></i> Ut labore in dolore magna</li>
                            </ul>
                            <a href="#" class="btn btn-light">Buy Now <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title">Premium Plan</h2>
                            <p class="card-text price">$39.9<small>/month</small></p>
                            <p class="card-text">Quis autum lore reprehenderit queni in eus voluptate velit esse quem nuilia resistent consequat.</p>
                            <b>Featured Included:</b>
                            <ul style="list-style: none;">
                                <li><i class="fa fa-check-circle text-primary"></i> Temporibus autem set</li>
                                <li><i class="fa fa-check-circle text-primary"></i> Saequi evenite et et volupta</li>
                                <li><i class="fa fa-check-circle text-primary"></i> Nam libero tempore solita</li>
                                <li><i class="fa fa-check-circle text-primary"></i> Cumsque nihil impedit oso</li>
                                <li><i class="fa fa-check-circle text-primary"></i> Maximus piacere facime passieren</li>
                            </ul>
                            <a href="#" class="btn btn-primary">Buy Now <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- FAQ Section -->
    <section id="faq" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2>Have a question? Check out the FAQ</h2>
                    <p class="text-muted">Manomium tempus tellus eget condimentum rhoncus sem quam semper libero sit amet adipiscing sem neque sod ipsum.</p>
                </div>
                <div class="col-md-6">
                    <div class="accordion" id="faqAccordion">
                        <div class="card">
                            <div class="card-header" id="headingOne" style="background-color: white;">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Non venustatiati atiati at lorem simis duno?
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#faqAccordion" style="background-color: white;">
                                <div class="card-body">
                                    Feugiat proetum simis ipsum consquent. Tempest iaculis urna liti et volutpat lacus lorenes non cuturbita gravida. Viverralitis lesics magna fringilla urna porttitor rhoncus dolor paris nim.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingTwo" style="background-color: white;">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Feugiat scelerisque varios mortibiti eninis susc faucibus?
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#faqAccordion">
                                <div class="card-body">
                                    Contact us through the contact form or call us directly.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingThree" style="background-color: white;">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        Dolor sit amet consectetur adiposcing eliti pelimesoso?
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#faqAccordion">
                                <div class="card-body">
                                    Contact us through the contact form or call us directly
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingFour" style="background-color: white;">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                        Au alia tempore adipi dilapidus eliquidi eliferendi inita in nulla?
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#faqAccordion">
                                <div class="card-body">
                                    Contact us through the contact form or call us directly.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action (Bottom) -->
    <section id="cta-bottom" class="py-5" style="background-color:#1A98F2;color:white;">
        <div class="container text-center" style="padding:60px;">
            <h2 style="color: white;">Call To Action</h2>
            <p>Dam dolore ir representarit in voluptate cum dolore cula qualogo qui cula offies deserunts molliti anim id est laborum.</p>
            <a href="#" class="btn btn-outline-light btn-lg rounded-pill">Call To Action</a>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-5">
        <div class="container">
            <div class="text-center"> <!-- Added text-center here -->
                <h2>Contact</h2>
                <div style="width: 50px; height: 3px; background-color: #3498db; margin: 0.5rem auto;"></div> <!-- Added line -->
                <p class="text-muted">Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit.</p>
            </div>
            <div class="row">
                <div class="col-md-4 contact-info" style="background-color:#1A98F2;color:white; padding:40px; border-radius:20px;">
                    <h3 style="color: white;">Contact Info</h3>
                    <p>Prassent sacies massia cousulls o pellentesque ness, egestas non essi. Vestibulum ante ipsum perilis.</p>
                    <p><i class="fa fa-map-marker"></i> Our Location <br> A108 Adam Street New York, NY 535022</p>
                    <p><i class="fa fa-phone"></i> Phone Number <br> +1 5555 98488 55</p>
                    <p><i class="fa fa-envelope"></i> Email Address <br> info@example.com contact@example.com</p>
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
</body>

</html>