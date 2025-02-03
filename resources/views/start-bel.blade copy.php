@extends('layout.app')

@section('content')
<!-- Page Title -->
<div class="page-title light-background features-cards">
    <div class="container">
        <h1>Pesan Pemanggilan</h1>
    </div>
</div>
<!-- End Page Title -->

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Function for polling data
        function fetchCallData() {
            fetch('{{ route('get-call-data') }}')
                .then(response => response.json())
                .then(callData => {
                    if (callData && Object.keys(callData).length > 0) { // Cek jika callData tidak kosong
                        let textToSpeak = '';

                        // Menyesuaikan teks berdasarkan jenis pemanggilan
                        if (callData.jenis_pemanggilan === 'Produksi') {
                            textToSpeak = `Perhatian! Panggilan kepada ${callData.nama_pic} dimohon untuk datang ke ${callData.nama_mesin}, terima kasih.`;
                        } else if (callData.jenis_pemanggilan === 'Repair & Maintenance') {
                            textToSpeak = `Perhatian! Panggilan kepada staff repair & maintenance dimohon untuk datang ke ${callData.nama_mesin}, terima kasih.`;
                        } else if (callData.jenis_pemanggilan === 'Moldshop') {
                            textToSpeak = `Perhatian! Panggilan kepada moldshop dimohon untuk datang ke ${callData.nama_mesin}, terima kasih.`;
                        }

                        const synth = window.speechSynthesis;
                        const utterThis = new SpeechSynthesisUtterance(textToSpeak);
                        const introAudio = new Audio('/audio/intro.mp3');
                        const outroAudio = new Audio('/audio/outro.mp3');

                        // Pengaturan suara TTS
                        utterThis.lang = 'id-ID';
                        utterThis.pitch = 1.2;
                        utterThis.rate = 1;

                        let repeatCount = 3;

                        // Intro audio sebelum TTS
                        introAudio.play();
                        introAudio.onended = function () {
                            function playTTS() {
                                if (repeatCount > 0) {
                                    synth.speak(utterThis);
                                } else {
                                    outroAudio.play();
                                }
                            }

                            utterThis.onend = function () {
                                repeatCount--;
                                if (repeatCount > 0) {
                                    playTTS();
                                } else {
                                    outroAudio.play();
                                }
                            };

                            playTTS();
                        };
                    } else {
                        console.log('No new call data. Waiting for the next request...');
                    }

                    setTimeout(fetchCallData, 1000); // Polling berikutnya
                })
                .catch(error => {
                    console.error('Error fetching call data:', error);
                    setTimeout(fetchCallData, 1000); // Polling tetap berjalan meskipun error
                });
        }

        fetchCallData(); // Start polling
    });
</script>
@endsection