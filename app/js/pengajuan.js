document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('#form-id'); // ID dari form pengajuan
    const totalField = document.querySelector('#total-field-id'); // ID dari field total

    form.addEventListener('change', function () {
        const pengajuanId = form.getAttribute('data-pengajuan-id'); // Ambil ID dari data attribute

        fetch(`/pengajuan/${pengajuanId}/total`)
            .then(response => response.json())
            .then(data => {
                totalField.value = 'Rp ' + data.total.toLocaleString('id-ID', { minimumFractionDigits: 0 });
            })
            .catch(error => console.error('Error:', error));
    });
});