<?php

namespace App\Livewire;

use Livewire\Component;

class DataDosen extends Component
{
    public function render()
    {
        // Memberitahu Livewire untuk menggunakan layout milik Jetstream
        return view('livewire.data-dosen')->layout('layouts.app');
    }
}