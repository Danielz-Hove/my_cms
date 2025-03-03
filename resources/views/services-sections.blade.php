<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services Sections</title>
    <style>
        /* Basic Styling (customize as needed) */
        .services-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        .service-card {
            width: 300px;
            border: 1px solid #ccc;
            padding: 10px;
        }
        .card-image {
            max-width: 100%;
            height: auto;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

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

</body>
</html>