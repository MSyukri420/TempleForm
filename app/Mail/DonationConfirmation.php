<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DonationConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $userForm;
    public $imagePath;

    /**
     * Create a new message instance.
     */
    public function __construct($userForm, $imagePath = null)
    {
        $this->userForm = $userForm;
        $this->imagePath = $imagePath;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        $email = $this->view('donation.email-confirmation')
                        ->with([
                            'userFormId' => $this->userForm->id,
                            'donationAmount' => $this->userForm->amount,
                        ]);

        if ($this->imagePath) {
            $email->attachFromStorage($this->imagePath, 'donation.png', [
                'mime' => 'image/png',
            ]);
        }

        return $email;
    }
}
