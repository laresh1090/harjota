{{-- Section content partial for AJAX loading --}}
<div class="section-header-box mb30">
    <span class="section-badge">Section {{ $currentSectionIndex }}</span>
    <h2 class="title-uppercased hyt mb10">{{ $section->title }}</h2>
    @if($section->description)
        <p class="text-muted">{{ $section->description }}</p>
    @endif
</div>

<div class="section-errors alert alert-danger" style="display: none;">
    <i class="fa fa-exclamation-circle"></i> <span class="error-message">Please correct the errors below to continue.</span>
</div>

@foreach($section->questions as $index => $question)
    @php
        $existingAnswer = $existingAnswers->get($question->id);
        $oldValue = $existingAnswer?->answer_text ?? $existingAnswer?->selected_options;
    @endphp

    <div class="question-card" data-question-id="{{ $question->id }}">
        <div class="question-header">
            <span class="question-num">{{ $index + 1 }}</span>
            <div class="question-text">
                {{ $question->question_text }}
                @if($question->is_required)
                    <span class="text-danger">*</span>
                @endif
            </div>
        </div>

        @if($question->help_text)
            <div class="question-help">
                <i class="fa fa-info-circle"></i> {{ $question->help_text }}
            </div>
        @endif

        <div class="question-input">
            @include('questionnaire.partials._' . $question->question_type, [
                'question' => $question,
                'oldValue' => $oldValue,
            ])
        </div>

        <div class="question-error" style="display: none;">
            <i class="fa fa-exclamation-circle"></i> <span class="error-text"></span>
        </div>
    </div>
@endforeach
