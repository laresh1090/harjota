<x-layout>
    <!-- Hero Section -->
    <x-hero-one
        title="Assessment Unavailable"
        background="i/ss.jpg"
        :breadcrumbs="[
            ['url' => route('home'), 'title' => 'Home'],
            ['url' => '#', 'title' => 'Assessment Unavailable']
        ]"
    />

    <!-- Unavailable Content -->
    <section class="section-bg mt0">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="unavailable-box text-center">
                        <div class="unavailable-icon">
                            <i class="fa fa-clock-o"></i>
                        </div>

                        <h2 class="title-uppercased hyt mb20">Currently Unavailable</h2>

                        <p class="text-4 mb30">
                            We're sorry, but the <strong>{{ $questionnaire->title }}</strong> is currently not available.
                        </p>

                        <div class="reasons-box mb40">
                            <h4>This could be because:</h4>
                            <div class="reasons-list">
                                <div class="reason-item">
                                    <i class="fa fa-calendar"></i>
                                    <span>The assessment hasn't started yet or has ended</span>
                                </div>
                                <div class="reason-item">
                                    <i class="fa fa-pause-circle"></i>
                                    <span>The assessment is temporarily paused</span>
                                </div>
                                <div class="reason-item">
                                    <i class="fa fa-users"></i>
                                    <span>The maximum number of responses has been reached</span>
                                </div>
                            </div>
                        </div>

                        <div class="action-buttons">
                            <a href="{{ url('/') }}" class="btn btn-e btn-lg">
                                <i class="fa fa-home"></i> Return to Homepage
                            </a>
                            <a href="{{ route('contact') }}" class="btn btn-default btn-lg">
                                <i class="fa fa-envelope"></i> Contact Us
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('partials._cta-section')
    @include('partials._footer')
</x-layout>

<style>
.unavailable-box {
    background: #fff;
    border-radius: 8px;
    padding: 50px 40px;
    box-shadow: 0 5px 30px rgba(0,0,0,0.08);
}

.unavailable-icon {
    margin-bottom: 30px;
}

.unavailable-icon i {
    font-size: 80px;
    color: #6c757d;
}

.reasons-box {
    background: #f8f9fa;
    border-radius: 8px;
    padding: 30px;
    text-align: left;
}

.reasons-box h4 {
    font-size: 16px;
    font-weight: 600;
    color: #333;
    margin-bottom: 20px;
    text-align: center;
}

.reasons-list {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.reason-item {
    display: flex;
    align-items: center;
    font-size: 14px;
    color: #666;
}

.reason-item i {
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
    .unavailable-box {
        padding: 30px 20px;
    }

    .unavailable-icon i {
        font-size: 60px;
    }

    .action-buttons {
        flex-direction: column;
    }

    .action-buttons .btn {
        width: 100%;
    }
}
</style>
