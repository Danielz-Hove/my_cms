<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testimonials & Statistics Sections</title>
    <style>
        /* Basic Styling (customize as needed) */
        .testimonials-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        .testimonial {
            width: 300px;
            border: 1px solid #ccc;
            padding: 10px;
        }
        .testimonial img {
            max-width: 100%;
            height: auto;
            margin-bottom: 10px;
        }
        .statistics-container {
            display: flex;
            gap: 30px;
            margin-top: 20px;
        }
        .statistic {
            text-align: center;
        }
    </style>
</head>
<body>

    @if (count($testimonialsStatisticsSections) > 0)
        @foreach ($testimonialsStatisticsSections as $section)
            <section>
                <h2>{{ $section->title }}</h2>
                <p>{{ $section->subtext }}</p>

                <h3>Testimonials</h3>
                <div class="testimonials-container">
                    @if ($section->testimonials)
                        @foreach ($section->testimonials as $testimonial)
                            <div class="testimonial">
                                @if ($testimonial['image'])
                                    <img src="{{ asset('storage/' . $testimonial['image']) }}" alt="Testimonial Image">
                                @endif
                                <h4>{{ $testimonial['testimonial_title'] }}</h4>

                                @php
                                    $starRating = (int) $testimonial['star_rating']; // Ensure integer type
                                @endphp
                                @for ($i = 0; $i < $starRating; $i++)
                                    <span>★</span>  {{-- Use a star character --}}
                                @endfor

                                <p>{{ $testimonial['paragraph'] }}</p>
                            </div>
                        @endforeach
                    @endif
                </div>

                <h3>Statistics</h3>
                <div class="statistics-container">
                    @if ($section->statistics)
                        @foreach ($section->statistics as $statistic)
                            <div class="statistic">
                                <h4>{{ $statistic['statistic_number'] }}</h4>
                                <p>{{ $statistic['statistic_text'] }}</p>
                            </div>
                        @endforeach
                    @endif
                </div>
            </section>
        @endforeach
    @else
        <p>No testimonials & statistics sections available.</p>
    @endif

</body>
</html>