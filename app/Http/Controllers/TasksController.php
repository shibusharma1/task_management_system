<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use App\Models\Priority;
use App\Models\TaskCategory;
use Illuminate\Http\Request;
use App\Services\NotificationService;
use Illuminate\Validation\ValidationException;

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

        $tasks = $query->orderBy('created_at', 'desc')
            ->paginate(12)
            ->withQueryString();

        $priorities = Priority::orderBy('id')->get();
        $categories = TaskCategory::orderBy('name')->get();

        return view('admin.tasks.index', compact('tasks', 'priorities', 'categories', 'search', 'statusFilter'));
    }

    public function myTask(Request $request)
    {
        $search = $request->get('search');
        $statusFilter = $request->get('status');

        $query = Task::with(['priority', 'category', 'assignee', 'requester'])
            ->where('assigned_to', auth()->id());

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            });
        }

        if ($statusFilter !== null && $statusFilter !== '') {
            $query->where('status', intval($statusFilter));
        }

        $tasks = $query->orderBy('created_at', 'desc')
            ->paginate(12)
            ->withQueryString();

        $priorities = Priority::orderBy('id')->get();
        $categories = TaskCategory::orderBy('name')->get();

        return view('admin.tasks.index', compact('tasks', 'priorities', 'categories', 'search', 'statusFilter'));
    }

    public function store(Request $request)
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
        $data['status'] = 0;
        $data['is_approved'] = 0;

        // Safely compute is_requested
        $assignedByLevel = auth()->user()?->designation?->hierarchy_level ?? 0;
        $assignedToLevel = 0;

        if (!empty($data['assigned_to'])) {
            $assignedTo = User::find($data['assigned_to']);
            $assignedToLevel = $assignedTo?->designation?->hierarchy_level ?? 0;
        }

        $data['is_requested'] = $assignedByLevel > $assignedToLevel ? 1 : 0;

        $task = Task::create($data);

       
        NotificationService::send(
            user: auth()->user(),
            title: 'New Task Assigned',
            message: "You have been assigned to task: {$data['name']}",
            type: 'task_assigned',
            relatedModel: $task,
            priority: 'high',
            extraData: [
                'deadline' => $data['due_date'],
                'assigned_by' => auth()->user()->name,
            ],
            channels: ['in-app', 'email']
        );


        return redirect()->route('task.index')->with('success', 'Task created successfully.');
    }

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
        $data['status'] = $task->status ?? 0;
        $data['is_approved'] = $task->is_approved ?? 0;

        // Safely compute is_requested
        $assignedByLevel = auth()->user()?->designation?->hierarchy_level ?? 0;
        $assignedToLevel = 0;

        if (!empty($data['assigned_to'])) {
            $assignedTo = User::find($data['assigned_to']);
            $assignedToLevel = $assignedTo?->designation?->hierarchy_level ?? 0;
        }

        $data['is_requested'] = $assignedByLevel > $assignedToLevel ? 1 : 0;

        $task->update($data);

        return redirect()->route('task.index')->with('success', 'Task updated successfully.');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('task.index')->with('success', 'Task deleted successfully.');
    }

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
