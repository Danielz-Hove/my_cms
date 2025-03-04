<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

<section class="hero-section">
    @foreach($heroSections as $heroSection)
        <div class="hero">
            <div class="hero-content">
                @if($heroSection->hero_subtitle_icon)
                    <i class="fa fa-fw {{ $heroSection->hero_subtitle_icon }}" style="color:green;"></i>
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
                                <i class="fa fa-fw {{ $feature['icon'] }}"></i>
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

</body>
</html>