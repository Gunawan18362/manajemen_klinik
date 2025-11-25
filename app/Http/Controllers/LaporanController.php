<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftaran;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function index()
    {
        $bulanList = Pendaftaran::select(
                DB::raw("DATE_FORMAT(tanggal, '%M %Y') as bulan"),
                DB::raw("DATE_FORMAT(tanggal, '%Y-%m') as value")
            )
            ->groupBy('bulan', 'value')
            ->orderBy('value', 'desc')
            ->get();

        return view('admin.laporan.index', compact('bulanList'));
    }

    public function pdf(Request $request)
    {
        $bulan = $request->bulan;
        if (!$bulan) {
            return redirect()->route('laporan.index')->with('error', 'Silakan pilih bulan terlebih dahulu.');
        }

        $pendaftaran = Pendaftaran::where(DB::raw("DATE_FORMAT(tanggal, '%Y-%m')"), $bulan)
            ->orderBy('tanggal')
            ->get();

        $namaBulan = date('F Y', strtotime($bulan . '-01'));

        $pdf = Pdf::loadView('admin.laporan.pdf', compact('pendaftaran', 'namaBulan'))
            ->setPaper('A4', 'portrait');

        return $pdf->stream("laporan-pendaftaran-$bulan.pdf");
    }
}
