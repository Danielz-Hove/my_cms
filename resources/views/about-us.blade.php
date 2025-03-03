<section id="about-us">
    <div class="container">
        @foreach($aboutUsSections as $aboutUsSection)
            <div class="about-us-section"> <!-- Added a container for each section -->
                @if($aboutUsSection->about_us_subheading)
                    <h2>{{ $aboutUsSection->about_us_subheading }}</h2>
                @endif

                @if($aboutUsSection->about_us_title)
                    <h1>{{ $aboutUsSection->about_us_title }}</h1>
                @endif

                @if($aboutUsSection->about_us_description)
                    <p>{!! $aboutUsSection->about_us_description !!}</p>
                @endif

                @if($aboutUsSection->about_us_meeting_image)
                    <img src="{{ Storage::url($aboutUsSection->about_us_meeting_image) }}" alt="About Us Image">
                @endif

                @if($aboutUsSection->experience_years || $aboutUsSection->experience_description)
                    <div class="experience">
                        @if($aboutUsSection->experience_years)
                            <p>Experience: {{ $aboutUsSection->experience_years }} years</p>
                        @endif
                        @if($aboutUsSection->experience_description)
                            <p>{{ $aboutUsSection->experience_description }}</p>
                        @endif
                    </div>
                @endif

                @if($aboutUsSection->about_us_features)
                    <div class="features">
                        <h3>Key Features</h3>
                        <ul>
                            @foreach($aboutUsSection->about_us_features as $feature)
                                <li>
                                    @if(isset($feature['image']))
                                        <img src="{{ Storage::url($feature['image']) }}" alt="Feature Image" style="max-width: 50px;">
                                    @endif
                                    <strong>{{ $feature['heading'] }}</strong>: {{ $feature['paragraph'] }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if($aboutUsSection->about_us_iconlist)
                    <div class="icon-list">
                        @foreach($aboutUsSection->about_us_iconlist as $iconItem)
                            <div class="icon-item">
                                @if(isset($iconItem['icon']))
                                    <img src="{{ Storage::url($iconItem['icon']) }}" alt="Icon" style="max-width: 30px;">
                                @endif
                                <span>{{ $iconItem['text'] }}</span>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div> <!-- End of about-us-section container -->
        @endforeach
    </div>
</section>