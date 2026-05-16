<?php

namespace App\Livewire;

use App\Models\Dosen;
use Livewire\Component;
use Livewire\WithPagination;

class DataDosen extends Component
{
    use WithPagination;

    public $search = '';
    public $status = '';

    public function render()
    {
        $dosens = Dosen::query()
            ->when($this->search, function ($query) {
                $query->where('nama', 'like', '%' . $this->search . '%')
                    ->orWhere('nidn', 'like', '%' . $this->search . '%');
            })
            ->when($this->status && $this->status !== 'Semua Status', function ($query) {
                $query->where('status', $this->status);
            })
            ->latest()
            ->paginate(10);

        return view('livewire.data-dosen', [
            'dosens' => $dosens
        ])->layout('layouts.app');
    }
}