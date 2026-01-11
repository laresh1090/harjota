<div class="yesno-group">
    <div class="yesno-option">
        <label class="yesno-label {{ $oldValue === 'yes' ? 'yes-selected' : '' }}">
            <input type="radio"
                   name="answers[{{ $question->id }}]"
                   value="yes"
                   {{ $oldValue === 'yes' ? 'checked' : '' }}
                   {{ $question->is_required ? 'required' : '' }}>
            <i class="fa fa-check-circle"></i>
            <span>Yes</span>
        </label>
    </div>
    <div class="yesno-option">
        <label class="yesno-label {{ $oldValue === 'no' ? 'no-selected' : '' }}">
            <input type="radio"
                   name="answers[{{ $question->id }}]"
                   value="no"
                   {{ $oldValue === 'no' ? 'checked' : '' }}
                   {{ $question->is_required ? 'required' : '' }}>
            <i class="fa fa-times-circle"></i>
            <span>No</span>
        </label>
    </div>
</div>
