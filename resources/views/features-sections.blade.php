<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Features Sections</title>
    <style>
        .features-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .feature {
            width: 300px;
            border: 1px solid #ccc;
            padding: 10px;
        }

        .feature img {
            max-width: 50px;
            height: auto;
            margin-bottom: 5px;
        }
    </style>
</head>
<body>

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

</body>
</html>