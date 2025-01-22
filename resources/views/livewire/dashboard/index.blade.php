<?php

use Livewire\Volt\Component;
use App\Models\Visitor;
use Carbon\Carbon;
use App\Models\User;
use Livewire\WithPagination;
use App\Models\Comment;

new class extends Component {
    use WithPagination;
    protected $listeners = ['refresh' => '$refresh'];

    public $days;

    public function with(): array
    {
        return [
            'visitorCount' => Visitor::count(),
            'onlineVisitor' => Visitor::where('last_activity', '>=', Carbon::now()->subMinutes(5))->count(),
            'userCount' => User::count(),
            'commentCount' => Comment::count(),
        ];
    }

}; ?>


<div>
    <x-header title="Dashboard" separator />

   <div class="grid grid-cols-2 md:grid-cols-4 gap-3 md:gap-8" wire:poll.5s>
        <x-stat title="Visitor Count" value="{{ $visitorCount }}" icon="o-face-smile" />
        <x-stat title="Online Visitor" value="{{ $onlineVisitor }}" color="text-success" icon="o-face-smile" />
        <x-stat title="Users" value="{{ $userCount }}" icon="o-user" />
        <x-stat title="Comments" value="{{ $commentCount }}" icon="o-chat-bubble-bottom-center-text" />
   </div>

   <x-card class="mt-10 ">
    <picture id="theme-picture">
        <img alt="github-snake"
            src="https://raw.githubusercontent.com/Putranta/Putranta/output/github-snake.svg" />
    </picture>


   </x-card>
</div>
