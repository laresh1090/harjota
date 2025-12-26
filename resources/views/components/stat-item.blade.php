@props([
    'value' => 0,
    'speed' => 4000,
    'title' => ''
])
<div class="col-sm-6 col-md-3 sm-box">
    <div class="stats-content">
        <p class="stats-timer" data-to="{{ $value }}" data-speed="{{ $speed }}"></p>
        <div class="br-bottom-center mt30 mb20"></div>
        <h3>{{ $title }}</h3>
    </div>
</div>