<div id="navbar" class="fixed hidden md:block top-4 left-1/2 transform -translate-x-1/2 z-50 transition-all duration-700">
    <nav
        class="flex items-center space-x-3 bg-white/30 backdrop-blur-md px-3 py-3 text-base sm:text-lg rounded-full shadow-md border border-white/20">
        <x-navitem url="{{ route('home') }}" active="{{ request()->routeIs('home') }}">
            <x-icon name="o-home" /> Home
        </x-navitem>
        <x-navitem url="{{ route('project') }}" active="{{ request()->routeIs('project') OR request()->routeIs('project-detail') }}">
            <x-icon name="o-code-bracket" /> Projects
        </x-navitem>
        <x-navitem url="{{ route('post') }}" active="{{ request()->routeIs('post') }}">
            <x-icon name="o-book-open" /> Posts
        </x-navitem>
        <x-navitem url="{{ route('gallery') }}" active="{{ request()->routeIs('gallery') }}">
            <x-icon name="o-photo" /> Gallery
        </x-navitem>
        <x-navitem url="{{ route('guest') }}" active="{{ request()->routeIs('guest') }}">
            <x-icon name="o-chat-bubble-bottom-center-text" /> Guest
        </x-navitem>
    </nav>
</div>

<div id="navbar-mobile" class="fixed block md:hidden bottom-2 left-1/2 transform -translate-x-1/2 z-50 transition-all duration-700">
    <nav
        class="flex w-full items-center space-x-6 bg-white/30 backdrop-blur-md px-4 sm:px-8 py-2 rounded-full text-base sm:text-lg shadow-md border border-white/20">
        <x-navitem url="{{ route('home') }}" active="{{ request()->routeIs('home') }}">
            <x-icon name="o-home" />
        </x-navitem>
        <x-navitem url="{{ route('project') }}" active="{{ request()->routeIs('project') OR request()->routeIs('project-detail') }}">
            <x-icon name="o-code-bracket" />
        </x-navitem>
        <x-navitem url="{{ route('post') }}" active="{{ request()->routeIs('post') }}">
            <x-icon name="o-book-open" />
        </x-navitem>
        <x-navitem url="{{ route('gallery') }}" active="{{ request()->routeIs('gallery') }}">
            <x-icon name="o-photo" />
        </x-navitem>
        <x-navitem url="{{ route('guest') }}" active="{{ request()->routeIs('guest') }}">
            <x-icon name="o-chat-bubble-bottom-center-text" />
        </x-navitem>

    </nav>
</div>
