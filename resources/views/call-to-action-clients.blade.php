<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Call to Action and Clients</title>
</head>
<body>

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

</body>
</html>