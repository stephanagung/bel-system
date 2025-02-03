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
                        const textToSpeak = callData.jenis_pemanggilan === 'HRD'
                            ? `Perhatian! Panggilan kepada ${callData.nama_mesin} dimohon untuk datang ke lobby, terima kasih.`
                            : `Perhatian! Panggilan kepada ${callData.jenis_pemanggilan} dimohon untuk datang ke ${callData.nama_mesin}, terima kasih.`;

                        const introAudio = new Audio('/audio/intro.mp3');
                        const outroAudio = new Audio('/audio/outro.mp3');
                        const utterThis = new SpeechSynthesisUtterance(textToSpeak);

                        utterThis.lang = 'id-ID';
                        utterThis.pitch = 1.1;
                        utterThis.rate = 0.9;
                        utterThis.volume = 1;

                        const voices = window.speechSynthesis.getVoices();
                        const femaleVoice = voices.find(voice =>
                            voice.lang === 'id-ID' && (voice.name.includes('female') || voice.name.includes('perempuan'))
                        );
                        if (femaleVoice) {
                            utterThis.voice = femaleVoice;
                        }

                        const synth = window.speechSynthesis;
                        let repeatCount = 0;

                        function updateSpeakingStatus(status) {
                            fetch('{{ route('set-speaking-status') }}', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                },
                                body: JSON.stringify({ isSpeaking: status }),
                            }).catch(error => console.error('Error updating status:', error));
                        }

                        function speakRepeatedly() {
                            if (repeatCount < 1) {
                                synth.speak(utterThis);
                                utterThis.onend = () => {
                                    repeatCount++;
                                    speakRepeatedly(); // Lanjutkan pengulangan
                                };
                            } else {
                                playOutro(); // Setelah 3 kali selesai, putar outro
                            }
                        }

                        function playIntro() {
                            introAudio.play();
                            introAudio.onended = () => {
                                updateSpeakingStatus(true); // TTS dimulai
                                speakRepeatedly(); // Mulai teks diucapkan 3 kali
                            };
                        }

                        function playOutro() {
                            updateSpeakingStatus(false); // TTS selesai
                            outroAudio.play();
                        }

                        playIntro(); // Mulai proses dengan intro
                    }

                    setTimeout(fetchCallData, 1000);
                })
                .catch(error => {
                    console.error('Error:', error);
                    setTimeout(fetchCallData, 1000);
                });
        }

        fetchCallData();

        // Fungsi untuk menonaktifkan input modal
        function disableModalInputs() {
            document.querySelectorAll('.modal form input, .modal form button').forEach(input => {
                input.disabled = true;
            });
        }

        // Fungsi untuk mengaktifkan input modal
        function enableModalInputs() {
            document.querySelectorAll('.modal form input, .modal form button').forEach(input => {
                input.disabled = false;
            });
        }
    });
</script>

@endsection