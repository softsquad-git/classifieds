<?php

namespace App\Models\Classifieds;

use Illuminate\Database\Eloquent\Model;

class ClassifiedsImages extends Model
{
    protected $table = 'classifieds_images';

    protected $fillable = [
        'classified_id',
        'user_id',
        'path',
        'extension'
    ];

    public function classified()
    {
        return $this->belongsTo(Classifieds::class);
    }
}
