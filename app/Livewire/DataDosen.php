<?php

namespace App\Livewire;

use App\Models\Dosen;
use Livewire\Component;
use Livewire\WithPagination;

class DataDosen extends Component
{
    use WithPagination;

    // Search and Filters
    public $search = '';
    public $filterStatus = '';
    public $filterStatusAktif = '';

    // Form fields
    public $dosenId;
    public $nidn;
    public $nama;
    public $gelar;
    public $program_studi;
    public $jabatan_akademik;
    public $status = 'Tetap';
    public $status_aktif = 'Aktif';
    public $foto;

    // Modals
    public $isModalOpen = false;
    public $isDeleteModalOpen = false;
    public $isEditMode = false;

    protected function rules()
    {
        return [
            'nidn' => 'required|numeric|digits_between:8,15|unique:dosens,nidn,' . $this->dosenId,
            'nama' => 'required|string|max:255',
            'gelar' => 'required|string|max:100',
            'program_studi' => 'required|string|max:255',
            'jabatan_akademik' => 'required|string|max:255',
            'status' => 'required|in:Tetap,LB',
            'status_aktif' => 'required|in:Aktif,Cuti',
        ];
    }

    protected $messages = [
        'nidn.required' => 'NIDN/NIK wajib diisi.',
        'nidn.numeric' => 'NIDN/NIK harus berupa angka.',
        'nidn.digits_between' => 'NIDN/NIK harus berukuran antara 8 sampai 15 digit.',
        'nidn.unique' => 'NIDN/NIK sudah digunakan oleh dosen lain.',
        'nama.required' => 'Nama dosen wajib diisi.',
        'gelar.required' => 'Gelar dosen wajib diisi.',
        'program_studi.required' => 'Program studi wajib diisi.',
        'jabatan_akademik.required' => 'Jabatan akademik wajib diisi.',
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingFilterStatus()
    {
        $this->resetPage();
    }

    public function updatingFilterStatusAktif()
    {
        $this->resetPage();
    }

    public function openModal()
    {
        $this->resetValidation();
        $this->resetForm();
        $this->isEditMode = false;
        $this->isModalOpen = true;
    }

    public function closeModal()
    {
        $this->isModalOpen = false;
        $this->resetForm();
    }

    public function resetForm()
    {
        $this->dosenId = null;
        $this->nidn = '';
        $this->nama = '';
        $this->gelar = '';
        $this->program_studi = '';
        $this->jabatan_akademik = '';
        $this->status = 'Tetap';
        $this->status_aktif = 'Aktif';
        $this->foto = null;
    }

    public function store()
    {
        $validatedData = $this->validate();

        Dosen::create($validatedData);

        session()->flash('message', 'Data dosen berhasil ditambahkan!');

        $this->closeModal();
    }

    public function edit($id)
    {
        $this->resetValidation();
        $dosen = Dosen::findOrFail($id);

        $this->dosenId = $dosen->id;
        $this->nidn = $dosen->nidn;
        $this->nama = $dosen->nama;
        $this->gelar = $dosen->gelar;
        $this->program_studi = $dosen->program_studi;
        $this->jabatan_akademik = $dosen->jabatan_akademik;
        $this->status = $dosen->status;
        $this->status_aktif = $dosen->status_aktif;
        $this->foto = $dosen->foto;

        $this->isEditMode = true;
        $this->isModalOpen = true;
    }

    public function update()
    {
        $validatedData = $this->validate();

        $dosen = Dosen::findOrFail($this->dosenId);
        $dosen->update($validatedData);

        session()->flash('message', 'Data dosen berhasil diperbarui!');

        $this->closeModal();
    }

    public function confirmDelete($id)
    {
        $this->dosenId = $id;
        $this->isDeleteModalOpen = true;
    }

    public function closeDeleteModal()
    {
        $this->isDeleteModalOpen = false;
        $this->dosenId = null;
    }

    public function destroy()
    {
        Dosen::findOrFail($this->dosenId)->delete();

        session()->flash('message', 'Data dosen berhasil dihapus!');

        $this->closeDeleteModal();
    }

    public function render()
    {
        $query = Dosen::query();

        if ($this->search) {
            $query->where(function ($q) {
                $q->where('nama', 'like', '%' . $this->search . '%')
                  ->orWhere('nidn', 'like', '%' . $this->search . '%')
                  ->orWhere('program_studi', 'like', '%' . $this->search . '%');
            });
        }

        if ($this->filterStatus !== '') {
            $query->where('status', $this->filterStatus);
        }

        if ($this->filterStatusAktif !== '') {
            $query->where('status_aktif', $this->filterStatusAktif);
        }

        $dosens = $query->orderBy('nama', 'asc')->paginate(10);

        return view('livewire.data-dosen', [
            'dosens' => $dosens,
        ])->layout('layouts.app');
    }
}
