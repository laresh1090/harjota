@extends('admin.layouts.app')

@section('title', 'Create Questionnaire')

@section('content')
<ol class="breadcrumb">
    <li><a href="{{ route('admin.questionnaires.index') }}">Questionnaires</a></li>
    <li class="active">Create</li>
</ol>

<div class="content-wrapper">
    <div class="page-header">
        <h1><i class="fa fa-plus"></i> Create Questionnaire</h1>
    </div>

    <form action="{{ route('admin.questionnaires.store') }}" method="POST">
        @csrf

        <div class="form-section">
            <div class="form-section-title">Basic Information</div>

            <div class="form-group">
                <label for="title">Title <span class="text-danger">*</span></label>
                <input type="text"
                       class="form-control"
                       id="title"
                       name="title"
                       value="{{ old('title') }}"
                       required
                       placeholder="e.g., Enterprise Intelligence Survey">
            </div>

            <div class="form-group">
                <label for="slug">URL Slug</label>
                <div class="input-group">
                    <span class="input-group-addon">/questionnaire/</span>
                    <input type="text"
                           class="form-control"
                           id="slug"
                           name="slug"
                           value="{{ old('slug') }}"
                           placeholder="enterprise-intelligence-survey">
                </div>
                <p class="help-text">Leave empty to auto-generate from title.</p>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control"
                          id="description"
                          name="description"
                          rows="3"
                          placeholder="Brief description of this questionnaire...">{{ old('description') }}</textarea>
            </div>
        </div>

        <div class="form-section">
            <div class="form-section-title">Messages</div>

            <div class="form-group">
                <label for="introduction">Introduction Message</label>
                <textarea class="form-control"
                          id="introduction"
                          name="introduction"
                          rows="4"
                          placeholder="Message displayed at the start of the questionnaire...">{{ old('introduction') }}</textarea>
                <p class="help-text">Shown to respondents before they begin.</p>
            </div>

            <div class="form-group">
                <label for="completion_message">Completion Message</label>
                <textarea class="form-control"
                          id="completion_message"
                          name="completion_message"
                          rows="4"
                          placeholder="Thank you message displayed after completion...">{{ old('completion_message') }}</textarea>
                <p class="help-text">Shown after the questionnaire is submitted.</p>
            </div>
        </div>

        <div class="form-section">
            <div class="form-section-title">Settings</div>

            <div class="checkbox">
                <label>
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}>
                    <strong>Active</strong> - Make this questionnaire publicly accessible
                </label>
            </div>

            <div class="checkbox">
                <label>
                    <input type="checkbox" name="collect_contact_info" value="1" {{ old('collect_contact_info', true) ? 'checked' : '' }}>
                    <strong>Collect Contact Info</strong> - Ask for name, email, organization before starting
                </label>
            </div>
        </div>

        <hr>

        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg">
                <i class="fa fa-save"></i> Create Questionnaire
            </button>
            <a href="{{ route('admin.questionnaires.index') }}" class="btn btn-default btn-lg">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    // Auto-generate slug from title
    $('#title').on('blur', function() {
        var $slug = $('#slug');
        if ($slug.val() === '') {
            var title = $(this).val();
            var slug = title.toLowerCase()
                .replace(/[^a-z0-9\s-]/g, '')
                .replace(/\s+/g, '-')
                .replace(/-+/g, '-')
                .trim();
            $slug.val(slug);
        }
    });
});
</script>
@endpush
