@extends('admin.layouts.app')

@section('title', $questionnaire->title)

@section('content')
<ol class="breadcrumb">
    <li><a href="{{ route('admin.questionnaires.index') }}">Questionnaires</a></li>
    <li class="active">{{ $questionnaire->title }}</li>
</ol>

<div class="content-wrapper">
    <div class="page-header">
        <div class="row">
            <div class="col-sm-8">
                <h1>
                    {{ $questionnaire->title }}
                    @if($questionnaire->is_active)
                        <span class="label status-active">Active</span>
                    @else
                        <span class="label status-inactive">Inactive</span>
                    @endif
                </h1>
                <p class="text-muted">
                    <i class="fa fa-link"></i>
                    <a href="{{ url('/questionnaire/' . $questionnaire->slug) }}" target="_blank">
                        /questionnaire/{{ $questionnaire->slug }}
                    </a>
                </p>
            </div>
            <div class="col-sm-4 text-right">
                <a href="{{ route('admin.questionnaires.edit', $questionnaire) }}" class="btn btn-warning">
                    <i class="fa fa-pencil"></i> Edit Settings
                </a>
                <a href="{{ route('admin.questionnaires.sections.create', $questionnaire) }}" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Add Section
                </a>
            </div>
        </div>
    </div>

    @if($questionnaire->description)
        <p class="lead">{{ $questionnaire->description }}</p>
    @endif

    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-body text-center">
                    <h3 class="text-primary">{{ $questionnaire->sections->count() }}</h3>
                    <p class="text-muted">Sections</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-body text-center">
                    <h3 class="text-info">{{ $questionnaire->sections->sum(fn($s) => $s->questions->count()) }}</h3>
                    <p class="text-muted">Questions</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-body text-center">
                    <h3 class="text-success">{{ $questionnaire->responses()->count() }}</h3>
                    <p class="text-muted">
                        <a href="{{ route('admin.questionnaires.responses.index', $questionnaire) }}">Responses</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <hr>

    <h3>
        <i class="fa fa-list-alt"></i> Sections & Questions
        <small class="text-muted">(Drag to reorder)</small>
    </h3>

    @if($questionnaire->sections->isEmpty())
        <div class="empty-state">
            <i class="fa fa-folder-open-o"></i>
            <h4>No Sections Yet</h4>
            <p>Add sections to organize your questions.</p>
            <a href="{{ route('admin.questionnaires.sections.create', $questionnaire) }}" class="btn btn-primary">
                <i class="fa fa-plus"></i> Add First Section
            </a>
        </div>
    @else
        <div id="sections-sortable" class="sortable-list" data-questionnaire-id="{{ $questionnaire->id }}">
            @foreach($questionnaire->sections as $section)
                <div class="section-card sortable-item" data-section-id="{{ $section->id }}">
                    <div class="section-header">
                        <span class="drag-handle"><i class="fa fa-bars"></i></span>
                        <h4>
                            {{ $section->title }}
                            <small class="text-muted">({{ $section->questions->count() }} questions)</small>
                        </h4>
                        <div class="action-buttons">
                            <a href="{{ route('admin.questionnaires.sections.questions.create', [$questionnaire, $section]) }}"
                               class="btn btn-sm btn-success" title="Add Question">
                                <i class="fa fa-plus"></i> Question
                            </a>
                            <a href="{{ route('admin.questionnaires.sections.edit', [$questionnaire, $section]) }}"
                               class="btn btn-sm btn-warning" title="Edit Section">
                                <i class="fa fa-pencil"></i>
                            </a>
                            <button type="button"
                                    class="btn btn-sm btn-danger btn-delete-section"
                                    data-section-id="{{ $section->id }}"
                                    data-section-title="{{ $section->title }}"
                                    title="Delete Section">
                                <i class="fa fa-trash"></i>
                            </button>
                        </div>
                    </div>
                    <div class="section-body">
                        @if($section->description)
                            <p class="text-muted">{{ $section->description }}</p>
                        @endif

                        @if($section->questions->isEmpty())
                            <p class="text-center text-muted" style="padding: 20px;">
                                <em>No questions in this section yet.</em>
                            </p>
                        @else
                            <div class="questions-sortable" data-section-id="{{ $section->id }}">
                                @foreach($section->questions as $question)
                                    <div class="question-item sortable-item" data-question-id="{{ $question->id }}">
                                        <span class="drag-handle"><i class="fa fa-ellipsis-v"></i></span>
                                        <div class="question-info">
                                            <div>
                                                {{ $question->question_text }}
                                                @if($question->is_required)
                                                    <span class="question-required">*</span>
                                                @endif
                                            </div>
                                            <span class="question-type">{{ \App\Models\Question::TYPES[$question->question_type] ?? $question->question_type }}</span>
                                        </div>
                                        <div class="action-buttons">
                                            <a href="{{ route('admin.questionnaires.sections.questions.edit', [$questionnaire, $section, $question]) }}"
                                               class="btn btn-xs btn-warning" title="Edit">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <button type="button"
                                                    class="btn btn-xs btn-danger btn-delete-question"
                                                    data-question-id="{{ $question->id }}"
                                                    data-section-id="{{ $section->id }}"
                                                    title="Delete">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>

