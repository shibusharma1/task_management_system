<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TasksController extends Controller
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

        return view('admin.tasks.index',compact('checkedIn', 'checkedOut'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Tasks $tasks)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tasks $tasks)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tasks $tasks)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tasks $tasks)
    {
        //
    }
}
