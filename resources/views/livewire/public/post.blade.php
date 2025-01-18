<?php

use Livewire\Volt\Component;
use Livewire\Attributes\Layout;

new
#[Layout('components.layouts.public')]
class extends Component {
    //
}; ?>

<div>
    <section id="app" class="grid grid-cols-1 justify-center justify-items-center mt-14">
        <div class="max-w-[42rem] w-full">
            <x-header title="posts" separator />
        </div>
    </section>
</div>
