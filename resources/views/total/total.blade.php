

<!-- Tempat untuk menampilkan total -->

<div>
    <div id="total-jumlah">Total: 0</div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Fungsi untuk mengambil total jumlah via AJAX
        function fetchTotalJumlah() {
            $.ajax({
                url: '{{ route("total.getTotalJumlah") }}', // Sesuaikan route-nya
                method: 'GET',
                data: {
                    pengajuan_id: '{{ $getState() }}'  // Dapatkan ID pengajuan dari state Filament
                },
                success: function(response) {
                    // Update tampilan dengan total yang diterima
                    $('#total-jumlah').text('Total: ' + response.total);
                }
            });
        }

        // Panggil fungsi fetchTotalJumlah ketika halaman di-load
        $(document).ready(function() {
            fetchTotalJumlah();
        });

        // Memanggil secara berkala jika diperlukan
        setInterval(fetchTotalJumlah, 5000); // Refresh setiap 5 detik
    </script>
</div>
