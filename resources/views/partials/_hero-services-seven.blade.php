<x-hero-one
    title="Business Development"
    background="i/ss.jpg"
    :breadcrumbs="[
        ['url' => route('home'), 'title' => 'Home'],
        ['url' => route('about'), 'title' => 'Business Development Page']
    ]"
/>

<section class="section-page">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-12">
                        <x-blog-post
                            :sections="[
                                [
                                    'title' => 'Business Development and Optimization',
                                    'content' => 'At Skyllax Technologies, we help businesses drive growth and optimize operations. Our team of experts develops tailored strategies to enhance performance, improve efficiency, and increase profitability.'
                                ],
                                [
                                    'title' => 'Our Business Development and Optimization Services',
                                    'content' => '1. Business Analysis: We conduct comprehensive analyses to identify areas for improvement.<br>2. Strategy Development: Our team develops customized strategies to drive business growth.<br>3. Process Optimization: We streamline processes to enhance efficiency.<br>4. Performance Metrics: Our team establishes key performance indicators (KPIs) to track progress.'
                                ],
                                [
                                    'title' => 'Benefits',
                                    'content' => '1. Increased Efficiency: Our strategies optimize business operations.<br>2. Improved Profitability: We help businesses reduce costs and increase revenue.<br>3. Enhanced Decision Making: Our team provides data-driven insights.<br>4. Competitive Advantage: We help businesses stay ahead.'
                                ],
                                [
                                    'title' => 'Why Choose Skyllax Technologies?',
                                    'content' => '1. Expertise: Our team has extensive experience in digital branding.<br>2. Customized Approach: We tailor strategies to meet unique business needs.<br>3. Measurable Results: Our team tracks progress.'
                                ]
                            ]"
                        />
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-bg mb0 section-extra-large bg-img stellar bg52 stats-section stats-bg" data-stellar-background-ratio="0.4">
    <link rel="preload" href="{{ asset('i/bg52.jpg') }}" as="image">
    <div class="bg-overlay gradient-1"></div>
    <div class="container">
        <div class="row mb50">
            <div class="col-sm-12">
                <div class="row">
                    @foreach ([
                        ['value' => 123, 'speed' => 4000, 'title' => 'Projects'],
                        ['value' => 1850, 'speed' => 4000, 'title' => 'Happy Customers'],
                        ['value' => 1768, 'speed' => 4000, 'title' => 'Support Tickets'],
                        ['value' => 58, 'speed' => 3500, 'title' => 'Employees']
                    ] as $stat)
                        <x-stat-item
                            :value="$stat['value']"
                            :speed="$stat['speed']"
                            :title="$stat['title']"
                        />
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <a href="{{ route('contact') }}" class="btn-bottom">Contact Us</a>
</section>
<div class="shadow3"></div>
<div class="simple-hr mt20 mb30 xs-m0"></div>