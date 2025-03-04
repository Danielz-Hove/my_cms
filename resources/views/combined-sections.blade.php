<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iLanding - Awesome Landing Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* General Styles */
        body {
            font-family: 'Arial', sans-serif;
            color: #333;
            line-height: 1.6;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-weight: bold;
            color: #2c3e50;
        }

        a {
            color: #3498db;
            text-decoration: none;
        }

        a:hover {
            color: #2980b9;
        }

        /* Navigation Bar */
        .navbar {
            padding: 1rem 0;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        .navbar-brand {
            font-size: 1.75rem;
            font-weight: 700;
            color: #3498db !important;
        }

        .navbar-light .navbar-nav .nav-link {
            color: #555;
            margin-left: 1rem;
        }

        .navbar-light .navbar-nav .nav-link:hover,
        .navbar-light .navbar-nav .nav-link:focus {
            color: #3498db;
        }

        .btn-primary {
            background-color: #3498db;
            border-color: #3498db;
            color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.15);
            transition: background-color 0.2s ease;
        }

        .btn-primary:hover,
        .btn-primary:focus {
            background-color: #2980b9;
            border-color: #2980b9;
        }

        /* Hero Section */
        #hero {
            padding: 7rem 0;
            background-color: #f9f9f9;
        }

        #hero h1 {
            font-size: 3.5rem;
            margin-bottom: 1.5rem;
            line-height: 1.2;
        }

        #hero p {
            font-size: 1.2rem;
            color: #777;
        }

        /* Features Section */
        #features {
            padding: 5rem 0;
        }

        #features .nav-tabs .nav-link {
            border: none;
            color: #777;
            padding: 0.75rem 1.5rem;
            transition: color 0.2s ease;
        }

        #features .nav-tabs .nav-link.active {
            color: #3498db;
            border-bottom: 2px solid #3498db;
        }

        #features .tab-content {
            margin-top: 2rem;
        }

        /* Key Features */
        #key-features .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.08);
            transition: transform 0.2s ease;
        }

        #key-features .card:hover {
            transform: translateY(-5px);
        }

        #key-features .card-body {
            padding: 2rem;
        }

        /* Call to Action */
        #cta {
            background-color: #3498db;
            color: #fff;
            padding: 5rem 0;
            text-align: center;
        }

        #cta h2 {
            font-size: 2.75rem;
        }

        /* Testimonials */
        #testimonials {
            padding: 5rem 0;
            background-color: #f9f9f9;
        }

        #testimonials .card {
            border: none;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.06);
            border-radius: 10px;
            padding-top: 20px;
        }

        #testimonials .card-body {
            text-align: left;
        }

        #testimonials .card-img-top {
            width: 75px;
            border-radius: 50%;
            margin: 0 auto 1rem;
        }

        #testimonials .star-rating i {
            color: #f39c12;
        }

        /* Stats Section */
        #stats {
            padding: 4rem 0;
        }

        #stats .display-4 {
            font-size: 3.5rem;
            color: #3498db;
        }

        /* Services Section */
        #services {
            padding: 5rem 0;
        }

        #services i {
            font-size: 3rem;
            color: #3498db;
            margin-bottom: 1rem;
        }

        #services a {
            font-weight: bold;
        }

        /* Pricing Section */
        #pricing {
            padding: 5rem 0;
            background-color: #f9f9f9;
        }

        #pricing .card {
            border: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.08);
            border-radius: 10px;
            transition: transform 0.2s ease-in-out;
        }

        #pricing .card:hover {
            transform: translateY(-5px);
        }

        #pricing .card-title {
            font-size: 1.75rem;
            font-weight: bold;
        }

        #pricing .card-text.price {
            font-size: 2rem;
            color: #3498db;
            font-weight: 700;
        }

        #pricing .badge-success {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: #2ecc71;
        }

        #pricing ul.list-unstyled li i {
            color: #2ecc71;
        }

        /* FAQ Section */
        #faq {
            padding: 5rem 0;
        }

        #faq .card {
            border: 1px solid #eee;
            border-radius: 8px;
            margin-bottom: 1rem;
        }

        #faq .card-header button {
            color: #333;
            text-decoration: none;
            display: block;
            width: 100%;
            text-align: left;
            padding: 1rem;
            font-weight: 500;
        }

        #faq .card-header button:hover {
            color: #3498db;
        }

        /* Footer */
        footer {
            background-color: #2c3e50;
            color: #fff;
            padding: 3rem 0;
        }

        footer a {
            color: #fff;
        }

        footer a:hover {
            color: #3498db;
        }

        .award-block {
            border: 1px solid #ddd;
            /* Light grey border */
            border-radius: 10px;
            /* Rounded corners */
            padding: 15px;
            /* Add some padding around the content */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
            /* Subtle shadow */
            background-color: #fff;
            /*  background */
        }

        /*New CSS for about */
        .about-image-container {
            position: relative;
            /* Make this the positioning context */
        }

        .about-image-container img {
            border-radius: 10px;
            /*Optional, matches the screenshots */
        }

        .experience-badge {
            position: absolute;
            bottom: 10px;
            right: 10px;
            background-color: #3498db;
            /* Match the blue color */
            color: white;
            padding: 10px 15px;
            border-radius: 8px;
            font-weight: bold;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            /* Add a shadow for depth */
            text-align: center;
        }

        /* CTA Section Styling */
        #cta {
            background-color: #1A98F2;
            /* Replace with the blue from the image */
            color: white;
        }

        #cta .cta-content {
            padding: 30px;
            /* Add some padding around the text */
            padding: 30px;
            /* Add some padding around the text */
            border-radius: 15px;
            /* Add the border radius */
        }

        #cta h2 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        #cta p {
            font-size: 1.2rem;
        }

        /* Company Logos Carousel Styling */
        #company-logos {
            /* Optional: Add any specific styling for the background, etc. */
        }

        #company-logos .carousel-inner {
            /* Optional: Adjust the height or other properties of the carousel */
        }

        #company-logos .logo-group {
            display: flex;
            /* Use flexbox for horizontal layout */
            justify-content: space-around;
            /* Distribute logos evenly */
            align-items: center;
            /* Vertically align logos */
            padding: 15px;
            /* Add padding around the logos */
        }

        #company-logos img {
            max-width: 100px;
            /* Adjust logo size */
            max-height: 50px;
            opacity: 0.6;
            /* Adjust logo transparency */
            transition: opacity 0.3s ease;
            /* Smooth transition */
        }

        #company-logos img:hover {
            opacity: 1;
        }

        /* Service Box Styling */
        .service-box {
            border: 1px solid #ddd;
            /* Light grey border */
            border-radius: 10px;
            /* Rounded corners */
            padding: 20px;
            /* Add padding inside the box */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
            /* Subtle shadow */
            margin-bottom: 20px;
            /* Add margin between service boxes */
        }
    </style>
