<div class="header-transparent menu-fixed-dark menu-dark-mobiles menu-dark">
    <div class="topbar topbar-transparent topbar-border-bottom hidden-xs">
        <div class="container">
            <div class="row">
                <div class="col-sm-7">
                    <p class="text-2 mb0 color-inherit fix1">
                        <span><i class="icon icon_pin_alt"></i> Vibranium valley, concord, Ikeja, Lagos</span>
                        <span class="mr30"> &nbsp; </span>
                        <i class="icon icon_phone"></i> +234 906 858 4115
                    </p>
                </div>
                <div class="col-sm-5">
                    <div class="clearfix">
                        <div class="pull-right">
                            <x-social-icons :icons="[
                                ['url' => '#', 'icon' => 'social_twitter'],
                                ['url' => '#', 'icon' => 'social_facebook'],
                                ['url' => '#', 'icon' => 'social_googleplus'],
                                ['url' => '#', 'icon' => 'social_pinterest'],
                                ['url' => '#', 'icon' => 'social_linkedin'],
                            ]"
                                class="social-icon"                                
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <header class="header-wrapper">
        <div class="main-header">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="menu-wrapper">
                            <div class="logo-wrapper">
                                <a href="{{ route('home') }}" class="logo">
                                    <img src="{{ asset('harjota_logo.svg') }}" class="logo-img logo-dark" alt="Logo" loading fingerprints="lazy">
                                    <img src="{{ asset('harjota_logo.svg') }}" class="logo-img" alt="Logo" loading="lazy">
                                </a>
                            </div>
                            <nav class="navbar-right">
                                <ul class="menu">
                                    <li class="toggle-menu">
                                        <span class="hamburger">
                                            <span class="bar"></span>
                                            <span class="bar"></span>
                                            <span class="bar"></span>
                                        </span>
                                    </li>
                                    <li>
                                        <a href="{{ route('home') }}" class="switch">Home</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('about') }}" class="switch">About Us</a>
                                    </li>
                                    <li>
                                        <a href="#" class="">Services <i class="icon icon-direction icon_plus"></i></a>
                                        <x-submenu :items="[
                                            ['url' => route('services.business-intelligence'), 'title' => 'Business Intelligence Applications'],
                                            ['url' => route('services.industrial'), 'title' => 'Industrial-Strength Software Solutions'],
                                            ['url' => route('services.cybersecurity'), 'title' => 'Cybersecurity'],
                                            ['url' => route('services.business-development'), 'title' => 'Business Development'],
                                            ['url' => route('services.smart-home'), 'title' => 'Smart Home Technology'],
                                        ]" />
                                    </li>
                                    <li>
                                        <a href="#" class="">Consultation <i class="icon icon-direction icon_plus"></i></a>
                                        <x-submenu :items="[
                                            ['url' => route('consultation.it-strategy'), 'title' => 'IT strategy and planning'],
                                            ['url' => route('consultation.digital-branding'), 'title' => 'Digital Branding & transformation'],
                                            ['url' => route('consultation.business-optimization'), 'title' => 'Business Development & optimization'],
                                            ['url' => route('consultation.cybersecurity'), 'title' => 'Cybersecurity'],
                                        ]" />
                                    </li>
                                    <li>
                                        <a href="{{ route('portfolio') }}"  class="switch">Portfolio</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('contact') }}" class="switch">Contact Us</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
</div>