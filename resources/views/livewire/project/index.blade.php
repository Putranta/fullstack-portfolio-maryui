<?php

use Livewire\Volt\Component;
use App\Models\Project;
use Mary\Traits\Toast;
use Livewire\WithPagination;
use Illuminate\Pagination\LengthAwarePaginator;

new class extends Component {
    use Toast;
    use WithPagination;

    public function headers(): array
    {
        return [
            ['key' => 'image', 'label' => 'Img'],
            ['key' => 'title', 'label' => 'Title'],
            ['key' => 'tech', 'label' => 'Tech Stack'],
            ['key' => 'action', 'label' => 'Action']
        ];
    }

    public function with(): array
    {
        return [
            'headers' => $this->headers(),
            'projects' => Project::latest()->paginate(5),
        ];
    }

    public function delete(Project $project): void
    {
        $project->delete();
        $this->warning("Project deleted", position: 'toast-bottom');
    }
}; ?>

<div>
    <x-header title="Projects" separator progress-indicator >
        <x-slot:actions>
            <x-button label="Tambah" link="/aswin/project/create" responsive icon="o-plus" class="btn-primary" />
        </x-slot:actions>
    </x-header>

    <x-table :headers="$headers" :rows="$projects" with-pagination link="{{ url('aswin/project/{id}/edit') }}">
        @scope('cell_image', $project)
            @php
                $image = json_decode($project->library, true)[0]
            @endphp

            @if ($image)
                <x-avatar :image="$image['url']" class="!w-14 !rounded-lg" />
            @endif
        @endscope

        @scope('cell_tech', $project)
            <div class="flex flex-wrap gap-2 justify-items-start items-start justify-start">
                @foreach ($project->techStack as $tech)
                    <div class="flex gap-2 py-1 px-4 rounded-sm items-center cursor-default hover:motion-preset-seesaw click:motion-preset-seesaw "  style="background-color: {{ $tech->bg_color }}; width: fit-content;">
                        {!! $tech->svg !!}
                        <span style="color: {{ $tech->text_color }}">{{ $tech->name }}</span>
                    </div>
                @endforeach
            </div>
        @endscope

        @scope('cell_action', $project)
            <x-button icon="o-trash" wire:click="delete({{ $project->id }})" wire:confirm="Are you sure?" spinner
                class="btn-ghost btn-sm text-red-500" />
        @endscope
    </x-table>
</div>
