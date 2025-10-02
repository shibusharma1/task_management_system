@extends('layouts.admin.app')
@section('title', 'Admin | Profile')

@push('styles')
    {{-- SweetAlert2 --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
@endpush

@section('contents')
<div class="flex-1 overflow-auto p-4 md:p-6 bg-gray-50">
    <div class="mb-6 flex justify-between items-center flex-wrap">
        <div class="mb-2 md:mb-0">
            <h2 class="text-2xl font-bold text-gray-800">My Profile</h2>
            <p class="text-gray-600">Update your personal information, organization details, and account settings</p>
        </div>
    </div>

    <!-- Profile Form -->
    <div class="bg-white shadow rounded-lg p-6">
        <form method="POST" enctype="multipart/form-data" action="">
            @csrf
            @method('PUT')

            <!-- Profile Picture -->
            <h3 class="text-lg font-semibold text-gray-700 mb-4">Profile Picture</h3>
            <div class="flex flex-col items-center pb-6 border-b border-gray-200 mb-6">
                <div class="relative w-24 h-24 rounded-full overflow-hidden border-2 border-gray-200 bg-gray-100 flex items-center justify-center cursor-pointer" id="profile-picture-wrapper">
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

                <div class="flex gap-2 mt-3">
                    <button type="button" id="change-picture-btn" class="px-3 py-1 text-sm border border-gray-300 rounded-md hover:bg-gray-100">Change</button>
                    <button type="button" id="remove-picture-btn" class="px-3 py-1 text-sm border border-red-300 text-red-600 rounded-md hover:bg-red-50 {{ !auth()->user()->profile_picture ? 'hidden' : '' }}">
                        Remove
                    </button>
                </div>
            </div>

            <!-- Personal Information -->
            <h3 class="text-lg font-semibold text-gray-700 mb-4">Personal Information</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Full Name</label>
                    <input type="text" name="name" value="{{ old('name', auth()->user()->name) }}"
                        class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Email Address</label>
                    <input type="email" name="email" value="{{ old('email', auth()->user()->email) }}"
                        class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Phone Number</label>
                    <input type="text" name="phone" value="{{ old('phone', auth()->user()->phone) }}"
                        class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Address</label>
                    <input type="text" name="address" value="{{ old('address', auth()->user()->address) }}"
                        class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2">
                </div>
            </div>

            <!-- Organization Info -->
            <h3 class="text-lg font-semibold text-gray-700 mb-4">Organization Information</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                <input type="text" value="{{ auth()->user()->institution->name ?? 'Not assigned' }}" class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2 bg-gray-100" disabled>
                <input type="text" value="{{ auth()->user()->designation->designation_name ?? 'Not assigned' }}" class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2 bg-gray-100" disabled>
                <input type="text" value="{{ auth()->user()->department->name ?? 'Not assigned' }}" class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2 bg-gray-100 md:col-span-2" disabled>
            </div>

            <!-- Password Change -->
            <h3 class="text-lg font-semibold text-gray-700 mb-4">Change Password</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                <input type="password" name="current_password" placeholder="Current Password" class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2">
                <input type="password" name="password" placeholder="New Password" class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2">
                <input type="password" name="password_confirmation" placeholder="Confirm Password" class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2 md:col-span-2">
            </div>

            <!-- Actions -->
            <div class="flex justify-end space-x-2 border-t pt-4">
                <button type="button" class="px-4 py-2 bg-gray-100 border rounded-md hover:bg-gray-200">Cancel</button>
                <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">Save Changes</button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const profileInput = document.getElementById("profile-picture-input");
        const profilePreview = document.getElementById("profile-picture-preview");
        const profilePlaceholder = document.getElementById("profile-picture-placeholder");
        const changeBtn = document.getElementById("change-picture-btn");
        const removeBtn = document.getElementById("remove-picture-btn");

        changeBtn.addEventListener("click", () => profileInput.click());

        profileInput.addEventListener("change", (event) => {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    profilePreview.src = e.target.result;
                    profilePreview.classList.remove("hidden");
                    if (profilePlaceholder) profilePlaceholder.classList.add("hidden");
                    removeBtn.classList.remove("hidden");
                };
                reader.readAsDataURL(file);
            }
        });

        removeBtn.addEventListener("click", () => {
            profileInput.value = "";
            profilePreview.src = "";
            profilePreview.classList.add("hidden");
            if (profilePlaceholder) profilePlaceholder.classList.remove("hidden");
            removeBtn.classList.add("hidden");
        });

        @if(session('success'))
            Swal.fire({ toast: true, position: 'top-end', icon: 'success', title: "{{ session('success') }}", showConfirmButton: false, timer: 3000 });
        @endif
        @if(session('error'))
            Swal.fire({ toast: true, position: 'top-end', icon: 'error', title: "{{ session('error') }}", showConfirmButton: false, timer: 3000 });
        @endif
    });
</script>
@endpush