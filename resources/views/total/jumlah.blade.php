<!-- Form Input -->
<input type="number" id="volume" placeholder="Volume">
<input type="number" id="harga" placeholder="Harga Satuan">
<input type="number" id="ppn" value="11" placeholder="PPN (%)"> <!-- Default PPN 11% -->

<!-- Container untuk menampilkan hasil -->
<div id="jumlah-container">
    Jumlah: <span id="jumlah">0</span>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    function calculateJumlah() {
        const volume = $('#volume').val();
        const harga = $('#harga').val();
        const ppn = $('#ppn').val();

        $.ajax({
            url: '{{ route('hitung.jumlah') }}',
            method: 'GET',
            data: {
                volume: volume,
                harga: harga,
                ppn: ppn
            },
            success: function(response) {
                $('#jumlah').text(response.jumlah); // Update jumlah di container
            },
            error: function() {
                $('#jumlah').text('Error'); // Handle error jika perlu
            }
        });
    }

    // Trigger AJAX saat input berubah
    $('#volume, #harga, #ppn').on('input', calculateJumlah);
});
</script>
