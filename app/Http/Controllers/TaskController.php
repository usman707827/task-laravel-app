<?php
namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $query = Auth::user()->tasks();

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Search by title or description
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                    ->orWhere('description', 'like', '%' . $request->search . '%');
            });
        }

        // Filter by due date
        if ($request->filled('due_date')) {
            $query->whereDate('due_date', $request->due_date);
        }

        // Sort by due date
        $sortBy = $request->get('sort_by', 'due_date');
        $sortOrder = $request->get('sort_order', 'asc');

        $query->orderBy($sortBy, $sortOrder);

        $tasks = $query->paginate(10)->withQueryString();

        // Show info message if search/filter returns no results
        if ($tasks->count() === 0 && ($request->filled('search') || $request->filled('status') || $request->filled('due_date'))) {
            session()->flash('info', 'No tasks found matching your search criteria. Try adjusting your filters.');
        }

        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'nullable|string',
                'due_date' => 'required|date|after_or_equal:today',
                'status' => ['required', Rule::in(['pending', 'in_progress', 'completed'])]
            ]);

            $validated['user_id'] = Auth::id();
            // dd($validated); // Debugging line, remove in production
            Task::create($validated);

            session()->flash('success', 'Task "' . $validated['title'] . '" has been created successfully!');
            return redirect()->route('tasks.index');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', $e->getMessage() ?: 'Failed to create task. Please try again.');
        }
    }

    public function show(Task $task)
    {
        if ($task->user_id !== Auth::id()) {
            return redirect()->route('tasks.index')
                ->with('error', 'You can only view your own tasks.');
        }

        return view('tasks.show', compact('task'));
    }

    public function edit(Task $task)
    {
        if ($task->user_id !== Auth::id()) {
            return redirect()->route('tasks.index')
                ->with('error', 'You can only edit your own tasks.');
        }

        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        if ($task->user_id !== Auth::id()) {
            return redirect()->route('tasks.index')
                ->with('error', 'You can only update your own tasks.');
        }

        try {
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'nullable|string',
                'due_date' => 'required|date',
                'status' => ['required', Rule::in(['pending', 'in_progress', 'completed'])]
            ]);

            $oldStatus = $task->status;
            $task->update($validated);

            $message = 'Task "' . $task->title . '" has been updated successfully!';

            // Add extra message if status changed
            if ($oldStatus !== $validated['status']) {
                $message .= ' Status changed from "' . ucwords(str_replace('_', ' ', $oldStatus)) . '" to "' . ucwords(str_replace('_', ' ', $validated['status'])) . '".';
            }

            session()->flash('success', $message);
            return redirect()->route('tasks.index');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Failed to update task. Please try again.');
        }
    }

    public function destroy(Task $task)
    {
        if ($task->user_id !== Auth::id()) {
            return redirect()->route('tasks.index')
                ->with('error', 'You can only delete your own tasks.');
        }

        try {
            $taskTitle = $task->title;
            $task->delete();
            session()->flash('success', 'Task "' . $taskTitle . '" has been deleted successfully!');
            return redirect()->route('tasks.index');
        } catch (\Exception $e) {
            return redirect()->route('tasks.index')
                ->with('error', 'Failed to delete task. Please try again.');
        }
    }
}
