@extends('layouts.admin.app')
@section('title', 'Admin | Settings')

@push('styles')
    {{-- SweetAlert2 CDN --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
@endpush

@section('contents')
<div class="flex-1 overflow-auto p-4 md:p-6 bg-gray-50">
    <div class="mb-6 flex justify-between items-center flex-wrap">
        <div class="mb-2 md:mb-0">
            <h2 class="text-2xl font-bold text-gray-800">Application Settings</h2>
            <p class="text-gray-600">Manage general, contact, SMTP, SMS, and social media settings</p>
        </div>
    </div>

    <!-- Settings Form -->
    <div class="bg-white shadow rounded-lg p-6">
        <form method="POST" enctype="multipart/form-data"
            action="{{ $setting ? route('settings.update', $setting->id) : route('settings.store') }}">
            @csrf
            @if($setting)
                @method('PUT')
            @endif

            <!-- General Settings -->
            <h3 class="text-lg font-semibold text-gray-700 mb-4">General Settings</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700">App Name</label>
                    <input type="text" name="app_name" value="{{ old('app_name', $setting->app_name ?? '') }}"
                        class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">App Logo</label>
                    <input type="file" name="app_logo" class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2">
                    @if(!empty($setting->app_logo))
                        <img src="{{ asset('storage/'.$setting->app_logo) }}" class="h-10 mt-2">
                    @endif
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Favicon</label>
                    <input type="file" name="favicon" class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2">
                    @if(!empty($setting->favicon))
                        <img src="{{ asset('storage/'.$setting->favicon) }}" class="h-6 mt-2">
                    @endif
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Meta Title</label>
                    <input type="text" name="meta_title" value="{{ old('meta_title', $setting->meta_title ?? '') }}"
                        class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700">Meta Description</label>
                    <textarea name="meta_description"
                        class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2">{{ old('meta_description', $setting->meta_description ?? '') }}</textarea>
                </div>
            </div>

            <!-- Contact -->
            <h3 class="text-lg font-semibold text-gray-700 mb-4">Contact Details</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="contact_email" value="{{ old('contact_email', $setting->contact_email ?? '') }}"
                        class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Phone</label>
                    <input type="text" name="contact_phone" value="{{ old('contact_phone', $setting->contact_phone ?? '') }}"
                        class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700">Address</label>
                    <input type="text" name="contact_address" value="{{ old('contact_address', $setting->contact_address ?? '') }}"
                        class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2">
                </div>
            </div>

            <!-- SMTP -->
            <h3 class="text-lg font-semibold text-gray-700 mb-4">SMTP Mail Settings</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                <input type="text" name="mail_host" placeholder="Host" value="{{ old('mail_host', $setting->mail_host ?? '') }}" class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2">
                <input type="text" name="mail_port" placeholder="Port" value="{{ old('mail_port', $setting->mail_port ?? '') }}" class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2">
                <input type="text" name="mail_username" placeholder="Username" value="{{ old('mail_username', $setting->mail_username ?? '') }}" class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2">
                <input type="password" name="mail_password" placeholder="Password" value="{{ old('mail_password', $setting->mail_password ?? '') }}" class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2">
            </div>

            <!-- SMS -->
            <h3 class="text-lg font-semibold text-gray-700 mb-4">SMS API</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                <input type="text" name="sms_api_url" placeholder="API URL" value="{{ old('sms_api_url', $setting->sms_api_url ?? '') }}" class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2">
                <input type="text" name="sms_api_key" placeholder="API Key" value="{{ old('sms_api_key', $setting->sms_api_key ?? '') }}" class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2">
            </div>

            <!-- Social Media -->
            <h3 class="text-lg font-semibold text-gray-700 mb-4">Social Media</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                <input type="url" name="facebook_url" placeholder="Facebook" value="{{ old('facebook_url', $setting->facebook_url ?? '') }}" class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2">
                <input type="url" name="twitter_url" placeholder="Twitter" value="{{ old('twitter_url', $setting->twitter_url ?? '') }}" class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2">
            </div>

            <!-- Maintenance -->
            <div class="mb-6">
                <label class="flex items-center space-x-2">
                    <input type="checkbox" name="maintenance_mode" value="1" {{ old('maintenance_mode', $setting->maintenance_mode ?? false) ? 'checked' : '' }}>
                    <span class="text-sm text-gray-700">Enable Maintenance Mode</span>
                </label>
            </div>

            <div class="flex justify-end space-x-2">
                <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">
                    Save Settings
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
    {{-- SweetAlert2 CDN --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            @if(session('success'))
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    title: "{{ session('success') }}",
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                });
            @endif

            @if(session('error'))
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'error',
                    title: "{{ session('error') }}",
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                });
            @endif
        });
    </script>
@endpush
