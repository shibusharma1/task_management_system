<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UniversalNotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $title;
    public $message;
    public $extraData;
    public $actionUrl;
    public $actionText;

    public function __construct($title, $message, $extraData = [], $actionUrl = null, $actionText = null)
    {
        $this->title = $title;
        $this->message = $message;
        $this->extraData = $extraData;
        $this->actionUrl = $actionUrl;
        $this->actionText = $actionText;
    }

    public function build()
    {
        return $this->markdown('emails.universal_notification')
                    ->subject($this->title);
    }
}
