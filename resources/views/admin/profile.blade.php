@extends('layouts.admin.app')
@section('title', 'Profile')

@push('styles')
<style>
    .profile-picture-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-bottom: 1.5rem;
    }
    
    .profile-picture-wrapper {
        position: relative;
        width: 120px;
        height: 120px;
        border-radius: 50%;
        overflow: hidden;
        border: 3px solid #e5e7eb;
        background-color: #f9fafb;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s ease;
    }
    
    .profile-picture-wrapper:hover {
        border-color: #6366f1;
    }
    
    .profile-picture {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    
    .profile-picture-placeholder {
        font-size: 3rem;
        color: #9ca3af;
    }
    
    .profile-picture-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    
    .profile-picture-wrapper:hover .profile-picture-overlay {
        opacity: 1;
    }
    
    .profile-picture-overlay span {
        color: white;
        font-size: 0.875rem;
        text-align: center;
    }
    
    .profile-picture-input {
        display: none;
    }
    
    .profile-picture-actions {
        margin-top: 0.5rem;
        display: flex;
        gap: 0.5rem;
    }
    
    .profile-picture-btn {
        padding: 0.25rem 0.75rem;
        font-size: 0.75rem;
        border-radius: 0.375rem;
        border: 1px solid #d1d5db;
        background-color: white;
        cursor: pointer;
        transition: all 0.2s ease;
    }
    
    .profile-picture-btn:hover {
        background-color: #f3f4f6;
    }
    
    .profile-picture-btn.remove {
        color: #ef4444;
        border-color: #fecaca;
    }
    
    .profile-picture-btn.remove:hover {
        background-color: #fef2f2;
    }
</style>
@endpush

@section('contents')
<div class="flex-1 overflow-auto p-4 md:p-6 bg-gray-50">
    <div class="max-w-3xl mx-auto bg-white shadow rounded-2xl p-6">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">My Profile</h2>
        <p class="text-gray-600 mb-6">Update your account details below</p>

        {{-- <form action="{{ route('profile.update') }}" method="POST" class="space-y-6" enctype="multipart/form-data"> --}}
        <form action="#" method="POST" class="space-y-6" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Profile Picture Section -->
            <div class="profile-picture-container">
                <div class="profile-picture-wrapper" id="profile-picture-wrapper">
                    @if(auth()->user()->profile_picture)
                        <img src="{{ asset('storage/' . auth()->user()->profile_picture) }}" 
                             alt="Profile Picture" 
                             class="profile-picture" 
                             id="profile-picture-preview">
                        <div class="profile-picture-placeholder" id="profile-picture-placeholder" style="display: none;">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                    @else
                        <div class="profile-picture-placeholder" id="profile-picture-placeholder">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <img src="" alt="Profile Picture" class="profile-picture" id="profile-picture-preview" style="display: none;">
                    @endif
                    <div class="profile-picture-overlay">
                        <span>Change Photo</span>
                    </div>
                </div>
                <input type="file" 
                       name="profile_picture" 
                       id="profile-picture-input" 
                       class="profile-picture-input" 
                       accept="image/*">
                <div class="profile-picture-actions">
                    <button type="button" class="profile-picture-btn" id="change-picture-btn">Change</button>
                    @if(auth()->user()->profile_picture)
                        <button type="button" class="profile-picture-btn remove" id="remove-picture-btn">Remove</button>
                    @else
                        <button type="button" class="profile-picture-btn remove" id="remove-picture-btn" style="display: none;">Remove</button>
                    @endif
                </div>
                @error('profile_picture')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Rest of your form fields... -->
            <!-- Name -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                <input type="text" name="name" value="{{ old('name', auth()->user()->name) }}"
                    class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 transition">
                @error('name')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                <input type="email" name="email" value="{{ old('email', auth()->user()->email) }}"
                    class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 transition">
                @error('email')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Institution -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Institution</label>
                <select name="institution_id" class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 transition">
                    <option value="">Select Institution</option>
                    {{-- @foreach($institutions as $inst)
                        <option value="{{ $inst->id }}" {{ auth()->user()->institution_id == $inst->id ? 'selected' : '' }}>
                            {{ $inst->name }}
                        </option>
                    @endforeach --}}
                </select>
                @error('institution_id')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Designation -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Designation</label>
                <select name="designation_id" class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 transition">
                    <option value="">Select Designation</option>
                    {{-- @foreach($designations as $desig)
                        <option value="{{ $desig->id }}" {{ auth()->user()->designation_id == $desig->id ? 'selected' : '' }}>
                            {{ $desig->designation_name }}
                        </option>
                    @endforeach --}}
                </select>
                @error('designation_id')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password Change Section -->
            <div class="border-t pt-4">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Change Password (Optional)</h3>

                <div class="space-y-4">
                    <!-- Current Password -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Current Password</label>
                        <input type="password" name="current_password"
                            class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 transition"
                            placeholder="Leave blank to keep current password">
                        @error('current_password')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- New Password -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">New Password</label>
                        <input type="password" name="password"
                            class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 transition"
                            placeholder="Enter new password">
                        @error('password')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Confirm New Password -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Confirm New Password</label>
                        <input type="password" name="password_confirmation"
                            class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 transition"
                            placeholder="Re-type new password">
                    </div>
                </div>
            </div>

            <!-- Buttons -->
            <div class="flex justify-end space-x-3 mt-6">
                <button type="button" id="cancel-btn"
                    class="px-5 py-2 bg-gray-200 rounded-lg hover:bg-gray-300 transition font-medium">
                    Cancel
                </button>
                <button type="submit"
                    class="px-5 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition font-medium">
                    Save
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const profilePictureWrapper = document.getElementById('profile-picture-wrapper');
        const profilePictureInput = document.getElementById('profile-picture-input');
        const profilePicturePreview = document.getElementById('profile-picture-preview');
        const profilePicturePlaceholder = document.getElementById('profile-picture-placeholder');
        const changePictureBtn = document.getElementById('change-picture-btn');
        const removePictureBtn = document.getElementById('remove-picture-btn');
        const cancelBtn = document.getElementById('cancel-btn');

        // Store original state for cancel functionality
        const originalHasImage = @json(auth()->user()->profile_picture ? true : false);
        let selectedFile = null;

        // Open file dialog when clicking on the profile picture wrapper or change button
        profilePictureWrapper.addEventListener('click', function() {
            profilePictureInput.click();
        });
        
        changePictureBtn.addEventListener('click', function() {
            profilePictureInput.click();
        });

        // Handle file selection
        profilePictureInput.addEventListener('change', function(e) {
            if (e.target.files && e.target.files[0]) {
                selectedFile = e.target.files[0];
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    // Show preview and hide placeholder
                    profilePicturePreview.src = e.target.result;
                    profilePicturePreview.style.display = 'block';
                    profilePicturePlaceholder.style.display = 'none';
                    
                    // Show remove button
                    removePictureBtn.style.display = 'block';
                };
                
                reader.readAsDataURL(selectedFile);
            }
        });

        // Remove profile picture
        function removeProfilePicture() {
            // Clear file input
            profilePictureInput.value = '';
            selectedFile = null;
            
            // Hide preview and show placeholder
            profilePicturePreview.style.display = 'none';
            profilePicturePlaceholder.style.display = 'block';
            
            // Hide remove button if there was no original image
            if (!originalHasImage) {
                removePictureBtn.style.display = 'none';
            }
        }

        // Attach remove functionality to remove button
        if (removePictureBtn) {
            removePictureBtn.addEventListener('click', removeProfilePicture);
        }

        // Cancel button functionality
        cancelBtn.addEventListener('click', function() {
            // Reset form fields
            const form = document.querySelector('form');
            const inputs = form.querySelectorAll('input:not([type="file"]), select');
            inputs.forEach(input => {
                if (input.type !== 'password' || input.name === 'current_password') {
                    input.value = input.defaultValue;
                } else {
                    input.value = '';
                }
            });
            
            // Reset profile picture
            if (selectedFile || (profilePicturePreview.style.display === 'block' && !originalHasImage)) {
                removeProfilePicture();
            } else if (originalHasImage) {
                // Restore original image if it existed
                profilePicturePreview.style.display = 'block';
                profilePicturePlaceholder.style.display = 'none';
                removePictureBtn.style.display = 'block';
                profilePictureInput.value = '';
                selectedFile = null;
            }
        });
    });
</script>
@endpush