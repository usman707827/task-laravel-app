@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white border-0 d-flex justify-content-between align-items-center py-3">
                    <h4 class="mb-0 text-dark fw-bold"><i class="bi bi-plus-circle me-2"></i> Create New Task</h4>
                    {{-- <a href="{{ route('tasks.index') }}" class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-left me-1"></i> Back to Tasks
                    </a> --}}
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
                    <form method="POST" action="{{ route('tasks.store') }}">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="title" class="form-label text-dark fw-medium">Title <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control border-0 shadow-sm @error('title') is-invalid @enderror"
                                           id="title" name="title" value="{{ old('title') }}" required placeholder="Enter task title">
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="due_date" class="form-label text-dark fw-medium">Due Date <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control border-0 shadow-sm @error('due_date') is-invalid @enderror"
                                           id="due_date" name="due_date" value="{{ old('due_date') }}" required>
                                    @error('due_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label text-dark fw-medium">Description</label>
                            <textarea class="form-control border-0 shadow-sm @error('description') is-invalid @enderror"
                                      id="description" name="description" rows="4" placeholder="Enter task description (optional)">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="status" class="form-label text-dark fw-medium">Status <span class="text-danger">*</span></label>
                                    <select class="form-select border-0 shadow-sm @error('status') is-invalid @enderror" id="status" name="status" required>
                                        <option value="">Select Status</option>
                                        <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="in_progress" {{ old('status') == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                                        <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="priority" class="form-label text-dark fw-medium">Priority</label>
                                    <select class="form-select border-0 shadow-sm @error('priority') is-invalid @enderror" id="priority" name="priority">
                                        <option value="medium" {{ old('priority') == 'medium' ? 'selected' : '' }}>Medium</option>
                                        <option value="low" {{ old('priority') == 'low' ? 'selected' : '' }}>Low</option>
                                        <option value="high" {{ old('priority') == 'high' ? 'selected' : '' }}>High</option>
                                    </select>
                                    @error('priority')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div> --}}
                        </div>

                        <div class="d-flex justify-content-between align-items-center mt-4">
                            <a href="{{ route('tasks.index') }}" class="btn btn-outline-secondary">
                                <i class="bi bi-arrow-left me-1"></i> Back to Tasks
                            </a>
                            <button type="submit" class="btn btn-dark">
                                <i class="bi bi-check-circle me-1"></i> Create Task
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Custom Theme Styles for Create Task Page */
.card {
    border-radius: 0.75rem;
    box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
}

.form-control:focus,
.form-select:focus {
    border-color: #343a40;
    box-shadow: 0 0 0 0.2rem rgba(52, 58, 64, 0.25);
}

.form-control,
.form-select {
    border-radius: 0.5rem;
    transition: all 0.2s ease-in-out;
}

.form-control:hover,
.form-select:hover {
    box-shadow: 0 0.25rem 0.5rem rgba(0, 0, 0, 0.1);
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

.invalid-feedback {
    display: block;
    margin-top: 0.25rem;
    font-size: 0.875rem;
}

.form-label {
    font-weight: 500;
    color: #343a40;
    margin-bottom: 0.5rem;
}

.text-danger {
    color: #dc3545 !important;
}
</style>
@endsection
