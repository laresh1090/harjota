@props([
    'icon' => '',
    'content' => ''
])
<div class="col-sm-6 col-md-4 mb30">
    <div class="box-services-6">
        <div class="box-services-2">
            <div class="box-left"><i class="icon icon-4 {{ $icon }}"></i></div>
            <div class="box-right">
                <p class="mb0 hyt">{!! $content !!}</p>
            </div>
        </div>
    </div>
</div>