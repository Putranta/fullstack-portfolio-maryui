<?php

use App\Models\User;
use Illuminate\Support\Collection;
use Livewire\Volt\Component;
use Mary\Traits\Toast;

new class extends Component {
    use Toast;

    public string $search = '';

    public bool $drawer = false;

    public array $sortBy = ['column' => 'name', 'direction' => 'asc'];

    // Clear filters
    public function clear(): void
    {
        $this->reset();
        $this->success('Filters cleared.', position: 'toast-bottom');
    }

    // Delete action
    public function delete(User $user): void
    {
        $user->delete();
        $this->warning('User Deleted');
    }

    // Table headers
    public function headers(): array
    {
        return [
            ['key' => 'id', 'label' => '#', 'class' => 'w-1'],
            ['key' => 'name', 'label' => 'Name', 'class' => 'w-64'],
            ['key' => 'email', 'label' => 'E-mail'],
            ['key' => 'action', 'label' => 'Action']
        ];
    }

    /**
     * For demo purpose, this is a static collection.
     *
     * On real projects you do it with Eloquent collections.
     * Please, refer to maryUI docs to see the eloquent examples.
     */

    public function with(): array
    {
        return [
            'users' => User::latest()->get(),
            'headers' => $this->headers()
        ];
    }
}; ?>

<div>
    <!-- HEADER -->
    <x-header title="Hello" separator progress-indicator>
    </x-header>

    <x-table :headers="$headers" :rows="$users" :sort-by="$sortBy">
        @scope('cell_action', $user)
           @if ($user->role == 'guest')
           <x-button icon="o-trash" wire:click="delete({{ $user->id }})" wire:confirm="Are you sure?" spinner
            class="btn-ghost btn-sm text-red-500" />
           @endif
        @endscope
    </x-table>
</div>
