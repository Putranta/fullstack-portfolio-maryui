<?php

use Livewire\Volt\Component;
use App\Models\Comment;
use Mary\Traits\Toast;

new class extends Component {
    use Toast;

    public function headers(): array
    {
        return [
            ['key' => 'user.name', 'label' => 'Username'],
            ['key' => 'content', 'label' => 'Comment'],
            ['key' => 'created_at', 'label' => 'Time'],
            ['key' => 'action', 'label' => 'Action']
        ];
    }

    public function with(): array
    {
        return [
            'headers' => $this->headers(),
            'comments' => Comment::latest()->get(),
        ];
    }

    public function delete(Comment $comment): void
    {
        $comment->delete();
        $this->warning("Comment deleted", position: 'toast-bottom');
    }
}; ?>

<div>
    <x-header title="Guest Comments" separator progress-indicator >
    </x-header>

    <x-table :headers="$headers" :rows="$comments">
        @scope('cell_created_at', $comment)
            {{ \Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}
        @endscope

        @scope('cell_action', $comment)
            <x-button icon="o-trash" wire:click="delete({{ $comment->id }})" wire:confirm="Are you sure?" spinner
                class="btn-ghost btn-sm text-red-500" />
        @endscope
    </x-table>
</div>
