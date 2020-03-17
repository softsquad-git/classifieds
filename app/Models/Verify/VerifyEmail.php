<?php

namespace App\Models\Verify;

use Illuminate\Database\Eloquent\Model;

class VerifyEmail extends Model
{
    protected $table = 'verify_email';

    protected $fillable = [
        'user_id',
        '_key'
    ];
}
