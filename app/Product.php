<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'price', 'image', 'description', 'category_id'];

    public function categories()
    {
        return $this->belongsToMany(Category::class)->withTimestamps();
    }
}
