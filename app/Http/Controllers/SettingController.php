<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
     /**
     * Display the settings form.
     */
    public function index()
    {
        // Always fetch the first (and only) setting row
        $setting = Setting::first();
        return view('admin.settings.index', compact('setting'));
    }

    /**
     * Store settings if not exists (only 1 record allowed).
     */
    public function store(Request $request)
    {
        // dd($request->all());
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
            $validated['app_logo'] = $request->file('app_logo')->store('settings', 'public');
        }
        if ($request->hasFile('favicon')) {
            $validated['favicon'] = $request->file('favicon')->store('settings', 'public');
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
            $validated['app_logo'] = $request->file('app_logo')->store('settings', 'public');
        }
        if ($request->hasFile('favicon')) {
            $validated['favicon'] = $request->file('favicon')->store('settings', 'public');
        }

        $setting->update($validated);

        return redirect()->route('settings.general')->with('success', 'Settings updated successfully.');
    }
}
