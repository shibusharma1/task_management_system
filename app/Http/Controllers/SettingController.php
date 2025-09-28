<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; // Added for file copy

class SettingController extends Controller
{
    /**
     * Display the settings form.
     */
    public function index()
    {
        $setting = Setting::first();
        return view('admin.settings.index', compact('setting'));
    }

    /**
     * Store settings if not exists (only 1 record allowed).
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'app_name' => 'nullable|string|max:255',
            'app_logo' => 'nullable|image|mimes:png,jpg,jpeg,svg|max:2048',
            'favicon' => 'nullable|image|mimes:png,jpg,ico|max:1024',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',

            'contact_email' => 'nullable|email|max:255',
            'contact_phone' => 'nullable|string|max:20',
            'contact_address' => 'nullable|string|max:255',

            'sms_api_url' => 'nullable|string|max:255',
            'sms_api_key' => 'nullable|string|max:255',
            'sms_sender_id' => 'nullable|string|max:100',

            'mail_mailer' => 'nullable|string|max:50',
            'mail_host' => 'nullable|string|max:255',
            'mail_port' => 'nullable|integer',
            'mail_username' => 'nullable|string|max:255',
            'mail_password' => 'nullable|string|max:255',
            'mail_encryption' => 'nullable|string|max:50',
            'mail_from_address' => 'nullable|email|max:255',
            'mail_from_name' => 'nullable|string|max:255',

            'facebook_url' => 'nullable|url',
            'twitter_url' => 'nullable|url',
            'linkedin_url' => 'nullable|url',
            'instagram_url' => 'nullable|url',

            'maintenance_mode' => 'nullable|boolean',
            'custom_script_head' => 'nullable|string',
            'custom_script_body' => 'nullable|string',
        ]);

        // Handle logo uploads
        if ($request->hasFile('app_logo')) {
            $path = $request->file('app_logo')->store('settings', 'public');
            $validated['app_logo'] = $path;

            // Option 3: Copy to public/storage for servers without symlink
            $source = storage_path('app/public/' . $path);
            $destination = public_path('storage/' . $path);
            if (!File::exists(dirname($destination))) {
                File::makeDirectory(dirname($destination), 0755, true);
            }
            File::copy($source, $destination);
        }

        if ($request->hasFile('favicon')) {
            $path = $request->file('favicon')->store('settings', 'public');
            $validated['favicon'] = $path;

            // Copy to public/storage
            $source = storage_path('app/public/' . $path);
            $destination = public_path('storage/' . $path);
            if (!File::exists(dirname($destination))) {
                File::makeDirectory(dirname($destination), 0755, true);
            }
            File::copy($source, $destination);
        }

        Setting::create($validated);

        return redirect()->route('settings.general')->with('success', 'Settings saved successfully.');
    }

    /**
     * Update the settings (since only one row allowed).
     */
    public function update(Request $request, Setting $setting)
    {
        $validated = $request->validate([
            'app_name' => 'nullable|string|max:255',
            'app_logo' => 'nullable|image|mimes:png,jpg,jpeg,svg|max:2048',
            'favicon' => 'nullable|image|mimes:png,jpg,ico|max:1024',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',

            'contact_email' => 'nullable|email|max:255',
            'contact_phone' => 'nullable|string|max:20',
            'contact_address' => 'nullable|string|max:255',

            'sms_api_url' => 'nullable|string|max:255',
            'sms_api_key' => 'nullable|string|max:255',
            'sms_sender_id' => 'nullable|string|max:100',

            'mail_mailer' => 'nullable|string|max:50',
            'mail_host' => 'nullable|string|max:255',
            'mail_port' => 'nullable|integer',
            'mail_username' => 'nullable|string|max:255',
            'mail_password' => 'nullable|string|max:255',
            'mail_encryption' => 'nullable|string|max:50',
            'mail_from_address' => 'nullable|email|max:255',
            'mail_from_name' => 'nullable|string|max:255',

            'facebook_url' => 'nullable|url',
            'twitter_url' => 'nullable|url',
            'linkedin_url' => 'nullable|url',
            'instagram_url' => 'nullable|url',

            'maintenance_mode' => 'nullable|boolean',
            'custom_script_head' => 'nullable|string',
            'custom_script_body' => 'nullable|string',
        ]);

        if ($request->hasFile('app_logo')) {
            $path = $request->file('app_logo')->store('settings', 'public');
            $validated['app_logo'] = $path;

            // Copy to public/storage
            $source = storage_path('app/public/' . $path);
            $destination = public_path('storage/' . $path);
            if (!File::exists(dirname($destination))) {
                File::makeDirectory(dirname($destination), 0755, true);
            }
            File::copy($source, $destination);
        }

        if ($request->hasFile('favicon')) {
            $path = $request->file('favicon')->store('settings', 'public');
            $validated['favicon'] = $path;

            // Copy to public/storage
            $source = storage_path('app/public/' . $path);
            $destination = public_path('storage/' . $path);
            if (!File::exists(dirname($destination))) {
                File::makeDirectory(dirname($destination), 0755, true);
            }
            File::copy($source, $destination);
        }

        $setting->update($validated);

        return redirect()->route('settings.general')->with('success', 'Settings updated successfully.');
    }
}
