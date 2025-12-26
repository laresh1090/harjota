<section class="section-bg mb0 section-extra-large bg-img stellar bg52 stats-section stats-bg" data-stellar-background-ratio="0.4">
    <link rel="preload" href="{{ asset('i/bg52.jpg') }}" as="image">
    <div class="bg-overlay gradient-1"></div>
    <div class="container">
        <div class="row mb50">
            <div class="col-sm-12">
                <div class="row">
                    @foreach ([
                        ['value' => 123, 'speed' => 4000, 'title' => 'Projects'],
                        ['value' => 1850, 'speed' => 4000, 'title' => 'Happy Customers'],
                        ['value' => 1768, 'speed' => 4000, 'title' => 'Support Tickets'],
                        ['value' => 58, 'speed' => 3500, 'title' => 'Employees']
                    ] as $stat)
                        <x-stat-item
                            :value="$stat['value']"
                            :speed="$stat['speed']"
                            :title="$stat['title']"
                        />
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <a href="{{ route('quote') }}" class="btn-bottom">Get a quote</a>
</section>
<div class="shadow3"></div>
<div class="simple-hr mt20 mb30 xs-m0"></div>