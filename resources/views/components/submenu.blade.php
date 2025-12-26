@props(['items' => []])
<ul class="submenu">
    @foreach ($items as $item)
        <li><a href="{{ $item['url'] }}" class="switchA">{{ $item['title'] }}</a></li>
    @endforeach
</ul>