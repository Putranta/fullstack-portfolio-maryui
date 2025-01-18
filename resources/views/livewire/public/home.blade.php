<?php

use Livewire\Volt\Component;
use Livewire\Attributes\Layout;

new
#[Layout('components.layouts.public')]
class extends Component {
    //
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

                <div
                    class="bg-red-500 text-white py-2 px-4 rounded-sm flex gap-2 items-center motion-preset-blur-right hover:motion-preset-seesaw cursor-default">
                    <?xml version="1.0" encoding="UTF-8"?>
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="28px"
                        height="28px" viewBox="0 0 128 128" version="1.1">
                        <g id="surface1">
                            <path style=" stroke:none;fill-rule:nonzero;fill:#f1f1f1;fill-opacity:1;"
                                d="M 26.027344 0.136719 C 25.824219 0.214844 20.085938 3.484375 13.28125 7.394531 C 5.035156 12.136719 0.800781 14.632812 0.574219 14.867188 C 0.394531 15.070312 0.191406 15.421875 0.128906 15.644531 C -0.0429688 16.21875 -0.0546875 100.347656 0.117188 100.953125 C 0.179688 101.1875 0.382812 101.53125 0.566406 101.722656 C 1.011719 102.191406 50.238281 130.496094 50.835938 130.632812 C 51.113281 130.699219 51.425781 130.6875 51.734375 130.601562 C 52.40625 130.433594 101.503906 102.191406 101.941406 101.730469 C 102.121094 101.53125 102.324219 101.1875 102.390625 100.953125 C 102.476562 100.675781 102.507812 96.277344 102.507812 87.015625 L 102.507812 73.480469 L 114.476562 66.605469 C 125.761719 60.117188 126.453125 59.710938 126.742188 59.265625 L 127.039062 58.785156 L 127.039062 44.207031 C 127.039062 28.335938 127.070312 29.230469 126.441406 28.65625 C 126.273438 28.507812 120.523438 25.152344 113.652344 21.195312 L 101.171875 14.015625 L 99.785156 14.015625 L 87.574219 21.027344 C 80.851562 24.894531 75.136719 28.199219 74.859375 28.378906 C 74.582031 28.5625 74.25 28.902344 74.113281 29.148438 L 73.867188 29.574219 L 73.8125 43.308594 L 73.761719 57.046875 L 63.679688 62.855469 C 58.132812 66.042969 53.515625 68.683594 53.417969 68.707031 C 53.238281 68.757812 53.226562 67.449219 53.226562 42.203125 L 53.226562 15.632812 L 52.960938 15.175781 C 52.628906 14.621094 54.121094 15.507812 39.136719 6.894531 C 26.570312 -0.332031 26.871094 -0.179688 26.027344 0.136719 Z M 37.578125 10.65625 C 42.835938 13.671875 47.136719 16.167969 47.136719 16.199219 C 47.136719 16.230469 42.527344 18.894531 36.894531 22.132812 L 26.644531 28.015625 L 16.414062 22.132812 C 10.792969 18.894531 6.1875 16.230469 6.1875 16.199219 C 6.1875 16.167969 10.785156 13.503906 16.40625 10.273438 L 26.613281 4.402344 L 27.316406 4.785156 C 27.710938 5 32.332031 7.640625 37.578125 10.65625 Z M 110.730469 24.191406 C 116.265625 27.378906 120.84375 30.011719 120.886719 30.054688 C 121.003906 30.160156 100.703125 41.828125 100.425781 41.816406 C 100.148438 41.808594 80.097656 30.246094 80.105469 30.105469 C 80.117188 29.945312 100.289062 18.339844 100.492188 18.371094 C 100.585938 18.394531 105.195312 21.015625 110.730469 24.191406 Z M 14.828125 25.875 L 24.585938 31.492188 L 24.640625 59.304688 L 24.691406 87.121094 L 24.929688 87.496094 C 25.054688 87.695312 25.289062 87.964844 25.460938 88.089844 C 25.621094 88.207031 31.050781 91.300781 37.523438 94.953125 L 49.28125 101.59375 L 49.28125 113.359375 C 49.28125 119.816406 49.238281 125.113281 49.183594 125.113281 C 49.140625 125.113281 38.976562 119.296875 26.601562 112.175781 L 4.105469 99.238281 L 4.074219 59.464844 L 4.054688 19.703125 L 4.554688 19.980469 C 4.84375 20.132812 9.460938 22.785156 14.828125 25.875 Z M 49.28125 45.453125 L 49.28125 71.082031 L 48.886719 71.339844 C 48.351562 71.679688 28.8125 82.910156 28.746094 82.910156 C 28.714844 82.910156 28.691406 71.339844 28.691406 57.195312 L 28.703125 31.492188 L 38.910156 25.621094 C 44.523438 22.390625 49.152344 19.769531 49.207031 19.789062 C 49.246094 19.8125 49.28125 31.363281 49.28125 45.453125 Z M 88.222656 39.558594 L 98.453125 45.441406 L 98.453125 57.101562 C 98.453125 68.164062 98.441406 68.757812 98.273438 68.695312 C 98.164062 68.652344 93.535156 66 87.980469 62.800781 L 77.867188 56.992188 L 77.867188 45.335938 C 77.867188 38.917969 77.898438 33.675781 77.929688 33.675781 C 77.972656 33.675781 82.601562 36.320312 88.222656 39.558594 Z M 123.09375 45.261719 C 123.09375 51.644531 123.050781 56.910156 123.007812 56.960938 C 122.933594 57.078125 102.699219 68.738281 102.570312 68.738281 C 102.539062 68.738281 102.507812 63.496094 102.507812 57.078125 L 102.507812 45.421875 L 112.714844 39.546875 C 118.335938 36.320312 122.964844 33.675781 123.007812 33.675781 C 123.0625 33.675781 123.09375 38.886719 123.09375 45.261719 Z M 86.230469 66.46875 C 94.835938 71.421875 96.320312 72.308594 96.171875 72.425781 C 96.074219 72.488281 92.8125 74.363281 88.929688 76.582031 C 85.046875 78.796875 74.988281 84.53125 66.570312 89.328125 L 51.273438 98.054688 L 50.785156 97.789062 C 47.863281 96.191406 30.910156 86.546875 30.910156 86.472656 C 30.902344 86.3125 75.765625 60.53125 75.945312 60.597656 C 76.03125 60.628906 80.660156 63.269531 86.230469 66.46875 Z M 98.433594 87.558594 L 98.398438 99.238281 L 75.914062 112.175781 C 63.542969 119.296875 53.375 125.113281 53.324219 125.113281 C 53.269531 125.113281 53.226562 120.359375 53.226562 113.359375 L 53.226562 101.59375 L 75.765625 88.742188 C 88.148438 81.675781 98.324219 75.890625 98.378906 75.878906 C 98.421875 75.878906 98.441406 81.132812 98.433594 87.558594 Z M 98.433594 87.558594 " />
                        </g>
                    </svg>
                    Laravel
                </div>
                @for ($i = 0; $i < 20; $i++)
                    <div class="bg-base-200 py-2 px-3 rounded-md motion-preset-blur-right hover:motion-preset-seesaw ">
                        HTML
                    </div>
                @endfor
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

