<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = ['img', 'title', 'slug', 'like', 'comment', 'download', 'thumbnail'];

    public function likes()
    {
        return $this->belongsToMany(User::class, 'gallery_like');
    }

    public function comments()
    {
        return $this->belongsToMany(User::class, 'gallery_comment');
    }
}
