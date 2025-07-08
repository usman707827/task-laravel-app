@extends('layouts.app')
@section('title')
    Dashboard
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row mb-4">
            <div class="col-12">
                <h2 class="text-dark fw-bold mb-1">Welcome to your Dashboard</h2>
                <p class="text-muted">Manage your tasks efficiently and stay organized</p>
            </div>
        </div>

        <!-- Task Statistics Cards -->
        <div class="row mb-5">
            <div class="col-md-3 mb-4">
                <div class="card border-0 shadow-sm h-100" style="border-left: 4px solid #ffc107 !important;">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <h6 class="text-muted mb-1">Total Tasks</h6>
                                <h3 class="text-dark fw-bold mb-0">{{ $tasksCount }}</h3>
                            </div>
                            <div class="bg-warning bg-opacity-10 rounded-circle p-3">
                                <i class="bi bi-list-task text-warning" style="font-size: 1.5rem;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="card border-0 shadow-sm h-100" style="border-left: 4px solid #0dcaf0 !important;">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <h6 class="text-muted mb-1">In Progress</h6>
                                <h3 class="text-dark fw-bold mb-0">{{ $inProgressTasks }}</h3>
                            </div>
                            <div class="bg-info bg-opacity-10 rounded-circle p-3">
                                <i class="bi bi-clock-history text-info" style="font-size: 1.5rem;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="card border-0 shadow-sm h-100" style="border-left: 4px solid #198754 !important;">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <h6 class="text-muted mb-1">Completed</h6>
                                <h3 class="text-dark fw-bold mb-0">{{ $completedTasks }}</h3>
                            </div>
                            <div class="bg-success bg-opacity-10 rounded-circle p-3">
                                <i class="bi bi-check-circle text-success" style="font-size: 1.5rem;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="card border-0 shadow-sm h-100" style="border-left: 4px solid #dc3545 !important;">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <h6 class="text-muted mb-1">Pending</h6>
                                <h3 class="text-dark fw-bold mb-0">{{ $pendingTasks }}</h3>
                            </div>
                            <div class="bg-danger bg-opacity-10 rounded-circle p-3">
                                <i class="bi bi-exclamation-triangle text-danger" style="font-size: 1.5rem;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Tasks Section -->
        @if($recentTasks->count() > 0)
        <div class="row">
            <div class="col-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white border-0 d-flex justify-content-between align-items-center py-3">
                        <h5 class="mb-0 text-dark fw-bold">
                            <i class="bi bi-clock-history me-2"></i>Recent Tasks
                        </h5>
                        <a href="{{ route('tasks.index') }}" class="btn btn-dark btn-sm">
                            <i class="bi bi-arrow-right me-1"></i>View All
                        </a>
                    </div>
                    <div class="card-body bg-white">
                        <div class="row">
                            @foreach($recentTasks as $task)
                            <div class="col-md-6 mb-3">
                                <div class="card border-0 h-100" style="background-color: #f8f9fa;">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-start mb-2">
                                            <h6 class="text-dark fw-medium mb-0">{{ Str::limit($task->title, 25) }}</h6>
                                            <span class="badge rounded-pill {{ $task->getStatusBadgeClass() }}">
                                                {{ ucwords(str_replace('_', ' ', $task->status)) }}
                                            </span>
                                        </div>
                                        @if($task->description)
                                        <p class="text-muted mb-2 small">{{ Str::limit($task->description, 60) }}</p>
                                        @endif
                                        <div class="d-flex justify-content-between align-items-center">
                                            <small class="text-muted">
                                                <i class="bi bi-calendar-event me-1"></i>{{ $task->due_date->format('M d, Y') }}
                                            </small>
                                            <a href="{{ route('tasks.show', $task) }}" class="btn btn-outline-dark btn-sm">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="row">
            <div class="col-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-body bg-white text-center py-5">
                        <i class="bi bi-list-task text-muted mb-3" style="font-size: 4rem;"></i>
                        <h5 class="text-muted mb-3">No tasks yet</h5>
                        <p class="text-muted mb-4">Create your first task to get started with your productivity journey!</p>
                        <a href="{{ route('tasks.create') }}" class="btn btn-dark">
                            <i class="bi bi-plus-circle me-1"></i>Create Your First Task
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>

<style>
/* Custom Dashboard Styles */
.card {
    border-radius: 0.75rem;
    transition: all 0.3s ease;
}

.card:hover {
    transform: translateY(-2px);
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
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

.bg-opacity-10 {
    --bs-bg-opacity: 0.1;
}

.btn-dark {
    background-color: #343a40;
    border-color: #343a40;
}

.btn-dark:hover {
    background-color: #495057;
    border-color: #495057;
}

.btn {
    border-radius: 0.5rem;
    font-weight: 500;
    transition: all 0.2s ease-in-out;
}

.btn:hover {
    transform: translateY(-1px);
}

.text-dark {
    color: #343a40 !important;
}

.shadow-sm {
    box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075) !important;
}

.rounded-circle {
    border-radius: 50% !important;
}

@media (max-width: 768px) {
    .card-body h3 {
        font-size: 1.5rem;
    }
}
</style>
@endsection
