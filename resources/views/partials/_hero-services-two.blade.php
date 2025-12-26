<x-hero-one
    title="Industrial-Strength Software Solutions"
    background="i/ss.jpg"
    :breadcrumbs="[
        ['url' => route('home'), 'title' => 'Home'],
        ['url' => route('about'), 'title' => 'Industrial-Strength Software Solutions Page']
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
                                    'title' => 'Industrial Strength Applications Development',
                                    'content' => 'At Skyllax Technologies, we specialize in developing industrial-strength applications that meet the unique needs of industrial organizations. Our team of experts designs and develops customized applications to improve efficiency, productivity, and safety.'
                                ],
                                [
                                    'title' => 'Our Industrial Applications Development Services',
                                    'content' => '1. Manufacturing Execution Systems (MES): We develop MES solutions to track and manage production processes.<br>
2. Supply Chain Management: Our team develops applications to optimize supply chain operations.<br>
3. Predictive Maintenance: We develop predictive maintenance solutions to reduce downtime.<br>
4. Quality Control: Our team develops applications to track and manage quality control processes.
'
                                ],
                                [
                                    'title' => 'Benefits',
                                    'content' => '1. Improved Efficiency: Our industrial applications improve efficiency and productivity.<br>
2. Reduced Downtime: Our predictive maintenance solutions reduce downtime.<br>
3. Enhanced Quality: Our quality control applications improve product quality.<br>
4. Increased Safety: Our applications improve workplace safety.
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