<?php

namespace App\Livewire;

use Livewire\Component;

class KjmFilterSection extends Component
{
    public $search = '';
    public $status = '';

    public function updated()
    {
        $this->notifyFilters();
    }

    public function resetFilters()
    {
        $this->search = '';
        $this->status = '';
        $this->notifyFilters();
    }

    protected function notifyFilters()
    {
        $this->dispatch('filters-updated', [
            'search' => $this->search,
            'status' => $this->status,
        ]);
    }

    public function exportPdf()
    {
        // Placeholder for PDF export logic
        $this->dispatch('toast', ['message' => 'Laporan PDF sedang diproses...', 'type' => 'success']);
    }

    public function exportExcel()
    {
        // Placeholder for Excel export logic
        $this->dispatch('toast', ['message' => 'Laporan Excel sedang diproses...', 'type' => 'success']);
    }

    public function render()
    {
        return view('livewire.kjm-filter-section');
    }
}