        @for ($i = 0; $i < 3; $i++)
            <div class="group mb-3 sm:mb-8 last:mb-12">
                <a href="detail.html">
                    <section
                        class="bg-white max-w-[42rem] border-base-200 border-2 rounded-lg overflow-hidden sm:pr-8 relative sm:h-[20rem] hover:bg-gray-200 transition sm:group-even:pl-8 dark:bg-base-100 dark:hover:bg-white/10">
                        <div
                            class="pt-4 pb-7 px-5 sm:pl-10 sm:pr-2 sm:pt-10 sm:max-w-[60%] flex flex-col h-full sm:group-even:ml-[15rem]">
                            <h3 class="text-2xl font-semibold">Title 1</h3>
                            <p class="mt-2 leading-relaxed">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Quidem vel possimus deleniti perferendis numquam, nobis
                                voluptate dolorum exercitationem repellendus.
                            </p>
                            <ul class="flex flex-wrap mt-4 gap-2 sm:mt-auto">
                                <li
                                    class="bg-black/[0.7] px-3 py-1 text-[0.7rem] uppercase tracking-wider text-white rounded-full">
                                    HTML
                                </li>
                                <li
                                    class="bg-black/[0.7] px-3 py-1 text-[0.7rem] uppercase tracking-wider text-white rounded-full">
                                    CSS
                                </li>
                                <li
                                    class="bg-black/[0.7] px-3 py-1 text-[0.7rem] uppercase tracking-wider text-white rounded-full">
                                    Next Js
                                </li>
                                <li
                                    class="bg-black/[0.7] px-3 py-1 text-[0.7rem] uppercase tracking-wider text-white rounded-full">
                                    Motion
                                </li>
                            </ul>
                        </div>

                        <img src="{{ asset('storage/project/ds2.jpg') }}" alt="" width="400" height="100"
                            class="absolute hidden sm:block top-8 -right-40 rounded-t-lg shadow-2xl transition group-hover:scale-[1.04] group-hover:-translate-x-3 group-hover:translate-y-3 group-hover:-rotate-2 group-even:group-hover:translate-x-3 group-even:group-hover:translate-y-3 group-even:group-hover:rotate-2 group-even:right-[initial] group-even:-left-40" />
                    </section>
                </a>
            </div>
        @endfor

        <div class="flex justify-center">
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

        <div class="grid grid-cols-1  gap-8 max-w-[42rem]">
            @for ($i = 0; $i < 5; $i++)
            <div class="border transition-all duration-500 rounded-lg relative group grid grid-cols-1 md:grid-cols-2 object-cover">
                <div class="cursor-pointer overflow-hidden rounded-t-lg md:rounded-r-none md:rounded-l-lg">
                  <Image
                    src="{{ asset('storage/project/ds2.jpg') }}"
                    alt=""
                    class="group-hover:scale-110 transition-all duration-500 h-full object-cover"
                  />
                </div>

                <div class="m-3 sm:p-3 flex flex-col">
                  <div class="flex justify-between items-center text-sm">
                    <p>2 Days ago</p>

                    <div class="flex items-center gap-3">
                      <p class="flex items-center gap-1">
                        <x-icon name="s-heart" class="text-gray-400" />
                        <span>2</span>
                      </p>

                      <p class="flex items-center gap-1">
                        <x-icon name="s-chat-bubble-left" class="text-gray-400" />
                        <span>3</span>
                      </p>
                    </div>
                  </div>

                  <a href={blog.url}>
                    <p class="my-2 lg:my-3 cursor-pointer  sm:text-lg font-medium">
                      Post Title
                    </p>
                  </a>

                  <p class="text-sm pb-6 line-clamp-3">
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Corrupti nobis voluptatibus, dolor nemo nostrum sunt quas ipsum perferendis, velit sapiente minima non tempore beatae. Minima rem perferendis animi repellat deserunt.
                  </p>

                  <div class="py-2">
                    <p class="mb-2 text-sm absolute right-5 bottom-2 text-right text-gray-600">5 Min Read</p>
                  </div>
                </div>
            </div>
            @endfor
        </div>

    </section>
</div>

<script src="https://cdn.jsdelivr.net/npm/motion@latest/dist/motion.js"></script>
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
</script>
