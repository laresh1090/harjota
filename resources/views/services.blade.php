<x-layout>
    @section('title', 'Our Services - Harjota')

    <x-hero-one
        title="Our Services"
        background="i/a1.png"
        :breadcrumbs="[
            ['url' => route('home'), 'title' => 'Home'],
            ['url' => route('services'), 'title' => 'Services']
        ]"
    />

    <!-- Services Intro -->
    <section class="section-bg mt0">
        <div class="container">
            <div class="row">
                <div class="col-sm-10 col-md-8 col-sm-offset-1 col-md-offset-2 text-center">
                    <p class="text-4 mb40">From diagnosis to implementation—structured solutions that strengthen how your organization thinks, operates, and grows.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Audit Packages -->
    <section class="section-bg mt0 section-gray">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <span class="free-consultation-badge"><i class="fa fa-gift"></i> Free 30-Minute Consultation Included</span>
                    <h2 class="title-uppercased hyt mb10">Audit Packages</h2>
                    <p class="mb50">Invest in clarity. Choose the level of insight your organization needs.</p>
                </div>
            </div>
            <div class="row pricing-row">
                <!-- Foundational Package -->
                <div class="col-md-4 col-sm-12">
                    <div class="pricing-card">
                        <div class="pricing-card-header">
                            <span class="pricing-tier">Starter</span>
                            <h4>Foundational Digital Audit</h4>
                            <div class="pricing-amount range">
                                <span class="price-range">₦300K - ₦600K</span>
                            </div>
                            <p class="pricing-period">2-3 weeks delivery</p>
                        </div>
                        <div class="pricing-card-body">
                            <p class="pricing-desc">Perfect for organizations seeking a quick health check of their digital infrastructure.</p>
                            <ul class="pricing-list">
                                <li><i class="fa fa-check"></i> Comprehensive Digital Audit Report</li>
                                <li><i class="fa fa-check"></i> Executive Summary & Findings</li>
                                <li><i class="fa fa-check"></i> Quick-win Recommendations</li>
                                <li><i class="fa fa-check"></i> 1-hour Review Session</li>
                            </ul>
                        </div>
                        <div class="pricing-card-footer">
                            <a href="{{ route('contact') }}" class="btn-slider">Get Started</a>
                        </div>
                    </div>
                </div>
                <!-- Operational Package -->
                <div class="col-md-4 col-sm-12">
                    <div class="pricing-card featured">
                        <div class="pricing-badge">Most Popular</div>
                        <div class="pricing-card-header">
                            <span class="pricing-tier">Professional</span>
                            <h4>Operational Intelligence Audit</h4>
                            <div class="pricing-amount range">
                                <span class="price-range">₦800K - ₦1.5M</span>
                            </div>
                            <p class="pricing-period">4-5 weeks delivery</p>
                        </div>
                        <div class="pricing-card-body">
                            <p class="pricing-desc">For organizations ready to transform operations with data-driven insights.</p>
                            <ul class="pricing-list">
                                <li><i class="fa fa-check"></i> Everything in Foundational</li>
                                <li><i class="fa fa-check"></i> Full Operational Assessment</li>
                                <li><i class="fa fa-check"></i> AI & BI Readiness Evaluation</li>
                                <li><i class="fa fa-check"></i> Prioritized Implementation Roadmap</li>
                                <li><i class="fa fa-check"></i> 2 Review Sessions</li>
                                <li><i class="fa fa-check"></i> 30-day Email Support</li>
                            </ul>
                        </div>
                        <div class="pricing-card-footer">
                            <a href="{{ route('contact') }}" class="btn-slider main">Get Started</a>
                        </div>
                    </div>
                </div>
                <!-- Institutional Package -->
                <div class="col-md-4 col-sm-12">
                    <div class="pricing-card">
                        <div class="pricing-card-header">
                            <span class="pricing-tier">Enterprise</span>
                            <h4>Institutional Digital Intelligence Audit [IDIA]</h4>
                            <div class="pricing-amount range">
                                <span class="price-range">₦2M - ₦5M</span>
                            </div>
                            <p class="pricing-period">6-8 weeks delivery</p>
                        </div>
                        <div class="pricing-card-body">
                            <p class="pricing-desc">Complete institutional transformation with hands-on implementation support.</p>
                            <ul class="pricing-list">
                                <li><i class="fa fa-check"></i> Everything in Professional</li>
                                <li><i class="fa fa-check"></i> Advanced Data Visualizations</li>
                                <li><i class="fa fa-check"></i> Board-ready Executive Presentation</li>
                                <li><i class="fa fa-check"></i> Strategic 12-month Roadmap</li>
                                <li><i class="fa fa-check"></i> Implementation Kick-off Support</li>
                                <li><i class="fa fa-check"></i> 60-day Priority Support</li>
                            </ul>
                        </div>
                        <div class="pricing-card-footer">
                            <a href="{{ route('contact') }}" class="btn-slider">Get Started</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- IDIA Clarification Section -->
    <section class="section-bg mt0">
        <div class="container">
            <div class="row">
                <div class="col-sm-10 col-md-8 col-sm-offset-1 col-md-offset-2 text-center">
                    <h3 class="title-medium mb30">What is the Institutional Digital Intelligence Audit (IDIA)?</h3>
                    <p class="mb40" style="font-size: 16px; line-height: 1.7; color: #666;">
                        Our flagship Institutional Intelligence Audit (IDIA) is a comprehensive assessment framework
                        that evaluates your organization across five critical dimensions to identify gaps, opportunities,
                        and strategic priorities for institutional transformation.
                    </p>
                </div>
            </div>
            <div class="row">
                @foreach ([
                    ['icon' => 'fa-sitemap', 'title' => 'Decision Architecture', 'desc' => 'Who decides what, when, and with what data? We map your decision flows and identify bottlenecks.'],
                    ['icon' => 'fa-cogs', 'title' => 'Process Maturity', 'desc' => 'How structured are your operations? We assess workflows, automation opportunities, and efficiency.'],
                    ['icon' => 'fa-database', 'title' => 'Data Intelligence', 'desc' => 'Can you trust your data? We evaluate data quality, accessibility, and analytical capabilities.'],
                    ['icon' => 'fa-laptop', 'title' => 'Technology Enablement', 'desc' => 'Do your systems support or hinder decisions? We audit your tech stack and integration.'],
                    ['icon' => 'fa-users', 'title' => 'Knowledge Continuity', 'desc' => 'What happens when key people leave? We assess institutional knowledge preservation.']
                ] as $dimension)
                <div class="col-md-4 col-sm-6 col-xs-12 mb30">
                    <div class="dimension-card">
                        <i class="fa {{ $dimension['icon'] }} dimension-icon"></i>
                        <h5>{{ $dimension['title'] }}</h5>
                        <p>{{ $dimension['desc'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Core Services -->
    <section class="section-bg mt0">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <h2 class="title-uppercased hyt mb10">Core Services</h2>
                    <p class="mb50">Comprehensive solutions across five key areas</p>
                </div>
            </div>
            <div class="row">
                @foreach ([
                    [
                        'icon' => 'fa-search',
                        'title' => 'Institutional Intelligence Audit',
                        'description' => 'Comprehensive assessment of decisions, data, processes, and systems. We evaluate decision architecture, process maturity, data flow, technology enablement, and risk continuity.'
                    ],
                    [
                        'icon' => 'fa-sitemap',
                        'title' => 'Systems & Decision Architecture',
                        'description' => 'Design foundational frameworks that define what decisions your systems must support, who owns them, and what data is relevant to each decision point.'
                    ],
                    [
                        'icon' => 'fa-code',
                        'title' => 'Digital Infrastructure & Software',
                        'description' => 'Build custom platforms including enterprise software, dashboards, AI-assisted systems, and internal platforms tailored to your specific operational needs.'
                    ],
                    [
                        'icon' => 'fa-bar-chart',
                        'title' => 'Business Intelligence & AI Enablement',
                        'description' => 'Transform data into actionable intelligence through data modeling, BI dashboards, AI readiness assessment, and selective AI integration.'
                    ],
                    [
                        'icon' => 'fa-users',
                        'title' => 'Advisory & Institutional Enablement',
                        'description' => 'Ongoing strategic support including governance design, knowledge documentation, digital strategy development, and continuous improvement programs.'
                    ]
                ] as $service)
                <div class="col-md-6 col-sm-12 mb40">
                    <div class="service-detail-box">
                        <div class="service-icon">
                            <i class="fa {{ $service['icon'] }}"></i>
                        </div>
                        <div class="service-content">
                            <h4>{{ $service['title'] }}</h4>
                            <p>{{ $service['description'] }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Engagement Model -->
    <section class="section-bg mt0 section-gray">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <h2 class="title-uppercased hyt mb10">How We Work</h2>
                    <p class="mb50">Our structured engagement model ensures clarity at every stage</p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="engagement-steps">
                        @foreach ([
                            ['step' => '01', 'title' => 'Audit', 'desc' => 'Assess current state'],
                            ['step' => '02', 'title' => 'Architecture', 'desc' => 'Design the framework'],
                            ['step' => '03', 'title' => 'Roadmap', 'desc' => 'Plan the journey'],
                            ['step' => '04', 'title' => 'Build', 'desc' => 'Implement solutions'],
                            ['step' => '05', 'title' => 'Enablement', 'desc' => 'Sustain & grow']
                        ] as $index => $step)
                        <div class="engagement-step">
                            <div class="step-number">{{ $step['step'] }}</div>
                            <h5>{{ $step['title'] }}</h5>
                            <p>{{ $step['desc'] }}</p>
                        </div>
                        @if($index < 4)
                        <div class="step-arrow">
                            <i class="fa fa-long-arrow-right"></i>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Retainer & Advisory Services -->
    <section class="section-bg mt0">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <h2 class="title-uppercased hyt mb10">Ongoing Advisory & Support</h2>
                    <p class="mb50">Partner with us for continuous strategic guidance and institutional support</p>
                </div>
            </div>
            <div class="row">
                <!-- Essential Retainer -->
                <div class="col-md-4 col-sm-12">
                    <div class="advisory-card">
                        <div class="advisory-header">
                            <h4>Essential Advisory</h4>
                            <div class="pricing-amount">
                                <span class="price-range">₦150K - ₦250K/month</span>
                            </div>
                            <p class="pricing-period">3-month minimum commitment</p>
                        </div>
                        <div class="advisory-body">
                            <p class="pricing-desc">Ongoing strategic support for growing organizations</p>
                            <ul class="pricing-list">
                                <li><i class="fa fa-check"></i> Monthly strategy call (60 min)</li>
                                <li><i class="fa fa-check"></i> Email support (48hr response)</li>
                                <li><i class="fa fa-check"></i> Quarterly roadmap reviews</li>
                                <li><i class="fa fa-check"></i> Ad-hoc guidance on decisions</li>
                            </ul>
                        </div>
                        <div class="advisory-footer">
                            <a href="{{ route('contact') }}" class="btn-slider">Learn More</a>
                        </div>
                    </div>
                </div>

                <!-- Strategic Partner -->
                <div class="col-md-4 col-sm-12">
                    <div class="advisory-card featured">
                        <div class="pricing-badge">Recommended</div>
                        <div class="advisory-header">
                            <h4>Strategic Partner</h4>
                            <div class="pricing-amount">
                                <span class="price-range">₦350K - ₦500K/month</span>
                            </div>
                            <p class="pricing-period">6-month minimum commitment</p>
                        </div>
                        <div class="advisory-body">
                            <p class="pricing-desc">Deep partnership for institutional transformation</p>
                            <ul class="pricing-list">
                                <li><i class="fa fa-check"></i> Everything in Essential</li>
                                <li><i class="fa fa-check"></i> Bi-weekly sessions (2x 90 min)</li>
                                <li><i class="fa fa-check"></i> Priority email support (24hr)</li>
                                <li><i class="fa fa-check"></i> Governance design support</li>
                                <li><i class="fa fa-check"></i> Digital strategy refinement</li>
                                <li><i class="fa fa-check"></i> Team enablement guidance</li>
                            </ul>
                        </div>
                        <div class="advisory-footer">
                            <a href="{{ route('contact') }}" class="btn-slider main">Learn More</a>
                        </div>
                    </div>
                </div>

                <!-- Institutional -->
                <div class="col-md-4 col-sm-12">
                    <div class="advisory-card">
                        <div class="advisory-header">
                            <h4>Institutional Advisory</h4>
                            <div class="pricing-amount">
                                <span class="price-range">Custom Pricing</span>
                            </div>
                            <p class="pricing-period">12-month commitment</p>
                        </div>
                        <div class="advisory-body">
                            <p class="pricing-desc">Enterprise-level strategic partnership</p>
                            <ul class="pricing-list">
                                <li><i class="fa fa-check"></i> Everything in Strategic Partner</li>
                                <li><i class="fa fa-check"></i> Dedicated weekly sessions</li>
                                <li><i class="fa fa-check"></i> On-demand support (4hr response)</li>
                                <li><i class="fa fa-check"></i> Board presentation support</li>
                                <li><i class="fa fa-check"></i> Custom framework development</li>
                                <li><i class="fa fa-check"></i> Ongoing implementation oversight</li>
                            </ul>
                        </div>
                        <div class="advisory-footer">
                            <a href="{{ route('contact') }}" class="btn-slider">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="section-bg mt0 section-extra-large bg-img stellar bg52" data-stellar-background-ratio="0.4">
        <div class="bg-overlay gradient-1"></div>
        <div class="container">
            <div class="row">
                <div class="col-sm-10 col-md-8 col-sm-offset-1 col-md-offset-2 text-center">
                    <h2 class="cta-title">Not sure which package fits?</h2>
                    <p class="cta-subtitle">Let's discuss your organization's unique needs and find the right solution together.</p>
                    <a href="javascript:void(0)" onclick="openCalendly()" class="btn-slider">Schedule a Free Consultation</a>
                </div>
            </div>
        </div>
    </section>

    @include('partials._footer')
</x-layout>

<style>
/* CTA Section Text */
.cta-title {
    color: #fff !important;
    font-size: 32px;
    font-weight: 700;
    margin-bottom: 20px;
    text-transform: uppercase;
}

.cta-subtitle {
    color: #fff !important;
    font-size: 18px;
    margin-bottom: 30px;
    opacity: 0.95;
}

/* Free Consultation Badge */
.free-consultation-badge {
    display: inline-block;
    background: linear-gradient(135deg, #DAA520 0%, #B8860B 100%);
    color: #fff;
    padding: 10px 25px;
    border-radius: 25px;
    font-size: 14px;
    font-weight: 600;
    margin-bottom: 20px;
    box-shadow: 0 4px 15px rgba(218, 165, 32, 0.3);
}

.free-consultation-badge i {
    margin-right: 8px;
}

/* Price Range */
.pricing-amount.range {
    flex-direction: column;
    align-items: center;
}

.price-range {
    font-size: 28px;
    font-weight: 700;
    color: #DAA520;
    line-height: 1.2;
}

/* Pricing Cards */
.pricing-row {
    display: flex;
    flex-wrap: wrap;
}

.pricing-row > div {
    display: flex;
    margin-bottom: 30px;
}

.pricing-card {
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 5px 30px rgba(0,0,0,0.08);
    overflow: hidden;
    position: relative;
    display: flex;
    flex-direction: column;
    width: 100%;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.pricing-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 15px 40px rgba(0,0,0,0.15);
}

.pricing-card.featured {
    border: 2px solid #DAA520;
    transform: scale(1.02);
}

.pricing-card.featured:hover {
    transform: scale(1.02) translateY(-8px);
}

.pricing-badge {
    position: absolute;
    top: 20px;
    right: -35px;
    background: #DAA520;
    color: #fff;
    padding: 6px 50px;
    font-size: 11px;
    font-weight: 600;
    text-transform: uppercase;
    transform: rotate(45deg);
    letter-spacing: 1px;
}

.pricing-card-header {
    padding: 35px 30px 25px;
    text-align: center;
    border-bottom: 1px solid #f0f0f0;
}

.pricing-tier {
    display: inline-block;
    background: #f5f5f5;
    color: #666;
    padding: 4px 12px;
    border-radius: 12px;
    font-size: 11px;
    text-transform: uppercase;
    letter-spacing: 1px;
    margin-bottom: 15px;
}

.pricing-card-header h4 {
    font-size: 18px;
    color: #333;
    margin-bottom: 20px;
    min-height: 44px;
}

.pricing-amount {
    display: flex;
    align-items: flex-start;
    justify-content: center;
    gap: 2px;
}

.pricing-amount .currency {
    font-size: 18px;
    font-weight: 600;
    color: #DAA520;
    margin-top: 5px;
}

.pricing-amount .price {
    font-size: 42px;
    font-weight: 700;
    color: #333;
    line-height: 1;
}

.pricing-period {
    color: #999;
    font-size: 13px;
    margin-top: 10px;
    margin-bottom: 0;
}

.pricing-card-body {
    padding: 25px 30px;
    flex: 1;
}

.pricing-desc {
    color: #666;
    font-size: 14px;
    line-height: 1.6;
    margin-bottom: 20px;
}

.pricing-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.pricing-list li {
    padding: 10px 0;
    border-bottom: 1px solid #f5f5f5;
    font-size: 14px;
    color: #555;
    display: flex;
    align-items: flex-start;
    gap: 10px;
}

.pricing-list li:last-child {
    border-bottom: none;
}

.pricing-list li i {
    color: #DAA520;
    margin-top: 3px;
}

.pricing-card-footer {
    padding: 25px 30px;
    background: #fafafa;
    text-align: center;
}

.pricing-card-footer .btn-slider {
    width: 100%;
    display: block;
}

/* Service Detail Boxes */
.service-detail-box {
    display: flex;
    gap: 20px;
    padding: 25px;
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 3px 15px rgba(0,0,0,0.08);
    height: 100%;
}

.service-icon {
    flex-shrink: 0;
    width: 60px;
    height: 60px;
    background: #DAA520;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.service-icon i {
    font-size: 24px;
    color: #fff;
}

.service-content h4 {
    margin-bottom: 10px;
    color: #333;
}

.service-content p {
    margin-bottom: 0;
    color: #666;
}

/* Engagement Steps */
.engagement-steps {
    display: flex;
    justify-content: center;
    align-items: flex-start;
    flex-wrap: wrap;
    gap: 10px;
}

.engagement-step {
    text-align: center;
    padding: 20px;
    flex: 1;
    min-width: 150px;
}

.step-number {
    width: 60px;
    height: 60px;
    background: #DAA520;
    color: #fff;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
    font-weight: 700;
    margin: 0 auto 15px;
}

.engagement-step h5 {
    margin-bottom: 5px;
    color: #333;
}

.engagement-step p {
    font-size: 14px;
    color: #666;
    margin: 0;
}

.step-arrow {
    display: flex;
    align-items: center;
    padding-top: 20px;
    color: #DAA520;
    font-size: 24px;
}

@media (max-width: 768px) {
    .step-arrow {
        display: none;
    }

    .engagement-step {
        min-width: 100%;
    }

    .service-detail-box {
        flex-direction: column;
        text-align: center;
    }

    .service-icon {
        margin: 0 auto;
    }

    .pricing-card.featured {
        transform: none;
    }

    .pricing-card.featured:hover {
        transform: translateY(-8px);
    }
}

/* IDIA Dimension Cards */
.dimension-card {
    background: #fff;
    padding: 25px 20px;
    border-radius: 8px;
    box-shadow: 0 2px 12px rgba(0,0,0,0.06);
    transition: all 0.3s ease;
    text-align: center;
    height: 100%;
    min-height: 220px;
}

.dimension-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 20px rgba(0,0,0,0.1);
}

.dimension-icon {
    font-size: 36px;
    color: #DAA520;
    margin-bottom: 15px;
}

.dimension-card h5 {
    font-size: 17px;
    font-weight: 600;
    color: #333;
    margin-bottom: 12px;
}

.dimension-card p {
    font-size: 14px;
    color: #666;
    line-height: 1.6;
    margin: 0;
}

/* Advisory/Retainer Cards */
.advisory-card {
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 3px 20px rgba(0,0,0,0.08);
    transition: all 0.3s ease;
    margin-bottom: 30px;
    position: relative;
    overflow: hidden;
}

.advisory-card.featured {
    border: 2px solid #DAA520;
    transform: scale(1.05);
}

.advisory-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 8px 30px rgba(0,0,0,0.12);
}

.advisory-card.featured:hover {
    transform: scale(1.05) translateY(-8px);
}

.advisory-header {
    padding: 30px 25px 20px;
    text-align: center;
    background: linear-gradient(135deg, #f9f9f9 0%, #fff 100%);
}

.advisory-header h4 {
    font-size: 22px;
    font-weight: 600;
    color: #333;
    margin-bottom: 15px;
}

.advisory-body {
    padding: 20px 25px 30px;
}

.advisory-footer {
    padding: 0 25px 30px;
    text-align: center;
}

@media (max-width: 768px) {
    .dimension-card {
        min-height: auto;
        margin-bottom: 20px;
    }

    .advisory-card.featured {
        transform: none;
        margin: 20px 0;
    }

    .advisory-card.featured:hover {
        transform: translateY(-5px);
    }
}
</style>
