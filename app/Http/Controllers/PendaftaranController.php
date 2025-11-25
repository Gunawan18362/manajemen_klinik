<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PendaftaranController extends Controller
{
    public function index()
    {
        if (Auth::user()->role === 'admin') {
            $pendaftarans = Pendaftaran::with(['pasien.user', 'dokter'])->get();
            return view('admin.pendaftaran.index', compact('pendaftarans'));
        }

        $pendaftarans = Pendaftaran::with('dokter')
            ->where('pasien_id', Auth::user()->pasien->id)
            ->get();

        return view('pasien.pendaftaran.index', compact('pendaftarans'));
    }
    
    public function create()
    {
        $dokters = Dokter::all();
        return view('pasien.pendaftaran.create', compact('dokters'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'dokter_id' => 'required|exists:dokters,id',
            'tanggal' => 'required|date',
            'jam' => 'required',
            'keluhan' => 'required|string',
        ]);

        Pendaftaran::create([
            'pasien_id' => Auth::user()->pasien->id,
            'dokter_id' => $request->dokter_id,
            'tanggal' => $request->tanggal,
            'jam' => $request->jam,
            'keluhan' => $request->keluhan,
            'status' => 'menunggu',
        ]);

        return redirect()->route('pasien.pendaftaran.index')->with('success', 'Pendaftaran berhasil dibuat.');
    }

    public function approve($id)
    {
        $p = Pendaftaran::findOrFail($id);
        $p->update(['status' => 'disetujui']);

        return back()->with('success', 'Janji temu disetujui.');
    }

    public function reject($id)
    {
        $p = Pendaftaran::findOrFail($id);
        $p->update(['status' => 'ditolak']);

        return back()->with('success', 'Janji temu ditolak.');
    }
}
