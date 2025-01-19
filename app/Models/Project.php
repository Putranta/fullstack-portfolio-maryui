<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\AsCollection;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['title', 'slug', 'desc', 'library', 'is_featured', 'demo_url', 'github_url'];

    protected $casts = [
        'library' => AsCollection::class,
    ];

    public function techStack()
    {
        return $this->belongsToMany(TechStack::class, 'project_tech_stacks');
    }
}
