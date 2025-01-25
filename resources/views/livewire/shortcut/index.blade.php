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

    public $scId;

    public Shortcut $sc;

    #[Validate('required|max:20')]
    public string $name = '';

    #[Validate('required|image|max:1024')]
    public $icon;

    #[Validate('required|max:200')]
    public string $url;

    #[Validate('nullable|max:255')]
    public ?string $desc;

    #[Validate('nullable|image|max:1024')]
    public $newIcon;

    public function headers(): array
    {
        return [
            ['key' => 'icon', 'label' => 'Icon'],
            ['key' => 'name', 'label' => 'name'],
            ['key' => 'url', 'label' => 'Url', 'class' => 'hidden md:block'],
            ['key' => 'action', 'label' => 'action', 'class' => 'text-center'],
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
        $this->fill($sc);
        $this->scId = $sc->id;

        $this->editModal = true;
    }

    public function update()
    {
        $data = $this->validate([
            'name' => 'required|string|max:255',
            'newIcon' => 'nullable|image|max:1024',
            'url' => 'required|url',
            'desc' => 'nullable|string|max:200',
        ]);

        $sc = Shortcut::find($this->scId);

        if ($this->newIcon && $this->newIcon != $sc->icon) {
            $oldPath = str_replace('/storage', '', $sc->icon);
            Storage::disk('public')->delete($oldPath);

            $path = $this->newIcon->store('app_icon', 'public');
            $data['icon'] = Storage::url($path);
            $sc->update($data);
        } else {
            $data['icon'] = $sc->icon;
            $sc->update($data);
        }
        $this->editModal = false;
        $this->success('Shortcut Updated');
        $this->reset();
    }

    public function delete(Shortcut $sc): void
    {
        $path = str_replace('/storage', '', $sc->icon);

        if (Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
            $sc->delete();
            $this->success('Shortcut Deleted');
        } else {
            $this->warning('Image Not Found');
        }
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
            class="btn-ghost btn-sm text-black p-1" spinner="edit({{ $item->id }})" />

            <x-button icon="o-trash" wire:click="delete({{ $item->id }})" wire:confirm="Are you sure?" spinner class="btn-ghost btn-sm text-red-500 p-1" />
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

            <!-- Input file yang tersembunyi -->
            <input type="file" id="fileInput" wire:model="newIcon" class="hidden" accept=".png, .jpg, .jpeg, .ico, .svg">

              <!-- Wrapper untuk pratinjau gambar dan spinner -->
            <div class="relative w-fit">
                <!-- Spinner -->
                <div
                    wire:loading
                    wire:target="newIcon"
                    class="absolute inset-0 flex items-center justify-center bg-white/80 rounded-lg z-10 p-x pt-6"
                >
                    <svg class="w-8 h-8 animate-spin text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 000 8v4a8 8 0 01-8-8z"></path>
                    </svg>
                </div>

                <label for="fileInput">Icon</label>

                <!-- Pratinjau gambar -->
                <img
                    src="{{ $newIcon ? $newIcon->temporaryUrl() : $icon }}"
                    class="h-32 md:h-40 rounded-lg cursor-pointer"
                    alt="Shortcut Icon"
                    @click="document.getElementById('fileInput').click()"
                />
            </div>

            <x-textarea wire:model="desc" label="Description" rows="2" />

            <x-slot:actions class="mt-2">
                <x-button label="Cancel" @click="$wire.editModal = false" />
                <x-button label="Submit" icon="o-paper-airplane" spinner="update" type="submit" class="btn-primary" />
            </x-slot:actions>
        </x-form>
    </x-modal>

</div>
