<?php

use Livewire\Volt\Component;
use Livewire\Attributes\Layout;
use App\Models\Project;

new
#[Layout('components.layouts.public')]
class extends Component {
    public function with(): array
    {
        return [
            'projects' => Project::all(),
        ];
    }
}; ?>

<div class="w-screen grid grid-cols-1 justify-center justify-items-center mt-0 md:mt-10">
    <div class="max-w-[42rem] w-full px-2">
        <x-header title="⚡ Projects" size="text-xl md:text-4xl" class="mb-2" >
            <x-slot:actions>
                <x-theme-toggle class="btn btn-sm md:hidden btn-circle" />
            </x-slot:actions>
        </x-header>
        <hr>
    </div>

    <section class="-scroll-mt-16 mb-28 card-container grid grid-cols-1 justify-center justify-items-center md:mt-12 mt-8 px-2">
        @foreach ($projects as $project)
            <div class="group mb-3 sm:mb-8">
                @php
                    $image = json_decode($project->library, true)[0]
                @endphp
                <a href="/project/{{$project->slug}}" wire:navigate>
                    <section
                        class="bg-white md:w-[42rem] border-base-200 border-2 rounded-lg overflow-hidden sm:pr-8 relative hover:bg-gray-200 transition sm:group-even:pl-8 dark:bg-base-100 dark:hover:bg-white/10 shadow-md md:pb-6 pb-3">
                        <div
                            class="py-4 px-5 sm:pl-10 sm:pr-2 sm:pt-8 sm:max-w-[60%] flex flex-col h-full sm:group-even:ml-[15rem]">
                            <h3 class="text-xl font-semibold">{{ $project->title }}
                                @if ($project->demo_url)
                                <x-badge value="With Demo" class="bg-secondary bg-opacity-50" />
                                @endif
                                @if ($project->github_url)
                                <x-badge value="With SC" class="bg-primary bg-opacity-50" />
                                @endif
                            </h3>
                            <p class="my-3 line-clamp-3">
                                {{ strip_tags($project->desc) }}
                            </p>
                            <div class="flex flex-wrap gap-2 justify-items-start items-start justify-start">
                                @foreach ($project->techStack as $tech)
                                    <div class="flex gap-2 px-2 rounded-md items-center cursor-default"  style="background-color: {{ $tech->bg_color }}; width: fit-content;">
                                        <span style="color: {{ $tech->text_color }}">{{ $tech->name }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <img src="{{ $image['url'] }}" alt="" width="400" height="100"
                            class="absolute hidden sm:block top-8 -right-40 rounded-t-lg shadow-2xl transition group-hover:scale-[1.04] group-hover:-translate-x-3 group-hover:translate-y-3 group-hover:-rotate-2 group-even:group-hover:translate-x-3 group-even:group-hover:translate-y-3 group-even:group-hover:rotate-2 group-even:right-[initial] group-even:-left-40" />
                    </section>
                </a>
            </div>
        @endforeach
    </section>
</div>



