<x-hero-one
    title="Consultation - Digital Branding and Transformation"
    background="i/ss.jpg"
    :breadcrumbs="[
        ['url' => route('home'), 'title' => 'Home'],
        ['url' => route('about'), 'title' => 'Digital Branding and Transformation']
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
                                    'title' => 'Digital Branding and Transformation',
                                    'content' => 'At Skyllax Technologies, we help businesses navigate the digital landscape and transform their brand presence. Our team of experts develops tailored strategies to enhance online visibility, engagement, and customer experience.'
                                ],
                                [
                                    'title' => 'Our Digital Branding and Transformation Services',
                                    'content' => '1. Digital Strategy Development: We craft comprehensive digital strategies aligned with business goals.<br>
2. Brand Identity Development: Our team creates cohesive brand identities across digital platforms.<br>
3. Website Design and Development: We design and develop user-centric websites.<br>
4. Social Media Optimization: Our team optimizes social media presence and engagement.<br>
5. Content Creation: We develop compelling content to resonate with target audiences.'
                                ],
                                [
                                    'title' => 'Benefits',
                                    'content' => '1. Increased Online Visibility: Our strategies boost brand awareness.<br>
2. Enhanced Customer Experience: We create user-friendly digital experiences.<br>
3. Improved Engagement: Our team develops engaging content.<br>
4. Competitive Advantage: We help businesses stay ahead.
'
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