<?php

namespace App\Mail;

use App\Models\Emergency;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmergencyAlertMail extends Mailable
{
    use Queueable, SerializesModels;

    public $type;
    public $latitude;
    public $longitude;
    public $emergencyMessage;

    /**
     * Create a new message instance.
     */
    public function __construct(Emergency $emergency)
    {
        $this->type = $emergency->type;
        $this->latitude = $emergency->latitude;
        $this->longitude = $emergency->longitude;
        $this->emergencyMessage = $emergency->message;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('Emergency Alert Mail')
                    ->view('emails.emergency_alert')
                    ->with([
                        'type' => $this->type,
                        'latitude' => $this->latitude,
                        'longitude' => $this->longitude,
                        'emergencyMessage' => $this->emergencyMessage,
                    ]);
    }
}
