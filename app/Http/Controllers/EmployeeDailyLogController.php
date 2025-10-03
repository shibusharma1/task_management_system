<?php

namespace App\Http\Controllers;

use App\Models\EmployeeDailyLog;
use App\Models\EmployeeDetail;
use App\Models\Priority;
use App\Services\NotificationService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EmployeeDailyLogController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        $statusFilter = $request->get('status');

        $query = EmployeeDailyLog::with(['employee.user', 'priority']);

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        if ($statusFilter !== null && $statusFilter !== '') {
            $query->where('status', intval($statusFilter));
        }

        $logs = $query->orderBy('created_at', 'desc')
            ->paginate(12)
            ->withQueryString();

        $priorities = Priority::orderBy('id')->get();

        return view('admin.logs.index', compact('logs', 'priorities', 'search', 'statusFilter'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'employee_id' => ['required', 'exists:employee_details,id'],
            'title' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'priority_id' => ['nullable', 'exists:priorities,id'],
            'status' => ['nullable', 'in:0,1,2'],
        ]);

        $data['status'] = $data['status'] ?? 0;

        $log = EmployeeDailyLog::create($data);

        // Notify employee (if employee has a user)
        $employee = EmployeeDetail::with('user')->find($data['employee_id']);
        if ($employee && $employee->user) {
            NotificationService::send(
                user: $employee->user,
                title: 'New Daily Log',
                message: $data['title'] ?? 'A new daily log was created for you.',
                type: 'daily_log_created',
                relatedModel: $log,
                priority: 'normal',
                extraData: ['log_id' => $log->id],
                channels: ['in-app', 'email']
            );
        }

        return redirect()->route('logs.index')->with('success', 'Log created successfully.');
    }

    public function show(EmployeeDailyLog $log)
    {
        $log->load(['employee.user', 'priority']);
        return response()->json($log->toArray());
    }

    public function update(Request $request, EmployeeDailyLog $log)
    {
        $data = $request->validate([
            'employee_id' => ['required', 'exists:employee_details,id'],
            'title' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'priority_id' => ['nullable', 'exists:priorities,id'],
            'status' => ['nullable', 'in:0,1,2'],
        ]);

        $log->update($data);

        return redirect()->route('logs.index')->with('success', 'Log updated successfully.');
    }

    public function destroy(EmployeeDailyLog $log)
    {
        $log->delete();
        return redirect()->route('logs.index')->with('success', 'Log deleted successfully.');
    }

    /**
     * Inline AJAX: change priority
     */
    public function changePriority(Request $request, EmployeeDailyLog $log)
    {
        $data = $request->validate([
            'priority_id' => ['nullable', 'exists:priorities,id'],
        ]);

        $log->priority_id = $data['priority_id'] ?? null;
        $log->save();

        return response()->json(['ok' => true, 'priority_id' => $log->priority_id]);
    }

    /**
     * Inline AJAX: change status
     */
    public function changeStatus(Request $request, EmployeeDailyLog $log)
    {
        $data = $request->validate([
            'status' => ['required', Rule::in([0,1,2])],
        ]);

        $log->status = intval($data['status']);
        $log->save();

        return response()->json(['ok' => true, 'status' => $log->status]);
    }

    /**
     * AJAX endpoint to search employees (for selection)
     */
    public function searchEmployees(Request $request)
    {
        $q = $request->get('q', '');
        if (!$q) return response()->json([]);

        $results = EmployeeDetail::whereHas('user', function($qry) use ($q){
            $qry->where('name', 'like', "%{$q}%")
                ->orWhere('email', 'like', "%{$q}%");
        })->with('user')->limit(10)->get()->map(function ($e) {
            return [
                'id' => $e->id,
                'name' => $e->user->name ?? null,
                'email' => $e->user->email ?? null,
            ];
        });

        return response()->json($results);
    }
}
