@props([
    'icons' => [],
    'baseClass' => 'social-light' // Optional base class
])

<ul {{ $attributes->merge(['class' => $baseClass]) }}>
    @foreach ($icons as $icon)
        <li><a href="{{ $icon['url'] }}"><i class="icon {{ $icon['icon'] }}"></i></a></li>
    @endforeach
</ul>