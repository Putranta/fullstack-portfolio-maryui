<?php

namespace App\Livewire\Components;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Posts extends Component
{
    public $posts;

    public function fetchPost()
    {
        try {
            $response = Http::get('https://dev.to/api/articles?username=putranta');
            if ($response->successful()) {
                $this->posts = array_slice($response->json(), 0, 5);
            }
        } catch (\Exception $e) {
            $this->posts = [];
        }
    }

    public function mount()
    {
        $this->fetchPost();
    }

    public function placeholder()
    {
        return <<<'HTML'
        <div class="grid max-w-[42rem] w-full grid-cols-1 md:grid-cols-2 gap-6">
            <div class="skeleton h-60"></div>
            <div class="flex flex-col gap-6">
                <div class="skeleton h-6 w-28"></div>
                <div class="skeleton h-6 w-full"></div>
                <div class="skeleton h-6 w-full"></div>
                <div class="skeleton h-6 w-full"></div>
            </div>
        </div>
        HTML;
    }


    public function render()
    {
        return view('livewire.components.posts');
    }
}
