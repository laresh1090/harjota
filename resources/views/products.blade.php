<x-layout>
    @section('title', 'Products - Harjota')

    <x-hero-one
        title="Our Products"
        background="i/a1.png"
        :breadcrumbs="[
            ['url' => route('home'), 'title' => 'Home'],
            ['url' => route('products'), 'title' => 'Products']
        ]"
    />

    <!-- Products Intro -->
    <section class="section-bg mt0">
        <div class="container">
            <div class="row">
                <div class="col-sm-10 col-md-8 col-sm-offset-1 col-md-offset-2 text-center">
                    <p class="text-4 mb0">Purpose-built solutions that embody Harjota's institutional intelligence philosophy.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Flagship Product -->
    <section class="section-bg mt0 section-gray">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <span class="product-badge dev">In Development</span>
                    <h2 class="title-uppercased hyt mb10">Academic Intelligence System</h2>
                    <p class="product-tagline mb20">The Operating System for Educational Institutions</p>
                    <p class="mb50">Transform decision-making. Preserve institutional knowledge. Operate with competitive advantage.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-12 mb30">
                    <div class="product-image-wrapper">
                        <div class="product-image-placeholder">
                            <img src="{{ asset('harjota1.jpg') }}" alt="Academic Intelligence System" loading="lazy">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="product-features">
                        <!-- Differentiator Box -->
                        <div class="differentiator-box mb30">
                            <h5 style="font-size: 16px; font-weight: 600; color: #333; margin-bottom: 15px;">
                                <i class="fa fa-star" style="color: #DAA520; margin-right: 8px;"></i>Unlike Generic BI Platforms
                            </h5>
                            <p style="font-size: 14px; line-height: 1.7; color: #666; margin: 0;">
                                AIS captures and operationalizes your institution's accumulated knowledge,
                                embedding decades of decision logic into executable AI. More than dashboards—
                                <strong>institutional intelligence that survives leadership transitions.</strong>
                            </p>
                        </div>

                        <p class="mb30">A unified <strong>AI-powered Business Intelligence</strong> platform that transforms how educational institutions operate, make data-driven decisions, and preserve institutional knowledge through intelligent automation.</p>
                        <ul class="feature-list">
                            <li>
                                <i class="fa fa-check-circle"></i>
                                <div>
                                    <strong>AI-Powered Academic Operations</strong>
                                    <p>Smart scheduling, curriculum optimization, and predictive resource allocation</p>
                                </div>
                            </li>
                            <li>
                                <i class="fa fa-check-circle"></i>
                                <div>
                                    <strong>Intelligent Workflow Automation</strong>
                                    <p>AI-driven process automation for administrative tasks and approvals</p>
                                </div>
                            </li>
                            <li>
                                <i class="fa fa-check-circle"></i>
                                <div>
                                    <strong>Advanced BI Analytics & Reporting</strong>
                                    <p>Real-time dashboards with predictive analytics and actionable insights</p>
                                </div>
                            </li>
                            <li>
                                <i class="fa fa-check-circle"></i>
                                <div>
                                    <strong>AI Decision-Support System</strong>
                                    <p>Machine learning-powered recommendations for strategic decision-making</p>
                                </div>
                            </li>
                            <li>
                                <i class="fa fa-check-circle"></i>
                                <div>
                                    <strong>Knowledge Intelligence Engine</strong>
                                    <p>AI-assisted capture, indexing, and retrieval of institutional knowledge</p>
                                </div>
                            </li>
                        </ul>
                        <div class="product-status">
                            <span class="status-badge in-dev">In Development</span>
                        </div>
                        <div class="product-ctas mt30">
                            <a href="javascript:void(0)" onclick="openCalendly()" class="btn btn-primary">Request Demo</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Coming Soon -->
    <section class="section-bg mt0">
        <div class="container">
            <div class="row">
                <div class="col-sm-10 col-md-8 col-sm-offset-1 col-md-offset-2 text-center">
                    <h2 class="title-uppercased hyt mb10">More Solutions in Development</h2>
                    <p class="mb40">We're building more industry-specific intelligence systems. Be the first to know when they launch.</p>
                    <div class="coming-soon-grid">
                        <div class="coming-soon-item">
                            <div class="coming-soon-icon">
                                <i class="fa fa-hospital-o"></i>
                            </div>
                            <div class="coming-soon-content">
                                <span class="coming-soon-badge">Coming Soon</span>
                                <h5>Hospital Intelligence & Operational Decision System</h5>
                                <p class="coming-soon-desc">AI-powered operational intelligence for healthcare institutions—optimizing patient flow, resource allocation, and clinical decision support.</p>
                                <ul class="coming-soon-features">
                                    <li><i class="fa fa-check"></i> Patient flow optimization</li>
                                    <li><i class="fa fa-check"></i> Resource allocation</li>
                                    <li><i class="fa fa-check"></i> Clinical decision support</li>
                                </ul>
                            </div>
                        </div>
                        <div class="coming-soon-item">
                            <div class="coming-soon-icon">
                                <i class="fa fa-map-marker"></i>
                            </div>
                            <div class="coming-soon-content">
                                <span class="coming-soon-badge">Coming Soon</span>
                                <h5>Spatial Intelligence & Navigation System</h5>
                                <p class="coming-soon-desc">Smart wayfinding and spatial analytics for large campuses, hospitals, and multi-building institutions.</p>
                                <ul class="coming-soon-features">
                                    <li><i class="fa fa-check"></i> Indoor navigation</li>
                                    <li><i class="fa fa-check"></i> Space utilization analytics</li>
                                    <li><i class="fa fa-check"></i> Multi-building routing</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Custom Solutions CTA -->
    <section class="section-bg mt0 section-extra-large bg-img stellar bg52" data-stellar-background-ratio="0.4">
        <div class="bg-overlay gradient-1"></div>
        <div class="container">
            <div class="row">
                <div class="col-sm-10 col-md-8 col-sm-offset-1 col-md-offset-2 text-center">
                    <h2 class="title-uppercased color-light mb20">Need a Tailored Solution?</h2>
                    <p class="color-light mb40">We build custom institutional intelligence systems for organizations with unique requirements.</p>
                    <a href="javascript:void(0)" onclick="openCalendly()" class="btn btn-primary btn-lg">Discuss Your Project</a>
                </div>
            </div>
        </div>
    </section>

    @include('partials._footer')
