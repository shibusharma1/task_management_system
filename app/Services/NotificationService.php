<?php

namespace App\Services;

use App\Models\Notification;
// use App\Models\CustomNotification;
use Illuminate\Support\Facades\Mail;
use App\Mail\UniversalNotificationMail;

class NotificationService
{
    /**
     * Send a notification
     *
     * @param  \App\Models\User $user
     * @param  string $title
     * @param  string|null $message
     * @param  mixed|null $relatedModel
     * @param  array $extraData
     * @param  array $channels
     * @param  string|null $actionUrl
     * @param  string|null $actionText
     */
    public static function send(
        $user,
        string $title,
        ?string $message = null,
        $relatedModel = null,
        string $type = null,
        string $priority = 'normal',
        array $extraData = [],
        array $channels = ['in-app'],
        ?string $actionUrl = null,
        ?string $actionText = null
    ) {
        // Store in DB
        Notification::create([
            'user_id' => $user->id,
            'title' => $title,
            'message' => $message,
            'type' => $type,
            'related_id' => $relatedModel?->id,
            'related_type' => $relatedModel ? get_class($relatedModel) : null,
            'priority' => 'normal',
            'channel' => implode(',', $channels),
            'delivered_at' => now(),
            'extra_data' => $extraData,
        ]);

        // Send Email if requested
        if (in_array('email', $channels)) {
            Mail::to($user->email)->send(
                new UniversalNotificationMail($title, $message, $extraData, $actionUrl, $actionText)
            );
        }
    }
}
