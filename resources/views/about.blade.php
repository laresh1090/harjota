<x-layout>
    @section('title', 'About Us - Harjota')

    @include('partials._hero-one')

    <!-- About Intro -->
    <section class="section-bg mt0">
        <div class="container">
            <div class="row">
                <div class="col-sm-10 col-md-8 col-sm-offset-1 col-md-offset-2 text-center">
                    <p class="text-4 mb0">A strategic intelligence partner committed to building systems that endure beyond individuals, trends, and short-term technology cycles.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Company Overview -->
    <section class="section-bg mt0 section-gray">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12 mb30">
                    <h2 class="title-uppercased hyt mb20">Our Story</h2>
                    <p class="mb20">Harjota is an Institutional Intelligence & Digital Systems company. We help organizations move beyond fragmented tools and reactive technology adoption by designing systems that embed clarity, decision intelligence, and operational continuity into their core operations.</p>
                    <p class="mb0">We believe that sustainable organizations are built on systems, not personalities. Our work ensures that your organization's intelligence, processes, and decision frameworks persist and evolve—regardless of personnel changes or market shifts.</p>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="about-image">
                        <img src="{{ asset('i/a1.png') }}" alt="Harjota Team" loading="lazy">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Mission & Vision -->
    <section class="section-bg mt0">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12 mb30">
                    <div class="mission-box">
                        <div class="mission-icon">
                            <i class="fa fa-bullseye"></i>
                        </div>
                        <h3>Our Mission</h3>
                        <p>To help organizations institutionalize intelligence by designing digital systems that clarify decisions, strengthen operations, and enable sustainable growth.</p>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 mb30">
                    <div class="mission-box">
                        <div class="mission-icon">
                            <i class="fa fa-eye"></i>
                        </div>
                        <h3>Our Vision</h3>
                        <p>To become a trusted institutional intelligence partner for organizations across Africa and emerging markets.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Core Philosophy -->
    <section class="section-bg mt0 section-gray">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <h2 class="title-uppercased hyt mb10">Core Philosophy</h2>
                    <p class="mb50">The principles that guide everything we do</p>
                </div>
            </div>
            <div class="row">
                @foreach ([
                    ['icon' => 'fa-lightbulb-o', 'title' => 'Technology Supports Thinking', 'desc' => 'Technology should support thinking, not replace it. We design systems that enhance human decision-making.'],
                    ['icon' => 'fa-cogs', 'title' => 'Intelligence Before Automation', 'desc' => 'Intelligence must be designed before it is automated. We understand your decisions before we build your systems.'],
                    ['icon' => 'fa-building', 'title' => 'Systems Over Personalities', 'desc' => 'Sustainable organizations are built on systems, not personalities. Your operations should thrive regardless of personnel changes.'],
                    ['icon' => 'fa-compass', 'title' => 'Clarity Before Transformation', 'desc' => 'Digital transformation without institutional clarity amplifies confusion. We bring clarity first.'],
                    ['icon' => 'fa-clock-o', 'title' => 'Long-Term Focus', 'desc' => 'Clarity over speed, structure over complexity, long-term over short-term. We build for endurance.']
                ] as $philosophy)
                <div class="col-md-4 col-sm-6 mb30">
                    <div class="philosophy-item">
                        <i class="fa {{ $philosophy['icon'] }}"></i>
                        <h4>{{ $philosophy['title'] }}</h4>
                        <p>{{ $philosophy['desc'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    @include('partials._approach-section')
    @include('partials._approach-steps')
    @include('partials._portfolio-section')
    @include('partials._cta-section')
    @include('partials._footer')
</x-layout>

<style>
/* About Image */
.about-image {
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 10px 40px rgba(0,0,0,0.1);
}

.about-image img {
    width: 100%;
    height: auto;
}

/* Mission Boxes */
.mission-box {
    background: #fff;
    border-radius: 8px;
    padding: 40px;
    box-shadow: 0 5px 30px rgba(0,0,0,0.08);
    height: 100%;
}

.mission-icon {
    width: 70px;
    height: 70px;
    background: #DAA520;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 20px;
}

.mission-icon i {
    font-size: 28px;
    color: #fff;
}

.mission-box h3 {
    margin-bottom: 15px;
    color: #333;
}

.mission-box p {
    margin-bottom: 0;
    color: #666;
    line-height: 1.7;
}

/* Philosophy Items */
.philosophy-item {
    text-align: center;
    padding: 30px 20px;
}

.philosophy-item i {
    font-size: 48px;
    color: #DAA520;
    margin-bottom: 20px;
}

.philosophy-item h4 {
    margin-bottom: 15px;
    color: #333;
}

.philosophy-item p {
    margin-bottom: 0;
    color: #666;
    line-height: 1.6;
}

@media (max-width: 768px) {
    .mission-box {
        margin-bottom: 20px;
    }

    .about-image {
        margin-top: 30px;
    }
}
</style>
