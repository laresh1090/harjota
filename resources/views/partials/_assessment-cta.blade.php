<!-- Free Assessment CTA Section -->
<section class="assessment-cta-section">
    <div class="cta-bg-pattern"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="assessment-cta-box">
                    <div class="cta-glow"></div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="assessment-cta-content">
                                <div class="cta-badge-wrap">
                                    <span class="cta-badge"><i class="fa fa-bolt"></i> Free Assessment</span>
                                    <span class="cta-time"><i class="fa fa-clock-o"></i> 10 minutes</span>
                                </div>
                                <h2>How Intelligent Is <span class="text-highlight">Your Business?</span></h2>
                                <p class="cta-lead">Discover where your organization stands and unlock your competitive advantage.</p>
                                <ul class="cta-benefits">
                                    <li>
                                        <div class="benefit-icon"><i class="fa fa-pie-chart"></i></div>
                                        <div class="benefit-text">
                                            <strong>Intelligence Score</strong>
                                            <span>Across 5 critical business areas</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="benefit-icon"><i class="fa fa-search"></i></div>
                                        <div class="benefit-text">
                                            <strong>Hidden Inefficiencies</strong>
                                            <span>Costing you time and money</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="benefit-icon"><i class="fa fa-lightbulb-o"></i></div>
                                        <div class="benefit-text">
                                            <strong>Actionable Insights</strong>
                                            <span>Tailored to your business needs</span>
                                        </div>
                                    </li>
                                </ul>
                                <div class="cta-action">
                                    <a href="{{ route('assessment.show', 'centralized-business-intelligence-assessment') }}" class="btn-assessment-cta">
                                        <span>Start Free Assessment</span>
                                        <i class="fa fa-arrow-right"></i>
                                    </a>
                                    <p class="cta-note"><i class="fa fa-lock"></i> No credit card required</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="assessment-cta-visual">
                                <div class="score-card">
                                    <div class="score-card-header">
                                        <span class="card-label">Your Score Preview</span>
                                    </div>
                                    <div class="score-ring-container">
                                        <svg class="score-ring" viewBox="0 0 120 120">
                                            <circle class="ring-bg" cx="60" cy="60" r="54" />
                                            <circle class="ring-progress" cx="60" cy="60" r="54" />
                                        </svg>
                                        <div class="score-center">
                                            <span class="score-question">?</span>
                                            <span class="score-label">Your Score</span>
                                        </div>
                                    </div>
                                    <div class="score-categories">
                                        <div class="score-cat" data-delay="0">
                                            <div class="cat-icon"><i class="fa fa-compass"></i></div>
                                            <div class="cat-info">
                                                <span class="cat-name">Decision Making</span>
                                                <div class="cat-progress"><div class="cat-bar"></div></div>
                                            </div>
                                        </div>
                                        <div class="score-cat" data-delay="100">
                                            <div class="cat-icon"><i class="fa fa-database"></i></div>
                                            <div class="cat-info">
                                                <span class="cat-name">Data & Information</span>
                                                <div class="cat-progress"><div class="cat-bar"></div></div>
                                            </div>
                                        </div>
                                        <div class="score-cat" data-delay="200">
                                            <div class="cat-icon"><i class="fa fa-cogs"></i></div>
                                            <div class="cat-info">
                                                <span class="cat-name">Operations</span>
                                                <div class="cat-progress"><div class="cat-bar"></div></div>
                                            </div>
                                        </div>
                                        <div class="score-cat" data-delay="300">
                                            <div class="cat-icon"><i class="fa fa-shield"></i></div>
                                            <div class="cat-info">
                                                <span class="cat-name">Technology</span>
                                                <div class="cat-progress"><div class="cat-bar"></div></div>
                                            </div>
                                        </div>
                                        <div class="score-cat" data-delay="400">
                                            <div class="cat-icon"><i class="fa fa-users"></i></div>
                                            <div class="cat-info">
                                                <span class="cat-name">Team & Growth</span>
                                                <div class="cat-progress"><div class="cat-bar"></div></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.assessment-cta-section {
    position: relative;
    background: linear-gradient(135deg, #0f0f1a 0%, #1a1a2e 50%, #16213e 100%);
    padding: 100px 0;
    overflow: hidden;
}

.cta-bg-pattern {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-image:
        radial-gradient(circle at 20% 80%, rgba(218, 165, 32, 0.1) 0%, transparent 50%),
        radial-gradient(circle at 80% 20%, rgba(218, 165, 32, 0.08) 0%, transparent 50%);
    pointer-events: none;
}

.assessment-cta-box {
    position: relative;
    background: rgba(255, 255, 255, 0.98);
    border-radius: 24px;
    padding: 60px;
    box-shadow:
        0 30px 80px rgba(0, 0, 0, 0.4),
        0 0 0 1px rgba(218, 165, 32, 0.1);
    overflow: hidden;
}

.cta-glow {
    position: absolute;
    top: -50%;
    right: -20%;
    width: 400px;
    height: 400px;
    background: radial-gradient(circle, rgba(218, 165, 32, 0.15) 0%, transparent 70%);
    pointer-events: none;
}

.cta-badge-wrap {
    display: flex;
    align-items: center;
    gap: 15px;
    margin-bottom: 20px;
    flex-wrap: wrap;
}

.cta-badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: linear-gradient(135deg, #DAA520 0%, #B8860B 100%);
    color: #fff;
    padding: 8px 18px;
    border-radius: 25px;
    font-size: 12px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 1px;
    box-shadow: 0 4px 15px rgba(218, 165, 32, 0.3);
}

.cta-badge i {
    font-size: 11px;
}

.cta-time {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    color: #666;
    font-size: 13px;
    font-weight: 500;
}

.cta-time i {
    color: #999;
}

.assessment-cta-content h2 {
    font-size: 36px;
    font-weight: 800;
    color: #1a1a2e;
    margin-bottom: 15px;
    line-height: 1.25;
}

.text-highlight {
    color: #DAA520;
    position: relative;
}

.cta-lead {
    font-size: 17px;
    color: #555;
    margin-bottom: 30px;
    line-height: 1.6;
}

.cta-benefits {
    list-style: none;
    padding: 0;
    margin: 0 0 35px;
}

.cta-benefits li {
    display: flex;
    align-items: flex-start;
    gap: 15px;
    margin-bottom: 18px;
    padding: 15px;
    background: linear-gradient(135deg, #f8f9fa 0%, #fff 100%);
    border-radius: 12px;
    border: 1px solid #eee;
    transition: transform 0.2s ease, box-shadow 0.2s ease, border-color 0.2s ease;
}

.cta-benefits li:hover {
    transform: translateX(5px);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.06);
    border-color: rgba(218, 165, 32, 0.3);
}

.benefit-icon {
    width: 44px;
    height: 44px;
    min-width: 44px;
    background: linear-gradient(135deg, #DAA520 0%, #B8860B 100%);
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #fff;
    font-size: 18px;
    box-shadow: 0 4px 12px rgba(218, 165, 32, 0.25);
}

.benefit-text {
    display: flex;
    flex-direction: column;
    gap: 3px;
}

.benefit-text strong {
    font-size: 15px;
    font-weight: 700;
    color: #1a1a2e;
}

.benefit-text span {
    font-size: 13px;
    color: #666;
}

.cta-action {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    gap: 12px;
}

.btn-assessment-cta {
    display: inline-flex;
    align-items: center;
    gap: 12px;
    background: linear-gradient(135deg, #DAA520 0%, #B8860B 100%);
    color: #fff;
    padding: 18px 35px;
    border-radius: 50px;
    font-size: 16px;
    font-weight: 700;
    text-decoration: none;
    box-shadow: 0 8px 25px rgba(218, 165, 32, 0.35);
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.btn-assessment-cta:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 30px rgba(218, 165, 32, 0.45);
    color: #fff;
    text-decoration: none;
}

.btn-assessment-cta i {
    transition: transform 0.2s ease;
}

.btn-assessment-cta:hover i {
    transform: translateX(4px);
}

.cta-note {
    font-size: 13px;
    color: #888;
    margin: 0;
    display: flex;
    align-items: center;
    gap: 6px;
}

.cta-note i {
    color: #28a745;
    font-size: 12px;
}

/* Right Side - Score Card */
.assessment-cta-visual {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100%;
}

.score-card {
    background: linear-gradient(145deg, #1a1a2e 0%, #16213e 100%);
    border-radius: 20px;
    padding: 30px;
    width: 100%;
    position: relative;
    overflow: hidden;
    box-shadow:
        0 20px 50px rgba(0, 0, 0, 0.3),
        inset 0 1px 0 rgba(255, 255, 255, 0.1);
}

.score-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 1px;
    background: linear-gradient(90deg, transparent, rgba(218, 165, 32, 0.5), transparent);
}

.score-card-header {
    text-align: center;
    margin-bottom: 25px;
}

.card-label {
    font-size: 12px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 2px;
    color: rgba(255, 255, 255, 0.5);
}

.score-ring-container {
    position: relative;
    width: 140px;
    height: 140px;
    margin: 0 auto 30px;
}

.score-ring {
    width: 100%;
    height: 100%;
    transform: rotate(-90deg);
}

.ring-bg {
    fill: none;
    stroke: rgba(255, 255, 255, 0.1);
    stroke-width: 8;
}

.ring-progress {
    fill: none;
    stroke: url(#goldGradient);
    stroke-width: 8;
    stroke-linecap: round;
    stroke-dasharray: 339.292;
    stroke-dashoffset: 170;
}

.score-center {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
}

.score-question {
    display: block;
    font-size: 48px;
    font-weight: 800;
    color: #DAA520;
    line-height: 1;
}

.score-label {
    font-size: 11px;
    text-transform: uppercase;
    letter-spacing: 1px;
    color: rgba(255, 255, 255, 0.4);
    margin-top: 5px;
}

.score-categories {
    display: flex;
    flex-direction: column;
    gap: 12px;
}

.score-cat {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 10px 12px;
    background: rgba(255, 255, 255, 0.05);
    border-radius: 10px;
    transition: background 0.2s ease;
}

.score-cat:hover {
    background: rgba(255, 255, 255, 0.08);
}

.cat-icon {
    width: 32px;
    height: 32px;
    min-width: 32px;
    background: rgba(218, 165, 32, 0.15);
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #DAA520;
    font-size: 14px;
}

.cat-info {
    flex: 1;
}

.cat-name {
    display: block;
    font-size: 12px;
    font-weight: 600;
    color: rgba(255, 255, 255, 0.8);
    margin-bottom: 6px;
}

.cat-progress {
    height: 6px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 3px;
    overflow: hidden;
}

.cat-bar {
    height: 100%;
    background: linear-gradient(90deg, #DAA520, #ffc107);
    border-radius: 3px;
}

.score-cat:nth-child(1) .cat-bar { width: 65%; }
.score-cat:nth-child(2) .cat-bar { width: 50%; }
.score-cat:nth-child(3) .cat-bar { width: 70%; }
.score-cat:nth-child(4) .cat-bar { width: 45%; }
.score-cat:nth-child(5) .cat-bar { width: 55%; }

/* Responsive Styles */
@media (max-width: 991px) {
    .assessment-cta-section {
        padding: 80px 0;
    }

    .assessment-cta-box {
        padding: 45px 35px;
    }

    .assessment-cta-content h2 {
        font-size: 30px;
    }

    .assessment-cta-visual {
        margin-top: 50px;
    }
}

@media (max-width: 768px) {
    .assessment-cta-section {
        padding: 60px 0;
    }

    .assessment-cta-box {
        padding: 35px 25px;
    }

    .assessment-cta-content h2 {
        font-size: 26px;
    }

    .cta-lead {
        font-size: 15px;
    }

    .cta-benefits li {
        padding: 12px;
    }

    .benefit-icon {
        width: 38px;
        height: 38px;
        min-width: 38px;
        font-size: 16px;
    }

    .btn-assessment-cta {
        width: 100%;
        justify-content: center;
        padding: 16px 30px;
    }

    .score-ring-container {
        width: 120px;
        height: 120px;
    }

    .score-question {
        font-size: 40px;
    }

    .score-card {
        padding: 25px 20px;
    }
}

/* Respect user's motion preferences */
@media (prefers-reduced-motion: reduce) {
    .cta-benefits li,
    .btn-assessment-cta,
    .btn-assessment-cta i,
    .score-cat {
        transition: none;
    }

    .cta-benefits li:hover {
        transform: none;
    }

    .btn-assessment-cta:hover {
        transform: none;
    }

    .btn-assessment-cta:hover i {
        transform: none;
    }
}
</style>

<svg style="position: absolute; width: 0; height: 0;">
    <defs>
        <linearGradient id="goldGradient" x1="0%" y1="0%" x2="100%" y2="0%">
            <stop offset="0%" style="stop-color:#DAA520" />
            <stop offset="100%" style="stop-color:#ffc107" />
        </linearGradient>
    </defs>
</svg>
