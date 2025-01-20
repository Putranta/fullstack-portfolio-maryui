<?php

use Livewire\Volt\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Http;
use App\Models\TechStack;
use App\Models\Project;

new
#[Layout('components.layouts.public')]
class extends Component {
    public function with(): array
    {
        return [
            'techs' => TechStack::all(),
            'projects' => Project::where('is_featured', true)->get(),
        ];
    }
}; ?>

<div>

    <section id="about" class="max-w-[42rem] mt-6 sm:mt-10 card-container">
        <div class="flex mx-auto gap-3 sm:gap-6 items-center">
            <img src="{{ asset('storage/putra.jpg') }}" alt=""
                class="w-12 h-28 sm:w-28 sm:h-full object-cover rounded-lg">
            <div class="text-xs sm:text-base">
                Hii 👋 I'm Putranta, a Junior Software Engineer and Fullstack Web Developer passionate about crafting
                impactful applications from the ground up. 🚀<br><br>🌱 Keep learning and stay updated.<br>🤝 Let's
                collaborate and create something amazing! 🌐✨
            </div>
        </div>
        <div class="my-8 pb-6 rounded-lg shadow-md motion-preset-blur-right  motion-duration-1000">
            <picture id="theme-picture">
                <img alt="github-snake"
                    src="https://raw.githubusercontent.com/Putranta/Putranta/output/github-snake.svg" />
            </picture>
        </div>
    </section>

    <section id="app" class="grid grid-cols-1 justify-center justify-items-center mt-14">
        <div class="max-w-[42rem] w-full card-container">
            <x-header title="👨‍💻 Tech Stack" separator class="mb-4" />

            <div class="flex skill flex-wrap gap-2 justify-items-start items-start justify-start">
                @foreach ($techs as $tech)
                    <div class="flex gap-2 py-1 px-4 rounded-sm items-center cursor-default hover:motion-preset-seesaw click:motion-preset-seesaw "  style="background-color: {{ $tech->bg_color }}; width: fit-content;">
                        {!! $tech->svg !!}
                        <span style="color: {{ $tech->text_color }}">{{ $tech->name }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section id="app" class="grid grid-cols-1 justify-center justify-items-center mt-14 ">
        <div class="max-w-[42rem] w-full card-container">
            <x-header title="🚀 App Shortcut" separator class="mb-4" />

            <div class="grid grid-cols-3 md:grid-cols-4 gap-3 md:gap-6 ">
                <a href="https://cybersense.putrantaswin.my.id/" target="_blank">
                    <div
                        class="app p-3 rounded-lg shadow-md flex flex-col items-center justify-items-center justify-center transition-all duration-500 hover:scale-110 dark:hover:bg-white/10 hover:bg-gray-200">
                        <img src="{{ asset('storage/app-icon/app1.png') }}" alt="">
                        <span class="text-center text-sm">CyberSense UMKM</span>
                    </div>
                </a>

                <a href="https://cybersense.putrantaswin.my.id/" target="_blank">
                    <div
                        class="app p-3 rounded-lg shadow-md flex flex-col items-center justify-items-center justify-center transition-all duration-500 hover:scale-110">
                        <img src="{{ asset('storage/app-icon/app2.png') }}" alt="">
                        <span class="text-center text-sm">CyberSense UMKM</span>
                    </div>
                </a>

                <a href="https://cybersense.putrantaswin.my.id/" target="_blank">
                    <div
                        class="app p-3 rounded-lg shadow-md flex flex-col items-center justify-items-center justify-center transition-all duration-500 hover:scale-110">
                        <img src="{{ asset('storage/app-icon/app3.png') }}" alt="">
                        <span class="text-center text-sm">CyberSense UMKM</span>
                    </div>
                </a>

                <a href="https://cybersense.putrantaswin.my.id/" target="_blank">
                    <div
                        class="app p-3 rounded-lg shadow-md flex flex-col items-center justify-items-center justify-center transition-all duration-500 hover:scale-110">
                        <img src="{{ asset('storage/app-icon/app1.png') }}" alt="">
                        <span class="text-center text-sm">CyberSense UMKM</span>
                    </div>
                </a>
            </div>
        </div>
    </section>


    <section class="scroll-mt-28 mb-28 card-container grid grid-cols-1 justify-center justify-items-center mt-20">
        <div class="max-w-[42rem] w-full">
            <x-header title="⚡ Projects" separator class="mb-4" />
        </div>

        @foreach ($projects as $project)
            <div class="group mb-3 sm:mb-8">
                @php
                    $image = json_decode($project->library, true)[0]
                @endphp
                <a href="/project/{{$project->slug}}" wire:navigate>
                    <section
                        class="bg-white md:w-[42rem] border-base-200 border-2 rounded-lg overflow-hidden sm:pr-8 relative sm:h-[20rem] hover:bg-gray-200 transition sm:group-even:pl-8 dark:bg-base-100 dark:hover:bg-white/10">
                        <div
                            class="pt-4 pb-7 px-5 sm:pl-10 sm:pr-2 sm:pt-8 sm:max-w-[60%] flex flex-col h-full sm:group-even:ml-[15rem]">
                            <h3 class="text-xl font-semibold">{{ $project->title }}</h3>
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
            <x-header title="📖 Posts" separator class="mb-4" />
        </div>

        <livewire:components.posts lazy />

    </section>
</div>

@push('b-script')
{{-- <script src="https://cdn.jsdelivr.net/npm/motion@latest/dist/motion.js"></script>
<script>
    const {
        animate,
        scroll
    } = Motion
    document.querySelectorAll(".card-container > div").forEach((item) => {
        scroll(
            animate(item, {
                scale: [0.7, 1, 1, 1],
                duration: 1.5, // Tambahkan durasi animasi (dalam detik)
                easing: "ease-in-out",
            }), {
                target: item,
                offset: ["start end", "end end", "start start", "end start"],
            }
        );
    });

    function updatePictureTheme() {
        const theme = document.documentElement.getAttribute("data-theme"); // Ambil tema saat ini
        const imgElement = document.querySelector("#theme-picture img");

        if (theme === "dark") {
            imgElement.src = "https://raw.githubusercontent.com/Putranta/Putranta/output/github-snake-dark.svg";
        } else {
            imgElement.src = "https://raw.githubusercontent.com/Putranta/Putranta/output/github-snake.svg";
        }
    }

    // Panggil fungsi pertama kali untuk inisialisasi
    updatePictureTheme();

    // Pantau perubahan tema
    const observer = new MutationObserver(() => {
        updatePictureTheme();
    });

    // Perhatikan perubahan atribut `data-theme` pada elemen <html>
    observer.observe(document.documentElement, {
        attributes: true,
        attributeFilter: ["data-theme"],
    });
</script> --}}
@endpush


