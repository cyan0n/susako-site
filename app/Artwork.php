<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Artwork extends Model
{
    protected $fillable = [
        'name',
        'url_name',
        'description',
        'extension',
        'category_id'
    ];
    protected $appends = ['path'];

    public function scopeByCategory($query, $category)
    {
        return $query
            ->where('category_id', $category->id)
            ->whereIn('category_id', function ($query) use ($category) {
                $query->select('id')
                    ->from(with(new \App\Category)->getTable())
                    ->where('category_id', $category->id);
            }, 'or');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
	}
	
	public function thumbnailOf()
	{
		return $this->hasOne('App\Category', 'thumbnail_id');
	}

    public function image()
    {
        if (Storage::disk('public')->exists('image/'.$this->path())) {
            return Storage::disk('public')->url('image/'.$this->path());
        }
    }

    public function path()
    {
        return $this->category->path() . $this->url_name . '.' . $this->extension;
    }

    public function getPathAttribute()
    {
        return $this->attributes['path'] = $this->path();
    }

    // TODO: fullpath function and attribute, images directory + path()
}
