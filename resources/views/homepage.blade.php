<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $record->title ?? 'iLanding' }}</title>

    <!-- Bootstrap CSS (CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEkFHnEIBEAYjIBYAMnvMV9OaGGpEQjQV9JeZwiKBVMMIYON5SaH3knU" crossorigin="anonymous">

    <!-- Custom CSS -->
    <style>
        /* Custom Styles to match design as closely as possible */
        body {
            font-family: 'Arial', sans-serif; /* Or your preferred font */
        }

        .navbar {
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .hero {
            background-color: #f0f8ff; /* Light blue background */
            padding: 120px 0;
        }

        .hero h1 {
            font-size: 3.5rem;
            font-weight: bold;
            color: #333;
        }

        .hero p {
            font-size: 1.25rem;
            color: #555;
            max-width: 700px;
            margin: 20px auto;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0069d9;
            border-color: #0062cc;
        }

        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #545b62;
        }

        .img-fluid {
            max-width: 100%;
            height: auto;
        }

        /* Features Section */
        .features {
            padding: 80px 0;
        }

        .feature-card {
            border: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
            transition: transform 0.2s ease-in-out;
        }

        .feature-card:hover {
            transform: translateY(-5px);
        }

        .feature-card-title {
            font-size: 1.5rem;
            color: #333;
        }

        .feature-card-text {
            color: #555;
        }

        /* Other sections - add more styles as needed */

        /* Footer */
        .footer {
            background-color: #343a40;
            color: #fff;
        }
    </style>

</head>

<body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="#">iLanding</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
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
                        <li class="nav-item">
                            <a class="nav-link" href="#contact">Contact</a>
                        </li>
                         <li class="nav-item">
                            <a class="btn btn-primary" href="#">Get Started</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <section class="hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h1>{{ $record->hero_title ?? 'Maecenas Vitae Consectetur Led' }}</h1>
                    <p>{{ $record->hero_description ?? 'Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna.' }}</p>
                    @if ($record->hero_button_text && $record->hero_button_url)
                        <a href="{{ $record->hero_button_url }}" class="btn btn-primary btn-lg">{{ $record->hero_button_text }}</a>
                    @endif
                     @if ($record->hero_video_url)
                        <a href="{{ $record->hero_video_url }}" class="btn btn-primary btn-lg">Play Video</a>
                    @endif
                </div>
                <div class="col-md-6">
                    @if ($record->hero_background_image)
                        <img src="{{ asset('storage/' . $record->hero_background_image) }}" alt="Hero Image"
                            class="img-fluid">
                    @endif
                </div>
            </div>
        </div>
    </section>

    <section id="about" class="py-5">
        <div class="container">
            <h2>About Us</h2>
            <p>{{ $record->about_us_content ?? 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.' }}</p>
        </div>
    </section>

    <section id="features" class="features py-5 bg-light">
        <div class="container">
            <h2>Features</h2>
            <div class="row">
                <div class="col-md-3 mb-4">
                    <div class="card feature-card h-100">
                        <div class="card-body">
                            <h5 class="card-title feature-card-title">Corporis voluptates</h5>
                            <p class="card-text feature-card-text">Consequatur sunt qui quasi enim aliquam quae harum
                                pariatur laboris nisi ut
                                aliquip.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="card feature-card h-100">
                        <div class="card-body">
                            <h5 class="card-title feature-card-title">Explicabo consectetur</h5>
                            <p class="card-text feature-card-text">Est dicta explicabo aut suscipit, Sed voluptatem ea
                                voluptas sequi, est ab
                                inventore.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="card feature-card h-100">
                        <div class="card-body">
                            <h5 class="card-title feature-card-title">Utiamco laboria</h5>
                            <p class="card-text feature-card-text">Excepteur sint occaecat cupidatat non proident, sunt
                                in culpa qui officia
                                deserunt.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="card feature-card h-100">
                        <div class="card-body">
                            <h5 class="card-title feature-card-title">Labore consequatur</h5>
                            <p class="card-text feature-card-text">Aut quia reprehenderit ut quis minima facere at omnis
                                dolores. Doloribus
                                quidem.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="services" class="py-5">
        <div class="container">
            <h2>Services</h2>
        </div>
    </section>
    <section id="pricing" class="py-5 bg-light">
        <div class="container">
            <h2>Pricing</h2>
        </div>
    </section>
    <section id="contact" class="py-5">
        <div class="container">
            <h2>Contact</h2>
        </div>
    </section>

    <footer class="footer py-4">
        <div class="container text-center">
            <p>© {{ date('Y') }} iLanding. All rights reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap JS (CDN) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Yt+XjyKRqsLcsgzVfKykR9iY5fA5i5N5L5N5L5N5L5N5L5N5L5N5L5N5L5N5L5N5L5N5L5N5L5N5L5N5L5N"
        crossorigin="anonymous"></script>

    <!-- jQuery (CDN - Add this if you need it) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Custom JavaScript (Optional) -->
    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>