@props([
    'sections' => []
])
<article class="blog-post-content">
    @foreach ($sections as $section)
        <h3 class="blog-post-title hyt">{{ $section['title'] }}</h3>
        <p>{!! $section['content'] !!}</p>
    @endforeach
</article>