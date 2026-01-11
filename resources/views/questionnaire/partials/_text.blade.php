<input type="text"
       name="answers[{{ $question->id }}]"
       id="question_{{ $question->id }}"
       class="form-control"
       value="{{ $oldValue }}"
       placeholder="Enter your answer"
       {{ $question->is_required ? 'required' : '' }}>
