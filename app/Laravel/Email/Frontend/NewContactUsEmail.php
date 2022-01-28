<?php

namespace App\Laravel\Email\Frontend;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewContactUsEmail extends Mailable
{
    public function __construct($customer)
    {
        $this->customer = $customer;
        // dd(gettype($this->customer->message));
    }

    /**
     * Send email to auth merchant
     * 
     * @return Email template
     */
    public function build()
    {
        return $this->view('email.frontend.contact-us')
                    ->to("info@2xquisitedesigns.com")
                    ->subject($this->customer->subject ? $this->customer->subject : "Inquiry")
                    ->with([
                        'name' => $this->customer->name,
                        'msg' => $this->customer->message,
                        'email' => $this->customer->email,
                        'contact_number' => $this->customer->contact_number
                    ]);
    }
}