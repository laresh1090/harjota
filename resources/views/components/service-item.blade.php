@props([
    'icon' => null,
    'image' => null,
    'title' => '',
    'description' => '',
])
<div class="box-services-2">
    <div class="box-left">
        @if ($icon)
            <i class="icon icon-4 {{ $icon }}"></i>
        @elseif ($image)
            <img src="{{ asset($image) }}" alt="{{ $title }}" loading="lazy">
        @endif
    </div>
    <div class="box-right">
        <h3 class="title-small">{{ $title }}</h3>
        <p>{!! $description !!}</p>
        <div class="br-bottom"></div>
    </div>
</div>