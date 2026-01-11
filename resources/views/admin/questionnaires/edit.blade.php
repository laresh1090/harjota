@extends('admin.layouts.app')

@section('title', 'Edit Questionnaire')

@section('content')
<ol class="breadcrumb">
    <li><a href="{{ route('admin.questionnaires.index') }}">Questionnaires</a></li>
    <li><a href="{{ route('admin.questionnaires.show', $questionnaire) }}">{{ $questionnaire->title }}</a></li>
    <li class="active">Edit</li>
</ol>

<div class="content-wrapper">
    <div class="page-header">
        <h1><i class="fa fa-pencil"></i> Edit Questionnaire</h1>
    </div>

    <form action="{{ route('admin.questionnaires.update', $questionnaire) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-section">
            <div class="form-section-title">Basic Information</div>

            <div class="form-group">
                <label for="title">Title <span class="text-danger">*</span></label>
                <input type="text"
                       class="form-control"
                       id="title"
                       name="title"
                       value="{{ old('title', $questionnaire->title) }}"
                       required>
            </div>

            <div class="form-group">
                <label for="slug">URL Slug</label>
                <div class="input-group">
                    <span class="input-group-addon">/questionnaire/</span>
                    <input type="text"
                           class="form-control"
                           id="slug"
                           name="slug"
                           value="{{ old('slug', $questionnaire->slug) }}">
                </div>
                <p class="help-text">Leave empty to auto-generate from title.</p>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control"
                          id="description"
                          name="description"
                          rows="3">{{ old('description', $questionnaire->description) }}</textarea>
            </div>
        </div>

        <div class="form-section">
            <div class="form-section-title">Messages</div>

            <div class="form-group">
                <label for="introduction">Introduction Message</label>
                <textarea class="form-control"
                          id="introduction"
                          name="introduction"
                          rows="4">{{ old('introduction', $questionnaire->introduction) }}</textarea>
                <p class="help-text">Shown to respondents before they begin.</p>
            </div>

            <div class="form-group">
                <label for="completion_message">Completion Message</label>
                <textarea class="form-control"
                          id="completion_message"
                          name="completion_message"
                          rows="4">{{ old('completion_message', $questionnaire->completion_message) }}</textarea>
                <p class="help-text">Shown after the questionnaire is submitted.</p>
            </div>
        </div>

        <div class="form-section">
            <div class="form-section-title">Settings</div>

            <div class="checkbox">
                <label>
                    <input type="checkbox"
                           name="is_active"
                           value="1"
                           {{ old('is_active', $questionnaire->is_active) ? 'checked' : '' }}>
                    <strong>Active</strong> - Make this questionnaire publicly accessible
                </label>
            </div>

            <div class="checkbox">
                <label>
                    <input type="checkbox"
                           name="collect_contact_info"
                           value="1"
                           {{ old('collect_contact_info', $questionnaire->collect_contact_info) ? 'checked' : '' }}>
                    <strong>Collect Contact Info</strong> - Ask for name, email, organization before starting
                </label>
            </div>
        </div>

        <hr>

        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg">
                <i class="fa fa-save"></i> Update Questionnaire
            </button>
            <a href="{{ route('admin.questionnaires.show', $questionnaire) }}" class="btn btn-default btn-lg">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection
