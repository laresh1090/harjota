@extends('admin.layouts.app')

@section('title', 'Responses - ' . $questionnaire->title)

@section('content')
<ol class="breadcrumb">
    <li><a href="{{ route('admin.questionnaires.index') }}">Questionnaires</a></li>
    <li><a href="{{ route('admin.questionnaires.show', $questionnaire) }}">{{ $questionnaire->title }}</a></li>
    <li class="active">Responses</li>
</ol>

<div class="content-wrapper">
    <div class="page-header">
        <div class="row">
            <div class="col-sm-6">
                <h1><i class="fa fa-bar-chart"></i> Responses</h1>
                <p class="text-muted">{{ $questionnaire->title }}</p>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ route('admin.questionnaires.responses.stats', $questionnaire) }}" class="btn btn-info">
                    <i class="fa fa-pie-chart"></i> Statistics
                </a>
                <a href="{{ route('admin.questionnaires.responses.export', $questionnaire) }}" class="btn btn-success">
                    <i class="fa fa-download"></i> Export CSV
                </a>
            </div>
        </div>
    </div>

    <!-- Filters -->
    <form method="GET" class="well well-sm">
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option value="">All Statuses</option>
                        <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                        <option value="in_progress" {{ request('status') == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                        <option value="abandoned" {{ request('status') == 'abandoned' ? 'selected' : '' }}>Abandoned</option>
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>From Date</label>
                    <input type="date" name="date_from" class="form-control" value="{{ request('date_from') }}">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>To Date</label>
                    <input type="date" name="date_to" class="form-control" value="{{ request('date_to') }}">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>Search</label>
                    <input type="text" name="search" class="form-control" placeholder="Name or email..." value="{{ request('search') }}">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-sm">
            <i class="fa fa-filter"></i> Filter
        </button>
        <a href="{{ route('admin.questionnaires.responses.index', $questionnaire) }}" class="btn btn-default btn-sm">
            <i class="fa fa-times"></i> Clear
        </a>
    </form>

    @if($responses->isEmpty())
        <div class="empty-state">
            <i class="fa fa-inbox"></i>
            <h4>No Responses Yet</h4>
            <p>Responses will appear here once people start completing the questionnaire.</p>
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Respondent</th>
                        <th>Organization</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Progress</th>
                        <th>Started</th>
                        <th>Completed</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($responses as $response)
                        <tr>
                            <td>
                                <strong>{{ $response->respondent->display_name }}</strong>
                                @if($response->respondent->email)
                                    <br><small class="text-muted">{{ $response->respondent->email }}</small>
                                @endif
                            </td>
                            <td>{{ $response->respondent->organization ?? '-' }}</td>
                            <td class="text-center">
                                @if($response->status == 'completed')
                                    <span class="label label-success">Completed</span>
                                @elseif($response->status == 'in_progress')
                                    <span class="label label-warning">In Progress</span>
                                @else
                                    <span class="label label-default">Abandoned</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <div class="progress" style="margin-bottom: 0; min-width: 80px;">
                                    <div class="progress-bar" style="width: {{ $response->completion_percentage }}%;">
                                        {{ $response->completion_percentage }}%
                                    </div>
                                </div>
                            </td>
                            <td>{{ $response->started_at?->format('M j, Y g:i A') ?? '-' }}</td>
                            <td>{{ $response->completed_at?->format('M j, Y g:i A') ?? '-' }}</td>
                            <td class="text-center">
                                <a href="{{ route('admin.questionnaires.responses.show', [$questionnaire, $response]) }}"
                                   class="btn btn-xs btn-info" title="View Details">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <button type="button"
                                        class="btn btn-xs btn-danger btn-delete-response"
                                        data-response-id="{{ $response->id }}"
                                        title="Delete">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="text-center">
            {{ $responses->appends(request()->query())->links() }}
        </div>
    @endif
</div>

<!-- Delete Form (hidden) -->
<form id="delete-response-form" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    $('.btn-delete-response').on('click', function() {
        var responseId = $(this).data('response-id');

        Swal.fire({
            title: 'Delete Response?',
            text: 'Are you sure you want to delete this response? This action cannot be undone.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                var $form = $('#delete-response-form');
                $form.attr('action', '{{ route("admin.questionnaires.responses.index", $questionnaire) }}/' + responseId);
                $form.submit();
            }
        });
    });
});
</script>
@endpush
