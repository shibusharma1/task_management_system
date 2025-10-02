<?php
// app/Http/Controllers/Admin/ProfileController.php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


class ProfileController extends Controller
{
    public function edit(Request $request)
    {
        $user = $request->user()->load(['institution', 'designation', 'employeeDetail.department']);
        return view('admin.profile', compact('user'));
    }

    public function update(Request $request)
    {
        $user = $request->user();

        // Validate request
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'profile_picture' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'current_password' => 'nullable|required_with:password|string',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        // ✅ Update user table
        $user->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
        ]);

        // ✅ Get employee detail if exists
        $employeeDetail = $user->employeeDetail;
        $profile_picture_path = $employeeDetail?->profile_picture; // Keep old one if no new file


        // ✅ Handle profile picture upload
        if ($request->hasFile('profile_picture')) {
            // Delete old image if exists
            if ($profile_picture_path && Storage::disk('public')->exists($profile_picture_path)) {
                Storage::disk('public')->delete($profile_picture_path);
            }

            // Store new image
            $profile_picture_path = $request->file('profile_picture')->store('profile_pictures', 'public');
        }


        // ✅ Update or create employee detail
        $user->employeeDetail()->updateOrCreate(
            ['user_id' => $user->id],
            [
                'profile_picture' => $profile_picture_path,
                'phone' => $validated['phone'] ?? $employeeDetail?->phone,
                'address' => $validated['address'] ?? $employeeDetail?->address,


            ]
        );

        // ✅ Update password if provided
        if (!empty($validated['password'])) {
            if (!Hash::check($validated['current_password'], $user->password)) {
                return back()->with('error', 'Current password is incorrect.');
            }
            $user->update(['password' => Hash::make($validated['password'])]);
        }

        return back()->with('success', 'Profile updated successfully.');
    }


}
