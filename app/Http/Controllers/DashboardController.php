<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Institution;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Psy\Command\HistoryCommand;

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

        // Tree of dashboard
        $users = User::with('designation')->orderBy('designation_id')->get();

        $treeData = [];

        // Store last user ID of each hierarchy level to assign as parent
        $lastUserByLevel = [];

        foreach ($users as $user) {
            $level = $user->designation->hierarchy_level;

            // Top-level (Admin)
            if ($level == 0) {
                $parent = '';
            } else {
                // Assign parent as last user of the previous level
                $parent = $lastUserByLevel[$level - 1] ?? '';
            }

            $treeData[] = [
                'id' => (string) $user->id,
                'parent' => $parent,
                'name' => $user->name . ' - ' . $user->designation->designation_name,
            ];

            $lastUserByLevel[$level] = (string) $user->id;
        }



        // if ($role == 0) {
            return view('admin.dashboard', compact('checkedIn', 'checkedOut', 'checkInFormatted', 'checkOutFormatted', 'checkInRaw', 'checkOutRaw', 'recentTasks','treeData'));
        // } else {
        //     return view('layouts.employee.app', compact('checkedIn', 'checkedOut', 'checkInFormatted', 'checkOutFormatted', 'checkInRaw', 'checkOutRaw', 'recentTasks'));
        // }
    }


}

