<textarea name="answers[{{ $question->id }}]"
          id="question_{{ $question->id }}"
          class="form-control"
          rows="4"
          placeholder="Enter your detailed answer"
          {{ $question->is_required ? 'required' : '' }}>{{ $oldValue }}</textarea>
