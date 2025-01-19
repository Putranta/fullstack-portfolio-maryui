<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectTechStack extends Model
{
    protected $table = 'project_tech_stacks';
    protected $fillable = [
        'project_id',
        'tech_stack_id'
    ];
}
