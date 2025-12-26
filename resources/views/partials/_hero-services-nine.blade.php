<x-hero-one
    title='Consultation -
    IT Strategy and Planning'
    background="i/ss.jpg"
    :breadcrumbs="[
        ['url' => route('home'), 'title' => 'Home'],
        ['url' => route('about'), 'title' => 'IT Strategy and Planning']
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
                                    'title' => 'IT Strategy and Planning',
                                    'content' => 'At Skyllax Technologies, our IT strategy and planning services help organizations develop a clear roadmap for leveraging technology to achieve their business goals. Our team of experts works closely with clients to understand their unique needs and challenges.'
                                ],
                                [
                                    'title' => 'Our IT Strategy and Planning Services',
                                    'content' => '1. IT Assessment: We conduct comprehensive assessments to identify areas for improvement.<br>
2. Business Alignment: Our team aligns IT strategies with business objectives.<br>
3. Technology Roadmapping: We develop technology roadmaps to guide future investments.<br>
4. Implementation Planning: Our team creates detailed implementation plans.
'
                                ],
                                [
                                    'title' => 'Benefits',
                                    'content' => '1. Improved Efficiency: Our IT strategies optimize technology use.<br>
2. Increased Agility: We help organizations adapt to changing market conditions.<br>
3. Reduced Costs: Our team identifies cost-saving opportunities.<br>
4. Enhanced Decision Making: We provide data-driven insights.
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