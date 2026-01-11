@if($question->options && count($question->options) > 0)
    <ul class="option-list">
        @foreach($question->options as $key => $option)
            <li class="option-item">
                <label class="option-label {{ $oldValue === $option ? 'selected' : '' }}">
                    <input type="radio"
                           name="answers[{{ $question->id }}]"
                           value="{{ $option }}"
                           {{ $oldValue === $option ? 'checked' : '' }}
                           {{ $question->is_required ? 'required' : '' }}>
                    <span>{{ $option }}</span>
                </label>
            </li>
        @endforeach
    </ul>
@else
    <p class="text-muted"><em>No options available for this question.</em></p>
@endif
