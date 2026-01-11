<x-layout>
    <!-- Hero Section -->
    <x-hero-one
        :title="$questionnaire->title"
        background="i/ss.jpg"
        :breadcrumbs="[
            ['url' => route('home'), 'title' => 'Home'],
            ['url' => route('assessment.show', $questionnaire), 'title' => 'Assessment']
        ]"
    />

    <!-- Main Content -->
    <section class="assessment-main-section">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="assessment-card">
                        <div class="assessment-card-left">
                            <span class="assessment-badge"><i class="fa fa-bolt"></i> Free Assessment</span>
                            <h2>Discover Your Business Intelligence Score</h2>
                            <p>Answer {{ $questionnaire->sections->sum('questions_count') }} questions across {{ $questionnaire->sections->count() }} key areas to uncover insights about your organization's operational maturity.</p>

                            <div class="assessment-meta">
                                <div class="meta-item">
                                    <i class="fa fa-clock-o"></i>
                                    <span>~10 minutes</span>
                                </div>
                                <div class="meta-item">
                                    <i class="fa fa-pie-chart"></i>
                                    <span>Instant results</span>
                                </div>
                                <div class="meta-item">
                                    <i class="fa fa-lock"></i>
                                    <span>100% confidential</span>
                                </div>
                            </div>

                            <div class="assessment-areas">
                                <h4>Areas Covered:</h4>
                                <div class="areas-list">
                                    @foreach($questionnaire->sections as $section)
                                        <span class="area-tag">{{ $section->title }}</span>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="assessment-card-right">
                            @if(session('error'))
                                <div class="alert alert-danger">
                                    <i class="fa fa-exclamation-circle"></i> {{ session('error') }}
                                </div>
                            @endif

                            <h3>Start Your Assessment</h3>
                            <p>Enter your details to begin</p>

                            <form action="{{ route('assessment.start', $questionnaire) }}" method="POST" class="assessment-form">
                                @csrf

                                <div class="form-group">
                                    <input type="text"
                                           id="name"
                                           name="name"
                                           class="form-input"
                                           value="{{ old('name') }}"
                                           required
                                           placeholder="Full Name *">
                                    @error('name')
                                        <span class="field-error">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input type="email"
                                           id="email"
                                           name="email"
                                           class="form-input"
                                           value="{{ old('email') }}"
                                           required
                                           placeholder="Email Address *">
                                    @error('email')
                                        <span class="field-error">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-row-2">
                                    <div class="form-group">
                                        <input type="text"
                                               id="organization"
                                               name="organization"
                                               class="form-input"
                                               value="{{ old('organization') }}"
                                               placeholder="Organization">
                                        @error('organization')
                                            <span class="field-error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="text"
                                               id="job_title"
                                               name="job_title"
                                               class="form-input"
                                               value="{{ old('job_title') }}"
                                               placeholder="Job Title">
                                        @error('job_title')
                                            <span class="field-error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <button type="submit" class="btn-begin">
                                    Begin Assessment <i class="fa fa-arrow-right"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('partials._footer')
</x-layout>

<style>
.assessment-main-section {
    padding: 80px 0 100px;
    background: linear-gradient(180deg, #f8f9fa 0%, #fff 100%);
}

.assessment-card {
    display: flex;
    background: #fff;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 10px 50px rgba(0, 0, 0, 0.08);
}

.assessment-card-left {
    flex: 1;
    padding: 50px;
    background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
    color: #fff;
}

.assessment-card-right {
    flex: 1;
    padding: 50px;
}

.assessment-badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: rgba(218, 165, 32, 0.15);
    color: #DAA520;
    padding: 8px 16px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1px;
    margin-bottom: 25px;
    border: 1px solid rgba(218, 165, 32, 0.3);
}

.assessment-card-left h2 {
    font-size: 28px;
    font-weight: 700;
    margin-bottom: 15px;
    line-height: 1.3;
    color: #fff;
}

.assessment-card-left > p {
    color: rgba(255, 255, 255, 0.7);
    font-size: 15px;
    line-height: 1.7;
    margin-bottom: 30px;
}

.assessment-meta {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    margin-bottom: 35px;
    padding-bottom: 30px;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
}

.meta-item {
    display: flex;
    align-items: center;
    gap: 8px;
    color: rgba(255, 255, 255, 0.6);
    font-size: 14px;
}

.meta-item i {
    color: #DAA520;
    font-size: 16px;
}

.assessment-areas h4 {
    color: rgba(255, 255, 255, 0.5);
    font-size: 12px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1px;
    margin-bottom: 15px;
}

.areas-list {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
}

.area-tag {
    background: rgba(255, 255, 255, 0.08);
    color: rgba(255, 255, 255, 0.8);
    padding: 8px 14px;
    border-radius: 6px;
    font-size: 13px;
    font-weight: 500;
}

/* Right Side - Form */
.assessment-card-right h3 {
    font-size: 24px;
    font-weight: 700;
    color: #1a1a2e;
    margin-bottom: 8px;
}

.assessment-card-right > p {
    color: #666;
    font-size: 14px;
    margin-bottom: 30px;
}

.assessment-form .form-group {
    margin-bottom: 18px;
}

.form-row-2 {
    display: flex;
    gap: 15px;
}

.form-row-2 .form-group {
    flex: 1;
}

.form-input {
    width: 100%;
    padding: 14px 16px;
    font-size: 15px;
    border: 2px solid #e5e7eb;
    border-radius: 10px;
    background: #f9fafb;
    transition: border-color 0.2s ease, box-shadow 0.2s ease;
    outline: none;
}

.form-input:focus {
    border-color: #DAA520;
    background: #fff;
    box-shadow: 0 0 0 4px rgba(218, 165, 32, 0.1);
}

.form-input::placeholder {
    color: #999;
}

.field-error {
    display: block;
    color: #e53e3e;
    font-size: 12px;
    margin-top: 5px;
}

.btn-begin {
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    background: linear-gradient(135deg, #DAA520 0%, #B8860B 100%);
    color: #fff;
    padding: 16px 30px;
    border: none;
    border-radius: 10px;
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
    margin-top: 25px;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.btn-begin:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(218, 165, 32, 0.4);
}

.btn-begin i {
    transition: transform 0.2s ease;
}

.btn-begin:hover i {
    transform: translateX(4px);
}

/* Alert */
.alert {
    border-radius: 8px;
    padding: 12px 15px;
    margin-bottom: 20px;
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: 14px;
}

.alert-danger {
    background: #fee2e2;
    color: #991b1b;
    border: 1px solid #fecaca;
}

/* Responsive */
@media (max-width: 991px) {
    .assessment-card {
        flex-direction: column;
    }

    .assessment-card-left,
    .assessment-card-right {
        padding: 40px 30px;
    }
}

@media (max-width: 768px) {
    .assessment-main-section {
        padding: 60px 0 80px;
    }

    .assessment-card-left,
    .assessment-card-right {
        padding: 30px 25px;
    }

    .assessment-card-left h2 {
        font-size: 24px;
    }

    .assessment-meta {
        gap: 15px;
    }

    .form-row-2 {
        flex-direction: column;
        gap: 0;
    }
}

/* Reduced motion */
@media (prefers-reduced-motion: reduce) {
    .btn-begin,
    .btn-begin i,
    .form-input {
        transition: none;
    }

    .btn-begin:hover {
        transform: none;
    }
}
</style>
