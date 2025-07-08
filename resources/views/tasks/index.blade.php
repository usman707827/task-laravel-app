@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white border-0 d-flex justify-content-between align-items-center py-3">
                    <h4 class="mb-0 text-dark fw-bold"><i class="bi bi-check2-square me-2"></i> My Tasks</h4>
                    <a href="{{ route('tasks.create') }}" class="btn btn-dark">
                        <i class="bi bi-plus-circle me-1"></i> Create New Task
                    </a>
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

                    @if(session('info'))
                        <div class="alert alert-info alert-dismissible fade show border-0" role="alert">
                            <i class="bi bi-info-circle me-2"></i>{{ session('info') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <!-- Filters -->
                    <div class="row mb-4">
                        <div class="col-12">
                            <div class="card border-0" style="background-color: #f8f9fa;">
                                <div class="card-body">
                                    <form method="GET" action="{{ route('tasks.index') }}" class="row g-3" id="filter-form">
                                        <div class="col-md-4">
                                            <label for="search" class="form-label text-dark fw-medium">Search</label>
                                            <input type="text" class="form-control border-0 shadow-sm" id="search" name="search"
                                                   value="{{ request('search') }}" placeholder="Search tasks...">
                                        </div>
                                        <div class="col-md-2">
                                            <label for="status" class="form-label text-dark fw-medium">Status</label>
                                            <select class="form-select border-0 shadow-sm" id="status" name="status">
                                                <option value="">All Status</option>
                                                <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                                                <option value="in_progress" {{ request('status') == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                                                <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="due_date" class="form-label text-dark fw-medium">Due Date</label>
                                            <input type="date" class="form-control border-0 shadow-sm" id="due_date" name="due_date"
                                                   value="{{ request('due_date') }}">
                                        </div>
                                        <div class="col-md-2">
                                            <label for="sort_by" class="form-label text-dark fw-medium">Sort By</label>
                                            <select class="form-select border-0 shadow-sm" id="sort_by" name="sort_by">
                                                <option value="due_date" {{ request('sort_by') == 'due_date' ? 'selected' : '' }}>Due Date</option>
                                                <option value="title" {{ request('sort_by') == 'title' ? 'selected' : '' }}>Title</option>
                                                <option value="status" {{ request('sort_by') == 'status' ? 'selected' : '' }}>Status</option>
                                                <option value="created_at" {{ request('sort_by') == 'created_at' ? 'selected' : '' }}>Created Date</option>
                                            </select>
                                        </div>
                                        <div class="col-md-2 d-flex align-items-end">
                                            <div class="w-100">
                                                <label for="sort_order" class="form-label text-dark fw-medium">Order</label>
                                                <select class="form-select border-0 shadow-sm" id="sort_order" name="sort_order">
                                                    <option value="asc" {{ request('sort_order') == 'asc' ? 'selected' : '' }}>Ascending</option>
                                                    <option value="desc" {{ request('sort_order') == 'desc' ? 'selected' : '' }}>Descending</option>
                                                </select>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="row mt-3">
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" form="filter-form" class="btn btn-dark me-2">
                                                <i class="bi bi-search me-1"></i> Filter
                                            </button>
                                            <a href="{{ route('tasks.index') }}" class="btn btn-outline-secondary">
                                                <i class="bi bi-x-circle me-1"></i> Clear
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if($tasks->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead style="background-color: #343a40; color: white;">
                                    <tr>
                                        <th class="border-0 py-3">SR#</th>
                                        <th class="border-0 py-3">Title</th>
                                        <th class="border-0 py-3">Status</th>
                                        <th class="border-0 py-3">Due Date</th>
                                        <th class="border-0 py-3">Created</th>
                                        <th class="border-0 py-3 text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($tasks as $index => $task)
                                        <tr class="border-bottom">
                                            <td class="py-3">
                                                <span class="badge bg-secondary">{{ $tasks->firstItem() + $index }}</span>
                                            </td>
                                            <td class="py-3">
                                                <strong class="text-dark">{{ $task->title }}</strong>
                                                @if($task->description)
                                                    <br><small class="text-muted">{{ Str::limit($task->description, 50) }}</small>
                                                @endif
                                            </td>
                                            <td class="py-3">
                                                <span class="badge rounded-pill {{ $task->getStatusBadgeClass() }}">
                                                    {{ ucwords(str_replace('_', ' ', $task->status)) }}
                                                </span>
                                            </td>
                                            <td class="py-3">
                                                <span class="text-dark">{{ $task->due_date->format('M d, Y') }}</span>
                                                @if($task->due_date->isPast() && $task->status !== 'completed')
                                                    <br><small class="text-danger"><i class="bi bi-exclamation-triangle me-1"></i> Overdue</small>
                                                @endif
                                            </td>
                                            <td class="py-3 text-muted">{{ $task->created_at->format('M d, Y') }}</td>
                                            <td class="py-3 text-center">
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('tasks.show', $task) }}" class="btn btn-sm btn-outline-info border-0" title="View">
                                                        <i class="bi bi-eye"></i>
                                                    </a>
                                                    <a href="{{ route('tasks.edit', $task) }}" class="btn btn-sm btn-outline-warning border-0" title="Edit">
                                                        <i class="bi bi-pencil"></i>
                                                    </a>
                                                    <button type="button" class="btn btn-sm btn-outline-danger border-0 delete-btn"
                                                            data-task-id="{{ $task->id }}"
                                                            data-task-title="{{ $task->title }}"
                                                            title="Delete">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Custom Pagination -->
                        <div class="row align-items-center mt-4">
                            <div class="col-md-6">
                                <p class="mb-0 text-muted">
                                    Showing {{ $tasks->firstItem() }} to {{ $tasks->lastItem() }} of {{ $tasks->total() }} tasks
                                </p>
                            </div>
                            <div class="col-md-6 d-flex justify-content-end">
                                @if ($tasks->hasPages())
                                    <nav aria-label="Task pagination">
                                        <div class="d-flex align-items-center">
                                            {{-- Previous Page Link --}}
                                            @if ($tasks->onFirstPage())
                                                <span class="btn btn-sm btn-outline-secondary disabled me-1">
                                                    <i class="bi bi-chevron-left"></i>
                                                </span>
                                            @else
                                                <a href="{{ $tasks->appends(request()->except('page'))->previousPageUrl() }}" class="btn btn-sm btn-outline-dark me-1">
                                                    <i class="bi bi-chevron-left"></i>
                                                </a>
                                            @endif

                                            {{-- Pagination Elements --}}
                                            @foreach ($tasks->appends(request()->except('page'))->getUrlRange(1, $tasks->lastPage()) as $page => $url)
                                                @if ($page == $tasks->currentPage())
                                                    <span class="btn btn-sm btn-dark me-1">{{ $page }}</span>
                                                @else
                                                    <a href="{{ $url }}" class="btn btn-sm btn-outline-dark me-1">{{ $page }}</a>
                                                @endif
                                            @endforeach

                                            {{-- Next Page Link --}}
                                            @if ($tasks->hasMorePages())
                                                <a href="{{ $tasks->appends(request()->except('page'))->nextPageUrl() }}" class="btn btn-sm btn-outline-dark">
                                                    <i class="bi bi-chevron-right"></i>
                                                </a>
                                            @else
                                                <span class="btn btn-sm btn-outline-secondary disabled">
                                                    <i class="bi bi-chevron-right"></i>
                                                </span>
                                            @endif
                                        </div>
                                    </nav>
                                @endif
                            </div>
                        </div>
                    @else
                        <div class="text-center py-5">
                            <i class="bi bi-check2-square" style="font-size: 4rem; color: #6c757d;"></i>
                            <h5 class="text-muted mt-3">No tasks found</h5>
                            <p class="text-muted">Create your first task to get started!</p>
                            <a href="{{ route('tasks.create') }}" class="btn btn-dark">
                                <i class="bi bi-plus-circle me-1"></i> Create Task
                            </a>
                        </div>
                    @endif
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
                <p class="text-dark">Are you sure you want to delete the task "<strong id="taskTitle"></strong>"?</p>
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

<!-- jQuery CDN -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {
    // Handle delete button click
    $('.delete-btn').on('click', function() {
        var taskId = $(this).data('task-id');
        var taskTitle = $(this).data('task-title');

        // Set the form action
        $('#deleteForm').attr('action', '/tasks/' + taskId);

        // Set the task title in modal
        $('#taskTitle').text(taskTitle);

        // Show the modal
        $('#deleteModal').modal('show');
    });

    // Handle form submission
    $('#deleteForm').on('submit', function(e) {
        // Show loading state
        $(this).find('button[type="submit"]').html('<i class="bi bi-hourglass-split me-1"></i>Deleting...');
        $(this).find('button[type="submit"]').prop('disabled', true);
    });
});
</script>

<style>
/* Custom Theme Styles */
.card {
    border-radius: 0.75rem;
    box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
}

.table thead th {
    font-weight: 600;
    letter-spacing: 0.5px;
}

.table tbody tr:hover {
    background-color: #f8f9fa;
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

.btn-group .btn {
    border-radius: 0.375rem;
    margin-right: 0.25rem;
    transition: all 0.2s ease-in-out;
}

.btn-group .btn:hover {
    transform: translateY(-1px);
    box-shadow: 0 0.25rem 0.5rem rgba(0, 0, 0, 0.15);
}

.btn-group .btn:last-child {
    margin-right: 0;
}

.form-control:focus,
.form-select:focus {
    border-color: #343a40;
    box-shadow: 0 0 0 0.2rem rgba(52, 58, 64, 0.25);
}

.alert {
    border-radius: 0.5rem;
    border: none;
}

.table-responsive {
    border-radius: 0.5rem;
    overflow: hidden;
}

.empty-state {
    padding: 3rem 0;
}

.modal-content {
    border-radius: 0.75rem;
}
</style>
@endsection
