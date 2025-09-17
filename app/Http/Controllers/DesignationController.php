<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Designation;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class DesignationController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        $query = Designation::query();

        if ($search) {
            $query->where('designation_name', 'like', "%{$search}%")
                  ->orWhere('hierarchy_level', 'like', "%{$search}%");
        }

        // $designations = $query->latest()->paginate(10);
        $designations = $query->orderBy('hierarchy_level', 'asc')->paginate(10);


        return view('admin.designations.index', compact('designations', 'search'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'designation_name' => 'required|string|max:255|unique:designations,designation_name',
            'hierarchy_level'  => 'required|integer|unique:designations,hierarchy_level',
        ]);

        try {
            Designation::create([
                'designation_name' => $request->designation_name,
                'hierarchy_level'  => $request->hierarchy_level,
            ]);

            return redirect()->route('designations.index')
                             ->with('success', 'Designation created successfully!');
        } catch (QueryException $e) {
            if ($e->getCode() == "23000") {
                return redirect()->back()
                    ->with('error', 'The hierarchy level or designation name you entered is already assigned. Please choose different values.');
            }
            throw $e;
        }
    }

    public function update(Request $request, Designation $designation)
    {
        $request->validate([
            'designation_name' => 'required|string|max:255|unique:designations,designation_name,' . $designation->id,
            'hierarchy_level'  => 'required|integer|unique:designations,hierarchy_level,' . $designation->id,
        ]);

        try {
            $designation->update([
                'designation_name' => $request->designation_name,
                'hierarchy_level'  => $request->hierarchy_level,
            ]);

            return redirect()->route('designations.index')
                             ->with('success', 'Designation updated successfully!');
        } catch (QueryException $e) {
            if ($e->getCode() == "23000") {
                return redirect()->back()
                    ->with('error', 'The hierarchy level or designation name you entered already exists. Please use different values.');
            }
            throw $e;
        }
    }

    public function destroy(Designation $designation)
    {
        $designation->delete();

        return redirect()->route('designations.index')
                         ->with('success', 'Designation deleted successfully!');
    }
}
