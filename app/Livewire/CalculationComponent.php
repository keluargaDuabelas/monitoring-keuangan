<?php

namespace App\Livewire;

use Livewire\Component;

class CalculationComponent extends Component
{
    public $harga = 0;    // Properti untuk harga
    public $volume = 0;   // Properti untuk volume
    public $ppn = 11;     // Properti untuk PPN
    public $jumlah = 0;   // Properti untuk hasil perhitungan

    // Fungsi untuk menghitung total setiap kali harga atau volume diubah
    public function updated($field)
    {
        if ($field === 'harga' || $field === 'volume') {
            $this->calculateTotal();
        }
    }

    // Fungsi untuk menghitung jumlah
    public function calculateTotal()
    {
        $total = $this->harga * $this->volume;
        $this->jumlah = $total + ($total * $this->ppn / 100);
    }

    // Fungsi render
    public function render()
    {
        return view('livewire.calculation-component');
    }
}
