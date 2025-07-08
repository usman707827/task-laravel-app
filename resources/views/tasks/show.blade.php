@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white border-0 d-flex justify-content-between align-items-center py-3">
                    <h4 class="mb-0 text-dark fw-bold"><i class="bi bi-eye me-2"></i> Task Details</h4>
                    <div>
                        <a href="{{ route('tasks.edit', $task) }}" class="btn btn-outline-warning border-0 me-2">
                            <i class="bi bi-pencil me-1"></i> Edit
                        </a>
                        <button type="button" class="btn btn-outline-danger border-0" onclick="deleteTask({{ $task->id }})">
                            <i class="bi bi-trash me-1"></i> Delete
                        </button>
                    </div>
                </div>

                <div class="card-body bg-white">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show border-0" role="alert">
                            <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show border-0" role="alert">
                            <i class="bi bi-exclamation-triangle me-2"></i>{{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-12">
                            <div class="card border-0 mb-4" style="background-color: #f8f9fa;">
                                <div class="card-body">
                                    <h5 class="text-dark fw-bold mb-3">{{ $task->title }}</h5>

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="d-flex align-items-center">
                                                <i class="bi bi-flag me-2 text-muted"></i>
                                                <strong class="text-dark">Status:</strong>
                                                <span class="badge rounded-pill {{ $task->getStatusBadgeClass() }} ms-2">
                                                    {{ ucwords(str_replace('_', ' ', $task->status)) }}
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="d-flex align-items-center">
                                                <i class="bi bi-calendar-event me-2 text-muted"></i>
                                                <strong class="text-dark">Due Date:</strong>
                                                <span class="ms-2 text-dark">{{ $task->due_date->format('M d, Y') }}</span>
                                                @if($task->due_date->isPast() && $task->status !== 'completed')
                                                    <span class="badge bg-danger ms-2">
                                                        <i class="bi bi-exclamation-triangle me-1"></i> Overdue
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    @if($task->description)
                                        <div class="mb-3">
                                            <div class="d-flex align-items-start">
                                                <i class="bi bi-card-text me-2 text-muted mt-1"></i>
                                                <div class="flex-grow-1">
                                                    <strong class="text-dark">Description:</strong>
                                                    <div class="mt-2 p-3 bg-white rounded shadow-sm border-0">
                                                        {{ $task->description }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="d-flex align-items-center">
                                                <i class="bi bi-plus-circle me-2 text-muted"></i>
                                                <small class="text-muted">
                                                    <strong>Created:</strong> {{ $task->created_at->format('M d, Y g:i A') }}
                                                </small>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="d-flex align-items-center">
                                                <i class="bi bi-arrow-clockwise me-2 text-muted"></i>
                                                <small class="text-muted">
                                                    <strong>Last Updated:</strong> {{ $task->updated_at->format('M d, Y g:i A') }}
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                        <a href="{{ route('tasks.index') }}" class="btn btn-outline-secondary">
                            <i class="bi bi-arrow-left me-1"></i> Back to Tasks
                        </a>
                        <a href="{{ route('tasks.edit', $task) }}" class="btn btn-dark">
                            <i class="bi bi-pencil me-1"></i> Edit Task
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content border-0 shadow">
            <div class="modal-header border-0" style="background-color: #343a40; color: white;">
                <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body bg-white">
                <p class="text-dark">Are you sure you want to delete the task "<strong>{{ $task->title }}</strong>"?</p>
                <p class="text-danger"><i class="bi bi-exclamation-triangle me-1"></i> This action cannot be undone.</p>
            </div>
            <div class="modal-footer border-0 bg-white">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                <form id="deleteForm" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="bi bi-trash me-1"></i>Delete Task
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
function deleteTask(taskId) {
    const deleteForm = document.getElementById('deleteForm');
    deleteForm.action = `/tasks/${taskId}`;
    const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
    deleteModal.show();
}
</script>

<style>
/* Custom Theme Styles for Show Task Page */
.card {
    border-radius: 0.75rem;
    box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
}

.btn {
    border-radius: 0.5rem;
    font-weight: 500;
    transition: all 0.2s ease-in-out;
}

.btn:hover {
    transform: translateY(-1px);
    box-shadow: 0 0.25rem 0.5rem rgba(0, 0, 0, 0.15);
}

.btn-dark {
    background-color: #343a40;
    border-color: #343a40;
}

.btn-dark:hover {
    background-color: #495057;
    border-color: #495057;
}

.alert {
    border-radius: 0.5rem;
    border: none;
}

.badge {
    font-size: 0.75rem;
    font-weight: 500;
    padding: 0.35em 0.65em;
}

.badge-warning {
    background-color: #ffc107;
    color: #212529;
}

.badge-info {
    background-color: #0dcaf0;
    color: #212529;
}

.badge-success {
    background-color: #198754;
    color: white;
}

.badge-secondary {
    background-color: #6c757d;
    color: white;
}

.modal-content {
    border-radius: 0.75rem;
}

.text-dark {
    color: #343a40 !important;
}

.bg-white {
    background-color: #fff !important;
}

.shadow-sm {
    box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075) !important;
}
</style>
@endsection
