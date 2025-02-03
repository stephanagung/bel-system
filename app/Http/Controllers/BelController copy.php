<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Call;
use Illuminate\Support\Facades\Log;


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
            'nama_mesin' => 'required|string',
        ]);

        try {
            // Log data yang diterima untuk debugging
            Log::info('Data yang diterima:', $validatedData);

            // Simpan data ke database
            Call::create($validatedData);

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
}