<!-- Delete Forms (hidden) -->
<form id="delete-section-form" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>

<form id="delete-question-form" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    var questionnaireId = {{ $questionnaire->id }};

    // Initialize sortable for sections
    $('#sections-sortable').sortable({
        handle: '.section-header .drag-handle',
        placeholder: 'ui-sortable-placeholder',
        update: function(event, ui) {
            var items = [];
            $(this).find('.section-card').each(function(index) {
                items.push({
                    id: $(this).data('section-id'),
                    order: index + 1
                });
            });

            $.ajax({
                url: '/admin/questionnaires/' + questionnaireId + '/sections/reorder',
                type: 'POST',
                contentType: 'application/json',
                data: JSON.stringify({ items: items }),
                success: function(response) {
                    showToast('success', 'Sections reordered successfully');
                },
                error: function() {
                    showToast('error', 'Failed to reorder sections.');
                }
            });
        }
    });

    // Initialize sortable for questions within each section
    $('.questions-sortable').each(function() {
        var $list = $(this);
        var sectionId = $list.data('section-id');

        $list.sortable({
            handle: '.drag-handle',
            placeholder: 'ui-sortable-placeholder',
            update: function(event, ui) {
                var items = [];
                $(this).find('.question-item').each(function(index) {
                    items.push({
                        id: $(this).data('question-id'),
                        order: index + 1
                    });
                });

                var targetSectionId = $(this).data('section-id');

                $.ajax({
                    url: '/admin/questionnaires/' + questionnaireId + '/sections/' + targetSectionId + '/questions/reorder',
                    type: 'POST',
                    contentType: 'application/json',
                    data: JSON.stringify({ items: items }),
                    success: function(response) {
                        showToast('success', 'Questions reordered successfully');
                    },
                    error: function() {
                        showToast('error', 'Failed to reorder questions.');
                    }
                });
            }
        });
    });

    // Delete Section
    $('.btn-delete-section').on('click', function() {
        var sectionId = $(this).data('section-id');
        var sectionTitle = $(this).data('section-title');

        Swal.fire({
            title: 'Delete Section?',
            html: 'Are you sure you want to delete <strong>' + sectionTitle + '</strong>?<br><br>' +
                  '<small class="text-danger">All questions in this section will also be deleted!</small>',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                var $form = $('#delete-section-form');
                $form.attr('action', '/admin/questionnaires/' + questionnaireId + '/sections/' + sectionId);
                $form.submit();
            }
        });
    });

    // Delete Question
    $('.btn-delete-question').on('click', function() {
        var questionId = $(this).data('question-id');
        var sectionId = $(this).data('section-id');

        Swal.fire({
            title: 'Delete Question?',
            text: 'Are you sure you want to delete this question?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                var $form = $('#delete-question-form');
                $form.attr('action', '/admin/questionnaires/' + questionnaireId + '/sections/' + sectionId + '/questions/' + questionId);
                $form.submit();
            }
        });
    });

    // Toast notification helper
    function showToast(type, message) {
        Swal.fire({
            toast: true,
            position: 'top-end',
            icon: type,
            title: message,
            showConfirmButton: false,
            timer: 2000
        });
    }
});
</script>
@endpush
