<?php

namespace App\Imports;

use App\Jobs\SendEmailJob;
use App\Mail\SendEmailSpam;
use App\Models\EmailSended;
use App\Models\ImportEmail;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class EmailImportCollection implements ToCollection, WithChunkReading
{
    protected $importEmail;

    public function __construct(ImportEmail $importEmail)
    {
        $this->importEmail = $importEmail;
    }
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach ($collection as $emailInput) {
            $emailInput = $emailInput->toArray();
            $validator = Validator::make($emailInput, [
                '*'=>'required|email'
            ]);
            $email = $validator->validated();
            if (isset($email[0])) {
                // SendEmailJob::dispatch($email[0], $this->importEmail);
                Mail::queue(new SendEmailSpam($email[0], $this->importEmail));
                $this->importEmail->increment('number_success');
                EmailSended::create([
                    'email' => $email[0]
                ]);
            } else {
                $this->importEmail->increment('number_faild');
            }
        }
    }

    public function chunkSize(): int
    {
        return 1000;
    }
}
