<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-sm-10 col-md-8 col-sm-offset-1 col-md-offset-2 text-center">
                <h2 class="title-uppercased hyt">Our Recent Projects</h2>
            </div>
        </div>
        <div class="mb60"></div>
        <div class="row">
            <div class="col-sm-12">
                <div class="grid-isotope">
                    <div class="portfolio grid-col-3 grid-col-p10 portfolio-text popup-gallery">
                        @foreach ([
                            [
                                'image' => 'i/EW.PNG',
                                'title' => 'Metro',
                                'url' => 'http://www.metro.com',
                                'description' => 'Shelving & Productivity Solutions',
                                'categories' => ['a_', 'b_'],
                                'popup_image' => 'i/EW.PNG'
                            ],
                            [
                                'image' => 'i/p3.PNG',
                                'title' => 'Pimblow',
                                'url' => route('project', ['id' => 'pimblow']),
                                'description' => 'E-commerce Website',
                                'categories' => ['a_', 'c_'],
                                'popup_image' => 'i/p3.PNG'
                            ],
                            [
                                'image' => 'i/p2.PNG',
                                'title' => 'asapmarketings',
                                'url' => route('project', ['id' => 'asapmarketings']),
                                'description' => 'Business Development Website',
                                'categories' => ['b_', 'c_'],
                                'popup_image' => 'i/p2.PNG'
                            ]
                        ] as $project)
                            <x-portfolio-item
                                :image="$project['image']"
                                :title="$project['title']"
                                :url="$project['url']"
                                :description="$project['description']"
                                :categories="$project['categories']"
                                :popup_image="$project['popup_image']"
                            />
                        @endforeach
                    </div>
                </div>
                <p class="text-center mb0 mt30">
                    <a href="{{ route('portfolio') }}" class="btn-e">See more projects</a>
                </p>
            </div>
        </div>
    </div>
</section>