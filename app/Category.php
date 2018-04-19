<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'url_name',
        'description',
        'category_id'
    ];

    public function scopeMacros($query)
    {
        return $query->where('category_id', NULL);
    }

    public function scopeSub($query, $val)
    {
        return $query->where('category_id', $val);
    }

    // Parent Categories
    public function macroCategory()
    {
        return $this->belognsTo('App\Category');
    }

    // Child Categories
    public function subCategories()
    {
        return $this->hasMany('App\Category');
    }

    // Artworks
    public function artwork()
    {
        return $this->hasMany('App\Artwork');
    }
}
