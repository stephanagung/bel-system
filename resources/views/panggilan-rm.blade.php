@extends('layout.app')

@section('content')
<!-- Page Title -->
<div class="page-title">
    <div class="container">
        <h1 class="mb-4">Panggilan Repair & Maintenance</h1>

        <a href="{{ url('/') }}" class="btn btn-secondary">Kembali</a>

        <div class="form-setter">
            <form>
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
                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-primary" style="width: 10%;">Panggil</button>
                </div>
            </form>
        </div>
    </div>
</div><!-- End Page Title -->

<script>
    document.querySelector('form').addEventListener('submit', function (e) {
        e.preventDefault(); // Mencegah form melakukan submit

        // Ambil data dari dropdown
        const namaMesin = document.getElementById('nama-mesin').value;
        const submitButton = e.target.querySelector('button[type="submit"]');

        if (!namaMesin) {
            alert('Silakan pilih Nama Mesin.');
            return;
        }

        // Format teks
        const textToSpeak = `Perhatian! Pemanggilan kepada staff repair & maintanance er em dimohon untuk datang ke mesin ${namaMesin}, terima kasih.`;

        // Cek dukungan Web Speech API
        if (!('speechSynthesis' in window)) {
            alert('Browser Anda tidak mendukung fitur Text-to-Speech.');
            return;
        }

        // Text-to-Speech
        const synth = window.speechSynthesis;
        let repeatCount = 3; // Jumlah pengulangan
        const utterThis = new SpeechSynthesisUtterance(textToSpeak);

        utterThis.lang = 'id-ID'; // Bahasa Indonesia
        utterThis.pitch = 1; // Pitch suara
        utterThis.rate = 1; // Kecepatan berbicara

        // Event saat mulai berbicara
        utterThis.onstart = function () {
            submitButton.disabled = true;
        };

        // Event saat selesai berbicara
        utterThis.onend = function () {
            repeatCount--;
            if (repeatCount > 0) {
                synth.speak(utterThis); // Ulangi suara
            } else {
                submitButton.disabled = false; // Aktifkan tombol kembali
            }
        };

        synth.speak(utterThis); // Mulai berbicara pertama kali
    });
</script>

@endsection