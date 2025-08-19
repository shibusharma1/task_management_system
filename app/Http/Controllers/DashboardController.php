<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Institution;
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


        // Calling the method of attendance History
        //  $attendanceHistory = $this->attendanceHistory($userId);

        // Users
        //  $users = User::paginate(10);
        //  $usercount = User::count();
         
        //  $institutions = Institution::paginate(10);

        


        if ($role == 0) {
            return view('admin.dashboard', compact('checkedIn', 'checkedOut', 'checkInFormatted', 'checkOutFormatted', 'checkInRaw', 'checkOutRaw'));
        } else {
            return view('layouts.employee.app', compact('checkedIn', 'checkedOut', 'checkInFormatted', 'checkOutFormatted', 'checkInRaw', 'checkOutRaw'));
        }
    }

    
}

