<?php

use Livewire\Volt\Component;
use Livewire\Attributes\Layout;
use App\Models\Project;

new
#[Layout('components.layouts.public')]
class extends Component {
    public Project $project;

    public function mount($slug)
    {
        $this->project = Project::where('slug', $slug)->first();
    }

    public function with():array
    {
        return [
            'projects' => $this->project,
        ];
    }

}; ?>

@push('script')
    {{-- PhotoSwipe --}}
    <script src="https://cdn.jsdelivr.net/npm/photoswipe@5.4.3/dist/umd/photoswipe.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/photoswipe@5.4.3/dist/umd/photoswipe-lightbox.umd.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/photoswipe@5.4.3/dist/photoswipe.min.css" rel="stylesheet">
@endpush

@php
    $images = json_decode($project->library, true);
    $urls = array_column($images, 'url');
@endphp

@section('title', $project->slug)

<div class="grid grid-cols-1 justify-center justify-items-center mb-16">
    <div class="fixed top-3 right-3 md:hidden z-50">
        <x-theme-toggle class="btn btn-sm md:btn-md btn-circle" />
    </div>
    <x-image-gallery :images="$urls" class="h-40 rounded-md md:mx-40" />

    <div class="max-w-[42rem] mt-6 md:mt-10">
        <x-header title="{{ $project->title }}" class="!mb-0 gap-1 text-2xl md:text-3xl" size="" />

        <div class="flex flex-wrap gap-2 justify-items-start items-start justify-start">
            @foreach ($project->techStack as $tech)
                <div class="flex gap-2 py-1 px-2 rounded-md items-center cursor-default"  style="background-color: {{ $tech->bg_color }}; width: fit-content;">
                    {!! $tech->svg !!}
                    <span style="color: {{ $tech->text_color }}">{{ $tech->name }}</span>
                </div>
            @endforeach
        </div>

        <div class="my-6 md:my-8 flex gap-4">
            @if ($project->demo_url)
                <a href="{{ $project->demo_url }}" target="_blank" class="flex items-center gap-1 hover:gap-3 rounded-md bg-gradient-to-r from-pink-500 to-violet-600 px-3 md:px-8 py-2  text-center text-xs md:text-sm font-medium uppercase tracking-wider text-white no-underline transition-all duration-300 ease-out md:font-semibold" style="width: fit-content;">
                    <span>Demo</span>
                    <x-icon name="o-arrow-right" />
                </a>
            @endif

            @if ($project->github_url)
                <a href="{{ $project->github_url }}" target="_blank" class="flex items-center gap-3 hover:gap-4 rounded-md bg-gradient-to-r from-blue-800 to-violet-600 px-3 md:px-8 py-2  text-center text-xs md:text-sm font-medium uppercase tracking-wider text-white no-underline transition-all duration-300 ease-out md:font-semibold" style="width: fit-content;">
                    <span>Github</span>

                        <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" viewBox="0 0 16 16" id="github" width="24px" height="24px">
                            <path d="M7.999 0C3.582 0 0 3.596 0 8.032a8.031 8.031 0 0 0 5.472 7.621c.4.074.546-.174.546-.387 0-.191-.007-.696-.011-1.366-2.225.485-2.695-1.077-2.695-1.077-.363-.928-.888-1.175-.888-1.175-.727-.498.054-.488.054-.488.803.057 1.225.828 1.225.828.714 1.227 1.873.873 2.329.667.072-.519.279-.873.508-1.074-1.776-.203-3.644-.892-3.644-3.969 0-.877.312-1.594.824-2.156-.083-.203-.357-1.02.078-2.125 0 0 .672-.216 2.2.823a7.633 7.633 0 0 1 2.003-.27 7.65 7.65 0 0 1 2.003.271c1.527-1.039 2.198-.823 2.198-.823.436 1.106.162 1.922.08 2.125.513.562.822 1.279.822 2.156 0 3.085-1.87 3.764-3.652 3.963.287.248.543.738.543 1.487 0 1.074-.01 1.94-.01 2.203 0 .215.144.465.55.386A8.032 8.032 0 0 0 16 8.032C16 3.596 12.418 0 7.999 0z" fill="#fff"></path>
                          </svg>

                </a>
            @endif
        </div>

        <div class="prose">
            {!! $project->desc !!}
        </div>
    </div>
</div>
