<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us Sections</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

    @if (count($aboutUsSections) > 0)
        @foreach ($aboutUsSections as $aboutUsSection)
            <section>
                <h2>{{ $aboutUsSection->about_us_title }}</h2>
                <h3>{{ $aboutUsSection->about_us_subheading }}</h3>

                @if ($aboutUsSection->about_us_meeting_image)
                    <img src="{{ asset('storage/' . $aboutUsSection->about_us_meeting_image) }}" alt="About Us Image">
                @endif

                <p>{!! $aboutUsSection->about_us_description !!}</p>

                @if ($aboutUsSection->experience_years)
                    <p>Experience: {{ $aboutUsSection->experience_years }} years</p>
                    <p>{{ $aboutUsSection->experience_description }}</p>
                @endif

                @if ($aboutUsSection->about_us_features)
                    <h3>Our Features</h3>
                    <ul>
                        @foreach ($aboutUsSection->about_us_features as $feature)
                            <li>
                                <strong>{{ $feature['heading'] }}</strong>: {{ $feature['paragraph'] }}
                            </li>
                        @endforeach
                    </ul>
                @endif

                @if ($aboutUsSection->about_us_iconlist)
                    <h3>Icon List</h3>
                    <ul>
                        @foreach ($aboutUsSection->about_us_iconlist as $item)
                            <li>
                                <i class="{{ $item['icon'] }}"></i> {{ $item['text'] }}
                            </li>
                        @endforeach
                    </ul>
                @endif
            </section>
        @endforeach
    @else
        <p>No About Us sections available.</p>
    @endif

</body>
</html>