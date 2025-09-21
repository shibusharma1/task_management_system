<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    // Allow mass assignment for all attributes
    // protected $guarded = [];

    // OR if you want to be strict, use fillable instead of guarded:
    protected $fillable = [
        'app_name',
        'app_logo',
        'favicon',
        'meta_title',
        'meta_description',
        'contact_email',
        'contact_phone',
        'contact_address',
        'sms_api_url',
        'sms_api_key',
        'sms_sender_id',
        'mail_mailer',
        'mail_host',
        'mail_port',
        'mail_username',
        'mail_password',
        'mail_encryption',
        'mail_from_address',
        'mail_from_name',
        'facebook_url',
        'twitter_url',
        'linkedin_url',
        'instagram_url',
        'maintenance_mode',
        'custom_script_head',
        'custom_script_body',
    ];
}
