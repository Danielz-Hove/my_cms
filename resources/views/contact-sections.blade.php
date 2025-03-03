<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Sections</title>
</head>
<body>

    @if (count($contactSections) > 0)
        @foreach ($contactSections as $contactSection)
            <section>
                <h2>{{ $contactSection->contact_title }}</h2>
                <h3>{{ $contactSection->contact_subtitle }}</h3>
                <h3>{{ $contactSection->contact_sidebar_title }}</h3>
                <p>{{ $contactSection->contact_paragraph }}</p>

                @if ($contactSection->contact_features)
                    <div class="contact-features">
                        @foreach ($contactSection->contact_features as $feature)
                            <div class="contact-feature">
                                @if ($feature['icon'])
                                    <img src="{{ asset('storage/' . $feature['icon']) }}" alt="Feature Icon">
                                @endif
                                <h4>{{ $feature['heading'] }}</h4>
                                <p>{{ $feature['description'] }}</p>
                            </div>
                        @endforeach
                    </div>
                @endif
            </section>
        @endforeach
    @else
        <p>No contact sections available.</p>
    @endif

</body>
</html>