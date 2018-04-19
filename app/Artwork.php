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
