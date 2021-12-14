<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrganizationActive extends Mailable
{
    use Queueable, SerializesModels;
    protected $organization;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($organization)
    {
        $this->organization = $organization;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Organization Successfully Activate')
            ->view('admin.mail.organization_active')
            ->with([
                'name'=> $this->organization->Sellers()->first()->name,
                'url'=> route('seller.login'),
                ]);
    }
}
