<?php

use Livewire\Volt\Component;
use App\Models\Profile;
use Mary\Traits\Toast;
use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;

new class extends Component {
    use Toast, WithFileUploads;

    public Profile $profile;
    public $oldImg;

    #[Validate('required')]
    public ?string $about;

    #[Validate('required')]
    public $img;

    #[Validate('nullable')]
    public ?string $github = '';

    #[Validate('nullable')]
    public ?string $instagram = '';

    public function mount()
    {
        $this->profile = Profile::first();
        $this->oldImg = $this->profile->img;
        $this->fill($this->profile->toArray());
    }

    public function with(): array
    {
        return [
            'profile' => Profile::first(),
        ];
    }

    public function save(): void
    {
        $data = $this->validate();

        if ($this->img && $data['img'] != $this->oldImg) {
            $oldPath = str_replace('/storage', '', $this->oldImg);
            if (Storage::disk('public')->exists($oldPath)) {
                Storage::disk('public')->delete($oldPath);
            } else {
                $this->warning('Image Not Found');
            }
            // Simpan gambar asli
            $path = $this->img->store('profile', 'public');
            $data['img'] = Storage::url($path);
        }

        $this->profile->update($data);
        $this->success('Profile updated');
    }
}; ?>

<div class="mb-12">
    <x-header title="Profile" separator progess-indicator />

    <x-form wire:submit="save" >
        <x-file wire:model="img" accept="image/png, image/jpeg">
            <img src="{{ $profile->img ?? '/blank.jpg' }}" class="h-40 rounded-lg" />
        </x-file>
        <div class="mb-4">
            <x-editor wire:model="about" label="About"  />
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6 mb-4">
            <x-input wire:model="github" label="Github Url" />
            <x-input wire:model="instagram" label="Instagram Url" />
        </div>
        <x-slot:actions class="mb-12">
            <x-button label="Submit" icon="o-paper-airplane" spinner="save" type="submit" class="btn-primary" />
         </x-slot:actions>
    </x-form>
</div>

@push('script')
    {{-- TinyMCE --}}
    <script src="https://cdn.tiny.cloud/1/ltx2i0i5ckkd0qz95tu9sep4j77rh4z81zizib19cnst238a/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
@endpush
