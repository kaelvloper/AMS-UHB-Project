<?php

namespace App\Livewire;

use App\Models\Kjm;
use Livewire\Component;
use Livewire\Attributes\On;

class KjmStats extends Component
{
    public $stats = [];

    public function mount()
    {
        $this->loadStats();
    }

    #[On('kjm-updated')]
    public function loadStats()
    {
        $this->stats = [
            'total' => Kjm::count(),
            'berjalan' => Kjm::where('status_realisasi', 'Berjalan')->count(),
            'selesai' => Kjm::where('status_realisasi', 'Terealisasi')->count(),
            'belum' => Kjm::where('status_realisasi', 'Belum')->count(),
            'total_dosen' => Kjm::distinct('dosen_pengampu')->count('dosen_pengampu'),
        ];
    }

    public function render()
    {
        return view('livewire.kjm-stats');
    }
}
