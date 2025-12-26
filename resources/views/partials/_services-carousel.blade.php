<section class="section-bg mt0 section-gray">
    <div class="container">
        <div class="row mt10">
            <div class="col-sm-12">
                <div class="owl-carousel owl-columns2 owl-p10" data-auto-play="3000" data-stop-on-hover="true">
                    @foreach ([
                        [
                            'image' => 'i/s1.gif',
                            'title' => 'Business Intelligence Applications',
                            'description' => 'We develop customized business intelligence solutions to help organizations make data-driven decisions, streamline operations, and uncover new opportunities.'
                        ],
                        [
                            'image' => 'i/s2.gif',
                            'title' => 'Industrial-Strength Software Solutions',
                            'description' => 'Our team designs and develops robust, enterprise-grade software applications that meet the unique needs of industries such as manufacturing, logistics, and energy.'
                        ],
                        [
                            'image' => 'i/s3.gif',
                            'title' => 'Cybersecurity',
                            'description' => "We provide comprehensive cybersecurity services, including:<br>Threat assessment and risk analysis,<br>Network security and monitoring,<br>Incident response and remediation,<br>Security consulting and training."
                        ],
                        [
                            'image' => 'i/s4.gif',
                            'title' => 'Business Development',
                            'description' => "Our business development services include:<br>Market research and analysis,<br>Competitive intelligence,<br>Strategic planning and execution,<br>Partnership and collaboration development."
                        ],
                        [
                            'image' => 'i/s11.gif',
                            'title' => 'Smart Home Technology Expertise',
                            'description' => "We design and implement smart home solutions, including:<br>Home automation and control systems,<br>IoT device integration,<br>Voice assistant and smart speaker integration,<br>Security and surveillance systems."
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