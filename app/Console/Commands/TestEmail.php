<?php

namespace App\Console\Commands;

use App\Jobs\ImportEmailJob;
use App\Jobs\SendEmailJob;
use App\Mail\SendEmailSpam;
use App\Models\ImportEmail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class TestEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:send';

    protected $importEmail;

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->importEmail = ImportEmail::find(1);



        // SendEmailJob::dispatch('xxx', ImportEmail::find(1));

        Mail::queue(new SendEmailSpam('i2.tvl.97@gmail.com', $this->importEmail));
        Mail::queue(new SendEmailSpam('i2.tvl.97@gmail.com', $this->importEmail));
        // Mail::send(new SendEmailSpam('inre@interbills.online', $this->importEmail));
        // dd(123);
        // Mail::send([], [], function ($message) {
        //     $message->to('i2.tvl.97@gmail.com')
        //         ->subject('test')
        //         ->setBody('Email testing');
        //     });
        // Mail::send([], [], function ($message) {
        //     $message->to('ngatran1997@omeganuts.shop')
        //         ->subject('test')
        //         ->setBody('Email testing');
        // });
        //  Mail::send([], [], function ($message) {
        //     $message->to('evachm50m@hotmail.com')
        //         ->subject('test')
        //         ->setBody('Email testing');
        // });
        $this->info('Send Email Success');

        return 0;
    }
}
