<section class="section section-bg mt0">
    <div class="container">
        <div class="row">
            <div class="col-sm-10 col-md-8 col-sm-offset-1 col-md-offset-2 text-center">
                <h2 class="title-uppercased hyt">Our Operating Principles</h2>
                <p class="mb50">The foundational beliefs that guide every engagement.</p>
            </div>
        </div>
        <div class="row principles-row">
            @foreach ([
                [
                    'icon' => 'fa-lightbulb-o',
                    'title' => 'Clarity Before Code',
                    'description' => 'We understand the problem deeply before proposing solutions.'
                ],
                [
                    'icon' => 'fa-search',
                    'title' => 'Audit Before Build',
                    'description' => 'Every project begins with structured assessment and discovery.'
                ],
                [
                    'icon' => 'fa-building-o',
                    'title' => 'Institution Over Individual',
                    'description' => 'We build systems that outlive any single person or team.'
                ]
            ] as $index => $principle)
            <div class="col-md-4 col-sm-12">
                <div class="principle-card">
                    <div class="principle-number">0{{ $index + 1 }}</div>
                    <div class="principle-icon">
                        <i class="fa {{ $principle['icon'] }}"></i>
                    </div>
                    <h4 class="principle-title">{{ $principle['title'] }}</h4>
                    <p class="principle-desc">{{ $principle['description'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
        <p class="text-center mb0 mt50">
            <a href="{{ route('about') }}" class="btn-e">Learn More About Us</a>
        </p>
    </div>
</section>

<style>
.principles-row {
    display: flex;
    flex-wrap: wrap;
}

.principle-card {
    background: #fff;
    border-radius: 12px;
    padding: 40px 30px;
    text-align: center;
    box-shadow: 0 5px 30px rgba(0,0,0,0.08);
    height: 100%;
    position: relative;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.principle-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 15px 40px rgba(0,0,0,0.12);
}

.principle-number {
    position: absolute;
    top: 20px;
    right: 25px;
    font-size: 48px;
    font-weight: 700;
    color: rgba(218, 165, 32, 0.15);
    line-height: 1;
}

.principle-icon {
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, #DAA520 0%, #B8860B 100%);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 25px;
}

.principle-icon i {
    font-size: 32px;
    color: #fff;
}

.principle-title {
    font-size: 20px;
    font-weight: 600;
    color: #333;
    margin-bottom: 15px;
}

.principle-desc {
    color: #666;
    font-size: 15px;
    line-height: 1.6;
    margin: 0;
}

@media (max-width: 768px) {
    .principles-row > div {
        margin-bottom: 30px;
    }

    .principle-number {
        font-size: 36px;
    }
}
</style>
