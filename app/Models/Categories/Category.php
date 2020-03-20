<?php

namespace App\Models\Categories;

use App\Models\Classifieds\Classifieds;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = [
        'name',
        'icon_class',
        'parent_id'
    ];

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id', 'id')->where('parent_id', 0);
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id')->with('parent');
    }

    public function classifieds()
    {
        return $this->hasMany(Classifieds::class, 'category_id', 'id');
    }
}
