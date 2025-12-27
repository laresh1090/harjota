<x-layout>
    @section('title', 'Insights - Harjota')

    <x-hero-one
        title="Insights"
        background="i/ss.jpg"
        :breadcrumbs="[
            ['url' => route('home'), 'title' => 'Home'],
            ['url' => route('insights'), 'title' => 'Insights']
        ]"
    />

    <!-- Insights Intro -->
    <section class="section-bg mt0">
        <div class="container">
            <div class="row">
                <div class="col-sm-10 col-md-8 col-sm-offset-1 col-md-offset-2 text-center">
                    <p class="text-4 mb0">Perspectives on institutional intelligence, digital systems, and organizational clarity.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Article Grid -->
    <section class="section-bg mt0 section-gray">
        <div class="container">
            <div class="row">
                @foreach ([
                    [
                        'image' => 'i/s1.gif',
                        'category' => 'Institutional Intelligence',
                        'title' => 'What is Institutional Intelligence?',
                        'excerpt' => 'Understanding how organizations can embed clarity, decision intelligence, and operational continuity into their core systems.',
                        'date' => 'December 2024'
                    ],
                    [
                        'image' => 'i/s2.gif',
                        'category' => 'Digital Transformation',
                        'title' => '5 Signs Your Organization Needs a Digital Audit',
                        'excerpt' => 'Key indicators that suggest it\'s time to assess your digital infrastructure and operational systems.',
                        'date' => 'December 2024'
                    ],
                    [
                        'image' => 'i/s3.gif',
                        'category' => 'Decision Systems',
                        'title' => 'Why Technology Projects Fail (And How to Prevent It)',
                        'excerpt' => 'Common pitfalls in technology implementation and strategies for ensuring project success.',
                        'date' => 'December 2024'
                    ],
                    [
                        'image' => 'i/s4.gif',
                        'category' => 'Digital Transformation',
                        'title' => 'The True Cost of Fragmented Systems',
                        'excerpt' => 'How disconnected tools and data silos impact organizational efficiency and decision-making.',
                        'date' => 'December 2024'
                    ],
                    [
                        'image' => 'i/s11.gif',
                        'category' => 'Institutional Intelligence',
                        'title' => 'How to Prepare for an Institutional Intelligence Audit',
                        'excerpt' => 'A practical guide to getting your organization ready for a comprehensive assessment.',
                        'date' => 'December 2024'
                    ]
                ] as $article)
                <div class="col-md-4 col-sm-6 mb40">
                    <div class="article-card">
                        <div class="article-image">
                            <img src="{{ asset($article['image']) }}" alt="{{ $article['title'] }}" loading="lazy">
                            <span class="article-category">{{ $article['category'] }}</span>
                        </div>
                        <div class="article-content">
                            <span class="article-date">{{ $article['date'] }}</span>
                            <h4 class="article-title">{{ $article['title'] }}</h4>
                            <p class="article-excerpt">{{ $article['excerpt'] }}</p>
                            <a href="#" class="article-link">Read More <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Newsletter -->
    <section class="section-bg mt0">
        <div class="container">
            <div class="row">
                <div class="col-sm-10 col-md-6 col-sm-offset-1 col-md-offset-3 text-center">
                    <h3 class="title-uppercased hyt mb10">Get Insights Delivered</h3>
                    <p class="mb30">Subscribe to receive our latest articles and perspectives on institutional intelligence.</p>
                    <form class="newsletter-form">
                        <div class="input-group">
                            <input type="email" class="form-control" placeholder="Enter your email address" required>
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-primary">Subscribe</button>
                            </span>
                        </div>
                    </form>
                    <p class="newsletter-note mt20">We respect your privacy. Unsubscribe at any time.</p>
                </div>
            </div>
        </div>
    </section>

    @include('partials._footer')
</x-layout>

<style>
/* Article Card */
.article-card {
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 5px 30px rgba(0,0,0,0.1);
    overflow: hidden;
    height: 100%;
    transition: transform 0.3s ease;
}

.article-card:hover {
    transform: translateY(-5px);
}

.article-image {
    position: relative;
    height: 200px;
    overflow: hidden;
}

.article-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.article-category {
    position: absolute;
    top: 15px;
    left: 15px;
    background: #DAA520;
    color: #fff;
    padding: 5px 12px;
    border-radius: 15px;
    font-size: 11px;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.article-content {
    padding: 25px;
}

.article-date {
    color: #999;
    font-size: 12px;
    display: block;
    margin-bottom: 10px;
}

.article-title {
    font-size: 18px;
    margin-bottom: 15px;
    color: #333;
    line-height: 1.4;
}

.article-excerpt {
    color: #666;
    font-size: 14px;
    margin-bottom: 20px;
    line-height: 1.6;
}

.article-link {
    color: #DAA520;
    font-size: 14px;
    font-weight: 600;
    text-decoration: none;
}

.article-link:hover {
    color: #B8860B;
}

.article-link i {
    margin-left: 5px;
    transition: transform 0.3s ease;
}

.article-link:hover i {
    transform: translateX(5px);
}

/* Newsletter */
.newsletter-form .input-group {
    max-width: 450px;
    margin: 0 auto;
}

.newsletter-form .form-control {
    height: 50px;
    border-radius: 25px 0 0 25px;
    border: 1px solid #ddd;
    padding-left: 25px;
}

.newsletter-form .btn {
    border-radius: 0 25px 25px 0;
    padding: 0 30px;
    height: 50px;
}

.newsletter-note {
    color: #999;
    font-size: 12px;
}

@media (max-width: 768px) {
    .newsletter-form .input-group {
        flex-direction: column;
    }

    .newsletter-form .form-control {
        border-radius: 25px;
        margin-bottom: 10px;
    }

    .newsletter-form .btn {
        border-radius: 25px;
        width: 100%;
    }
}
</style>
