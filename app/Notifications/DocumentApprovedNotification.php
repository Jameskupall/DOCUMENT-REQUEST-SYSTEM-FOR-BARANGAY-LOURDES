<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\DatabaseMessage;

class DocumentNotification extends Notification
{
    use Queueable;

    protected $document;
    protected $status;

    public function __construct($document, $status)
    {
        $this->document = $document;
        $this->status = $status;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        if ($this->status === 'approved') {
            return [
                'message' => "Your document has been approved. Please bring to claim:
                             - 1 plastic bottle
                             - 1 valid ID",
                'document_id' => $this->document->id,
            ];
        } else {
            return [
                'message' => "Your request for {$this->document->document_type} has been rejected. Please contact the barangay for more details.",
                'document_id' => $this->document->id,
            ];
        }
    }
}
