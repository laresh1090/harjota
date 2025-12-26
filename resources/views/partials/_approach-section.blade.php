<section class="section pb0">
    <div class="container">
        <div class="row col-p30">
            <div class="col-sm-10 col-md-8 col-sm-offset-1 col-md-offset-2 text-center">
                <h2 class="title-medium title-uppercased hyt">
                    How We Achieve Our Services for Clients
                </h2>
            </div>
            <div class="col-sm-12 col-md-6 sm-box3">
                <div class="section-gray section-boxed br4">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="title-medium mb20 hyt">Our Approach</h3>
                            <div class="br-bottom mb30"></div>
                            <p>
                                At Skyllax Technologies, we take a collaborative and tailored approach to delivering our services. Here's how we achieve our services for clients:
                            </p>
                            <div class="mb30"></div>
                            <p class="mb0">
                                <a href="{{ route('contact') }}" class="btn-e">Contact Us</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="mb20"></div>
                @foreach ([
                    [
                        'icon' => 'icon_box-checked',
                        'title' => 'Discovery and Analysis',
                        'description' => 'We work closely with clients to understand their unique needs, challenges, and goals.'
                    ],
                    [
                        'icon' => 'icon_box-checked',
                        'title' => 'Solution Design',
                        'description' => "Our team designs customized solutions that meet the client's specific requirements."
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