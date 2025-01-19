<?php

use Livewire\Volt\Component;
use Livewire\Attributes\Rule;
use Mary\Traits\Toast;
use App\Models\TechStack;
use Illuminate\Support\Str;

new class extends Component {
    use Toast;
    public bool $createModal = false;
    public bool $updateModal = false;
    public ?int $updateId = null;

    public TechStack $tech;

    #[Rule('required')]
    public string $name = '';

    #[Rule('required')]
    public ?string $svg = null;

    #[Rule('required')]
    public string $bg_color = '';

    #[Rule('required')]
    public string $text_color = '';

    public function headers(): array
    {
        return [
            ['key' => 'svg', 'label' => '#Badge'],
            ['key' => 'name', 'label' => 'Name'],
            ['key' => 'bg_color', 'label' => 'Bg Color'],
            ['key' => 'text_color', 'label' => 'Text Color'],
            ['key' => 'action', 'label' => 'Action', 'class' => 'text-center']
        ];
    }

    public function with(): array
    {
        return [
            'headers' => $this->headers(),
            'techs' => TechStack::latest()->get(),
        ];
    }

    public function resetField()
    {
        $this->name = '';
        $this->svg = null;
        $this->bg_color = '';
        $this->text_color = '';
        $this->updateId = null;
    }

    public function save(): void
    {
        $data = $this->validate();
        $data['slug'] = Str::slug($data['name']);

        TechStack::create($data);

        $this->createModal = false;
        $this->resetField();
        $this->success('Tech Stack Created');
    }

    public function delete(TechStack $tech): void
    {
        $tech->delete();
        $this->warning("$tech->name deleted", position: 'toast-bottom');
    }

    public function edit($tech): void
    {
        $this->updateModal = true;
        $data = TechStack::find($tech);
        $this->fill($data->toArray());
        $this->updateId = $data->id;
    }

    public function update(): void
    {
        $data = $this->validate();
        $data['slug'] = Str::slug($data['name']);

        $techData = TechStack::find($this->updateId);
        $techData->update($data);

        $this->updateModal = false;
        $this->success('Tech Stack Updated');
        $this->resetField();
    }


}; ?>

<div>
    <x-header title="Tech Stack" separator progress-indicator >
        <x-slot:actions>
            <x-button label="Tambah" @click="$wire.createModal = true" responsive icon="o-plus" class="btn-primary" />
        </x-slot:actions>
    </x-header>

    <x-card>
        <x-table :headers="$headers" :rows="$techs"  class="text-base">
            @scope('cell_svg', $tech)
                <div class="flex gap-2 py-1 px-4 rounded-md items-center"  style="background-color: {{ $tech->bg_color }}; width: fit-content;">
                    {!! $tech->svg !!}
                    <span style="color: {{ $tech->text_color }}">{{ $tech->name }}</span>
                </div>
            @endscope

            @scope('cell_bg_color', $tech)
                <div class="flex gap-2 items-center">
                    <div class="w-6 h-6 rounded-md shadow-md" style="background-color: {{ $tech->bg_color }}; "></div>
                    <span>{{ $tech->bg_color }}</span>
                </div>
            @endscope

            @scope('cell_text_color', $tech)
                <div class="flex gap-2 items-center">
                    <div class="w-6 h-6 rounded-md shadow-md" style="background-color:{{ $tech->text_color }}"></div>
                    <span>{{ $tech->text_color }}</span>
                </div>
            @endscope

            @scope('cell_action', $tech)
                <x-button icon="o-pencil" wire:click="edit({{ $tech->id }})"
                    class="btn-ghost btn-sm text-black" spinner="edit({{ $tech['id'] }})" />

                <x-button icon="o-trash" wire:click="delete({{ $tech->id }})" wire:confirm="Are you sure?" spinner
                    class="btn-ghost btn-sm text-red-500" />
            @endscope
        </x-table>
    </x-card>


    <x-modal wire:model="createModal" title="Create Tech Stack" separator>
        <x-form wire:submit="save">
            <x-input label="Tech Stack Name" wire:model="name" inline/>

            <x-textarea
                label="SVG"
                wire:model="svg"
                rows="4"
                inline />

            <div class="flex gap-4">
                <x-colorpicker wire:model="bg_color" label="Bg-color" inline />
                <x-colorpicker wire:model="text_color" label="Text-color" inline />
            </div>

            <x-slot:actions>
                <x-button label="Cancel" @click="$wire.createModal = false" />
                <x-button label="Submit" icon="o-paper-airplane" spinner="save" type="submit" class="btn-primary" />
            </x-slot:actions>
        </x-form>
    </x-modal>

    <x-modal wire:model="updateModal" title="Update Tech Stack" separator>
        <x-form wire:submit="update">
            <x-input label="Tech Stack Name" wire:model="name" inline/>

            <x-textarea
                label="SVG"
                wire:model="svg"
                rows="4"
                inline />

            <div class="flex gap-4">
                <x-colorpicker wire:model="bg_color" label="Bg-color" inline />
                <x-colorpicker wire:model="text_color" label="Text-color" inline />
            </div>

            <x-slot:actions>
                <x-button label="Cancel" @click="$wire.updateModal = false" />
                <x-button label="Submit" icon="o-paper-airplane" spinner="update" type="submit" class="btn-primary" />
            </x-slot:actions>
        </x-form>
    </x-modal>
</div>
