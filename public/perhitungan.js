document.addEventListener('DOMContentLoaded', function () {
    function calculateTotal() {
        // Ambil nilai dari input volume, harga, dan ppn
        const volume = parseFloat(document.querySelector('[wire\\:model="data.volume"]').value) || 0;
        const harga = parseFloat(document.querySelector('[wire\\:model="data.harga"]').value) || 0;
        const ppn = parseFloat(document.querySelector('[wire\\:model="data.ppn"]').value) || 0;

        // Hitung jumlah (volume * harga) + PPN
        const subtotal = volume * harga;
        const total = subtotal + (subtotal * (ppn / 100));

        // Set nilai field jumlah
        document.querySelector('[wire\\:model="data.jumlah"]').value = total.toFixed(2);
    }

    // Tambahkan event listener untuk perubahan field volume, harga, atau ppn
    document.querySelector('[wire\\:model="data.volume"]').addEventListener('input', calculateTotal);
    document.querySelector('[wire\\:model="data.harga"]').addEventListener('input', calculateTotal);
    document.querySelector('[wire\\:model="data.ppn"]').addEventListener('input', calculateTotal);
});
