<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\User;
use App\Models\Designation;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        $query = User::with('designation','department');

        if ($search) {
            $query->where('name', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%")
                ->orWhereHas('designation', function ($q) use ($search) {
                    $q->where('designation_name', 'like', "%{$search}%");
                });
        }

        $users = $query->orderBy('id', 'asc')->paginate(10);
        $designations = Designation::orderBy('hierarchy_level')->get();
        $departments = Department::orderBy('id')->get();

        return view('admin.users.index', compact('users', 'designations','departments', 'search'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'designation_id' => 'required|exists:designations,id',
            'department_id' => 'required|exists:departments,id',
        ]);

        try {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'designation_id' => $request->designation_id,
                'department_id' => $request->department_id,
            ]);

            return redirect()->route('users.index')->with('success', 'User created successfully!');
        } catch (QueryException $e) {
            if ($e->getCode() == "23000") {
                return redirect()->back()->with('error', 'Email already exists. Please choose another.');
            }
            throw $e;
        }
    }

    // public function update(Request $request, User $user)
    // {
    //     $request->validate([
    //         'name' => 'required|string|max:100',
    //         'email' => 'required|email|unique:users,email,' . $user->id,
    //         'password' => 'nullable|string|min:8',
    //         'designation_id' => 'required|exists:designations,id',
    //     ]);

    //     $data = $request->only(['name', 'email', 'designation_id']);

    //     if ($request->filled('password')) {
    //         $data['password'] = Hash::make($request->password);
    //     }

    //     try {
    //         $user->update($data);
    //         return redirect()->route('users.index')->with('success', 'User updated successfully!');
    //     } catch (QueryException $e) {
    //         if ($e->getCode() == "23000") {
    //             return redirect()->back()->with('error', 'Email already exists. Please choose another.');
    //         }
    //         throw $e;
    //     }
    // }

    public function update(Request $request, User $user)
    {
        // Validate input
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($user->id),
            ],
            'password' => 'nullable|string|min:8',
            'designation_id' => 'required|exists:designations,id',
            'department_id' => 'required|exists:departments,id',
        ]);

        // Prepare data for update
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'designation_id' => $request->designation_id,
            'department_id' => $request->department_id,
        ];

        // Only hash password if provided
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        try {
            $user->update($data);

            return redirect()->route('users.index')
                ->with('success', 'User updated successfully!');
        } catch (QueryException $e) {
            // Only handle duplicate entry for email
            if ($e->getCode() == '23000') {
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'Email already exists. Please choose another.');
            }
            throw $e;
        }
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully!');
    }
}
