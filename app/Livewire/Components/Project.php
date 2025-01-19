<?php

namespace App\Livewire\Components;

use App\Models\Project as ModelsProject;
use Livewire\Component;

class Project extends Component
{
    public $projects;
    public function mount()
    {
        $this->projects = ModelsProject::where('is_featured', true)->get();
    }
    public function render()
    {
        return view('livewire.components.project');
    }
}
