@props([
    'title' => 'About Us',
    'background' => 'i/ss.jpg',
    'breadcrumbs' => []
])
<section class="section-intro breadcrumbs-right bg-img stellar" data-stellar-background-ratio="0.4" style="background-image: url({{ asset($background) }});">
    <link rel="preload" href="{{ asset($background) }}" as="image">
    <div class="intro-with-floating-menu-topbar"></div>
    <div class="bg-overlay gradient-1"></div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-7">
                <h1 class="intro-title text-left small mb0">{{ $title }}</h1>
            </div>
            <div class="col-sm-12 col-md-5">
                <div class="page-breadcrumbs">
                    @foreach ($breadcrumbs as $index => $breadcrumb)
                        <a href="{{ $breadcrumb['url'] }}" @if($index === count($breadcrumbs) - 1) class="active" @endif>
                            {{ $breadcrumb['title'] }}
                        </a>
                        @if ($index < count($breadcrumbs) - 1)
                            <span class="separator"> / </span>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>