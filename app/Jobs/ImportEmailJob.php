<?php

namespace App\Jobs;

use App\Imports\EmailImportCollection;
use App\Models\ImportEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Maatwebsite\Excel\Facades\Excel;

class ImportEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $importEmail;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(ImportEmail $importEmail)
    {
        $this->importEmail = $importEmail;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $file = $this->importEmail->path_file;
        $pathFile = base_path($file);
        Excel::import(new EmailImportCollection($this->importEmail), $pathFile);

        $this->importEmail->status = 2;
        $this->importEmail->save();
    }
}
