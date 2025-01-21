<?php

namespace App\Livewire\Components;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class PostPage extends Component
{
    public $posts;

    public function fetchPost()
    {
        try {
            $response = Http::get('https://dev.to/api/articles?username=putranta');
            if ($response->successful()) {
                $this->posts = $response->json();
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
            <div class="grid max-w-[42rem] w-full grid-cols-1 md:grid-cols-2 gap-8 :md:py-12 px-2">
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
        return view('livewire.components.post-page');
    }
}
