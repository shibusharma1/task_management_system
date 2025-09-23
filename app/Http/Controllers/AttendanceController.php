<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Attendance; // Make sure this is the correct model name
use Ramsey\Uuid\Type\Integer;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
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

        // Users
        $users = User::paginate(10);
        $usercount = User::count();

        // dd($attendanceHistory);




        return view('admin.attendance.index', compact('checkedIn', 'checkedOut', 'checkInFormatted', 'checkOutFormatted', 'checkInRaw', 'checkOutRaw', 'attendanceHistory'));

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
                $hours = (int)abs(Carbon::parse($checkOut->timestamp)->diffInHours(Carbon::parse($checkIn->timestamp)));
                $minutes = abs(Carbon::parse($checkOut->timestamp)->diffInMinutes(Carbon::parse($checkIn->timestamp)) % 60);
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
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|in:in,out',
            'note' => 'nullable|string|max:255'
        ]);

        $userId = Auth::id();
        $today = now()->toDateString();

        // Check if user already checked in/out today
        $alreadyRecorded = Attendance::where('user_id', $userId)
            ->where('type', $request->type)
            ->whereDate('timestamp', $today)
            ->exists();

        if ($alreadyRecorded) {
            $action = $request->type === 'in' ? 'checked in' : 'checked out';
            return redirect()->back()->with('error', "You have already $action today.");
        }

        // Create attendance record
        Attendance::create([
            'user_id' => $userId,
            'type' => $request->type,
            'timestamp' => now(),
            'note' => $request->note,
        ]);

        $action = $request->type === 'in' ? 'Check-in' : 'Check-out';
        return redirect()->back()->with('success', "$action recorded successfully.");
    }


    /**
     * Display the specified resource.
     */
    public function show(Attendance $attendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Attendance $attendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Attendance $attendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attendance $attendance)
    {
        //
    }
}
