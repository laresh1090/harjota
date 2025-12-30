<!-- Solution Pillars -->
<section class="section section-bg mt0">
    <div class="container">
        <div class="row">
            <div class="col-sm-10 col-md-8 col-sm-offset-1 col-md-offset-2 text-center">
                <h2 class="title-uppercased hyt">This is what Harjota solves</h2>
                <p class="mb50">The three core challenges we address in every engagement.</p>
            </div>
        </div>
        <div class="row principles-row">
            @foreach ([
                [
                    'number' => '01',
                    'icon' => 'fa-lightbulb-o',
                    'title' => 'Clarity',
                    'problem' => 'Organizations drift without clear decision architecture',
                    'outcome' => 'Structured frameworks that define who decides what, and what data matters'
                ],
                [
                    'number' => '02',
                    'icon' => 'fa-database',
                    'title' => 'Intelligence',
                    'problem' => 'Data exists but insights don\'t',
                    'outcome' => 'BI systems and AI integration that turn data into actionable decisions'
                ],
                [
                    'number' => '03',
                    'icon' => 'fa-building-o',
                    'title' => 'Continuity',
                    'problem' => 'Systems and knowledge depend on individuals',
                    'outcome' => 'Institutional infrastructure that survives staff changes'
                ]
            ] as $pillar)
            <div class="col-md-4 col-sm-12">
                <div class="principle-card">
                    <div class="principle-number">{{ $pillar['number'] }}</div>
                    <div class="principle-icon">
                        <i class="fa {{ $pillar['icon'] }}"></i>
                    </div>
                    <h4 class="principle-title">{{ $pillar['title'] }}</h4>
                    <p class="solution-problem"><strong>Problem:</strong> {{ $pillar['problem'] }}</p>
                    <p class="solution-outcome"><strong>Outcome:</strong> {{ $pillar['outcome'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<style>
/* Solution-specific text styling */
.solution-problem {
    font-size: 13px;
    color: #999;
    line-height: 1.6;
    margin-bottom: 12px;
}

.solution-outcome {
    font-size: 14px;
    color: #555;
    line-height: 1.6;
    margin-bottom: 0;
}
</style>
