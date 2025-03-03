<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pricing Sections</title>
    <style>
        /* Basic Styling (customize as needed) */
        .pricing-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        .pricing-plan {
            width: 300px;
            border: 1px solid #ccc;
            padding: 10px;
        }
        .plan-features {
            list-style: none;
            padding: 0;
        }
        .plan-features li {
            margin-bottom: 5px;
        }
        .feature-icon {
            max-width: 20px; /* Adjust icon size */
            height: auto;
            vertical-align: middle;
            margin-right: 5px;
        }
    </style>
</head>
<body>

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

</body>
</html>