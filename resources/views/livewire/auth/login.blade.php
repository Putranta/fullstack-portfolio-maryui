<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new
#[Layout('components.layouts.empty')]       // <-- Here is the `empty` layout
#[Title('Login')]
class extends Component {

    #[Rule('required|email')]
    public string $email = '';

    #[Rule('required')]
    public string $password = '';

    public function mount()
    {
        // It is logged in
        if (auth()->user()) {
            return redirect('/aswin/dashboard');
        }
    }

    public function login()
    {
        $credentials = $this->validate();

        if (auth()->attempt($credentials)) {
            request()->session()->regenerate();

            return redirect()->intended('/aswin/dashboard');
        }

        $this->addError('email', 'The provided credentials do not match our records.');
    }
}?>

<div class="md:w-96 mx-auto mt-20">
    <div class="mb-10 w-full flex justify-center">
        <img src="/storage/logo.png" class="w-40" alt="">
    </div>

    <x-form wire:submit="login">
        <x-input label="E-mail" wire:model="email" icon="o-envelope" />
        <x-input label="Password" wire:model="password" type="password" icon="o-key" />

        <x-slot:actions>
            <x-button label="Create an account" class="btn-ghost" link="/register" />
            <x-button label="Login" type="submit" icon="o-paper-airplane" class="btn-primary" spinner="login" />
        </x-slot:actions>
    </x-form>
</div>
