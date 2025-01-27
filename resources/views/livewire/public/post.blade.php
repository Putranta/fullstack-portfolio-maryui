<?php

use Livewire\Volt\Component;
use Livewire\Attributes\Layout;

new
#[Layout('components.layouts.public')]
class extends Component {
    //
}; ?>

@section('title', 'Putrantaswin | Post')

<div>
    <section class="w-screen scroll-mt-28 mb-28 grid grid-cols-1 justify-center justify-items-center mt-0 md:mt-10">
        <div class="max-w-[42rem] w-full px-2 md:px-0 md:mb-12 mb-8">
            <x-header title="📖 Posts" size="text-xl md:text-4xl" class="mb-2" >
                <x-slot:actions>
                    <x-theme-toggle class="btn btn-sm md:hidden btn-circle" />
                </x-slot:actions>
            </x-header>
            <hr>
        </div>

        <livewire:components.postPage lazy="on-load" />

    </section>
</div>


