@extends('admin.layouts.app')

@section('title', 'Statistics - ' . $questionnaire->title)

@section('content')
<ol class="breadcrumb">
    <li><a href="{{ route('admin.questionnaires.index') }}">Questionnaires</a></li>
    <li><a href="{{ route('admin.questionnaires.show', $questionnaire) }}">{{ $questionnaire->title }}</a></li>
    <li><a href="{{ route('admin.questionnaires.responses.index', $questionnaire) }}">Responses</a></li>
    <li class="active">Statistics</li>
</ol>

<div class="content-wrapper">
    <div class="page-header">
        <div class="row">
            <div class="col-sm-8">
                <h1><i class="fa fa-pie-chart"></i> Response Statistics</h1>
                <p class="text-muted">{{ $questionnaire->title }}</p>
            </div>
            <div class="col-sm-4 text-right">
                <a href="{{ route('admin.questionnaires.responses.index', $questionnaire) }}" class="btn btn-default">
                    <i class="fa fa-arrow-left"></i> Back to Responses
                </a>
                <a href="{{ route('admin.questionnaires.responses.export', $questionnaire) }}" class="btn btn-success">
                    <i class="fa fa-download"></i> Export CSV
                </a>
            </div>
        </div>
    </div>

    <!-- Overview Stats -->
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-primary">
                <div class="panel-body text-center">
                    <h2>{{ $stats['total'] }}</h2>
                    <p class="text-muted">Total Responses</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel panel-success">
                <div class="panel-body text-center">
                    <h2>{{ $stats['completed'] }}</h2>
                    <p class="text-muted">Completed</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel panel-warning">
                <div class="panel-body text-center">
                    <h2>{{ $stats['in_progress'] }}</h2>
                    <p class="text-muted">In Progress</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-body text-center">
                    <h2>{{ $stats['abandoned'] }}</h2>
                    <p class="text-muted">Abandoned</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"><i class="fa fa-check-circle"></i> Completion Rate</h4>
                </div>
                <div class="panel-body text-center">
                    <div style="font-size: 48px; font-weight: bold; color: #5cb85c;">
                        {{ $stats['completion_rate'] }}%
                    </div>
                    <p class="text-muted">of respondents complete the questionnaire</p>
                    <div class="progress">
                        <div class="progress-bar progress-bar-success" style="width: {{ $stats['completion_rate'] }}%"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"><i class="fa fa-clock-o"></i> Average Completion Time</h4>
                </div>
                <div class="panel-body text-center">
                    <div style="font-size: 48px; font-weight: bold; color: #337ab7;">
                        {{ $stats['avg_time'] }}
                    </div>
                    <p class="text-muted">minutes average to complete</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title"><i class="fa fa-bolt"></i> Quick Actions</h4>
        </div>
        <div class="panel-body">
            <a href="{{ route('admin.questionnaires.responses.export', array_merge(['questionnaire' => $questionnaire->id], ['status' => 'completed'])) }}"
               class="btn btn-success">
                <i class="fa fa-download"></i> Export Completed Only
            </a>
            <a href="{{ route('assessment.show', $questionnaire) }}" target="_blank" class="btn btn-info">
                <i class="fa fa-external-link"></i> Preview Questionnaire
            </a>
            <a href="{{ route('admin.questionnaires.show', $questionnaire) }}" class="btn btn-warning">
                <i class="fa fa-pencil"></i> Edit Questionnaire
            </a>
        </div>
    </div>
</div>
@endsection
