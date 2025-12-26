@props([
    'icon' => '',
    'url' => '#',
    'text' => '',
    'count' => ''
])
<li>
    <a href="{{ $url }}"><i class="icon {{ $icon }}"></i> {{ $text }}</a>
    <span>{{ $count }}</span>
</li>