<section class="section pb0">
    <div class="container">
        <div class="row col-p30">
            <div class="col-sm-10 col-md-8 col-sm-offset-1 col-md-offset-2 text-center">
                <h2 class="title-medium title-uppercased hyt">
                    The Harjota Approach
                </h2>
            </div>
            <div class="col-sm-12 col-md-6 sm-box3">
                <div class="section-gray section-boxed br4">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="title-medium mb20 hyt">Our Methodology</h3>
                            <div class="br-bottom mb30"></div>
                            <p>
                                We follow a structured, phased approach that ensures clarity at every stage. From initial discovery through to ongoing enablement, each step builds on the previous to create lasting institutional change.
                            </p>
                            <div class="mb30"></div>
                            <p class="mb0">
                                <a href="{{ route('about') }}" class="btn-e">Learn More</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="mb20"></div>
                @foreach ([
                    [
                        'icon' => 'icon_search',
                        'title' => '1. Audit & Discovery',
                        'description' => 'Comprehensive assessment of your current state—decisions, data, processes, and systems.'
                    ],
                    [
                        'icon' => 'icon_flowchart',
                        'title' => '2. Architecture & Roadmap',
                        'description' => 'Design foundational frameworks and create a prioritized strategic plan.'
                    ]
                ] as $step)
                    <div class="mb50"></div>
                    <x-service-item
                        :icon="$step['icon']"
                        :title="$step['title']"
                        :description="$step['description']"
                    />
                @endforeach
            </div>
        </div>
    </div>
</section>
