<?php

namespace App\Imports;

use App\Jobs\SendEmailJob;
use App\Models\ImportEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class EmailImportCollection implements ToCollection, WithChunkReading, ShouldQueue
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
        try {
            foreach ($collection as $emailInput) {
                $emailInput = $emailInput->toArray();
                $validator = Validator::make($emailInput, [
                    '*'=>'required|email'
                ]);
                $email = $validator->validated();
                if (isset($email[0])) {
                    SendEmailJob::dispatch($email[0], $this->importEmail);
                }
            }

            $this->importEmail->update([
                'status' => 3
            ]);

        } catch (\Throwable $th) {
            $this->importEmail->update([
                'status' => 4,
                'message' => $th->getMessage()
            ]);
        }
    }

    public function chunkSize(): int
    {
        return 1000;
    }
}
