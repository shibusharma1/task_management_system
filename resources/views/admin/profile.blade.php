@extends('layouts.admin.app')
@section('title', 'Profile')

@push('styles')
@endpush

@section('contents')
<div class="flex-1 overflow-auto p-4 md:p-6 bg-gray-50">
    <div class="max-w-3xl mx-auto bg-white shadow rounded-2xl p-6">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">My Profile</h2>
        <p class="text-gray-600 mb-6">Update your account details below</p>

        {{-- <form action="{{ route('profile.update') }}" method="POST" class="space-y-6"> --}}
        <form action="#" method="POST" class="space-y-6">

            @csrf
            @method('PUT')

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
    document.getElementById('cancel-btn').addEventListener('click', () => {
        const form = document.querySelector('form');
        form.reset();
    });
</script>
@endpush
