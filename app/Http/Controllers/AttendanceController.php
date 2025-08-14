<?php

namespace App\Http\Controllers;

use App\Models\Attendance; // Make sure this is the correct model name
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'type' => 'required|in:in,out',
    //         'note' => 'nullable|string|max:255'
    //     ]);

    //     $attendance = Attendance::create([
    //         'user_id'   => Auth::id(),
    //         'type'      => $request->type,
    //         'timestamp' => now(),
    //         'note'      => $request->note,
    //     ]);

    //     return redirect()->back()->with('success', 'Attendance recorded successfully');
    // }
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
