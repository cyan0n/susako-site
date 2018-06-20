<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'url_name',
        'description',
        'category_id',
        'thumbnail_id'
    ];

    public static function main()
    {
        return static::where('category_id', null)->get();
    }

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
        return $this->belongsTo('App\Category', 'category_id');
    }

    // Child Categories
    public function subCategories()
    {
        return $this->hasMany('App\Category');
    }

    // Artworks
    public function artworks()
    {
        return $this->hasMany('App\Artwork');
    }

    // Thumbnail
    public function thumbnail()
    {
        return $this->belongsTo('App\Artwork');
    }

    // Image Directory Path
    public function path()
    {
        $path = '';
        // Have parent category?
        if (!empty($this->category_id)) {
            $path .= $this->macroCategory->url_name.'/';
        }
        $path .= $this->url_name.'/';
        return $path;
    }

    public function href()
    {
        if (!empty($this->category_id)) {
            return route('web.sub-category', ['main_category' => $this->macroCategory->url_name, 'sub_category' => $this->url_name]);
        }
        return route('web.category', ['main_category' => $this->url_name]);
    }
}
