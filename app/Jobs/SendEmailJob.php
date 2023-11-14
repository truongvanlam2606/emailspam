<?php

namespace App\Jobs;

use App\Mail\SendEmailSpam;
use App\Models\EmailSended;
use App\Models\ImportEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
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
    public function __construct(string $email, ImportEmail $importEmail)
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
        try {
            Mail::send(new SendEmailSpam($this->email, $this->importEmail));
            $this->importEmail->increment('number_success');
            EmailSended::create([
                'email' => $this->email
            ]);
        } catch (\Throwable $th) {
            EmailSended::create([
                'email' => $this->email,
                'message' => $th->getMessage(),
                'status' => 2
            ]);
            $this->importEmail->increment('number_faild');
        }
    }
}
