@extends('admin.layouts.app')

@section('title', 'Response Details')

@section('content')
<ol class="breadcrumb">
    <li><a href="{{ route('admin.questionnaires.index') }}">Questionnaires</a></li>
    <li><a href="{{ route('admin.questionnaires.show', $questionnaire) }}">{{ $questionnaire->title }}</a></li>
    <li><a href="{{ route('admin.questionnaires.responses.index', $questionnaire) }}">Responses</a></li>
    <li class="active">Response #{{ $response->id }}</li>
</ol>

<div class="content-wrapper">
    <div class="page-header">
        <div class="row">
            <div class="col-sm-8">
                <h1><i class="fa fa-file-text-o"></i> Response Details</h1>
            </div>
            <div class="col-sm-4 text-right">
                <a href="{{ route('admin.questionnaires.responses.index', $questionnaire) }}" class="btn btn-default">
                    <i class="fa fa-arrow-left"></i> Back to Responses
                </a>
            </div>
        </div>
    </div>

    <!-- Respondent Info -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title"><i class="fa fa-user"></i> Respondent Information</h4>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <dl class="dl-horizontal">
                        <dt>Name</dt>
                        <dd>{{ $response->respondent->name ?? 'Not provided' }}</dd>
                        <dt>Email</dt>
                        <dd>{{ $response->respondent->email ?? 'Not provided' }}</dd>
                        <dt>Phone</dt>
                        <dd>{{ $response->respondent->phone ?? 'Not provided' }}</dd>
                    </dl>
                </div>
                <div class="col-md-6">
                    <dl class="dl-horizontal">
                        <dt>Organization</dt>
                        <dd>{{ $response->respondent->organization ?? 'Not provided' }}</dd>
                        <dt>Job Title</dt>
                        <dd>{{ $response->respondent->job_title ?? 'Not provided' }}</dd>
                        <dt>IP Address</dt>
                        <dd>{{ $response->respondent->ip_address ?? 'Not recorded' }}</dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>

    <!-- Response Metadata -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title"><i class="fa fa-info-circle"></i> Response Details</h4>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-3 text-center">
                    <h4>
                        @if($response->status == 'completed')
                            <span class="label label-success">Completed</span>
                        @elseif($response->status == 'in_progress')
                            <span class="label label-warning">In Progress</span>
                        @else
                            <span class="label label-default">Abandoned</span>
                        @endif
                    </h4>
                    <p class="text-muted">Status</p>
                </div>
                <div class="col-md-3 text-center">
                    <h4>{{ $response->completion_percentage }}%</h4>
                    <p class="text-muted">Completion</p>
                </div>
                <div class="col-md-3 text-center">
                    <h4>{{ $response->formatted_time_spent }}</h4>
                    <p class="text-muted">Time Spent</p>
                </div>
                <div class="col-md-3 text-center">
                    <h4>{{ $response->answers->count() }}</h4>
                    <p class="text-muted">Questions Answered</p>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <strong>Started:</strong> {{ $response->started_at?->format('F j, Y g:i A') ?? 'N/A' }}
                </div>
                <div class="col-md-6">
                    <strong>Completed:</strong> {{ $response->completed_at?->format('F j, Y g:i A') ?? 'N/A' }}
                </div>
            </div>
        </div>
    </div>

    <!-- Answers by Section -->
    <h3><i class="fa fa-list-alt"></i> Answers</h3>

    @php
        $answersByQuestion = $response->answers->keyBy('question_id');
    @endphp

    @foreach($questionnaire->sections as $section)
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">{{ $section->title }}</h4>
            </div>
            <div class="panel-body">
                @if($section->questions->isEmpty())
                    <p class="text-muted">No questions in this section.</p>
                @else
                    <dl>
                        @foreach($section->questions as $question)
                            <dt>
                                {{ $question->question_text }}
                                @if($question->is_required)
                                    <span class="text-danger">*</span>
                                @endif
                            </dt>
                            <dd>
                                @php
                                    $answer = $answersByQuestion->get($question->id);
                                @endphp
                                @if($answer)
                                    <span class="text-success">{{ $answer->display_value ?: 'Empty response' }}</span>
                                @else
                                    <span class="text-muted"><em>Not answered</em></span>
                                @endif
                            </dd>
                        @endforeach
                    </dl>
                @endif
            </div>
        </div>
    @endforeach
</div>
@endsection
