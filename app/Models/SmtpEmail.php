<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SmtpEmail extends Model
{
    use HasFactory;

    protected $fillable = [
        'mail_host',
        'mail_port',
        'mail_username',
        'mail_password',
        'mail_encryption',
        'start_send',
        'last_send',
        'number',
    ];
}
