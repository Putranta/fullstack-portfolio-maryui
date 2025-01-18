<?php

use Livewire\Volt\Component;
use Livewire\Attributes\Layout;

new
#[Layout('components.layouts.public')]
class extends Component {
    //
}; ?>

<div class="w-screen md:hidden grid grid-cols-1 justify-center justify-items-center">
    <div class="max-w-[42rem] w-full px-2">
        <x-header title="Projects" size="text-xl" class="mb-2" />
        <hr>
    </div>
</div>
