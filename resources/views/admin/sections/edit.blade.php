@extends('admin.layouts.app')

@section('title', 'Edit Section')

@section('content')
<ol class="breadcrumb">
    <li><a href="{{ route('admin.questionnaires.index') }}">Questionnaires</a></li>
    <li><a href="{{ route('admin.questionnaires.show', $questionnaire) }}">{{ $questionnaire->title }}</a></li>
    <li class="active">Edit Section</li>
</ol>

<div class="content-wrapper">
    <div class="page-header">
        <h1><i class="fa fa-pencil"></i> Edit Section</h1>
    </div>

    <form action="{{ route('admin.questionnaires.sections.update', [$questionnaire, $section]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Section Title <span class="text-danger">*</span></label>
            <input type="text"
                   class="form-control"
                   id="title"
                   name="title"
                   value="{{ old('title', $section->title) }}"
                   required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control"
                      id="description"
                      name="description"
                      rows="3">{{ old('description', $section->description) }}</textarea>
            <p class="help-text">This will be displayed above the questions in this section.</p>
        </div>

        <hr>

        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg">
                <i class="fa fa-save"></i> Update Section
            </button>
            <a href="{{ route('admin.questionnaires.show', $questionnaire) }}" class="btn btn-default btn-lg">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection
