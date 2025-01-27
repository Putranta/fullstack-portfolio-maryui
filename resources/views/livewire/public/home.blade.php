<?php

use Livewire\Volt\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Http;
use App\Models\TechStack;
use App\Models\Project;
use App\Models\Profile;
use App\Models\Shortcut;

new
#[Layout('components.layouts.public')]
class extends Component {
    public function with(): array
    {
        return [
            'techs' => TechStack::all(),
            'projects' => Project::where('is_featured', true)->get(),
            'profile' => Profile::first(),
            'shortcut' => Shortcut::latest()->get(),
        ];
    }
}; ?>

@section('title', 'Putrantaswin | Home')

<div>
    <div class="fixed top-3 right-3 md:hidden z-50">
        <x-theme-toggle class="btn btn-sm md:btn-md btn-circle" />
    </div>

    <section id="about" class="max-w-[42rem] mt-6 sm:mt-10 card-container">
        <div class="flex mx-auto gap-3 sm:gap-6 items-center">
            <img src="{{ $profile->img }}" alt=""
                class="w-12 h-28 sm:w-28 sm:h-full object-cover rounded-lg">
            <div class="text-xs sm:text-base">
                {!! $profile->about !!}
            </div>
        </div>
        @if ($profile->github OR $profile->instagram)
            <div class="flex gap-1 md:gap-4 mt-4">
                @if ($profile->github)
                    <a href="{{ $profile->github }}" target="_blank" class="btn btn-ghost">
                        <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" viewBox="0 0 16 16" id="github" class="w-5 h-5 md:w-6 md:h-6">
                            <path d="M7.999 0C3.582 0 0 3.596 0 8.032a8.031 8.031 0 0 0 5.472 7.621c.4.074.546-.174.546-.387 0-.191-.007-.696-.011-1.366-2.225.485-2.695-1.077-2.695-1.077-.363-.928-.888-1.175-.888-1.175-.727-.498.054-.488.054-.488.803.057 1.225.828 1.225.828.714 1.227 1.873.873 2.329.667.072-.519.279-.873.508-1.074-1.776-.203-3.644-.892-3.644-3.969 0-.877.312-1.594.824-2.156-.083-.203-.357-1.02.078-2.125 0 0 .672-.216 2.2.823a7.633 7.633 0 0 1 2.003-.27 7.65 7.65 0 0 1 2.003.271c1.527-1.039 2.198-.823 2.198-.823.436 1.106.162 1.922.08 2.125.513.562.822 1.279.822 2.156 0 3.085-1.87 3.764-3.652 3.963.287.248.543.738.543 1.487 0 1.074-.01 1.94-.01 2.203 0 .215.144.465.55.386A8.032 8.032 0 0 0 16 8.032C16 3.596 12.418 0 7.999 0z"></path>
                        </svg>
                        <span>Putranta</span>
                    </a>
                @endif
                @if ($profile->instagram)
                    <a href="{{ $profile->instagram }}" target="_blank" class="btn btn-ghost">
                        <svg class="w-5 h-5 md:w-6 md:h-6" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            viewBox="0 0 551.034 551.034" xml:space="preserve">
                        <g id="XMLID_13_">

                                <linearGradient id="XMLID_2_" gradientUnits="userSpaceOnUse" x1="275.517" y1="4.5714" x2="275.517" y2="549.7202" gradientTransform="matrix(1 0 0 -1 0 554)">
                                <stop  offset="0" style="stop-color:#E09B3D"/>
                                <stop  offset="0.3" style="stop-color:#C74C4D"/>
                                <stop  offset="0.6" style="stop-color:#C21975"/>
                                <stop  offset="1" style="stop-color:#7024C4"/>
                            </linearGradient>
                            <path id="XMLID_17_" style="fill:url(#XMLID_2_);" d="M386.878,0H164.156C73.64,0,0,73.64,0,164.156v222.722
                                c0,90.516,73.64,164.156,164.156,164.156h222.722c90.516,0,164.156-73.64,164.156-164.156V164.156
                                C551.033,73.64,477.393,0,386.878,0z M495.6,386.878c0,60.045-48.677,108.722-108.722,108.722H164.156
                                c-60.045,0-108.722-48.677-108.722-108.722V164.156c0-60.046,48.677-108.722,108.722-108.722h222.722
                                c60.045,0,108.722,48.676,108.722,108.722L495.6,386.878L495.6,386.878z"/>

                                <linearGradient id="XMLID_3_" gradientUnits="userSpaceOnUse" x1="275.517" y1="4.5714" x2="275.517" y2="549.7202" gradientTransform="matrix(1 0 0 -1 0 554)">
                                <stop  offset="0" style="stop-color:#E09B3D"/>
                                <stop  offset="0.3" style="stop-color:#C74C4D"/>
                                <stop  offset="0.6" style="stop-color:#C21975"/>
                                <stop  offset="1" style="stop-color:#7024C4"/>
                            </linearGradient>
                            <path id="XMLID_81_" style="fill:url(#XMLID_3_);" d="M275.517,133C196.933,133,133,196.933,133,275.516
                                s63.933,142.517,142.517,142.517S418.034,354.1,418.034,275.516S354.101,133,275.517,133z M275.517,362.6
                                c-48.095,0-87.083-38.988-87.083-87.083s38.989-87.083,87.083-87.083c48.095,0,87.083,38.988,87.083,87.083
                                C362.6,323.611,323.611,362.6,275.517,362.6z"/>

                                <linearGradient id="XMLID_4_" gradientUnits="userSpaceOnUse" x1="418.306" y1="4.5714" x2="418.306" y2="549.7202" gradientTransform="matrix(1 0 0 -1 0 554)">
                                <stop  offset="0" style="stop-color:#E09B3D"/>
                                <stop  offset="0.3" style="stop-color:#C74C4D"/>
                                <stop  offset="0.6" style="stop-color:#C21975"/>
                                <stop  offset="1" style="stop-color:#7024C4"/>
                            </linearGradient>
                            <circle id="XMLID_83_" style="fill:url(#XMLID_4_);" cx="418.306" cy="134.072" r="34.149"/>
                        </g>
                        </svg>
                        <span>artswin_</span>
                    </a>
                @endif
            </div>
        @endif
        <div class="my-3 pb-6 rounded-lg shadow-md motion-preset-blur-right  motion-duration-1000">
            <picture id="theme-picture">
                <img src="https://raw.githubusercontent.com/Putranta/Putranta/output/github-snake-dark.svg" alt="github-snake" class="hidden dark:block">
                <img alt="github-snake" class="dark:hidden"
                    src="https://raw.githubusercontent.com/Putranta/Putranta/output/github-snake.svg" />
            </picture>
        </div>

    </section>

    <section id="app" class="grid grid-cols-1 justify-center justify-items-center mt-14">
        <div class="max-w-[42rem] w-full card-container">
            <x-header title="👨‍💻 Tech Stack" separator class="mb-4" size="text-2xl md:text-4xl" />

            <div class="flex skill flex-wrap gap-2 justify-items-start items-start justify-start">
                @foreach ($techs as $tech)
                    <div class="flex gap-2 py-1 px-2 md:px-4 rounded-sm items-center cursor-default hover:motion-preset-seesaw click:motion-preset-seesaw "  style="background-color: {{ $tech->bg_color }}; width: fit-content;">
                        {!! $tech->svg !!}
                        <span style="color: {{ $tech->text_color }}">{{ $tech->name }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section id="app" class="grid grid-cols-1 justify-center justify-items-center mt-14 ">
        <div class="max-w-[42rem] w-full card-container">
            <x-header title="🚀 App Shortcut" separator class="mb-4" size="text-2xl md:text-4xl" />

            <div class="grid grid-cols-3 md:grid-cols-4 gap-3 md:gap-6 ">
                @foreach ($shortcut as $sc)
                    <a href="{{ $sc->url }}" target="_blank">
                        <div
                            class="app p-0 md:p-3 rounded-lg flex flex-col items-center justify-items-center justify-center transition-all duration-500 hover:scale-110 dark:hover:bg-white/10 hover:bg-gray-200">
                            <img src="{{ $sc->icon}}" alt="">
                            <span class="text-center text-sm">{{ $sc->name }}</span>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>


    <section class="scroll-mt-28 mb-28 card-container grid grid-cols-1 justify-center justify-items-center mt-20">
        <div class="max-w-[42rem] w-full">
            <x-header title="⚡ Projects" separator class="mb-4" size="text-2xl md:text-4xl" />
        </div>

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

        <div class="flex justify-center mt-10">
            <a href="/project" wire:navigate class="flex items-center gap-1 hover:gap-3 rounded-full bg-gradient-to-r from-pink-500 to-violet-600 px-3 md:px-8 py-3 md:py-4 text-center text-xs md:text-sm font-medium uppercase tracking-wider text-white no-underline transition-all duration-300 ease-out md:font-semibold">
                <span>View More</span>
                <x-icon name="o-arrow-right" />
            </a>
        </div>

    </section>

    <section class="scroll-mt-28 mb-28 grid grid-cols-1 justify-center justify-items-center mt-20">
        <div class="max-w-[42rem] w-full">
            <x-header title="📖 Posts" separator class="mb-4" size="text-2xl md:text-4xl" />
        </div>

        <livewire:components.posts lazy="on-load" />

    </section>
</div>

<script src="https://cdn.jsdelivr.net/npm/motion@latest/dist/motion.js"></script>
<script>
    function initMotionScroll() {
        const { animate, scroll } = Motion;

        // Seleksi elemen dengan class card-container > div
        document.querySelectorAll(".card-container > div").forEach((item) => {
            scroll(
                animate(item, {
                    scale: [0.7, 1, 1, 1],
                    duration: 1.5, // Durasi animasi dalam detik
                    easing: "ease-in-out",
                }), {
                    target: item,
                    offset: ["start end", "end end", "start start", "end start"],
                }
            );
        });
    }

    // Inisialisasi saat halaman selesai dimuat
    document.addEventListener("DOMContentLoaded", () => {
        initMotionScroll();
    });

    // Re-inisialisasi setiap navigasi Livewire
    window.addEventListener("livewire:navigate", () => {
        initMotionScroll();
    });
</script>



