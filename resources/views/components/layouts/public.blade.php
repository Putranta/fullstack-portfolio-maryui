<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', config('app.name'))</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script>document.documentElement.classList.add('js')</script>
    @stack('script')
</head>
<body class="min-h-screen font-sans antialiased text-base-content relative ">
    {{-- <div class="bg-[#fbe2e3] absolute top-[-6rem] flex-1 -z-[10] right-[11rem] h-[31.25rem] w-[31.25rem] rounded-full blur-[10rem] sm:w-[68.75rem] dark:bg-[#946263]"></div>
    <div class="bg-[#dbd7fb] absolute top-[-1rem] -z-[10]  flex-1 left-[-35rem] h-[31.25rem] w-[50rem] rounded-full blur-[10rem] sm:w-[68.75rem] md:left-[-33rem] lg:left-[-28rem] xl:left-[-15rem] 2xl:left-[-5rem] dark:bg-[#676394]"></div> --}}

    <x-navbar/>

    <livewire:components.visitor-count />

    <div class="fixed hidden md:block bottom-5 right-5 z-50">
        <x-theme-toggle class="btn btn-sm md:btn-md btn-circle" />
    </div>
    {{-- MAIN --}}
    <main class="flex flex-col items-center pt-4 sm:pt-20 md:pt-28 px-4 justify-items-center">
        {{ $slot }}
    </main>

    {{--  TOAST area --}}
    <x-toast />

    <script>
        let lastScrollY = window.scrollY;
        const threshold = 70; // Jarak scroll tertentu sebelum navbar hilang

        window.addEventListener("scroll", () => {
            const navbar = document.getElementById("navbar");
            const navbarMobile = document.getElementById("navbar-mobile");

            if (window.scrollY > threshold && window.scrollY > lastScrollY) {
            // Jika scroll lebih dari threshold dan scroll ke bawah
            navbar.style.opacity = "0";
            navbarMobile.style.opacity = "0";
            } else if (window.scrollY < lastScrollY) {
            // Jika scroll ke atas
            navbar.style.opacity = "1";
            navbarMobile.style.opacity = "1";
            }

            lastScrollY = window.scrollY;
        });
    </script>

    {{--  TOAST area --}}
    <x-toast />

    @stack('b-script')
</body>
</html>
