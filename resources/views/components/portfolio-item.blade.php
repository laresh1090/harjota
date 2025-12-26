@props([
    'image' => '',
    'title' => '',
    'url' => '#',
    'description' => '',
    'categories' => [],
    'popup_image' => ''
])
<div class="grid-col {{ implode(' ', $categories) }}">
    <article class="portfolio-el">
        <figure class="view">
            <img src="{{ asset($image) }}" alt="{{ $title }}" loading="lazy">
            <a href="{{ asset($popup_image) }}" title="{{ $title }}" class="mask init-popup">
                <i class="icon icon_plus"></i>
            </a>
        </figure>
        <div class="portfolio-text-content">
            <h3 class="portfolio-text-title hyt"><a href="{{ $url }}" target="_blank">{{ $title }}</a></h3>
            <p class="portfolio-text-p">{{ $description }}</p>
        </div>
    </article>
</div>