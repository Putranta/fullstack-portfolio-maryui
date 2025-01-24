<?php

use Livewire\Volt\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;
use App\Rules\NoSQLInjection;
use App\Models\Comment;
use Mary\Traits\Toast;
use Livewire\Attributes\Validate;

new
#[Layout('components.layouts.public')]
class extends Component {
    use Toast;
    #[Validate([
        'content' => [
            'required',
            'min:3',
            'max:255',
            new NoSQLInjection,
        ],
    ])]
    public string $content = '';

    public function logout(): void
    {
        Auth::logout();
    }

    public function comment(): void
    {
        if (!Auth::check()) {
            $this->fail('You must be logged in to post a comment.');
            return;
        }

        $data = $this->validate();
        $data['user_id'] = Auth::user()->id;

        Comment::create($data);
        $this->success('Comment posted');
        $this->content = '';
    }

    public function with(): array
    {
        return [
            'comments' => Comment::latest()->get(),
        ];
    }
}; ?>

@section('title', 'Putrantaswin | Guest')
<div>
    <section class="w-screen scroll-mt-28 mb-28 grid grid-cols-1 justify-center justify-items-center mt-0 md:mt-10">
        <div class="max-w-[42rem] w-full px-2">
            <x-header title="✨ Guests" size="text-xl md:text-4xl" class="mb-2" >
                <x-slot:actions>
                    @auth
                        <x-form wire:submit="logout">
                            <x-button label="Logout" icon="o-arrow-left-start-on-rectangle" spinner="logout" type="submit" class="btn-sm md:btn-md" />
                        </x-form>
                    @endauth
                    <x-theme-toggle class="btn btn-sm md:hidden btn-circle" />
                </x-slot:actions>
            </x-header>
            <hr>
        </div>

        <div class="md:mt-8 mt-6 w-full max-w-[42rem] px-2">
            @guest
            <div class="mb-4">
                <p>
                    What do you think about my project? Please log in to leave a comment.
                </p>
            </div>
            <div class="flex justify-start gap-4 items-center">
                <button
                    onclick="window.location.href='{{ route('oauth.redirect', ['provider' => 'github']) }}'"
                    class="btn btn-primary btn-sm md:btn-md">
                    <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" viewBox="0 0 16 16" id="github" class="w-5 h-5 md:w-6 md:h-6">
                        <path d="M7.999 0C3.582 0 0 3.596 0 8.032a8.031 8.031 0 0 0 5.472 7.621c.4.074.546-.174.546-.387 0-.191-.007-.696-.011-1.366-2.225.485-2.695-1.077-2.695-1.077-.363-.928-.888-1.175-.888-1.175-.727-.498.054-.488.054-.488.803.057 1.225.828 1.225.828.714 1.227 1.873.873 2.329.667.072-.519.279-.873.508-1.074-1.776-.203-3.644-.892-3.644-3.969 0-.877.312-1.594.824-2.156-.083-.203-.357-1.02.078-2.125 0 0 .672-.216 2.2.823a7.633 7.633 0 0 1 2.003-.27 7.65 7.65 0 0 1 2.003.271c1.527-1.039 2.198-.823 2.198-.823.436 1.106.162 1.922.08 2.125.513.562.822 1.279.822 2.156 0 3.085-1.87 3.764-3.652 3.963.287.248.543.738.543 1.487 0 1.074-.01 1.94-.01 2.203 0 .215.144.465.55.386A8.032 8.032 0 0 0 16 8.032C16 3.596 12.418 0 7.999 0z" fill="#fff"></path>
                      </svg>
                    Github
                </button>
                <button
                    onclick="window.location.href='{{ route('oauth.redirect', ['provider' => 'google']) }}'"
                    class="btn btn-outline btn-sm md:btn-md">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 128 128" class="w-5 h-5 md:w-6 md:h-6">><path fill="#fff" d="M44.59 4.21a63.28 63.28 0 004.33 120.9 67.6 67.6 0 0032.36.35 57.13 57.13 0 0025.9-13.46 57.44 57.44 0 0016-26.26 74.33 74.33 0 001.61-33.58H65.27v24.69h34.47a29.72 29.72 0 01-12.66 19.52 36.16 36.16 0 01-13.93 5.5 41.29 41.29 0 01-15.1 0A37.16 37.16 0 0144 95.74a39.3 39.3 0 01-14.5-19.42 38.31 38.31 0 010-24.63 39.25 39.25 0 019.18-14.91A37.17 37.17 0 0176.13 27a34.28 34.28 0 0113.64 8q5.83-5.8 11.64-11.63c2-2.09 4.18-4.08 6.15-6.22A61.22 61.22 0 0087.2 4.59a64 64 0 00-42.61-.38z"/><path fill="#e33629" d="M44.59 4.21a64 64 0 0142.61.37 61.22 61.22 0 0120.35 12.62c-2 2.14-4.11 4.14-6.15 6.22Q95.58 29.23 89.77 35a34.28 34.28 0 00-13.64-8 37.17 37.17 0 00-37.46 9.74 39.25 39.25 0 00-9.18 14.91L8.76 35.6A63.53 63.53 0 0144.59 4.21z"/><path fill="#f8bd00" d="M3.26 51.5a62.93 62.93 0 015.5-15.9l20.73 16.09a38.31 38.31 0 000 24.63q-10.36 8-20.73 16.08a63.33 63.33 0 01-5.5-40.9z"/><path fill="#587dbd" d="M65.27 52.15h59.52a74.33 74.33 0 01-1.61 33.58 57.44 57.44 0 01-16 26.26c-6.69-5.22-13.41-10.4-20.1-15.62a29.72 29.72 0 0012.66-19.54H65.27c-.01-8.22 0-16.45 0-24.68z"/><path fill="#319f43" d="M8.75 92.4q10.37-8 20.73-16.08A39.3 39.3 0 0044 95.74a37.16 37.16 0 0014.08 6.08 41.29 41.29 0 0015.1 0 36.16 36.16 0 0013.93-5.5c6.69 5.22 13.41 10.4 20.1 15.62a57.13 57.13 0 01-25.9 13.47 67.6 67.6 0 01-32.36-.35 63 63 0 01-23-11.59A63.73 63.73 0 018.75 92.4z"/></svg>
                    Google
                </button>
            </div>
            @endguest

            @auth
                <div class="mb-3">
                    <span>Hii, <span class="font-semibold">{{ Auth::user()->name }}</span>! What do you think about my project?</span>
                </div>

                <x-form wire:submit="comment">
                    <x-input wire:model="content">
                        <x-slot:append>
                            {{-- Add `rounded-s-none` class (RTL support) --}}
                            <x-button icon="o-paper-airplane" type="submit" class="btn-primary rounded-s-none" spinner="comment" />
                        </x-slot:append>
                    </x-input>
                </x-form>
            @endauth
            <div class="mt-4 md:mt-6 grid grid-cols-1 gap-3">
                @foreach ($comments as $item)
                    <div class="bg-base-200 px-3 md:px-6 py-1 md:py-2 rounded-lg">
                        <div class="flex justify-between items-center">
                            <span class="font-semibold">{{ $item->user->name }}</span>
                            <span class="md:text-sm text-xs">{{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</span>
                        </div>
                        <p>{{ $item->content }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</div>
