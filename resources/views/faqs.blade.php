<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQs</title>
    <style>
        .accordion {
            border: 1px solid #ccc;
            margin-bottom: 10px;
        }
        .accordion-header {
            background-color: #f0f0f0;
            padding: 10px;
            cursor: pointer;
        }
        .accordion-content {
            padding: 10px;
            display: none; /* Hidden by default */
        }
    </style>
</head>
<body>

    @if (count($faqs) > 0)
        @foreach ($faqs as $faq)
            <section>
                <h2>{{ $faq->faq_section_heading }}</h2>
                <p>{{ $faq->faq_short_description }}</p>

                @if ($faq->faq_accordion)
                    <div class="faq-accordion-container">
                        @foreach ($faq->faq_accordion as $accordionItem)
                            <div class="accordion">
                                <div class="accordion-header">{{ $accordionItem['question_title'] }}</div>
                                <div class="accordion-content">{{ $accordionItem['answer_text'] }}</div>
                            </div>
                        @endforeach
                    </div>
                @endif

                <h3>Call To Action</h3>
                <p>{{ $faq->faq_cta_short_description }}</p>

                @if ($faq->faq_cta_button_text && $faq->faq_cta_button_url)
                    <a href="{{ $faq->faq_cta_button_url }}">{{ $faq->faq_cta_button_text }}</a>
                @endif
            </section>
        @endforeach
    @else
        <p>No FAQs available.</p>
    @endif

    <script>
        // Simple JavaScript for basic accordion functionality
        const accordionHeaders = document.querySelectorAll('.accordion-header');

        accordionHeaders.forEach(header => {
            header.addEventListener('click', () => {
                const content = header.nextElementSibling;
                if (content.style.display === 'block') {
                    content.style.display = 'none';
                } else {
                    content.style.display = 'block';
                }
            });
        });
    </script>

</body>
</html>