</head>

<body>
    <!-- Header/Navigation Bar -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
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
                    <a href="#" class="btn btn-primary ml-3">Get Started</a>
                </div>
            </div>
        </nav>
    </header>
    <!--Hero Section-->
    <section id="hero" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <small>Working for your success</small>
                    <h1>Maecenas Vitae Consectetur Led</h1>
                    <h2>Vestibulum Ante</h2>
                    <p>Nullam quis ante. Etiam sit amet eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna.</p>
                    <a href="#" class="btn btn-primary">Get Started</a>
                    <a href="#" class="btn btn-secondary"> <i class="fa fa-play-circle" aria-hidden="true"></i> Play Video</a>
                </div>
                <div class="col-md-6">
                    <img src="https://placehold.co/600x400" alt="Hero Image" class="img-fluid">
                </div>
            </div>
            <br>
            <div class="row text-center award-block">
                <div class="col-md-3">
                    <div>
                        <i class="fa fa-trophy fa-2x mb-2 text-primary"></i>
                        <div><b>3x Won Awards</b></div>
                        <small>Vestibulum ante ipsum</small>
                    </div>
                </div>
                <div class="col-md-3">
                    <div>
                        <i class="fa fa-file fa-2x mb-2 text-primary"></i>
                        <div><b>6.5k Faucibus</b></div>
                        <small>Nullam quis ante</small>
                    </div>
                </div>
                <div class="col-md-3">
                    <div>
                        <i class="fa fa-users fa-2x mb-2 text-primary"></i>
                        <div><b>80k Mauris</b></div>
                        <small>Duis aute irure</small>
                    </div>
                </div>
                <div class="col-md-3">
                    <div>
                        <i class="fa fa-check-square fa-2x mb-2 text-primary"></i>
                        <div><b>6x Phasellus</b></div>
                        <small>Vestibulum ante ipsum</small>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Us Section -->
    <section id="about" class="py-5 bg-light">
        <div class="container">
            <small>MORE ABOUT US</small>
            <div class="row">
                <div class="col-md-6">
                    <h2>Voluptas enim suscipit temporibus</h2>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                    <ul>
                        <li><i class="fa fa-check text-primary"></i>Lorem ipsum dolor sit amet</li>
                        <li><i class="fa fa-check text-primary"></i>Consectetur adipiscing elit</li>
                        <li><i class="fa fa-check text-primary"></i>Sed do eiusmod tempor</li>
                        <li><i class="fa fa-check text-primary"></i>Valid incididunt ut labore et</li>
                        <li><i class="fa fa-check text-primary"></i>Dolore magna aliqua</li>
                        <li><i class="fa fa-check text-primary"></i>Ut enim ad minim veniam</li>
                    </ul>
                    <div class="row">
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
                <p class="text-muted">Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit.</p>
            </div>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="media-tab" data-toggle="tab" href="#media" role="tab" aria-controls="media" aria-selected="true">Media</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="process-tab" data-toggle="tab" href="#process" role="tab" aria-controls="process" aria-selected="false">Process</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="explores-tab" data-toggle="tab" href="#explores" role="tab" aria-controls="explores" aria-selected="false">Explores</a>
                </li>
            </ul>

            <div class="tab-content mt-4" id="myTabContent">
                <div class="tab-pane fade show active" id="media" role="tabpanel" aria-labelledby="media-tab">
                    <div class="row">
                        <div class="col-md-6">
                            <h3>Voluptatem dignissimos provident</h3>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                            <ul>
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
                    <div class="card bg-warning text-white h-100">
                        <div class="card-body text-center">
                            <i class="fa fa-lightbulb fa-3x mb-2"></i>
                            <h5 class="card-title">Corporis voluptatibus</h5>
                            <p class="card-text">Aut rerum necessitatibus saepe.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-4">
                    <div class="card bg-info text-white h-100">
                        <div class="card-body text-center">
                            <i class="fa fa-check-circle fa-3x mb-2"></i>
                            <h5 class="card-title">Explicabo consectetur</h5>
                            <p class="card-text">Est dicta illo at aut reiciendis excepturi. Sed.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-4">
                    <div class="card bg-success text-white h-100">
                        <div class="card-body text-center">
                            <i class="fa fa-tree fa-3x mb-2"></i>
                            <h5 class="card-title">Utiamco laboria</h5>
                            <p class="card-text">Excepteur sint occaecat cupidatat.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-4">
                    <div class="card bg-danger text-white h-100">
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
                <a href="#" class="btn btn-light btn-lg">Call To Action</a>
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
                    <span class="display-4">232</span>
                    <p>Clients</p>
                </div>
                <div class="col-md-3">
                    <span class="display-4">521</span>
                    <p>Projects</p>
                </div>
                <div class="col-md-3">
                    <span class="display-4">1453</span>
                    <p>Hours of Support</p>
                </div>
                <div class="col-md-3">
                    <span class="display-4">32</span>
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
                <p class="text-muted">Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit.</p>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="service-box">
                        <i class="fa fa-line-chart fa-3x text-primary mb-3"></i>
                        <h2>Nescunt mete</h2>
                        <p>Provident nihil nisi qui consequatur non omnis maiores. Eos animi assumuam lore minis tempore quis perferendis tempore et consequatur.</p>
                        <a href="#">Read More</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="service-box">
                        <i class="fa fa-share-alt fa-3x text-primary mb-3"></i>
                        <h2>Eosle Commodi</h2>
                        <p>Ut autem aute num a. Sinti sit facilis num tam libero. Libero quispil neque eum his non lore nesciunt culture.</p>
                        <a href="#">Read More</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="service-box">
                        <i class="fa fa-shopping-cart fa-3x text-primary mb-3"></i>
                        <h2>Ledo markt</h2>
                        <p>Ut excepturi voluptatem lore sedi. Quiden fuga consequuntur minus aliquid exiqui rot quia quidlores consequat minus</p>
                        <a href="#">Read More</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="service-box">
                        <i class="fa fa-bar-chart fa-3x text-primary mb-3"></i>
                        <h2>Asperiores Commodt</h2>
                        <p>Non et tempus ilios minus abore essi lore consequatur. Cupiditate sed error eus fugiat sit provident adiposi neque.</p>
                        <a href="#">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing Plans -->
    <section id="pricing" class="py-5 bg-light">
        <div class="container">
            <div class="text-center"> <!-- Added text-center here -->
                <h2>Pricing</h2>
                <p class="text-muted">Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit.</p>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title">Basic Plan</h2>
                            <p class="card-text price">$9.9<small>/month</small></p>
                            <p class="card-text">Sedi uti perspiciatis unde omnis ite natis error sit voluptatem lausantium doloremque deliciosa.</p>
                            <b>Featured Included:</b>
                            <ul>
                                <li><i class="fa fa-check text-success"></i>Duis aute irure dolor</li>
                                <li><i class="fa fa-check text-success"></i>Excepteur sint occaecat</li>
                                <li><i class="fa fa-check text-danger"></i>Nemo enim ipsam voluptatem</li>
                            </ul>
                            <a href="#" class="btn btn-primary">Buy Now <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <span class="badge badge-success">Most Popular</span>
                        <div class="card-body">
                            <h2 class="card-title">Standard Plan</h2>
                            <p class="card-text price">$19.9<small>/month</small></p>
                            <p class="card-text">At vero eos et accusamus eti iusto odio dignissimuss dolorous qui menditi presentatio voluptatum.</p>
                            <b>Featured Included:</b>
                            <ul>
                                <li><i class="fa fa-check text-success"></i>Lorem ipsum dolor sit amet</li>
                                <li><i class="fa fa-check text-success"></i>Consectetur adipiscing elit</li>
                                <li><i class="fa fa-check text-success"></i>Sed do eiusmod tempor</li>
                                <li><i class="fa fa-check text-success"></i>Ut labore in dolore magna</li>
                            </ul>
                            <a href="#" class="btn btn-primary">Buy Now <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
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
                            <ul>
                                <li><i class="fa fa-check text-success"></i>Temporibus autem set</li>
                                <li><i class="fa fa-check text-success"></i>Saequi evenite et et volupta</li>
                                <li><i class="fa fa-check text-success"></i>Nam libero tempore solita</li>
                                <li><i class="fa fa-check text-success"></i>Cumsque nihil impedit oso</li>
                                <li><i class="fa fa-check text-success"></i>Maximus piacere facime passieren</li>
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
                            <div class="card-header" id="headingOne">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Non venustatiati atiati at lorem simis duno?
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#faqAccordion">
                                <div class="card-body">
                                    Feugiat proetum simis ipsum consquent. Tempest iaculis urna liti et volutpat lacus lorenes non cuturbita gravida. Viverralitis lesics magna fringilla urna porttitor rhoncus dolor paris nim.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingTwo">
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
                            <div class="card-header" id="headingThree">
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
                            <div class="card-header" id="headingFour">
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
                        <div class="card">
                            <div class="card-header" id="headingFive">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                        Tempus quam pellentesque nem aliquam quem simi ett tortore?
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#faqAccordion">
                                <div class="card-body">
                                    Contact us through the contact form or call us directly.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingSix">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                        Perspiciati cuolo quo quod quata quoi illum utare?
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#faqAccordion">
                                <div class="card-body">
                                    Contact us through
                                    the contact form or call us directly.
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
            <h2 style="color: white;">Dam dolore ir representarit in voluptate cum dolore cula qualogo</h2>
            <p>Dam dolore ir representarit in voluptate cum dolore cula qualogo qui cula offies deserunts molliti anim id est laborum.</p>
            <a href="#" class="btn btn-light btn-lg">Call To Action</a>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-5">
        <div class="container">
            <div class="text-center"> <!-- Added text-center here -->
                <h2>Contact</h2>
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
                <div class="col-md-7" style=" border: 1px solid #ddd; border-radius:10px; padding:40px;">
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
    <footer class="py-3 bg-dark text-white">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p>© Copyright <b>iLanding</b>. All Rights Reserved </p>
                    <p>Designed by BOOTSTRAPMADE</p>
                </div>
                <div class="col-md-6">
                    <a href="#" class="text-white mr-2"><i class="fab fa-facebook-square fa-2x"></i></a>
                    <a href="#" class="text-white mr-2"><i class="fab fa-twitter-square fa-2x"></i></a>
                    <a href="#" class="text-white mr-2"><i class="fab fa-linkedin fa-2x"></i></a>
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