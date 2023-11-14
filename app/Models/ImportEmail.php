<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImportEmail extends Model
{
    use HasFactory;

    protected $fillable = [
        'path_file', 'status',
        'email_template_id', 'number_faild',
        'number_success',
        'message',
        'retry'
    ];

    public function emailTemplate()
    {
        return $this->belongsTo(EmailTemplate::class);
    }
}
