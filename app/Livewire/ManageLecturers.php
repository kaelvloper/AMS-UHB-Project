<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\Lecturer;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class ManageLecturers extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $full_name, $title, $nidn, $study_program, $status = 'Tetap', $profile_photo, $lecturer_id;
    public $search = '';
    public $filter_status = '';
    public $isModalOpen = false;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingFilterStatus()
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = Lecturer::query();

        if ($this->search) {
            $query->where(function ($q) {
                $q->where('full_name', 'like', '%' . $this->search . '%')
                  ->orWhere('nidn', 'like', '%' . $this->search . '%')
                  ->orWhere('study_program', 'like', '%' . $this->search . '%');
            });
        }

        if ($this->filter_status) {
            $query->where('status', $this->filter_status);
        }

        $lecturers = $query->paginate(10);

        return view('livewire.manage-lecturers', [
            'lecturers' => $lecturers,
        ])->layout('layouts.app');
    }

    public function create()
    {
        $this->resetCreateForm();
        $this->openModal();
    }

    public function openModal()
    {
        $this->isModalOpen = true;
    }

    public function closeModal()
    {
        $this->isModalOpen = false;
        $this->resetValidation();
    }

    private function resetCreateForm()
    {
        $this->full_name = '';
        $this->title = '';
        $this->nidn = '';
        $this->study_program = '';
        $this->status = 'Tetap';
        $this->profile_photo = null;
        $this->lecturer_id = null;
    }

    public function store()
    {
        $this->validate([
            'full_name' => 'required',
            'nidn' => 'required|unique:lecturers,nidn,' . $this->lecturer_id,
            'study_program' => 'required',
            'status' => 'required|in:Tetap,LB',
            'profile_photo' => 'nullable|image|max:1024', // 1MB Max
        ]);

        $data = [
            'full_name' => $this->full_name,
            'title' => $this->title,
            'nidn' => $this->nidn,
            'study_program' => $this->study_program,
            'status' => $this->status,
        ];

        if ($this->profile_photo && !is_string($this->profile_photo)) {
            $data['profile_photo'] = $this->profile_photo->store('profile-photos', 'public');
        }

        Lecturer::updateOrCreate(['id' => $this->lecturer_id], $data);

        session()->flash('message', $this->lecturer_id ? 'Data Dosen berhasil diperbarui.' : 'Data Dosen berhasil ditambahkan.');
        
        $this->closeModal();
        $this->resetCreateForm();
    }

    public function edit($id)
    {
        $lecturer = Lecturer::findOrFail($id);
        $this->lecturer_id = $id;
        $this->full_name = $lecturer->full_name;
        $this->title = $lecturer->title;
        $this->nidn = $lecturer->nidn;
        $this->study_program = $lecturer->study_program;
        $this->status = $lecturer->status;
        $this->profile_photo = $lecturer->profile_photo;

        $this->openModal();
    }

    public function delete($id)
    {
        Lecturer::find($id)->delete();
        session()->flash('message', 'Data Dosen berhasil dihapus.');
    }
}
