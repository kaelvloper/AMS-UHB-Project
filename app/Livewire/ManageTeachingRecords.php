<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\TeachingRecord;
use Livewire\WithPagination;

class ManageTeachingRecords extends Component
{
    use WithPagination;

    public $lecturer_id, $course_name, $semester, $date, $credit_hours, $uts_method = 'CBT', $uts_student_count = 0, $uas_method = 'CBT', $uas_student_count = 0, $material, $record_id;
    public $isModalOpen = false;

    public function render()
    {
        $records = TeachingRecord::with('lecturer')->latest()->get();
        $all_lecturers = \App\Models\Lecturer::orderBy('full_name')->get();
        
        return view('livewire.manage-teaching-records', [
            'records' => $records,
            'all_lecturers' => $all_lecturers,
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
        $this->lecturer_id = '';
        $this->course_name = '';
        $this->semester = '';
        $this->date = '';
        $this->credit_hours = '';
        $this->uts_method = 'CBT';
        $this->uts_student_count = 0;
        $this->uas_method = 'CBT';
        $this->uas_student_count = 0;
        $this->material = '';
        $this->record_id = null;
    }

    public function store()
    {
        $this->validate([
            'lecturer_id' => 'required|exists:lecturers,id',
            'course_name' => 'required|string|max:255',
            'semester' => 'required|string|max:255',
            'credit_hours' => 'required|integer|min:1',
            'uts_method' => 'required|string',
            'uts_student_count' => 'required|integer|min:0',
            'uas_method' => 'required|string',
            'uas_student_count' => 'required|integer|min:0',
            'date' => 'nullable|date',
            'material' => 'nullable|string',
        ]);

        TeachingRecord::updateOrCreate(['id' => $this->record_id], [
            'lecturer_id' => $this->lecturer_id,
            'course_name' => $this->course_name,
            'semester' => $this->semester,
            'date' => $this->date ?: null,
            'credit_hours' => $this->credit_hours,
            'uts_method' => $this->uts_method,
            'uts_student_count' => $this->uts_student_count,
            'uas_method' => $this->uas_method,
            'uas_student_count' => $this->uas_student_count,
            'material' => $this->material ?: null,
        ]);

        session()->flash('message', $this->record_id ? 'Rekap Pengajaran berhasil diperbarui.' : 'Rekap Pengajaran berhasil ditambahkan.');
        $this->closeModal();
        $this->resetCreateForm();
    }

    public function edit($id)
    {
        $record = TeachingRecord::findOrFail($id);
        $this->record_id = $id;
        $this->lecturer_id = $record->lecturer_id;
        $this->course_name = $record->course_name;
        $this->semester = $record->semester;
        $this->date = $record->date;
        $this->credit_hours = $record->credit_hours;
        $this->uts_method = $record->uts_method;
        $this->uts_student_count = $record->uts_student_count;
        $this->uas_method = $record->uas_method;
        $this->uas_student_count = $record->uas_student_count;
        $this->material = $record->material;

        $this->openModal();
    }

    public function delete($id)
    {
        TeachingRecord::find($id)->delete();
        session()->flash('message', 'Rekap Pengajaran berhasil dihapus.');
    }
}
