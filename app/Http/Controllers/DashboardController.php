<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use App\Models\Attendance;
use App\Models\Designation;
use App\Models\Institution;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Psy\Command\HistoryCommand;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $userId = Auth::id();
        $today = now()->toDateString();

        // Fetch today's attendance (both in & out) in one query
        $attendanceToday = Attendance::where('user_id', $userId)
            ->whereDate('timestamp', $today)
            ->get()
            ->keyBy('type');

        // Check in/out status
        $checkedIn = isset($attendanceToday['in']);
        $checkedOut = isset($attendanceToday['out']);

        // Times (formatted)
        $checkInFormatted = $checkedIn ? Carbon::parse($attendanceToday['in']->timestamp)->format('h:i A') : null;
        $checkOutFormatted = $checkedOut ? Carbon::parse($attendanceToday['out']->timestamp)->format('h:i A') : null;

        // Add raw full timestamps for JS
        $checkInRaw = $checkedIn ? $attendanceToday['in']->timestamp : null;
        $checkOutRaw = $checkedOut ? $attendanceToday['out']->timestamp : null;

        $role = auth()->user()->hierarchy_level;

        // Recent 5 tasks
        $recentTasks = Task::with('assignee')->latest()->take(5)->get();

        if (auth()->user()->designation->hierarchy_level == 0) {
            $pendingTask = Task::where('status', 0)->count();
            $completedTask = Task::where('status', 2)->count();

        } else {
            $pendingTask = Task::where('assigned_to', auth()->user()->id)->where('status', 0)->count();
            $completedTask = Task::where('assigned_to', auth()->user()->id)->where('status', 2)->count();
        }
        // Fetch all designations ordered by hierarchy_level
        $designations = Designation::orderBy('hierarchy_level')->get();

        // Group users by designation
        $usersByDesignation = User::with('designation')->get()->groupBy(function ($user) {
            return $user->designation->hierarchy_level;
        });



        return view('admin.dashboard', compact(
            'checkedIn',
            'checkedOut',
            'checkInFormatted',
            'checkOutFormatted',
            'checkInRaw',
            'checkOutRaw',
            'recentTasks',
            'designations',
            'usersByDesignation',
            'pendingTask',
            'completedTask'
        ));

    }


}

