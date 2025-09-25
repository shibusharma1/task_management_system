@extends('layouts.admin.app')
@section('title', 'Profile')

@section('contents')
<div class="min-h-[calc(100vh-2rem)] p-4 bg-gray-50 overflow-y-auto">
    <div class="bg-white rounded-xl shadow-md max-w-4xl w-full mx-auto">
        <!-- Header -->
        <div class="bg-gray-100 px-6 py-4 border-b border-gray-200">
            <h2 class="text-xl font-semibold text-gray-800">My Profile</h2>
            <p class="text-sm text-gray-500 mt-1">Update your personal information and account settings</p>
        </div>

        <!-- Main Content -->
        <div class="p-6 space-y-8">
            <!-- Profile Picture Section -->
            <div class="flex flex-col items-center pb-6 border-b border-gray-200">
                <div class="mr-6">
                    <div class="relative ml-4 w-24 h-24 rounded-full overflow-hidden border-2 border-gray-200 bg-gray-100 flex items-center justify-center cursor-pointer" id="profile-picture-wrapper">
                        @if(auth()->user()->profile_picture)
                            <img src="{{ asset('storage/' . auth()->user()->profile_picture) }}" class="w-full h-full object-cover" id="profile-picture-preview">
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" id="profile-picture-placeholder">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            <img src="" class="hidden w-full h-full object-cover" id="profile-picture-preview">
                        @endif
                        <div class="absolute inset-0 bg-black/50 flex justify-center items-center opacity-0 hover:opacity-100 transition">
                            <span class="text-xs text-white">Change Photo</span>
                        </div>
                    </div>
                    <input type="file" name="profile_picture" id="profile-picture-input" class="hidden" accept="image/*">
                </div>

                    <div class="flex gap-2 mt-3">
                        <button type="button" id="change-picture-btn" class="px-3 py-1 text-sm border border-gray-300 rounded-md hover:bg-gray-100">Change Photo</button>
                        <button type="button" id="remove-picture-btn" 
                            class="px-3 py-1 text-sm border border-red-300 text-red-600 rounded-md hover:bg-red-50 
                            {{ !auth()->user()->profile_picture ? 'hidden' : '' }}">
                            Remove
                        </button>
                    </div>
            </div>

            <!-- Form -->
            <form action="#" method="POST" enctype="multipart/form-data" class="space-y-8">
                @csrf
                @method('PUT')

                <!-- Personal Information -->
                <div>
                    <h3 class="text-lg font-semibold text-gray-800 border-b pb-2 mb-4">Personal Information</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Name -->
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                            <input type="text" id="name" name="name" value="{{ old('name', auth()->user()->name) }}"
                                class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            @error('name') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <!-- Email -->
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                            <input type="email" id="email" name="email" value="{{ old('email', auth()->user()->email) }}"
                                class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            @error('email') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <!-- Phone -->
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
                            <input type="text" id="phone" name="phone" value="{{ old('phone', auth()->user()->phone) }}" placeholder="Enter your phone number"
                                class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            @error('phone') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <!-- Address -->
                        <div>
                            <label for="address" class="block text-sm font-medium text-gray-700 mb-1">Address</label>
                            <input type="text" id="address" name="address" value="{{ old('address', auth()->user()->address) }}" placeholder="Enter your address"
                                class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            @error('address') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>
                </div>

                <!-- Organization Information -->
                <div>
                    <h3 class="text-lg font-semibold text-gray-800 border-b pb-2 mb-4">Organization Information</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Institution</label>
                            <input type="text" value="{{ auth()->user()->institution ? auth()->user()->institution->name : 'Not assigned' }}" class="w-full px-3 py-2 border rounded-lg bg-gray-100" disabled>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Designation</label>
                            <input type="text" value="{{ auth()->user()->designation ? auth()->user()->designation->designation_name : 'Not assigned' }}" class="w-full px-3 py-2 border rounded-lg bg-gray-100" disabled>
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Department</label>
                            <input type="text" value="{{ optional(auth()->user()->department)->name ?? 'Not assigned' }}" class="w-full px-3 py-2 border rounded-lg bg-gray-100" disabled>
                        </div>             
                    </div>
                </div>

                <!-- Password Change -->
                <div>
                    <h3 class="text-lg font-semibold text-gray-800 border-b pb-2 mb-4">Change Password (Optional)</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Current Password</label>
                            <input type="password" name="current_password" class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">New Password</label>
                            <input type="password" name="password" class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Confirm New Password</label>
                            <input type="password" name="password_confirmation" class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>
                    </div>
                </div>

                <!-- Actions -->
                <div class="flex justify-end gap-4 border-t pt-6">
                    <button type="button" id="cancel-btn" class="px-5 py-2 bg-gray-100 border border-gray-300 rounded-lg hover:bg-gray-200">Cancel</button>
                    <button type="submit" class="px-5 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const profileInput = document.getElementById("profile-picture-input");
        const profilePreview = document.getElementById("profile-picture-preview");
        const profilePlaceholder = document.getElementById("profile-picture-placeholder");
        const changeBtn = document.getElementById("change-picture-btn");
        const removeBtn = document.getElementById("remove-picture-btn");
    
        // Trigger file input when clicking change
        changeBtn.addEventListener("click", () => profileInput.click());
    
        // Preview selected image
        profileInput.addEventListener("change", (event) => {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    profilePreview.src = e.target.result;
                    profilePreview.classList.remove("hidden");
                    if (profilePlaceholder) profilePlaceholder.classList.add("hidden");
                    removeBtn.classList.remove("hidden"); // show remove button
                };
                reader.readAsDataURL(file);
            }
        });
    
        // Remove selected image
        removeBtn.addEventListener("click", () => {
            profileInput.value = ""; // clear input
            profilePreview.src = ""; 
            profilePreview.classList.add("hidden");
            if (profilePlaceholder) profilePlaceholder.classList.remove("hidden");
            removeBtn.classList.add("hidden"); // hide remove button
        });
    });
    </script>
    
@endsection