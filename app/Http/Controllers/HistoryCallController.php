<?php

namespace App\Http\Controllers;

use Mpdf\Mpdf;
use Illuminate\Http\Request;
use App\Models\HistoryCall;

class HistoryCallController extends Controller
{
    public function index(Request $request)
    {
        $jenisPemanggilan = $request->input('jenis_pemanggilan');
        $tanggal = $request->input('tanggal');

        // Query awal mengambil semua data
        $query = HistoryCall::latest();

        // Filter berdasarkan jenis pemanggilan jika ada
        if (!empty($jenisPemanggilan)) {
            $query->where('jenis_pemanggilan', $jenisPemanggilan);
        }

        // Filter berdasarkan tanggal jika ada
        if (!empty($tanggal)) {
            $query->whereDate('created_at', $tanggal);
        }

        $historyCalls = $query->get();

        // Ambil daftar jenis pemanggilan dari index.blade.php
        $jenisPemanggilanOptions = [
            "Setter Produksi",
            "Leader Produksi",
            "Quality Control",
            "HRD",
            "Repair Maintenance",
            "Moldshop",
            "Polybox",
            "Engineering"
        ];

        return view('history-call', compact('historyCalls', 'jenisPemanggilanOptions'));
    }

    public function exportPDF(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        // Ambil data berdasarkan rentang waktu
        $historyCalls = HistoryCall::whereBetween('created_at', [$startDate, $endDate])
            ->orderBy('created_at', 'desc')
            ->get();

        // HTML untuk PDF
        $html = view('export-history-call', compact('historyCalls', 'startDate', 'endDate'))->render();

        // Buat PDF pakai mPDF
        $mpdf = new Mpdf();
        $mpdf->WriteHTML($html);
        return $mpdf->Output('history_call_' . $startDate . '_to_' . $endDate . '.pdf', 'D'); // 'D' = download
    }

}
