@extends('admin.layouts.app')

@section('title', 'Questionnaires')

@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <div class="row">
            <div class="col-sm-6">
                <h1><i class="fa fa-list"></i> Questionnaires</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ route('admin.questionnaires.create') }}" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Create Questionnaire
                </a>
            </div>
        </div>
    </div>

    @if($questionnaires->isEmpty())
        <div class="empty-state">
            <i class="fa fa-clipboard"></i>
            <h3>No Questionnaires Yet</h3>
            <p>Create your first questionnaire to get started.</p>
            <a href="{{ route('admin.questionnaires.create') }}" class="btn btn-primary btn-lg">
                <i class="fa fa-plus"></i> Create Questionnaire
            </a>
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th width="40%">Title</th>
                        <th width="10%" class="text-center">Sections</th>
                        <th width="10%" class="text-center">Responses</th>
                        <th width="15%" class="text-center">Status</th>
                        <th width="25%" class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($questionnaires as $questionnaire)
                        <tr>
                            <td>
                                <strong>
                                    <a href="{{ route('admin.questionnaires.show', $questionnaire) }}">
                                        {{ $questionnaire->title }}
                                    </a>
                                </strong>
                                <br>
                                <small class="text-muted">
                                    <i class="fa fa-link"></i> /questionnaire/{{ $questionnaire->slug }}
                                </small>
                            </td>
                            <td class="text-center">
                                <span class="label label-default">{{ $questionnaire->sections_count }}</span>
                            </td>
                            <td class="text-center">
                                <span class="label label-info">{{ $questionnaire->responses_count }}</span>
                            </td>
                            <td class="text-center">
                                <label class="toggle-switch">
                                    <input type="checkbox"
                                           class="toggle-active"
                                           data-id="{{ $questionnaire->id }}"
                                           {{ $questionnaire->is_active ? 'checked' : '' }}>
                                    <span class="toggle-slider"></span>
                                </label>
                            </td>
                            <td class="text-center action-buttons">
                                <a href="{{ route('admin.questionnaires.show', $questionnaire) }}"
                                   class="btn btn-sm btn-info" title="View & Edit Structure">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.questionnaires.edit', $questionnaire) }}"
                                   class="btn btn-sm btn-warning" title="Edit Settings">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <a href="{{ route('admin.questionnaires.responses.index', $questionnaire) }}"
                                   class="btn btn-sm btn-success" title="View Responses">
                                    <i class="fa fa-bar-chart"></i>
                                </a>
                                @if($questionnaire->responses_count == 0)
                                    <button type="button"
                                            class="btn btn-sm btn-danger btn-delete"
                                            data-id="{{ $questionnaire->id }}"
                                            data-title="{{ $questionnaire->title }}"
                                            title="Delete">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                @else
                                    <button type="button"
                                            class="btn btn-sm btn-default"
                                            disabled
                                            title="Cannot delete - has responses">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="text-center">
            {{ $questionnaires->links() }}
        </div>
    @endif
</div>

<!-- Delete Form (hidden) -->
<form id="delete-form" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    // Toggle Active Status
    $('.toggle-active').on('change', function() {
        var $toggle = $(this);
        var id = $toggle.data('id');
        var isActive = $toggle.is(':checked');
        var action = isActive ? 'enable' : 'disable';

        Swal.fire({
            title: 'Are you sure?',
            text: 'Do you want to ' + action + ' this questionnaire?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#337ab7',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, ' + action + ' it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '/admin/questionnaires/' + id + '/toggle-status',
                    type: 'POST',
                    success: function(response) {
                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            icon: 'success',
                            title: 'Status updated successfully',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    },
                    error: function() {
                        // Revert toggle
                        $toggle.prop('checked', !isActive);
                        Swal.fire('Error!', 'Failed to update status.', 'error');
                    }
                });
            } else {
                // Revert toggle
                $toggle.prop('checked', !isActive);
            }
        });
    });

    // Delete Questionnaire
    $('.btn-delete').on('click', function() {
        var id = $(this).data('id');
        var title = $(this).data('title');

        Swal.fire({
            title: 'Delete Questionnaire?',
            html: 'Are you sure you want to delete <strong>' + title + '</strong>?<br><br>' +
                  '<small class="text-danger">This action cannot be undone!</small>',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                var $form = $('#delete-form');
                $form.attr('action', '/admin/questionnaires/' + id);
                $form.submit();
            }
        });
    });
});
</script>
@endpush
