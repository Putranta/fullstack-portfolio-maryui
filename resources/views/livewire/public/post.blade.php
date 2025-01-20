<?php

use Livewire\Volt\Component;
use Livewire\Attributes\Layout;

new
#[Layout('components.layouts.public')]
class extends Component {
    //
}; ?>

<div>
    <section class="w-screen scroll-mt-28 mb-28 grid grid-cols-1 justify-center justify-items-center mt-0 md:mt-10">
        <div class="max-w-[42rem] w-full px-2 md:px-0">
            <x-header title="📖 Posts" size="text-xl md:text-4xl" class="mb-2" />
            <hr>
        </div>

        <div class="md:mt-12 mt-8">
            <livewire:components.postPage lazy />
        </div>


    </section>
</div>


