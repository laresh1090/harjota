<x-layout>
    <!-- Hero Section -->
    <x-hero-one
        title="Assessment Complete!"
        background="i/ss.jpg"
        :breadcrumbs="[
            ['url' => route('home'), 'title' => 'Home'],
            ['url' => route('assessment.show', $questionnaire), 'title' => $questionnaire->title],
            ['url' => '#', 'title' => 'Results']
        ]"
    />

    @if($response && $response->category_scores)
        <!-- Results Dashboard -->
        <section class="section-bg mt0">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <!-- Overall Score Card -->
                        <div class="results-hero-card text-center mb40">
                            <div class="score-circle {{ $response->score_percentage >= 70 ? 'score-good' : ($response->score_percentage >= 50 ? 'score-moderate' : 'score-needs-work') }}">
                                <span class="score-number">{{ $response->score_percentage }}</span>
                                <span class="score-percent">%</span>
                            </div>
                            <h2 class="results-title">Your Business Intelligence Score</h2>
                            <p class="results-level">Intelligence Level: <strong>{{ $response->intelligence_level }}</strong></p>
                            <p class="results-subtitle">
                                You scored <strong>{{ $response->total_score }}</strong> out of <strong>{{ $response->max_possible_score }}</strong> possible points
                            </p>
                        </div>

                        <!-- Category Breakdown -->
                        <div class="category-results mb40">
                            <h3 class="section-title text-center mb30">Score Breakdown by Category</h3>
                            <div class="category-grid">
                                @foreach($response->category_scores as $category => $data)
                                    <div class="category-card">
                                        <div class="category-header">
                                            <h4>{{ $data['title'] }}</h4>
                                            <span class="category-score {{ $data['percentage'] >= 70 ? 'score-good' : ($data['percentage'] >= 50 ? 'score-moderate' : 'score-needs-work') }}">
                                                {{ $data['percentage'] }}%
                                            </span>
                                        </div>
                                        <div class="progress-bar-container">
                                            <div class="progress-bar-fill {{ $data['percentage'] >= 70 ? 'bar-good' : ($data['percentage'] >= 50 ? 'bar-moderate' : 'bar-needs-work') }}"
                                                 style="width: {{ $data['percentage'] }}%"></div>
                                        </div>
                                        <p class="category-detail">{{ $data['score'] }} / {{ $data['max_score'] }} points</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Interpretation Guide -->
                        <div class="interpretation-box mb40">
                            <h3 class="text-center mb20">What Your Score Means</h3>
                            <div class="interpretation-grid">
                                <div class="interpretation-item {{ $response->score_percentage >= 85 ? 'active' : '' }}">
                                    <span class="level-badge badge-optimized">85-100%</span>
                                    <strong>Optimized</strong>
                                    <p>Your organization has mature business intelligence practices</p>
                                </div>
                                <div class="interpretation-item {{ $response->score_percentage >= 70 && $response->score_percentage < 85 ? 'active' : '' }}">
                                    <span class="level-badge badge-managed">70-84%</span>
                                    <strong>Managed</strong>
                                    <p>Good foundation with room for targeted improvements</p>
                                </div>
                                <div class="interpretation-item {{ $response->score_percentage >= 50 && $response->score_percentage < 70 ? 'active' : '' }}">
                                    <span class="level-badge badge-developing">50-69%</span>
                                    <strong>Developing</strong>
                                    <p>Key systems exist but lack integration and consistency</p>
                                </div>
                                <div class="interpretation-item {{ $response->score_percentage < 50 ? 'active' : '' }}">
                                    <span class="level-badge badge-initial">0-49%</span>
                                    <strong>Initial</strong>
                                    <p>Significant opportunities to build foundational intelligence</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Next Steps Section -->
        <section class="section-bg section-gray mt0">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="next-steps-card text-center">
                            <h3 class="mb20">What Happens Next?</h3>
                            <div class="steps-timeline">
                                <div class="step-item">
                                    <div class="step-icon">
                                        <i class="fa fa-file-text-o"></i>
                                    </div>
                                    <div class="step-content">
                                        <h5>Detailed Report</h5>
                                        <p>You'll receive a comprehensive PDF report with personalized recommendations within 2-3 business days.</p>
                                    </div>
                                </div>
                                <div class="step-item">
                                    <div class="step-icon">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    <div class="step-content">
                                        <h5>Strategy Call</h5>
                                        <p>Our team will reach out to schedule a complimentary 30-minute consultation to discuss your results.</p>
                                    </div>
                                </div>
                                <div class="step-item">
                                    <div class="step-icon">
                                        <i class="fa fa-rocket"></i>
                                    </div>
                                    <div class="step-content">
                                        <h5>Action Plan</h5>
                                        <p>We'll help you prioritize improvements based on your specific challenges and goals.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="action-buttons mt30">
                                <a href="{{ route('contact') }}" class="btn btn-e btn-lg">
                                    <i class="fa fa-calendar"></i> Schedule Consultation Now
                                </a>
                                <a href="{{ url('/') }}" class="btn btn-default btn-lg">
                                    <i class="fa fa-home"></i> Return to Homepage
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @else
        <!-- Generic Thank You (no scores) -->
        <section class="section-bg mt0">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="thank-you-box text-center">
                            <div class="success-icon">
                                <i class="fa fa-check-circle"></i>
                            </div>

                            <h2 class="title-uppercased hyt mb20">Submission Successful</h2>

                            <p class="text-4 mb30">
                                Your assessment has been successfully submitted. We appreciate you taking the time to complete the
                                <strong>{{ $questionnaire->title }}</strong>.
                            </p>

                            @if($questionnaire->completion_message)
                                <div class="completion-message mb30">
                                    <p>{{ $questionnaire->completion_message }}</p>
                                </div>
                            @endif

                            <div class="next-steps-box mb40">
                                <h4>What Happens Next?</h4>
                                <div class="steps-list">
                                    <div class="step-item">
                                        <i class="fa fa-bar-chart"></i>
                                        <span>Our team will analyze your assessment results</span>
                                    </div>
                                    <div class="step-item">
                                        <i class="fa fa-file-text-o"></i>
                                        <span>You'll receive a personalized intelligence report within 2-3 business days</span>
                                    </div>
                                    <div class="step-item">
                                        <i class="fa fa-phone"></i>
                                        <span>We'll schedule a complimentary consultation to discuss your results</span>
                                    </div>
                                </div>
                            </div>

                            <div class="action-buttons">
                                <a href="{{ url('/') }}" class="btn btn-e btn-lg">
                                    <i class="fa fa-home"></i> Return to Homepage
                                </a>
                                <a href="{{ route('contact') }}" class="btn btn-default btn-lg">
                                    <i class="fa fa-calendar"></i> Schedule a Call
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    @include('partials._cta-section')
    @include('partials._footer')
