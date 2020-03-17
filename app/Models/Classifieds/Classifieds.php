<?php

namespace App\Models\Classifieds;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Classifieds extends Model
{
    protected $table = 'classifieds';

    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'content',
        'location',
        'contact_person',
        'email',
        'type',
        'price',
        'starting_price',
        'end_time',
        'number_phone',
        'is_negotiation',
        'is_reservation',
        'state',
        'views',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function images()
    {
        return $this->hasMany(ClassifiedsImages::class, 'classified_id', 'id');
    }
}
