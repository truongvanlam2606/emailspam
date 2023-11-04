<?php

namespace App\Console\Commands;

use App\Jobs\ImportEmailJob;
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
        Mail::send([], [], function ($message) {
            $message->to('i2.tvl.97@gmail.com')
                ->subject('Email Example')
                ->setBody('Email testing');
            });
        $this->info('Send Email Success');

        return 0;
    }
}
