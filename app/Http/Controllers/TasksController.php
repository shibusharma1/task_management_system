<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Priority;
use App\Models\TaskCategory;
use App\Models\User;

class TasksController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        $statusFilter = $request->get('status');

        $query = Task::with(['priority', 'category', 'assignee', 'requester']);

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            });
        }

        if ($statusFilter !== null && $statusFilter !== '') {
            $query->where('status', intval($statusFilter));
        }

        $tasks = $query->orderBy('created_at', 'desc')->paginate(12)->withQueryString();

        $priorities = Priority::orderBy('id')->get();
        $categories = TaskCategory::orderBy('name')->get();

        return view('admin.tasks.index', compact('tasks', 'priorities', 'categories', 'search', 'statusFilter'));
    }

    //Just show the myTasks to the users
    public function myTask(Request $request)
    {
        $search = $request->get('search');
        $statusFilter = $request->get('status');

        $query = Task::with(['priority', 'category', 'assignee', 'requester']);

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            });
        }

        if ($statusFilter !== null && $statusFilter !== '') {
            $query->where('status', intval($statusFilter));
        }

        $tasks = $query->where('assigned_to', auth()->user()->id)->orderBy('created_at', 'desc')->paginate(12)->withQueryString();

        $priorities = Priority::orderBy('id')->get();
        $categories = TaskCategory::orderBy('name')->get();

        return view('admin.tasks.index', compact('tasks', 'priorities', 'categories', 'search', 'statusFilter'));
    }


    public function store(Request $request)
    {
        // dd($request->all());
        $data = $request->validate([
            'task_category_id' => ['nullable', 'exists:task_categories,id'],
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'priority_id' => ['nullable', 'exists:priorities,id'],
            'assigned_to' => ['nullable', 'exists:users,id'],
            'due_date' => ['nullable', 'date', 'after_or_equal:today'],
        ]);

        // Assign defaults
        $data['assigned_by'] = auth()->id();
        $data['status'] = 0;
        $data['is_approved'] = 0;

        // Compute is_requested
        $assignedBy = auth()->user();
        $assignedTo = $data['assigned_to'] ? User::find($data['assigned_to']) : null;

        if ($assignedBy && $assignedBy->role === 'manager' && $assignedTo && $assignedTo->role === 'admin') {
            $data['is_requested'] = 1;
        } else {
            $data['is_requested'] = 0;
        }

        Task::create($data);

        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    // public function show(Task $task)
    // {
    //     $task->load(['priority', 'category', 'assignee', 'requester']);
    //     // Format due_date for <input type="date">
    //     if ($task->due_date) {
    //         $task->due_date = \Carbon\Carbon::parse($task->due_date)->format('Y-m-d');
    //     }
    //     return response()->json($task);
    // }
    public function show(Task $task)
    {
        $task->load(['priority', 'category', 'assignee', 'requester']);

        $taskArray = $task->toArray();
        $taskArray['due_date'] = $task->due_date
            ? \Carbon\Carbon::parse($task->due_date)->format('Y-m-d')
            : null;

        return response()->json($taskArray);
    }


    public function update(Request $request, Task $task)
    {
        $data = $request->validate([
            'task_category_id' => ['nullable', 'exists:task_categories,id'],
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'priority_id' => ['nullable', 'exists:priorities,id'],
            'assigned_to' => ['nullable', 'exists:users,id'],
            'due_date' => ['nullable', 'date', 'after_or_equal:today'],
        ]);

        $data['assigned_by'] = auth()->id();

        // Keep status unless explicitly changed
        $data['status'] = $task->status ?? 0;
        $data['is_approved'] = $task->is_approved ?? 0;

        // Compute is_requested again on update
        $assignedBy = auth()->user();
        $assignedTo = $data['assigned_to'] ? User::find($data['assigned_to']) : null;

        if ($assignedBy && $assignedBy->role === 'manager' && $assignedTo && $assignedTo->role === 'admin') {
            $data['is_requested'] = 1;
        } else {
            $data['is_requested'] = 0;
        }

        $task->update($data);

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }

    /**
     * AJAX search users by name/email.
     */
    public function searchUsers(Request $request)
    {
        $q = $request->get('q', '');
        $results = User::where(function ($qry) use ($q) {
            $qry->where('name', 'like', "%{$q}%")
                ->orWhere('email', 'like', "%{$q}%");
        })
            ->limit(10)
            ->get(['id', 'name', 'email']);

        return response()->json($results);
    }
}
