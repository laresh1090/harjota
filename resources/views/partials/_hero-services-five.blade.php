<x-hero-one
    title="Smart Home Technology"
    background="i/ss.jpg"
    :breadcrumbs="[
        ['url' => route('home'), 'title' => 'Home'],
        ['url' => route('about'), 'title' => 'Smart Home Technology Page']
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
                                    'title' => 'Smart Home Solutions',
                                    'content' => 'At Skyllax Technologies, we provide comprehensive smart home solutions to enhance your living experience. Our team of experts designs, installs, and supports smart home systems that integrate seamlessly with your lifestyle.'
                                ],
                                [
                                    'title' => 'Our Smart Home Services',
                                    'content' => '1. Smart Lighting: We install smart lighting systems that adjust brightness and color based on your preferences.<br>
2. Home Security: Our team installs security cameras, doorbells, and sensors to ensure your home\'s safety<br>
3. Temperature Control: We install smart thermostats that learn your temperature preferences and adjust accordingly.<br>
4. Home Automation: Our team integrates your smart devices to create customized automation scenarios.'
                                ],
                                [
                                    'title' => 'Benefits',
                                    'content' => '1. Convenience: Our smart home solutions make your life easier and more convenient.<br>
2. Energy Efficiency: Our smart home systems help reduce energy consumption.<br>
3. Enhanced Security: Our security solutions provide peace of mind.<br>
4. Increased Property Value: Smart home technology can increase your property\'s value.'
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