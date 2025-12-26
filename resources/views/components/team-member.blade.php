@props([
    'image' => '',
    'name' => '',
    'title' => '',
    'url' => '#',
    'socials' => []
])
<div class="box-services-6 mb50">
    <img src="{{ asset($image) }}" class="br2" alt="{{ $name }}" loading="lazy">
    <h3 class="title-small mb10 hyt">
        <a href="{{ $url }}" class="a-inherit mr20">{{ $name }}</a>
        <br><small>{{ $title }}</small>
    </h3>
    <div class="br-bottom mb20"></div>
    <div class="clearfix">
        <x-social-icons
            :icons="$socials"
            class="social-icon social-bg rounded"
        />
    </div>
</div>