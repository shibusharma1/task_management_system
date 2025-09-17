<?php

namespace App\Http\Controllers;

use App\Models\Priority;
use Illuminate\Http\Request;

class PriorityController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search', '');
        $priorities = Priority::when($search, function ($query, $search) {
            $query->where('name', 'like', "%{$search}%");
        })->paginate(10);

        return view('admin.tasks.priority', compact('priorities', 'search'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100|unique:priorities,name',
            'description' => 'nullable|string',
        ]);

        Priority::create($request->only('name', 'description'));

        return redirect()->route('task.priority')->with('success', 'Priority created successfully.');
    }

    public function update(Request $request, Priority $priority)
    {
        $request->validate([
            'name' => 'required|max:100|unique:priorities,name,' . $priority->id,
            'description' => 'nullable|string',
        ]);

        $priority->update($request->only('name', 'description'));

        return redirect()->route('task.priority')->with('success', 'Priority updated successfully.');
    }

    public function destroy(Priority $priority)
    {
        $priority->delete();

        return redirect()->route('task.priority')->with('success', 'Priority deleted successfully.');
    }
}