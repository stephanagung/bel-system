<?php

namespace App\Http\Controllers;

use App\Events\Panggilan;
use Illuminate\Http\Request;
use App\Models\Call;
use Illuminate\Support\Facades\Log;
use App\Models\HistoryCall;

class BelController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function showStartBel()
    {
        return view('start-bel');
    }

    public function startBel(Request $request)
    {

        // Validasi data input
        $validatedData = $request->validate([
            'jenis_pemanggilan' => 'required|string',
            'nama_mesin'        => 'required|string',
        ]);

        try {
            // Log data yang diterima untuk debugging
            Log::info('Data yang diterima:', $validatedData);

            // Simpan data ke database
            Call::create($validatedData);
            HistoryCall::create($validatedData); // Simpan ke histori

            $jenis = $request->input('jenis_pemanggilan');
            $nama  = $request->input('nama_mesin');

            if ($jenis === 'HRD') {
                $pesanWhatsapp = "Perhatian! Panggilan kepada $nama dimohon untuk datang ke lobby, terima kasih.";
            } else {
                $pesanWhatsapp = "Perhatian! Panggilan kepada $jenis dimohon untuk datang ke $nama, terima kasih.";
            }

            // Trigger event pemanggilan
            Panggilan::dispatch(
                $request->input('jenis_pemanggilan'),
                $request->input('nama_mesin'),
                $pesanWhatsapp
            );

            return response()->json(['message' => 'Pemanggilan berhasil dikirim.']);
        } catch (\Exception $e) {
            // Log error jika terjadi kesalahan
            Log::error('Error pada penyimpanan:', ['error' => $e->getMessage()]);
            return response()->json(['message' => 'Terjadi kesalahan saat menyimpan data.'], 500);
        }
    }

    public function getCallData()
    {
        // Ambil data terbaru dari database
        $call = Call::latest()->first();

        if ($call) {
            $data = $call->toArray();
            $call->delete(); // Hapus data setelah diambil (opsional)
            return response()->json($data);
        }

        return response()->json(null);
    }

    // Mendapatkan status TTS
    public function getSpeakingStatus()
    {
        return response()->json(['isSpeaking' => cache('isSpeaking', false)]);
    }

    // Memperbarui status TTS
    public function setSpeakingStatus(Request $request)
    {
        $validated = $request->validate([
            'isSpeaking' => 'required|boolean',
        ]);

        cache(['isSpeaking' => $validated['isSpeaking']], now()->addMinutes(5)); // Simpan status di cache
        return response()->json(['message' => 'Status diperbarui.']);
    }
}
