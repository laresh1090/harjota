<div class="hero-wrapper">
    <div class="tp-banner-container" data-full-width="on" data-on-hover-stop="off" data-full-screen="on">
        <div class="tp-banner">
            <ul>
                <li data-transition="fade" data-masterspeed="500" data-slotamount="7" data-delay="8000" data-thumb="{{ asset('i/a1.png') }}">
                    <img src="{{ asset('i/a1.png') }}" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat" alt="Harjota institutional intelligence consulting" loading="lazy">
                    <div class="bg-overlay gradient-1"></div>
                </li>
                <li data-transition="boxslider" data-masterspeed="500" data-slotamount="7" data-delay="8000" data-thumb="{{ asset('i/ss.jpg') }}">
                    <img src="{{ asset('i/ss.jpg') }}" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat" alt="Digital systems and operational excellence" loading="lazy">
                    <div class="bg-overlay gradient-1"></div>
                </li>
            </ul>
        </div>
    </div>

    <!-- Fixed Caption Overlay -->
    <div class="hero-fixed-caption">
        <div class="container">
            <div class="row">
                <div class="col-sm-10 col-md-8 col-sm-offset-1 col-md-offset-2 text-center">
                    <h1 class="hero-title">Institutional Intelligence Partner</h1>
                    <p class="hero-subtitle">We help organizations embed clarity, decision intelligence, and operational continuity into their core systems.</p>
                    <div class="hero-cta">
                        <a href="{{ route('assessment.show', 'centralized-business-intelligence-assessment') }}" class="btn-slider main">Free Assessment</a>
                        <a href="{{ route('services') }}" class="btn-slider">Our Services</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.hero-wrapper {
    position: relative;
}

.hero-fixed-caption {
    position: absolute;
    top: 55%;
    left: 0;
    right: 0;
    transform: translateY(-50%);
    z-index: 100;
    pointer-events: none;
}

.hero-fixed-caption .container {
    pointer-events: auto;
}

.hero-title {
    color: #fff;
    font-size: 48px;
    font-weight: 700;
    max-width: 800px;
    margin: 0 auto 20px;
    line-height: 1.2;
    text-shadow: 0 2px 8px rgba(0,0,0,0.3);
}

.hero-subtitle {
    color: #fff;
    font-size: 20px;
    max-width: 650px;
    margin: 0 auto 35px;
    line-height: 1.7;
    text-shadow: 0 2px 8px rgba(0,0,0,0.3);
}

.hero-cta {
    display: flex;
    justify-content: center;
    align-items: stretch;
    gap: 20px;
    flex-wrap: wrap;
}

.hero-cta .btn-slider {
    min-width: 180px;
    text-align: center;
}

@media (max-width: 768px) {
    .hero-fixed-caption {
        top: 58%;
    }

    .hero-title {
        font-size: 28px;
        padding: 0 15px;
        margin-bottom: 15px;
    }

    .hero-subtitle {
        font-size: 16px;
        padding: 0 15px;
        margin-bottom: 25px;
    }

    .hero-cta {
        flex-direction: column;
        padding: 0 30px;
        gap: 15px;
    }

    .hero-cta .btn-slider {
        width: 100%;
        min-width: auto;
        padding: 16px 32px;
    }
}
</style>
