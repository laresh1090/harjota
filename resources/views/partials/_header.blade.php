<div class="header-transparent menu-fixed-dark menu-dark-mobiles menu-dark">
    <div class="topbar topbar-transparent topbar-border-bottom hidden-xs">
        <div class="container">
            <div class="row">
                <div class="col-sm-7">
                    <p class="text-2 mb0 color-inherit fix1">
                        <span><i class="icon icon_pin_alt"></i> Vibranium Valley, Concord, Ikeja, Lagos</span>
                        <span class="mr30"> &nbsp; </span>
                        <i class="icon icon_phone"></i> +234 906 757 4115
                    </p>
                </div>
                <div class="col-sm-5">
                    <div class="clearfix">
                        <div class="pull-right">
                            <x-social-icons :icons="[
                                ['url' => 'https://www.instagram.com/harjota.tech/', 'icon' => 'social_instagram'],
                                ['url' => 'https://web.facebook.com/harjota.tech', 'icon' => 'social_facebook'],
                                ['url' => 'https://www.linkedin.com/company/110416131/', 'icon' => 'social_linkedin'],
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
                                    <img src="{{ asset('harjota_logo.svg') }}" class="logo-img logo-dark" alt="Harjota Logo" loading="lazy">
                                    <img src="{{ asset('harjota_logo.svg') }}" class="logo-img" alt="Harjota Logo" loading="lazy">
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
                                        <a href="{{ route('about') }}" class="switch">About</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('services') }}" class="switch">Services</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('products') }}" class="switch">Products</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('insights') }}" class="switch">Insights</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('contact') }}" class="switch">Schedule Consultation</a>
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