<select name="answers[{{ $question->id }}]"
        id="question_{{ $question->id }}"
        class="form-control"
        {{ $question->is_required ? 'required' : '' }}>
    <option value="">-- Select an option --</option>
    @if($question->options && count($question->options) > 0)
        @foreach($question->options as $key => $option)
            <option value="{{ $option }}" {{ $oldValue === $option ? 'selected' : '' }}>
                {{ $option }}
            </option>
        @endforeach
    @endif
</select>
