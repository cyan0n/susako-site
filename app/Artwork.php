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
        'category_id'
    ];

    public function scopeByCategory($query, $category)
    {
        return $query
            ->where('category_id', $category->id)
            ->whereIn('category_id', function ($query) {
                $query->select('id')
                    ->from(with(new \App\Category)->getTable())
                    ->where('category_id', 1);
            }, 'or');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function image()
    {
        if (Storage::disk('public')->exists('image/'.$this->id)) {
            return Storage::disk('public')->url('image/'.$this->id);
        }
    }
}
