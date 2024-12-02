<div>
    <label for="harga">Harga:</label>
    <input type="number" id="harga" wire:model="harga" step="any">

    <label for="volume">Volume:</label>
    <input type="number" id="volume" wire:model="volume" step="any">

    <h2>PPN: {{ $ppn }}%</h2>

    <!-- Menampilkan hasil perhitungan jumlah -->
    <h2>Jumlah: {{ number_format($jumlah, 2) }}</h2>
</div>
