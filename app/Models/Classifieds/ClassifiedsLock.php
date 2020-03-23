<?php

namespace App\Models\Classifieds;

use Illuminate\Database\Eloquent\Model;

class ClassifiedsLock extends Model
{
    protected $table = 'classifieds_lock';

    protected $fillable = [
        'classified_id',
        'user_id',
        'description',
        'type'
    ];

    public function classified()
    {
        return $this->belongsTo(Classifieds::class);
    }
}
