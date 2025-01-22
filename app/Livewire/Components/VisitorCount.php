<?php

namespace App\Livewire\Components;

use Livewire\Component;
use Illuminate\Support\Facades\Request;
use App\Models\Visitor;
use Carbon\Carbon;
use Livewire\WithPagination;

class VisitorCount extends Component
{
    use WithPagination;

    public $visitorCount;
    public $onlineVisitors;

    protected $listeners = ['refresh' => '$refresh'];

    public function mount()
    {
        $this->updateVisitorActivity();
        $this->updateCounts();
    }

    public function updateVisitorActivity()
    {
        $ipAddress = Request::ip();
        $today = now()->toDateString();

        // Cek apakah IP sudah ada hari ini
        $visitor = Visitor::where('ip_address', $ipAddress)
            ->whereDate('created_at', $today)
            ->first();

        if ($visitor) {
            $visitor->update(['last_activity' => now()]);
        } else {
            Visitor::create([
                'ip_address' => $ipAddress,
                'last_activity' => now(),
            ]);
        }
    }

    public function updateCounts()
    {
        // Hitung total pengunjung
        $this->visitorCount = Visitor::count();

        // Hitung pengunjung yang online (dalam 5 menit terakhir)
        $this->onlineVisitors = Visitor::where('last_activity', '>=', Carbon::now()->subMinutes(5))->count();
    }


    public function render()
    {
        $this->updateCounts();
        return view('livewire.components.visitor-count');
    }
}
