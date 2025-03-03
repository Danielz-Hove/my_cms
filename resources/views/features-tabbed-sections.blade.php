<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Features Tabbed Sections</title>
    <style>
        /* Basic Tab Styling */
        .tab-container {
            border: 1px solid #ccc;
            margin-bottom: 20px;
        }
        .tab-headers {
            display: flex;
        }
        .tab-header {
            padding: 10px;
            cursor: pointer;
            border-bottom: 2px solid transparent;
        }
        .tab-header.active {
            border-bottom: 2px solid blue; /* Or your active color */
        }
        .tab-content {
            padding: 10px;
        }
        .icon-list {
            list-style: none;
            padding: 0;
        }
        .icon-list li {
            margin-bottom: 5px;
        }
    </style>
</head>
<body>

    @if (count($featuresTabbedSections) > 0)
        @foreach ($featuresTabbedSections as $section)
            <section>
                <h2>{{ $section->features_headline }}</h2>
                <h3>{{ $section->features_subheading }}</h3>

                @if ($section->tabs)
                    <div class="tab-container">
                        <div class="tab-headers">
                            @foreach ($section->tabs as $key => $tab)
                                <div class="tab-header" data-tab="{{ $key }}">
                                    {{ $tab['title'] }}
                                </div>
                            @endforeach
                        </div>

                        @foreach ($section->tabs as $key => $tab)
                            <div class="tab-content" data-tab="{{ $key }}">
                                <h4>{{ $tab['subtitle'] }}</h4>
                                @if ($tab['image'])
                                    <img src="{{ asset('storage/' . $tab['image']) }}" alt="Tab Image">
                                @endif
                                <div class="tab-content-markdown">{!! Str::markdown($tab['content']) !!}</div>

                                @if ($tab['icon_list'])
                                    <ul class="icon-list">
                                        @foreach ($tab['icon_list'] as $iconItem)
                                            <li><i class="{{ $iconItem['icon'] }}"></i> {{ $iconItem['text'] }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        @endforeach
                    </div>
                @endif
            </section>
        @endforeach
    @else
        <p>No features tabbed sections available.</p>
    @endif

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tabHeaders = document.querySelectorAll('.tab-header');
            const tabContents = document.querySelectorAll('.tab-content');

            // Initially hide all tab contents and set the first tab as active
            tabContents.forEach(content => content.style.display = 'none');
            if(tabContents.length > 0){
                tabHeaders[0].classList.add('active');
                tabContents[0].style.display = 'block';
            }


            tabHeaders.forEach(header => {
                header.addEventListener('click', function() {
                    const tab = this.dataset.tab;

                    // Remove active class from all headers and hide all contents
                    tabHeaders.forEach(h => h.classList.remove('active'));
                    tabContents.forEach(c => c.style.display = 'none');

                    // Add active class to the clicked header and show the corresponding content
                    this.classList.add('active');
                    document.querySelector(`.tab-content[data-tab="${tab}"]`).style.display = 'block';
                });
            });
        });
    </script>

</body>
</html>