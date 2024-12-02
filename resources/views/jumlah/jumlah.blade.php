<div id="jumlah-container">
    <input type="text" id="jumlah" value="0" readonly />
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const volumeInput = document.querySelector('input[name="volume"]');
        const hargaInput = document.querySelector('input[name="harga"]');
        const ppnInput = document.querySelector('input[name="ppn"]');

        const calculateJumlah = () => {
            const volume = parseFloat(volumeInput.value) || 0;
            const harga = parseFloat(hargaInput.value) || 0;
            const ppn = parseFloat(ppnInput.value) || 11;

            fetch('{{ route("calculate") }}', {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    volume: volume,
                    harga: harga,
                    ppn: ppn
                })
            })
            .then(response => response.json())
            .then(data => {
                document.getElementById('jumlah').value = data.jumlah;
            })
            .catch(error => console.error('Error:', error));
        };

        volumeInput.addEventListener('input', calculateJumlah);
        hargaInput.addEventListener('input', calculateJumlah);
        ppnInput.addEventListener('input', calculateJumlah);
    });
</script>
