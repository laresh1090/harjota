@php
    $selectedOptions = is_array($oldValue) ? $oldValue : [];
@endphp

@if($question->options && count($question->options) > 0)
    <ul class="option-list">
        @foreach($question->options as $key => $option)
            <li class="option-item">
                <label class="option-label {{ in_array($option, $selectedOptions) ? 'selected' : '' }}">
                    <input type="checkbox"
                           name="answers[{{ $question->id }}][]"
                           value="{{ $option }}"
                           {{ in_array($option, $selectedOptions) ? 'checked' : '' }}>
                    <span>{{ $option }}</span>
                </label>
            </li>
        @endforeach
    </ul>
@else
    <p class="text-muted"><em>No options available for this question.</em></p>
@endif
