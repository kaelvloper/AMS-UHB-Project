<?php

namespace App\Livewire;

use App\Models\Kjm;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;

class KjmTable extends Component
{
    use WithPagination;

    public $search = '';
    public $status = '';

    protected $listeners = ['kjm-updated' => '$refresh'];

    #[On('filters-updated')]
    public function updateFilters($filters)
    {
        $this->search = $filters['search'];
        $this->status = $filters['status'];
        $this->resetPage();
    }

    public function deleteKjm($id)
    {
        $kjm = Kjm::find($id);
        if ($kjm) {
            $kjm->delete();
            $this->dispatch('kjm-updated');
            $this->dispatch('toast', ['message' => 'Data KJM berhasil dihapus!', 'type' => 'success']);
        }
    }

    public function render()
    {
        $kjms = Kjm::with('dosen')
            ->when($this->search, function ($query) {
                $query->where('mata_kuliah', 'like', '%' . $this->search . '%')
                    ->orWhere('dosen_pengampu', 'like', '%' . $this->search . '%')
                    ->orWhereHas('dosen', function ($q) {
                        $q->where('nama', 'like', '%' . $this->search . '%');
                    });
            })
            ->when($this->status, function ($query) {
                $query->where('status_realisasi', $this->status);
            })
            ->latest()
            ->paginate(10);

        return view('livewire.kjm-table', [
            'kjms' => $kjms
        ]);
    }
}
