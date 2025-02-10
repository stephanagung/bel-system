<?php

namespace App\Listeners;

use App\Events\Panggilan;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class KirimWhatsapp
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(Panggilan $event): void
    {
        try {
            $http = Http::withHeaders([
                'Authorization' => 'Bearer ' . env('WA_API_KEY'),
                'Content-Type'  => 'application/json'
            ])->post(env('WA_API_URL') . '/send/message', [
                        'phone'   => env('WA_PRIMARY_GROUP_ID'),
                        'message' => $event->pesan,
                        'isGroup' => true,
                        'secure'  => true
                    ]);

            $respon = $http->json();

            if ($respon['ok']) {
                Log::info('Pesan notifikasi whatsapp berhasil dikirim pada ' . date('d/m/Y H:i:s'));
            } else {
                Log::info('Pesan notifikasi whatsapp gagal dikirim pada ' . date('d/m/Y H:i:s') . '. Error: ' . $respon['message']);
            }
        } catch (\Throwable $th) {
            Log::error('Terjadi error di tahap listen event dengan pesan: ' . $th->getMessage());
        }
    }
}
