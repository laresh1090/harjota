<section class="section pb0">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6 mt0">
                <div class="mb20"></div>
                @foreach ([
                    [
                        'icon' => 'icon_tools',
                        'title' => '3. Build & Implementation',
                        'description' => 'We develop and implement custom platforms, dashboards, and systems tailored to your specific needs.'
                    ],
                    [
                        'icon' => 'icon_check_alt2',
                        'title' => '4. Testing & Quality Assurance',
                        'description' => 'Rigorous testing ensures the solution meets your expectations and integrates seamlessly.'
                    ],
                    [
                        'icon' => 'icon_lifesaver',
                        'title' => '5. Enablement & Support',
                        'description' => 'Ongoing strategic support including training, documentation, and continuous improvement.'
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
            <div class="col-sm-12 col-md-6 sm-box3">
                <img src="{{ asset('i/ff.jpg') }}" alt="Harjota Approach" loading="lazy">
            </div>
        </div>
    </div>
</section>
