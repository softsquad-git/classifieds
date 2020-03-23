<?php

namespace App\Models\Classifieds;

use App\Helpers\Image;
use App\Models\Categories\Category;
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
        'quantity',
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

    public function getImageList()
    {
        $image = $this->images()->first();
        if (!empty($image->path))
            return Image::getImageAd($image->path);

        return Image::getImageAd(Image::DF_FILENAME);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function lock()
    {
        return $this->hasOne(ClassifiedsLock::class, 'classified_id', 'id');
    }
}
