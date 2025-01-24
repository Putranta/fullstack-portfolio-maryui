<?php

use Livewire\Volt\Component;
use App\Models\Shortcut;
use Mary\Traits\Toast;
use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

new class extends Component {
    use Toast, WithFileUploads;

    public bool $createModal = false;
    public bool $editModal = false;

    public Shortcut $sc;

    #[Validate('required|max:20')]
    public string $name = '';

    #[Validate('required|image|max:1024')]
    public $icon;

    #[Validate('required|max:200')]
    public string $url;

    #[Validate('nullable|max:255')]
    public ?string $desc;

    public function headers(): array
    {
        return [
            ['key' => 'icon', 'label' => 'Icon'],
            ['key' => 'name', 'label' => 'name'],
            ['key' => 'url', 'label' => 'Url', 'class' => 'hidden md:block'],
            ['key' => 'action', 'label' => 'action'],
        ];
    }

    public function with(): array
    {
        return [
            'headers' => $this->headers(),
            'shortcuts' => Shortcut::latest()->get(),
        ];
    }

    public function create(): void
    {
        $data = $this->validate();

        if ($this->icon) {
            $path = $this->icon->store('app_icon', 'public');
            $data['icon'] = Storage::url($path);
            Shortcut::create($data);
            $this->success('Shortcut Created');
            $this->reset();
        } else {
            $this->warning('Failed, Icon Not Found!');
        }
    }

    public function edit(Shortcut $sc): void
    {
        $this->fill($sc->toArray());
        $this->icon = $sc->icon;

        $this->editModal = true;
    }
}; ?>

<div>
    <x-header title="App Shortcut" separator progress-indicator >
        <x-slot:actions>
            <x-button label="Tambah" icon="o-plus" @click="$wire.createModal= true" responsive class="btn-primary" />
        </x-slot:actions>
    </x-header>

    <x-table :headers="$headers" :rows="$shortcuts">
        @scope('cell_icon', $item)
            <img src="{{ $item->icon }}" class="w-14 rounded-md"/>
        @endscope

        @scope('cell_action', $item)
            <x-button icon="o-pencil" wire:click="edit({{ $item->id }})"
            class="btn-ghost btn-sm text-black" spinner="edit({{ $item['id'] }})" />

            <x-button icon="o-trash" wire:click="delete({{ $item->id }})" wire:confirm="Are you sure?" spinner class="btn-ghost btn-sm text-red-500" />
        @endscope
    </x-table>


    <x-modal wire:model="createModal" title="Create Shortcut" separator>
        <x-form wire:submit="create">
            <div class="flex flex-col md:flex-row gap-3">
                <x-input label="Shortcut Name" wire:model="name" />
                <x-input label="URL" wire:model="url" />
            </div>
            <x-file wire:model="icon" label="Icon" accept="image/png, image/jpeg, image/jpg, image/ico, image/svg">
                <img src="/blank.jpg" class="h-32 md:h-40 rounded-lg">
            </x-file>
            <x-textarea wire:model="desc" label="Description" rows="2" />

            <x-slot:actions>
                <x-button label="Cancel" @click="$wire.createModal = false" />
                <x-button label="Submit" icon="o-paper-airplane" spinner="create" type="submit" class="btn-primary" />
            </x-slot:actions>
        </x-form>
    </x-modal>

    <x-modal wire:model="editModal" title="Create Shortcut" separator>
        <x-form wire:submit="update">
            <div class="flex flex-col md:flex-row gap-3">
                <x-input label="Shortcut Name" wire:model="name" />
                <x-input label="URL" wire:model="url" />
            </div>
            <x-file wire:model="icon" label="Icon" accept="image/png, image/jpeg, image/jpg, image/ico, image/svg">
                <img src="{{ $icon?? '/storage/app_icon/XtVlBtC8JamT3TzCWUlzHlIlhaTnq71BxOBjzLyr.png' }}" class="h-32 md:h-40 rounded-lg">
            </x-file>
            <x-textarea wire:model="desc" label="Description" rows="2" />

            <x-slot:actions>
                <x-button label="Cancel" @click="$wire.editModal = false" />
                <x-button label="Submit" icon="o-paper-airplane" spinner="update" type="submit" class="btn-primary" />
            </x-slot:actions>
        </x-form>
    </x-modal>
</div>
