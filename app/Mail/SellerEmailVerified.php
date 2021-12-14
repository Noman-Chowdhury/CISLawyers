<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SellerEmailVerified extends Mailable
{
    use Queueable, SerializesModels;
    protected $seller;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($seller)
    {
        $this->seller = $seller;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Seller Email Verified')
            ->view('admin.mail.seller_verified')
            ->with([
                'name'=> $this->seller->name,
                'url'=> route('seller.login'),
            ]);
    }
}
