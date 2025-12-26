<section class="section-page team-text" style="padding-top: 0 !important;">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="grid-isotope">
                    <div class="portfolio grid-col-3 grid-col-p10">
                        @foreach ([
                            [
                                'image' => 'i/a33.png',
                                'name' => 'Oladiran Abimbola',
                                'title' => 'C.E.O / Chief Cyber Security Expert',
                                'url' => route('employee', ['id' => 'oladiran']),
                                'socials' => [
                                    ['url' => '#', 'icon' => 'social_twitter'],
                                    ['url' => '#', 'icon' => 'social_facebook'],
                                    ['url' => '#', 'icon' => 'social_linkedin'],
                                ]
                            ],
                            [
                                'image' => 'i/a22.png',
                                'name' => 'Olanrewaju Opeyemi',
                                'title' => 'C.O.O / Head Of Software Engineering & AI Programming',
                                'url' => route('employee', ['id' => 'olanrewaju']),
                                'socials' => [
                                    ['url' => '#', 'icon' => 'social_twitter'],
                                    ['url' => '#', 'icon' => 'social_facebook'],
                                    ['url' => '#', 'icon' => 'social_linkedin'],
                                ]
                            ],
                            [
                                'image' => 'i/a111.png',
                                'name' => 'Keanna Ralph',
                                'title' => 'Head of Business Development & Marketing',
                                'url' => route('employee', ['id' => 'keanna']),
                                'socials' => [
                                    ['url' => '#', 'icon' => 'social_twitter'],
                                    ['url' => '#', 'icon' => 'social_facebook'],
                                    ['url' => '#', 'icon' => 'social_linkedin'],
                                ]
                            ]
                        ] as $member)
                            <div class="grid-col">
                                <x-team-member
                                    :image="$member['image']"
                                    :name="$member['name']"
                                    :title="$member['title']"
                                    :url="$member['url']"
                                    :socials="$member['socials']"
                                />
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="simple-hr m0"></div>