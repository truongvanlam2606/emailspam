<?php

namespace App\Mail;

use App\Models\ImportEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

class SendEmailSpam extends Mailable
{
    use Queueable, SerializesModels;

    protected $emailTo;
    protected $importEmail;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($emailTo, ImportEmail $importEmail)
    {
        $this->importEmail = $importEmail;
        $this->emailTo = $emailTo;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $emailTemplate = $this->importEmail->emailTemplate;

        // dd($emailTemplate->content);
        return $this
            ->to($this->emailTo)
            ->html($emailTemplate->content ?? '')
            ->subject(__('Notification'));
    }
}
