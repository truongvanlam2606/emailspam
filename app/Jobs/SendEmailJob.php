<?php

namespace App\Jobs;

use App\Mail\SendEmailSpam;
use App\Models\ImportEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $email;
    protected $importEmail;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($email, ImportEmail $importEmail)
    {
        $this->importEmail = $importEmail;
        $this->email = $email;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        $emails = [
            'info@derm-innovative.com',
        'info@dema-agency.ch',
        'info@decision-makers.org',
        'info@deca-properties.com',
        'info@daiwasports.co.uk',
        'info@da.org.za',
        'info@cttlogistics.co.th',
        'info@ctd.gr',
        'info@csi-professionals.com',
        'info@cs.maccosmetics.cl',
        'info@crosscostaricamtb.com',
        'info@crimestoppersgno.org',
        'info@cottagerentalagency.com',
        'info@cosmopolitan.de',
        'info@corsamotor.com',
        ];
        foreach ($emails as $key => $value) {
            $result = Mail::send(new SendEmailSpam($value, $this->importEmail));

        }

        // Mail::send([], [], function ($message) {
        //     $message->to('evachm50m@hotmail.com')
        //         ->subject('test')
        //         ->setBody('Email testing');
        // });

        dd($result);
    }
}
