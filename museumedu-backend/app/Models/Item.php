<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['name', 'theme', 'year', 'story', 'category_id', 'image_path'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
