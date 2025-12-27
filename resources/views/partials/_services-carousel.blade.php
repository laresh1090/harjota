<section class="section-bg mt0 section-gray">
    <div class="container">
        <div class="row">
            <div class="col-sm-10 col-md-8 col-sm-offset-1 col-md-offset-2 text-center">
                <h2 class="title-uppercased hyt">Our Services</h2>
                <p class="mb40">From diagnosis to implementation—structured solutions that strengthen how your organization thinks, operates, and grows.</p>
            </div>
        </div>
        <div class="row mt10">
            <div class="col-sm-12">
                <div class="services-carousel-wrapper">
                    <div class="owl-carousel owl-columns2 owl-p10" id="services-carousel" data-auto-play="false" data-stop-on-hover="true">
                        @foreach ([
                            [
                                'image' => 'i/s1.gif',
                                'title' => 'Institutional Intelligence Audit',
                                'description' => 'Comprehensive assessment of decisions, data, processes, and systems. We evaluate decision architecture, process maturity, data flow, and technology enablement.'
                            ],
                            [
                                'image' => 'i/s2.gif',
                                'title' => 'Systems & Decision Architecture',
                                'description' => 'Design foundational frameworks that define what decisions your systems must support, who owns them, and what data is relevant to each.'
                            ],
                            [
                                'image' => 'i/s3.gif',
                                'title' => 'Digital Infrastructure & Software',
                                'description' => 'Build custom platforms including enterprise software, dashboards, AI-assisted systems, and internal platforms tailored to your needs.'
                            ],
                            [
                                'image' => 'i/s4.gif',
                                'title' => 'Business Intelligence & AI Enablement',
                                'description' => 'Transform data into actionable intelligence through data modeling, BI dashboards, AI readiness assessment, and selective AI integration.'
                            ],
                            [
                                'image' => 'i/s11.gif',
                                'title' => 'Advisory & Institutional Enablement',
                                'description' => 'Ongoing strategic support including governance, knowledge documentation, digital strategy, and continuous improvement programs.'
                            ]
                        ] as $service)
                            <div class="owl-el">
                                <x-service-item
                                    :image="$service['image']"
                                    :title="$service['title']"
                                    :description="$service['description']"
                                />
                            </div>
                        @endforeach
                    </div>
                    <!-- Subtle Navigation -->
                    <div class="carousel-nav">
                        <button class="carousel-prev" id="services-prev">
                            <i class="fa fa-chevron-left"></i>
                        </button>
                        <div class="carousel-dots" id="carousel-dots"></div>
                        <button class="carousel-next" id="services-next">
                            <i class="fa fa-chevron-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.services-carousel-wrapper {
    position: relative;
}

.carousel-nav {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 20px;
    margin-top: 30px;
}

.carousel-prev,
.carousel-next {
    width: 45px;
    height: 45px;
    border-radius: 50%;
    background: #DAA520;
    color: #fff;
    border: none;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 16px;
}

.carousel-prev:hover,
.carousel-next:hover {
    background: #B8860B;
    transform: scale(1.05);
}

.carousel-dots {
    display: flex;
    gap: 8px;
    align-items: center;
}

.carousel-dot {
    width: 10px;
    height: 10px;
    border-radius: 50%;
    background: #ddd;
    cursor: pointer;
    transition: all 0.3s ease;
}

.carousel-dot:hover {
    background: #bbb;
}

.carousel-dot.active {
    background: #DAA520;
    transform: scale(1.2);
}

@media (max-width: 768px) {
    .carousel-nav {
        gap: 15px;
    }

    .carousel-prev,
    .carousel-next {
        width: 40px;
        height: 40px;
        font-size: 14px;
    }

    .carousel-dot {
        width: 8px;
        height: 8px;
    }
}
</style>

<script>
$(document).ready(function() {
    // Wait for main.js to initialize carousel, then attach custom controls
    var checkCarousel = setInterval(function() {
        var owl = $('#services-carousel');

        // Check if Owl Carousel is initialized
        if (owl.data('owl.carousel')) {
            clearInterval(checkCarousel);

            var totalItems = 5;
            var visibleItems = window.innerWidth <= 768 ? 1 : 2;
            var totalPages = Math.ceil(totalItems / visibleItems);
            var dotsContainer = document.getElementById('carousel-dots');

            // Clear and create dots
            dotsContainer.innerHTML = '';
            for (var i = 0; i < totalPages; i++) {
                var dot = document.createElement('span');
                dot.className = 'carousel-dot' + (i === 0 ? ' active' : '');
                dot.setAttribute('data-index', i);
                dotsContainer.appendChild(dot);
            }

            // Dot click handler
            $(dotsContainer).on('click', '.carousel-dot', function() {
                var index = parseInt($(this).attr('data-index'));
                owl.trigger('to.owl.carousel', [index * visibleItems, 300]);
            });

            // Update dots on slide change
            owl.on('changed.owl.carousel', function(event) {
                var currentIndex = Math.floor(event.item.index / visibleItems);
                if (currentIndex < 0) currentIndex = 0;
                if (currentIndex >= totalPages) currentIndex = totalPages - 1;
                $(dotsContainer).find('.carousel-dot').removeClass('active');
                $(dotsContainer).find('.carousel-dot').eq(currentIndex).addClass('active');
            });

            // Arrow click handlers
            $('#services-prev').on('click', function(e) {
                e.preventDefault();
                owl.trigger('prev.owl.carousel');
            });

            $('#services-next').on('click', function(e) {
                e.preventDefault();
                owl.trigger('next.owl.carousel');
            });
        }
    }, 100);

    // Timeout after 5 seconds
    setTimeout(function() {
        clearInterval(checkCarousel);
    }, 5000);
});
</script>
