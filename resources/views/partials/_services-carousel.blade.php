<section class="section-bg mt0 section-gray">
    <div class="container">
        <div class="row">
            <div class="col-sm-10 col-md-8 col-sm-offset-1 col-md-offset-2 text-center">
                <h2 class="title-uppercased hyt">Our Services</h2>
                <p class="mb40">From diagnosis to implementation—structured solutions that strengthen how your organization thinks, operates, and grows.</p>
            </div>
        </div>
        <div class="row mt10">
            <div class="col-sm-12">
                <div class="owl-carousel owl-columns2 owl-p10" data-auto-play="4000" data-stop-on-hover="true">
                    @foreach ([
                        [
                            'image' => 'i/s1.gif',
                            'title' => 'Institutional Intelligence Audit',
                            'description' => 'Comprehensive assessment of decisions, data, processes, and systems. We evaluate decision architecture, process maturity, data flow, and technology enablement.'
                        ],
                        [
                            'image' => 'i/s2.gif',
                            'title' => 'Systems & Decision Architecture',
                            'description' => 'Design foundational frameworks that define what decisions your systems must support, who owns them, and what data is relevant to each.'
                        ],
                        [
                            'image' => 'i/s3.gif',
                            'title' => 'Digital Infrastructure & Software',
                            'description' => 'Build custom platforms including enterprise software, dashboards, AI-assisted systems, and internal platforms tailored to your needs.'
                        ],
                        [
                            'image' => 'i/s4.gif',
                            'title' => 'Business Intelligence & AI Enablement',
                            'description' => 'Transform data into actionable intelligence through data modeling, BI dashboards, AI readiness assessment, and selective AI integration.'
                        ],
                        [
                            'image' => 'i/s11.gif',
                            'title' => 'Advisory & Institutional Enablement',
                            'description' => 'Ongoing strategic support including governance, knowledge documentation, digital strategy, and continuous improvement programs.'
                        ]
                    ] as $service)
                        <div class="owl-el">
                            <x-service-item
                                :image="$service['image']"
                                :title="$service['title']"
                                :description="$service['description']"
                            />
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