</x-layout>

<style>
/* Results Hero Card */
.results-hero-card {
    background: #fff;
    border-radius: 12px;
    padding: 50px 40px;
    box-shadow: 0 10px 40px rgba(0,0,0,0.1);
}

.score-circle {
    width: 180px;
    height: 180px;
    border-radius: 50%;
    margin: 0 auto 30px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    border: 8px solid;
}

.score-circle.score-good {
    background: linear-gradient(135deg, #d4edda 0%, #c3e6cb 100%);
    border-color: #28a745;
}

.score-circle.score-moderate {
    background: linear-gradient(135deg, #fff3cd 0%, #ffeaa7 100%);
    border-color: #DAA520;
}

.score-circle.score-needs-work {
    background: linear-gradient(135deg, #f8d7da 0%, #f5c6cb 100%);
    border-color: #dc3545;
}

.score-number {
    font-size: 64px;
    font-weight: 700;
    line-height: 1;
    color: #333;
}

.score-percent {
    font-size: 24px;
    font-weight: 600;
    color: #666;
}

.results-title {
    font-size: 28px;
    font-weight: 700;
    color: #333;
    margin-bottom: 10px;
}

.results-level {
    font-size: 18px;
    color: #666;
    margin-bottom: 5px;
}

.results-subtitle {
    font-size: 16px;
    color: #888;
}

/* Category Results */
.section-title {
    font-size: 24px;
    font-weight: 700;
    color: #333;
}

.category-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 20px;
}

.category-card {
    background: #fff;
    border-radius: 8px;
    padding: 25px;
    box-shadow: 0 3px 15px rgba(0,0,0,0.08);
}

.category-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 15px;
}

.category-header h4 {
    font-size: 16px;
    font-weight: 600;
    color: #333;
    margin: 0;
}

.category-score {
    font-size: 20px;
    font-weight: 700;
    padding: 5px 12px;
    border-radius: 20px;
}

.category-score.score-good {
    background: #d4edda;
    color: #155724;
}

.category-score.score-moderate {
    background: #fff3cd;
    color: #856404;
}

.category-score.score-needs-work {
    background: #f8d7da;
    color: #721c24;
}

.progress-bar-container {
    height: 12px;
    background: #e9ecef;
    border-radius: 6px;
    overflow: hidden;
    margin-bottom: 10px;
}

.progress-bar-fill {
    height: 100%;
    border-radius: 6px;
    transition: width 1s ease;
}

.progress-bar-fill.bar-good {
    background: linear-gradient(90deg, #28a745, #20c997);
}

.progress-bar-fill.bar-moderate {
    background: linear-gradient(90deg, #DAA520, #ffc107);
}

.progress-bar-fill.bar-needs-work {
    background: linear-gradient(90deg, #dc3545, #fd7e14);
}

.category-detail {
    font-size: 13px;
    color: #888;
    margin: 0;
}

/* Interpretation Box */
.interpretation-box {
    background: #fff;
    border-radius: 12px;
    padding: 40px;
    box-shadow: 0 5px 25px rgba(0,0,0,0.08);
}

.interpretation-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 20px;
}

.interpretation-item {
    text-align: center;
    padding: 20px;
    border-radius: 8px;
    background: #f8f9fa;
    border: 2px solid transparent;
    transition: all 0.3s ease;
}

.interpretation-item.active {
    background: #fff;
    border-color: #DAA520;
    box-shadow: 0 5px 20px rgba(218, 165, 32, 0.2);
}

.level-badge {
    display: inline-block;
    padding: 5px 15px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
    margin-bottom: 10px;
}

.badge-optimized { background: #d4edda; color: #155724; }
.badge-managed { background: #cce5ff; color: #004085; }
.badge-developing { background: #fff3cd; color: #856404; }
.badge-initial { background: #f8d7da; color: #721c24; }

.interpretation-item strong {
    display: block;
    font-size: 16px;
    margin-bottom: 8px;
    color: #333;
}

.interpretation-item p {
    font-size: 13px;
    color: #666;
    margin: 0;
}

/* Next Steps Card */
.next-steps-card {
    background: #fff;
    border-radius: 12px;
    padding: 40px;
    box-shadow: 0 5px 25px rgba(0,0,0,0.08);
}

.steps-timeline {
    display: flex;
    flex-direction: column;
    gap: 25px;
    text-align: left;
    max-width: 500px;
    margin: 0 auto;
}

.step-item {
    display: flex;
    align-items: flex-start;
    gap: 20px;
}

.step-icon {
    width: 50px;
    height: 50px;
    background: #DAA520;
    color: #fff;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
    flex-shrink: 0;
}

.step-content h5 {
    font-size: 16px;
    font-weight: 600;
    color: #333;
    margin: 0 0 5px;
}

.step-content p {
    font-size: 14px;
    color: #666;
    margin: 0;
}

/* Generic Thank You Box */
.thank-you-box {
    background: #fff;
    border-radius: 8px;
    padding: 50px 40px;
    box-shadow: 0 5px 30px rgba(0,0,0,0.08);
}

.success-icon {
    margin-bottom: 30px;
}

.success-icon i {
    font-size: 80px;
    color: #28a745;
}

.completion-message {
    background: #f8f9fa;
    border-radius: 8px;
    padding: 25px;
    text-align: left;
}

.completion-message p {
    margin: 0;
    color: #555;
    line-height: 1.7;
}

.next-steps-box {
    background: #f8f9fa;
    border-radius: 8px;
    padding: 30px;
    text-align: left;
}

.next-steps-box h4 {
    font-size: 16px;
    font-weight: 600;
    color: #333;
    margin-bottom: 20px;
    text-align: center;
}

.steps-list {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.steps-list .step-item {
    display: flex;
    align-items: center;
    font-size: 14px;
    color: #666;
}

.steps-list .step-item i {
    width: 40px;
    height: 40px;
    background: #DAA520;
    color: #fff;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-right: 15px;
    font-size: 16px;
}

/* Buttons */
.action-buttons {
    display: flex;
    gap: 15px;
    justify-content: center;
    flex-wrap: wrap;
}

.btn-e {
    background: #DAA520;
    color: #fff;
    border: none;
    padding: 12px 30px;
    font-weight: 600;
    transition: all 0.3s ease;
}

.btn-e:hover {
    background: #B8860B;
    color: #fff;
}

@media (max-width: 768px) {
    .results-hero-card {
        padding: 30px 20px;
    }

    .score-circle {
        width: 140px;
        height: 140px;
    }

    .score-number {
        font-size: 48px;
    }

    .results-title {
        font-size: 22px;
    }

    .category-grid {
        grid-template-columns: 1fr;
    }

    .interpretation-grid {
        grid-template-columns: 1fr 1fr;
    }

    .thank-you-box {
        padding: 30px 20px;
    }

    .success-icon i {
        font-size: 60px;
    }

    .action-buttons {
        flex-direction: column;
    }

    .action-buttons .btn {
        width: 100%;
    }
}

@media (max-width: 480px) {
    .interpretation-grid {
        grid-template-columns: 1fr;
    }
}
</style>
