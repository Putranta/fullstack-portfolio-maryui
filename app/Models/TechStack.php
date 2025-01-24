<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TechStack extends Model
{
    protected $fillable = ['name', 'slug', 'svg', 'bg_color', 'text_color'];

    public function projects()
    {
        return $this->belongsToMany(Project::class, 'project_id');
    }
}
