<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
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
         $attendanceHistory = $this->attendanceHistory($userId);


        if ($role == 0) {
            return view('admin.dashboard', compact('checkedIn', 'checkedOut', 'checkInFormatted', 'checkOutFormatted', 'checkInRaw', 'checkOutRaw','attendanceHistory'));
        } else {
            return view('layouts.employee.app', compact('checkedIn', 'checkedOut', 'checkInFormatted', 'checkOutFormatted', 'checkInRaw', 'checkOutRaw','attendanceHistory'));
        }
    }

    // Private class to make the code modular and easy to understand
    private function attendanceHistory($userId)
    {
        $attendances = Attendance::where('user_id', $userId)
            ->orderBy('timestamp', 'desc')
            ->get()
            ->groupBy(function ($item) {
                return $item->timestamp->toDateString();
            });

        $history = [];

        foreach ($attendances as $date => $records) {
            $checkIn = $records->firstWhere('type', 'in');
            $checkOut = $records->firstWhere('type', 'out');

            $checkInTime = $checkIn ? Carbon::parse($checkIn->timestamp)->format('h:i A') : '-';
            $checkOutTime = $checkOut ? Carbon::parse($checkOut->timestamp)->format('h:i A') : '-';

            if ($checkIn && $checkOut) {
                $hours = Carbon::parse($checkOut->timestamp)->diffInHours(Carbon::parse($checkIn->timestamp));
                $minutes = Carbon::parse($checkOut->timestamp)->diffInMinutes(Carbon::parse($checkIn->timestamp)) % 60;
                $worked = "{$hours}h {$minutes}m";
            } elseif ($checkIn && !$checkOut) {
                $worked = '-';
            } else {
                $worked = '-';
            }

            if ($checkIn && $checkOut) {
                $status = 'Present';
                $statusColor = 'green';
            } elseif ($checkIn && !$checkOut) {
                $status = 'Half Day';
                $statusColor = 'yellow';
            } else {
                $status = 'Absent';
                $statusColor = 'red';
            }

            $history[] = [
                'date' => Carbon::parse($date)->format('M d, Y'),
                'check_in' => $checkInTime,
                'check_out' => $checkOutTime,
                'hours_worked' => $worked,
                'status' => $status,
                'status_color' => $statusColor
            ];
        }

        return $history;
    }
}

