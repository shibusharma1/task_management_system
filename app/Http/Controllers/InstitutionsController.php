<?php

namespace App\Http\Controllers;

use App\Models\Institution;
use Illuminate\Http\Request;

class InstitutionsController extends Controller
{
    /**
     * Display a listing of institutions.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $institutions = Institution::query()
            ->when($search, fn($q) => $q->where('name', 'like', "%$search%")
                ->orWhere('client_id', 'like', "%$search%")
                ->orWhere('email', 'like', "%$search%"))
            ->latest()
            ->paginate(10);

        return view('admin.settings.institutions.index', compact('institutions', 'search'));
    }

    /**
     * Store a newly created institution.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'client_id' => 'required|string|max:50|unique:institutions,client_id',
            'name' => 'required|string|max:100|unique:institutions,name',
            'address' => 'nullable|string',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|unique:institutions,email',
            'website' => 'nullable|url',
        ]);

        Institution::create($data);

        return redirect()->route('settings.institutions.index')->with('success', 'Institution created successfully.');
    }

    /**
     * Update the specified institution.
     */
    public function update(Request $request, Institution $institution)
    {
        $data = $request->validate([
            'client_id' => 'required|string|max:50|unique:institutions,client_id,' . $institution->id,
            'name' => 'required|string|max:100|unique:institutions,name,' . $institution->id,
            'address' => 'nullable|string',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|unique:institutions,email,' . $institution->id,
            'website' => 'nullable|url',
        ]);

        $institution->update($data);

        return redirect()->route('settings.institutions')->with('success', 'Institution updated successfully.');
    }

    /**
     * Remove the specified institution.
     */
    public function destroy(Institution $institution)
    {
        // $institution->delete();

        return redirect()->route('settings.institutions')->with('error', 'Institution cannot be deleted.');
    }
}

