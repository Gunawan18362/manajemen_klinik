<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use Illuminate\Http\Request;

class DokterController extends Controller
{
    public function index()
    {
        $dokters = Dokter::all();
        return view('admin.dokter.index', compact('dokters'));
    }

    public function create()
    {
        return view('admin.dokter.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'spesialis' => 'required',
            'no_hp' => 'required',
            'hari' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
        ]);

        $jadwal = $request->hari . ', ' . $request->jam_mulai . ' - ' . $request->jam_selesai;

        Dokter::create([
            'nama'           => $request->nama,
            'spesialis'      => $request->spesialis,
            'no_hp'          => $request->no_hp,
            'jadwal_praktek' => $jadwal,
        ]);
        return redirect()->route('admin.dokter.index')->with('success', 'Data dokter berhasil ditambahkan.');
    }

    public function edit(Dokter $dokter)
    {
        return view('admin.dokter.edit', compact('dokter'));
    }

    public function update(Request $request, Dokter $dokter)
    {
        $request->validate([
            'nama' => 'required',
            'spesialis' => 'required',
            'no_hp' => 'required',
            'hari' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
        ]);

        $jadwal = $request->hari . ', ' . $request->jam_mulai . ' - ' . $request->jam_selesai;

        $dokter->update([
            'nama'           => $request->nama,
            'spesialis'      => $request->spesialis,
            'no_hp'          => $request->no_hp,
            'jadwal_praktek' => $jadwal,
        ]);
        return redirect()->route('admin.dokter.index')->with('success', 'Data dokter berhasil diubah.');
    }

    public function destroy(Dokter $dokter)
    {
        $dokter->delete();
        return redirect()->route('admin.dokter.index')->with('success', 'Data dokter berhasil dihapus.');
    }
}
