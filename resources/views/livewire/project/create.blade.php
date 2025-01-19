<?php

use Livewire\Volt\Component;
use Livewire\Attributes\Rule;
use Mary\Traits\Toast;
use Livewire\WithFileUploads;
use Mary\Traits\WithMediaSync;
use Illuminate\Support\Collection;
use App\Models\TechStack;
use App\Models\Project;
use Illuminate\Support\Str;

new class extends Component {
    use Toast, WithFileUploads, WithMediaSync;

    #[Rule('required')]
    public string $title = '';

    #[Rule('required')]
    public ?string $desc = null;

    #[Rule('nullable')]
    public bool $is_featured = false;

    #[Rule('required')]
    public array $tech = [];

    #[Rule('nullable')]
    public string $demo_url;

    #[Rule('nullable')]
    public string $github_url;

    // Temporary files
    #[Rule(['files.*' => 'image|max:2048'])]
    public array $files = [];

    // Library metadata (optional validation)
    #[Rule('required')]
    public Collection $library;
    public function mount()
    {
        $this->library = collect();
    }

    public function with(): array
    {
        return [
            'techs' => TechStack::all(),
        ];
    }

    public function save(): void
    {
        $data = $this->validate();
        $data['slug'] = Str::slug($data['title']);

        $project = Project::create($data);
        // Sync selection
        $project->techStack()->sync($this->tech);
        $this->syncMedia($project);

        $this->success('Project Created', redirectTo: '/aswin/project');
    }

}; ?>

<div class="mb-20">
    <x-header title="Create Project" separator progress-indicator />

    <x-form wire:submit="save">
        <x-input label="Title" wire:model="title" class="mb-4" />
        <x-image-library
            wire:model="files"                 {{-- Temprary files --}}
            wire:library="library"             {{-- Library metadata property --}}
            :preview="$library"                {{-- Preview control --}}
            label="Project images"
            hint="Max 2mb"
            class="mb-4"/>

        <div class="mb-4">
            <x-editor wire:model="desc" label="Description"  />
        </div>

        <div class="grid grid-cols-2 gap-y-4 gap-x-12 items-center">
            <div>
                <x-choices-offline label="Tech Stack" wire:model="tech" :options="$techs" class="mb-3" />
            </div>
            <div>
                <x-checkbox label="Is Featured?" wire:model="is_featured" />
            </div>
            <div>
                <x-input label="Demo Url" wire:model="demo_url" />
            </div>
            <div>
                <x-input label="Github Url" wire:model="github_url" />
            </div>
        </div>

        <x-slot:actions>
            <x-button label="Cancel" link="/aswin/project" />
            <x-button label="Submit" icon="o-paper-airplane" spinner="save" type="submit" class="btn-primary" />
        </x-slot:actions>
    </x-form>
</div>
