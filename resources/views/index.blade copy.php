@extends('layout.app')

@section('content')
<!-- Page Title -->
<div class="page-title light-background features-cards">
    <div class="container">
        <h1>Pilih Pemanggilan</h1>

        <div class="form-setter">
            <form id="call-form" action="{{ route('start-bel') }}" method="POST">
                @csrf
                <div class="row justify-content-center g-3">
                    <!-- Dropdown Jenis Pemanggilan -->
                    <div class="col-md-6 text-center">
                        <label for="jenis-pemanggilan" class="form-label">Jenis Pemanggilan</label>
                        <select class="form-control form-select" id="jenis-pemanggilan" name="jenis_pemanggilan"
                            required>
                            <option value="">-- Pilih Jenis Pemanggilan --</option>
                            <option value="Produksi">Produksi</option>
                            <option value="Repair & Maintenance">Repair & Maintenance</option>
                            <option value="Moldshop">Moldshop</option>
                        </select>
                    </div>
                </div>

                <!-- Dynamic Fields -->
                <div id="dynamic-fields" class="mt-3">
                    <!-- Fields will be dynamically inserted here -->
                </div>

                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-primary" style="width: 10%;">Panggil</button>
                </div>
            </form>

            <!-- Button to launch start-bel.blade.php in a new tab -->
            <div class="text-center mt-4">
                <a href="{{ url('/start-bel') }}" target="_blank" class="btn btn-success" style="width: 10%;">Launch</a>
            </div>
        </div>
    </div>
</div>
<!-- End Page Title -->

<script>
    document.getElementById('jenis-pemanggilan').addEventListener('change', function () {
        const jenisPemanggilan = this.value;
        const dynamicFields = document.getElementById('dynamic-fields');

        // Clear existing fields
        dynamicFields.innerHTML = '';

        // Generate fields based on selection
        if (jenisPemanggilan === 'Produksi') {
            dynamicFields.innerHTML = `
            <div class="row justify-content-center g-3">
                <div class="col-md-6 text-center">
                    <label for="nama-pic" class="form-label">Panggil Siapa?</label>
                    <select class="form-control form-select" id="nama-pic" name="nama_pic" required>
                        <option value="">-- Pilih PIC --</option>
                        <option value="Setter">Setter</option>
                        <option value="Leader">Leader</option>
                    </select>
                </div>
                <div class="col-md-6 text-center">
                    <label for="nama-mesin" class="form-label">Nama Mesin</label>
                    <select class="form-control form-select" id="nama-mesin" name="nama_mesin" required>
                        <option value="">-- Pilih Nama Mesin --</option>
                        <option value="Mesin CNC 01">Mesin CNC 01</option>
                        <option value="Mesin Laser 02">Mesin Laser 02</option>
                    </select>
                </div>
            </div>
        `;
        } else if (jenisPemanggilan === 'Repair & Maintenance' || jenisPemanggilan === 'Moldshop') {
            dynamicFields.innerHTML = `
            <div class="row justify-content-center g-3">
                <div class="col-md-6 text-center">
                    <label for="nama-mesin" class="form-label">Nama Mesin</label>
                    <select class="form-control form-select" id="nama-mesin" name="nama_mesin" required>
                        <option value="">-- Pilih Nama Mesin --</option>
                        <option value="Mesin CNC 01">Mesin CNC 01</option>
                        <option value="Mesin Laser 02">Mesin Laser 02</option>
                    </select>
                </div>
            </div>
        `;
        }
    });

    // AJAX submission of form
    document.getElementById('call-form').addEventListener('submit', function (event) {
        event.preventDefault(); // Prevent default form submission
        const formData = new FormData(this);

        fetch('{{ route('start-bel') }}', {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        })
            .then(response => response.json())
            .then(data => {
                alert(data.message);
            })
            .catch(error => {
                console.error('Error:', error);
            });
    });
</script>
@endsection