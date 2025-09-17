<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Priority;
use App\Models\TaskCategory;
use App\Models\User;
use Illuminate\Validation\Rule;

class TasksController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        $statusFilter = $request->get('status');

        $query = Task::with(['priority', 'category', 'assignee', 'requester']);

        if ($search) {
            $query->where(function($q) use ($search) {
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

        return view('admin.tasks.index', compact('tasks','priorities','categories','search','statusFilter'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'task_category_id' => ['nullable','exists:task_categories,id'],
            'name' => ['nullable','string','max:255'],
            'description' => ['nullable','string'],
            // 'status' => ['required','integer','in:0,1,2'],
            'priority_id' => ['nullable','exists:priorities,id'],
            'assigned_to' => ['nullable','exists:users,id'],
            'assigned_by' => ['nullable','exists:users,id'],
            'is_requested' => ['nullable','boolean'],
            // 'is_approved' => ['required','integer','in:0,1,2'],
        ]);

        // normalize booleans
        $data['is_requested'] = (bool) ($data['is_requested'] ?? 0);

        Task::create($data);

        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    public function show(Task $task)
    {
        // return JSON for modal view
        $task->load(['priority','category','assignee','requester']);
        return response()->json($task);
    }

    public function update(Request $request, Task $task)
    {
        $data = $request->validate([
            'task_category_id' => ['nullable','exists:task_categories,id'],
            'name' => ['nullable','string','max:255'],
            'description' => ['nullable','string'],
            // 'status' => ['required','integer','in:0,1,2'],
            'priority_id' => ['nullable','exists:priorities,id'],
            'assigned_to' => ['nullable','exists:users,id'],
            'assigned_by' => ['nullable','exists:users,id'],
            'is_requested' => ['nullable','boolean'],
            // 'is_approved' => ['required','integer','in:0,1,2'],
        ]);

        $data['is_requested'] = (bool) ($data['is_requested'] ?? false);

        $task->update($data);

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }

    /**
     * AJAX: search users by name or email for live selection.
     * Query param: q
     */
    public function searchUsers(Request $request)
    {
        $q = $request->get('q', '');
        $results = User::where(function($qry) use ($q) {
            $qry->where('name', 'like', "%{$q}%")
                ->orWhere('email', 'like', "%{$q}%");
        })
        ->limit(10)
        ->get(['id','name','email']);

        return response()->json($results);
    }
}
