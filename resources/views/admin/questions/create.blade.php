@extends('admin.layouts.app')

@section('title', 'Add Question')

@section('content')
<ol class="breadcrumb">
    <li><a href="{{ route('admin.questionnaires.index') }}">Questionnaires</a></li>
    <li><a href="{{ route('admin.questionnaires.show', $questionnaire) }}">{{ $questionnaire->title }}</a></li>
    <li class="active">Add Question</li>
</ol>

<div class="content-wrapper">
    <div class="page-header">
        <h1><i class="fa fa-plus"></i> Add Question</h1>
        <p class="text-muted">Adding to section: {{ $section->title }}</p>
    </div>

    <form action="{{ route('admin.questionnaires.sections.questions.store', [$questionnaire, $section]) }}" method="POST">
        @csrf

        <div class="form-section">
            <div class="form-section-title">Question Details</div>

            <div class="form-group">
                <label for="question_text">Question Text <span class="text-danger">*</span></label>
                <textarea class="form-control"
                          id="question_text"
                          name="question_text"
                          rows="2"
                          required
                          placeholder="Enter your question here...">{{ old('question_text') }}</textarea>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="question_type">Question Type <span class="text-danger">*</span></label>
                        <select class="form-control" id="question_type" name="question_type" required>
                            @foreach($questionTypes as $value => $label)
                                <option value="{{ $value }}" {{ old('question_type', 'text') == $value ? 'selected' : '' }}>
                                    {{ $label }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>&nbsp;</label>
                        <div class="checkbox" style="margin-top: 7px;">
                            <label>
                                <input type="checkbox" name="is_required" value="1" {{ old('is_required') ? 'checked' : '' }}>
                                <strong>Required</strong> - Respondent must answer this question
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-section" id="options-section" style="display: none;">
            <div class="form-section-title">Answer Options</div>

            <div class="form-group">
                <label for="options">Options (one per line)</label>
                <textarea class="form-control"
                          id="options"
                          name="options[]"
                          rows="5"
                          placeholder="Option 1&#10;Option 2&#10;Option 3">{{ old('options') ? implode("\n", old('options')) : '' }}</textarea>
                <p class="help-text">Enter each option on a new line.</p>
            </div>
        </div>

        <div class="form-section">
            <div class="form-section-title">Additional Settings</div>

            <div class="form-group">
                <label for="help_text">Help Text</label>
                <input type="text"
                       class="form-control"
                       id="help_text"
                       name="help_text"
                       value="{{ old('help_text') }}"
                       placeholder="Additional instructions for the respondent...">
                <p class="help-text">Displayed below the question to help the respondent.</p>
            </div>
        </div>

        <hr>

        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg">
                <i class="fa fa-save"></i> Create Question
            </button>
            <button type="submit" name="add_another" value="1" class="btn btn-success btn-lg">
                <i class="fa fa-plus"></i> Create & Add Another
            </button>
            <a href="{{ route('admin.questionnaires.show', $questionnaire) }}" class="btn btn-default btn-lg">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    var choiceTypes = ['radio', 'checkbox', 'select'];

    function toggleOptionsSection() {
        var type = $('#question_type').val();
        if (choiceTypes.indexOf(type) !== -1) {
            $('#options-section').slideDown();
        } else {
            $('#options-section').slideUp();
        }
    }

    // Initial check
    toggleOptionsSection();

    // On change
    $('#question_type').on('change', toggleOptionsSection);
});
</script>
@endpush