</x-layout>

<style>
/* Product Badge */
.product-badge {
    display: inline-block;
    background: #DAA520;
    color: #fff;
    padding: 8px 20px;
    border-radius: 20px;
    font-size: 12px;
    text-transform: uppercase;
    letter-spacing: 1px;
    margin-bottom: 20px;
}

.product-badge.dev {
    background: linear-gradient(135deg, #666 0%, #444 100%);
}

/* Product Image */
.product-image-wrapper {
    position: relative;
    border-radius: 12px;
    overflow: hidden;
    height: 100%;
    min-height: 400px;
}

.product-image-placeholder {
    background: #f5f5f5;
    height: 100%;
    min-height: 400px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.product-image-placeholder img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    filter: brightness(0.85);
}

/* Feature List */
.feature-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.feature-list li {
    display: flex;
    gap: 15px;
    margin-bottom: 20px;
}

.feature-list li i {
    color: #DAA520;
    font-size: 24px;
    margin-top: 3px;
}

.feature-list li strong {
    display: block;
    color: #333;
    margin-bottom: 5px;
}

.feature-list li p {
    margin: 0;
    color: #666;
    font-size: 14px;
}

/* Status Badge */
.product-status {
    margin-top: 20px;
}

.status-badge {
    display: inline-block;
    background: #f0f0f0;
    color: #666;
    padding: 5px 15px;
    border-radius: 15px;
    font-size: 12px;
}

.status-badge.available {
    background: #DAA520;
    color: #fff;
}

.status-badge.in-dev {
    background: linear-gradient(135deg, #666 0%, #444 100%);
    color: #fff;
}

/* Product CTAs */
.product-ctas {
    display: flex;
    gap: 15px;
    flex-wrap: wrap;
}

/* Coming Soon Grid */
.coming-soon-grid {
    display: flex;
    justify-content: center;
    gap: 30px;
    flex-wrap: wrap;
    margin-top: 30px;
}

.coming-soon-item {
    background: #fff;
    border-radius: 12px;
    padding: 30px;
    text-align: left;
    flex: 1;
    max-width: 450px;
    min-width: 320px;
    box-shadow: 0 5px 30px rgba(0,0,0,0.08);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    border: 1px solid #f0f0f0;
    display: flex;
    gap: 25px;
}

.coming-soon-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 40px rgba(0,0,0,0.12);
}

.coming-soon-icon {
    width: 70px;
    height: 70px;
    background: linear-gradient(135deg, #DAA520 0%, #B8860B 100%);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

.coming-soon-icon i {
    font-size: 28px;
    color: #fff;
}

.coming-soon-content {
    flex: 1;
}

.coming-soon-badge {
    display: inline-block;
    background: linear-gradient(135deg, #666 0%, #444 100%);
    color: #fff;
    padding: 5px 12px;
    border-radius: 15px;
    font-size: 10px;
    text-transform: uppercase;
    letter-spacing: 1px;
    font-weight: 600;
    margin-bottom: 12px;
}

.coming-soon-item h5 {
    margin-bottom: 10px;
    color: #333;
    font-size: 17px;
    font-weight: 600;
    line-height: 1.4;
}

.coming-soon-desc {
    color: #666;
    font-size: 13px;
    line-height: 1.5;
    margin-bottom: 15px;
}

.coming-soon-features {
    list-style: none;
    padding: 0;
    margin: 0;
}

.coming-soon-features li {
    color: #555;
    font-size: 13px;
    padding: 4px 0;
    display: flex;
    align-items: center;
    gap: 8px;
}

.coming-soon-features li i {
    color: #DAA520;
    font-size: 12px;
}

/* CTA Section Text */
.color-light {
    color: #fff !important;
}

/* Product Tagline */
.product-tagline {
    font-size: 20px;
    font-weight: 600;
    color: #DAA520;
    font-style: italic;
}

/* Differentiator Box */
.differentiator-box {
    background: linear-gradient(135deg, #fff9e6 0%, #fffbf0 100%);
    border-left: 4px solid #DAA520;
    padding: 20px 25px;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(218,165,32,0.1);
}

@media (max-width: 768px) {
    .product-image-wrapper {
        min-height: 250px;
        margin-bottom: 30px;
    }

    .product-image-placeholder {
        min-height: 250px;
    }

    .coming-soon-item {
        min-width: 100%;
        max-width: 100%;
        flex-direction: column;
        text-align: center;
    }

    .coming-soon-icon {
        margin: 0 auto;
    }

    .coming-soon-content {
        text-align: left;
    }

    .product-ctas {
        flex-direction: column;
    }

    .product-ctas .btn {
        width: 100%;
    }

    .product-tagline {
        font-size: 18px;
    }
}
</style>
