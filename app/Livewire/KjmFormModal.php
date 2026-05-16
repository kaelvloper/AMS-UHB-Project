<?php

namespace App\Livewire;

use App\Models\Kjm;
use App\Models\Dosen;
use Livewire\Component;
use Livewire\Attributes\On;

class KjmFormModal extends Component
{
    public $isOpen = false;
    public $kjmId = null;

    // Form Fields
    public $mata_kuliah = '';
    public $dosen_id = '';
    public $dosen_pengampu = '';
    public $nim = '';
    public $jumlah_pertemuan = 14;
    public $is_online = false;
    public $is_offline = false;
    public $dosen_koordinator = '';
    public $status_realisasi = 'Belum';

    protected $rules = [
        'mata_kuliah' => 'required|min:3',
        'jumlah_pertemuan' => 'required|numeric|min:1|max:20',
        'status_realisasi' => 'required|in:Terealisasi,Berjalan,Belum',
    ];

    #[On('openModal')]
    public function openModal()
    {
        $this->resetValidation();
        $this->resetFields();
        $this->isOpen = true;
    }

    #[On('editKjm')]
    public function editKjm($id)
    {
        $this->resetValidation();
        $this->kjmId = $id;
        $kjm = Kjm::find($id);

        $this->mata_kuliah = $kjm->mata_kuliah;
        $this->dosen_id = $kjm->dosen_id;
        $this->dosen_pengampu = $kjm->dosen_pengampu;
        $this->nim = $kjm->nim;
        $this->jumlah_pertemuan = $kjm->jumlah_pertemuan;
        $this->is_online = $kjm->is_online;
        $this->is_offline = $kjm->is_offline;
        $this->dosen_koordinator = $kjm->dosen_koordinator;
        $this->status_realisasi = $kjm->status_realisasi;

        $this->isOpen = true;
    }

    public function resetFields()
    {
        $this->kjmId = null;
        $this->mata_kuliah = '';
        $this->dosen_id = '';
        $this->dosen_pengampu = '';
        $this->nim = '';
        $this->jumlah_pertemuan = 14;
        $this->is_online = false;
        $this->is_offline = false;
        $this->dosen_koordinator = '';
        $this->status_realisasi = 'Belum';
    }

    public function save()
    {
        $this->validate();

        $data = [
            'mata_kuliah' => $this->mata_kuliah,
            'dosen_id' => $this->dosen_id ?: null,
            'dosen_pengampu' => $this->dosen_pengampu,
            'nim' => $this->nim,
            'jumlah_pertemuan' => $this->jumlah_pertemuan,
            'is_online' => $this->is_online,
            'is_offline' => $this->is_offline,
            'dosen_koordinator' => $this->dosen_koordinator,
            'status_realisasi' => $this->status_realisasi,
        ];

        if ($this->kjmId) {
            Kjm::find($this->kjmId)->update($data);
            $message = 'Data KJM berhasil diperbarui!';
        } else {
            Kjm::create($data);
            $message = 'Data KJM berhasil ditambahkan!';
        }

        $this->isOpen = false;
        $this->dispatch('kjm-updated');
        $this->dispatch('toast', ['message' => $message, 'type' => 'success']);
    }

    public function render()
    {
        return view('livewire.kjm-form-modal', [
            'dosens' => Dosen::all()
        ]);
    }
}
