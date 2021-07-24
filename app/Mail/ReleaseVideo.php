<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;


class ReleaseVideo extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    protected $details;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details)
    {
       $this->details = $details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {   
        $address = 'info@roketez.com';
        $subject = 'New Video Released in Roketez';
        $name = 'Roketez';


        return $this->view('emails.releasevideo')->with(['title' => $this->details['title'], 'description' => $this->details['description'], 'image' => $this->details['image']])->from($address, $name)->subject($subject);
    }
}
