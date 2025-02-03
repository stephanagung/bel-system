@extends('layout.app')

@section('content')
<div class="page-title light-background features-cards">
    <div class="container">
        <h1>Pesan Pemanggilan</h1>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        function fetchCallData() {
            fetch('{{ route('get-call-data') }}')
                .then(response => response.json())
                .then(callData => {
                    if (callData && Object.keys(callData).length > 0) {
                        const textToSpeak = `Perhatian! Panggilan kepada ${callData.jenis_pemanggilan} dimohon untuk datang ke ${callData.nama_mesin}, terima kasih.`;

                        const introAudio = new Audio('/audio/intro.mp3');
                        const outroAudio = new Audio('/audio/outro.mp3');
                        const utterThis = new SpeechSynthesisUtterance(textToSpeak);

                        // Pengaturan TTS
                        utterThis.lang = 'id-ID'; // Bahasa Indonesia
                        utterThis.pitch = 1.2;    // Nada suara
                        utterThis.rate = 1;      // Kecepatan suara

                        // Pilih suara perempuan jika tersedia
                        const voices = window.speechSynthesis.getVoices();
                        const femaleVoice = voices.find(voice => voice.lang === 'id-ID' && voice.name.includes('female'));

                        if (femaleVoice) {
                            utterThis.voice = femaleVoice;
                        }

                        // Fungsi untuk mengulang TTS
                        let repeatCount = 0;
                        const synth = window.speechSynthesis;

                        function speakRepeatedly() {
                            if (repeatCount < 3) {
                                synth.speak(utterThis);
                                utterThis.onend = () => {
                                    repeatCount++;
                                    speakRepeatedly();
                                };
                            } else {
                                outroAudio.play(); // Mainkan audio outro setelah selesai 3 kali
                            }
                        }

                        // Pemutaran audio intro, lalu TTS berulang, dan outro
                        introAudio.play();
                        introAudio.onended = () => {
                            speakRepeatedly();
                        };
                    }

                    setTimeout(fetchCallData, 1000); // Polling berikutnya
                })
                .catch(error => {
                    console.error('Error:', error);
                    setTimeout(fetchCallData, 1000); // Polling tetap berjalan
                });
        }

        fetchCallData(); // Mulai polling
    });
</script>


@endsection