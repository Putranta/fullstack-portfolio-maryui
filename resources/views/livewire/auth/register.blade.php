<?php

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Volt\Component;
use Illuminate\Support\Facades\Hash;

new
#[Layout('components.layouts.empty')]       // <-- The same `empty` layout
#[Title('Login')]
class extends Component {
    public User $user;

    #[Rule('required')]
    public string $name = '';

    #[Rule('required|email|unique:users')]
    public string $email = '';

    #[Rule('required|confirmed')]
    public string $password = '';

    #[Rule('required')]
    public string $password_confirmation = '';

    public function mount()
    {
        // It is logged in
        if (auth()->user()) {
            return redirect('/');
        }
    }

    public function register()
    {
        $data = $this->validate();

        $data['avatar'] = '/storage/user.png';
        $data['password'] = bcrypt($data['password']);
        $data['role'] = 'Aswinthedev';

        $user = User::create($data);

        auth()->login($user);

        request()->session()->regenerate();

        return redirect('/aswin/dashboard');
    }
} ?>

<div class="md:w-96 mx-auto mt-20">
    <div class="mb-6 w-full flex justify-center">
        <img src="/storage/logo.png" class="w-40" alt="">
    </div>

    <x-form wire:submit="register">
        <x-input label="Name" wire:model="name" icon="o-user" inline />
        <x-input label="E-mail" wire:model="email" icon="o-envelope" inline />
        <x-input label="Password" wire:model="password" type="password" icon="o-key" inline />
        <x-input label="Confirm Password" wire:model="password_confirmation" type="password" icon="o-key" inline />

        <x-slot:actions>
            <x-button label="Already registered?" class="btn-ghost" link="/login" />
            <x-button label="Register" type="submit" icon="o-paper-airplane" class="btn-primary" spinner="register" />
        </x-slot:actions>
    </x-form>
</div>
