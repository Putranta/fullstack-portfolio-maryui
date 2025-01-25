<?php

use Livewire\Volt\Component;
use App\Models\Gallery;
use Mary\Traits\Toast;
use Livewire\Attributes\Validate;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Imagick\Driver;

new class extends Component {
    use Toast, WithFileUploads;

    public Gallery $gallery;
    public bool $createModal = false;
    public bool $updateModal = false;
    public ?int $updateId = null;

    #[Validate('required|image|max:5048')]
    public $img;

    #[Validate('required')]
    public string $title = '';

    public function save(): void
    {
        $data = $this->validate();
        $data['slug'] = Str::slug($data['title']);

        if ($this->img) {
            $originalPath = $this->img->store('gallery/original', 'public');

            $manager = new ImageManager(new Driver());
            $image = $manager->read(Storage::disk('public')->path($originalPath));
            $image->scale(height: 200);

            $thumbnailPath = 'gallery/thumbnails/' . $this->img->hashName();
            $image->save(Storage::disk('public')->path($thumbnailPath));

            $data['img'] = Storage::url($originalPath);
            $data['thumbnail'] = Storage::url($thumbnailPath);
        }

        // Simpan data ke database
        Gallery::create($data);

        // Reset form dan beri notifikasi sukses
        $this->title = '';
        $this->img = '';
        $this->createModal = false;
        $this->success('New Gallery Created');
    }

    public function delete(Gallery $gallery): void
    {
        $path = str_replace('/storage', '', $gallery->img);
        $thumbnail = str_replace('/storage', '', $gallery->thumbnail);

        if (Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
            Storage::disk('public')->delete($thumbnail);
            $gallery->delete();
            $this->success('Gallery Deleted');
        } else {
            $this->warning('Image Not Found');
        }
    }


    public function edit(Gallery $gallery): void
    {
        $this->updateModal = true;
        $this->fill($gallery->toArray());
        $this->updateId = $gallery->id;
        $this->img = $gallery->thumbnail;
    }

    public function update(): void
    {
        $data = $this->validate(['title' => 'required']);
        $data['slug'] = Str::slug($data['title']);

        $galleryData = Gallery::find($this->updateId);
        $galleryData->update($data);

        $this->updateModal = false;
        $this->success('Gallery Updated');
        $this->title = '';
        $this->img = '';
        $this->updateId = null;
    }

    public function headers(): array
    {
        return [
            ['key' => 'img', 'label' => 'Img'],
            ['key' => 'title', 'label' => 'Title', 'class' => 'hidden lg:table-cell'],
            ['key' => 'like', 'label' => 'Lk'],
            ['key' => 'comment', 'label' => 'Cm'],
            ['key' => 'download', 'label' => 'Dl'],
            ['key' => 'action', 'label' => 'Action', 'class' => 'text-center']
        ];
    }

    public function with(): array
    {
        return [
            'headers' => $this->headers(),
            'galleries' => Gallery::latest()->get(),
        ];
    }
}; ?>

<div>
    <x-header title="Galleries" separator progress-indicator >
        <x-slot:actions>
            <x-button label="Tambah" @click="$wire.createModal = true"  responsive icon="o-plus" class="btn-primary" />
        </x-slot:actions>
    </x-header>

    <x-table :headers="$headers" :rows="$galleries">
        @scope('cell_img', $gallery)
            <img src="{{ $gallery->thumbnail }}" class="h-12" alt="">
        @endscope

        @scope('cell_action', $gallery)
            <x-button icon="o-pencil" wire:click="edit({{ $gallery->id }})"
                class="btn-ghost btn-sm text-black" spinner="edit({{ $gallery['id'] }})" />

            <x-button icon="o-trash" wire:click="delete({{ $gallery->id }})" wire:confirm="Are you sure?" spinner
                class="btn-ghost btn-sm text-red-500" />
        @endscope
    </x-table>

    <x-modal wire:model="createModal" title="Create Gallery" separator>
        <x-form wire:submit="save">
            <x-input wire:model="title" label="Title" />
            <x-file wire:model="img" accept="image/png, image/jpeg, image/jpg">
                <img src="/blank.jpg" class="h-52 rounded-lg" />
            </x-file>

            <x-slot:actions>
                <x-button label="Cancel" @click="$wire.createModal = false" />
                <x-button label="Save" icon="o-paper-airplane" spinner="save" type="submit" class="btn-primary" />
            </x-slot:actions>
        </x-form>
    </x-modal>

    <x-modal wire:model="updateModal" title="Update Gallery" separator>
        <x-form wire:submit="update">
            <x-input wire:model="title" label="Title" />

            <strong>Image Cannot be Change!</strong>
            <img src="{{ $img }}" alt="">

            <x-slot:actions>
                <x-button label="Cancel" @click="$wire.updateModal = false" />
                <x-button label="Submit" icon="o-paper-airplane" spinner="update" type="submit" class="btn-primary" />
            </x-slot:actions>
        </x-form>
    </x-modal>
</div>
