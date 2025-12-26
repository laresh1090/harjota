@props([
    'image' => '',
    'thumb' => '',
    'transition' => 'fade',
    'masterspeed' => 500,
    'slotamount' => 7,
    'delay' => 8000,
    'title' => '',
    'button_url' => '#',
    'button_text' => 'Contact Us'
])
<li data-transition="{{ $transition }}" data-masterspeed="{{ $masterspeed }}" data-slotamount="{{ $slotamount }}" data-delay="{{ $delay }}" data-thumb="{{ asset('i/' . $thumb) }}">
    <!-- Background Image -->
    <img src="{{ asset('i/' . $image) }}" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat" alt="" loading="lazy">
    <div class="bg-overlay gradient-1"></div>

    <div class="tp-caption sfb stt tp-resizeme hyt" data-x="center" data-hoffset="0" data-y="center" data-voffset="35" data-speed="600" data-start="600" data-endspeed="400" data-end="{{ $delay - 100 }}" data-easing="Power3.easeInOut" style="z-index: 4">
        <h4 class="title-slider uppercased text-center ml4">{!! nl2br($title) !!}</h4>
    </div>
    <div class="tp-caption sfb stt tp-resizeme" data-x="center" data-hoffset="15" data-y="center" data-voffset="140" data-speed="800" data-start="1000" data-endspeed="600" data-end="{{ $delay }}" data-easing="Power3.easeInOut" style="z-index: 4">
        <a href="{{ $button_url }}" class="btn-slider main">{{ $button_text }}</a>
    </div>
</li>