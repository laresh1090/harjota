<section class="section pb0">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6 mt0">
                <div class="mb20"></div>
                @foreach ([
                    [
                        'icon' => 'icon_box-checked',
                        'title' => 'Development and Implementation',
                        'description' => 'We develop and implement the solution, ensuring seamless integration with existing systems.'
                    ],
                    [
                        'icon' => 'icon_box-checked',
                        'title' => 'Testing and Quality Assurance',
                        'description' => "Our team conducts rigorous testing and quality assurance to ensure the solution meets the client's expectations."
                    ],
                    [
                        'icon' => 'icon_box-checked',
                        'title' => 'Deployment and Support',
                        'description' => "We deploy the solution and provide ongoing support and maintenance to ensure the client's continued success."
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
                <img src="{{ asset('i/ff.jpg') }}" alt="Service" loading="lazy">
            </div>
        </div>
    </div>
</section>