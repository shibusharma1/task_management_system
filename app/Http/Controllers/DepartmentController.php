<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class DepartmentController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        $query = Department::query();

        if ($search) {
            $query->where('department_name', 'like', "%{$search}%")
                  ->orWhere('department_code', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
        }

        $departments = $query->orderBy('department_name', 'asc')->paginate(10);

        return view('admin.departments.index', compact('departments', 'search'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'department_name' => 'required|string|max:100|unique:departments,department_name',
            'department_code' => 'nullable|string|max:20|unique:departments,department_code',
            'description'     => 'nullable|string',
        ]);

        try {
            Department::create([
                'department_name' => $request->department_name,
                'department_code' => $request->department_code,
                'description'     => $request->description,
            ]);

            return redirect()->route('departments.index')
                             ->with('success', 'Department created successfully!');
        } catch (QueryException $e) {
            if ($e->getCode() == "23000") {
                return redirect()->back()
                    ->with('error', 'The department name or code already exists. Please choose different values.');
            }
            throw $e;
        }
    }

    public function update(Request $request, Department $department)
    {
        $request->validate([
            'department_name' => 'required|string|max:100|unique:departments,department_name,' . $department->id,
            'department_code' => 'nullable|string|max:20|unique:departments,department_code,' . $department->id,
            'description'     => 'nullable|string',
        ]);

        try {
            $department->update([
                'department_name' => $request->department_name,
                'department_code' => $request->department_code,
                'description'     => $request->description,
            ]);

            return redirect()->route('departments.index')
                             ->with('success', 'Department updated successfully!');
        } catch (QueryException $e) {
            if ($e->getCode() == "23000") {
                return redirect()->back()
                    ->with('error', 'The department name or code you entered already exists. Please use different values.');
            }
            throw $e;
        }
    }

    public function destroy(Department $department)
    {
        $department->delete();

        return redirect()->route('departments.index')
                         ->with('success', 'Department deleted successfully!');
    }
}
