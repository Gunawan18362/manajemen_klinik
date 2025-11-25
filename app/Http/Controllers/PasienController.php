<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PasienController extends Controller
{
    public function index()
    {
        $pasiens = Pasien::with('user')->get();
        return view('admin.pasien.index', compact('pasiens'));
    }

    public function create()
    {
        return view('admin.pasien.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'          => 'required',
            'email'         => 'required|email|unique:users',
            'password'      => 'required|min:6',
            'alamat'        => 'required',
            'no_hp'         => 'required',
            'tanggal_lahir' => 'required|date',
        ]);

        $user = User::create([
            'name'     => $request->nama,
            'email'    => $request->email,
            'password' => bcrypt($request->password),
            'role'     => 'pasien'
        ]);

        Pasien::create([
            'user_id'       => $user->id,
            'alamat'        => $request->alamat,
            'no_hp'         => $request->no_hp,
            'tanggal_lahir' => $request->tanggal_lahir
        ]);

        return redirect()->route('admin.pasien.index')->with('success', 'Data pasien berhasil ditambahkan.');
    }

    public function edit(Pasien $pasien)
    {
        return view('admin.pasien.edit', compact('pasien'));
    }

    public function update(Request $request, Pasien $pasien)
    {
        $request->validate([
            'name'           => 'required',
            'email'          => "required|email|unique:users,email,{$pasien->user->id}",
            'alamat'         => 'required',
            'no_hp'          => 'required',
            'tanggal_lahir'  => 'required|date',
        ]);

        $pasien->user->update([
            'name'  => $request->name,
            'email' => $request->email,
        ]);

        $pasien->update([
            'alamat'        => $request->alamat,
            'no_hp'         => $request->no_hp,
            'tanggal_lahir' => $request->tanggal_lahir,
        ]);

        return redirect()->route('admin.pasien.index')->with('success', 'Data pasien berhasil diperbarui.');
    }

    public function destroy(Pasien $pasien)
    {
        $pasien->user->delete();
        $pasien->delete();

        return redirect()->route('admin.pasien.index')->with('success', 'Data pasien berhasil dihapus.');
    }

    public function dashboard()
    {
        $pasien = Pasien::where('user_id', auth::id())->first();
        return view('pasien.dashboard', compact('pasien'));
    }


    public function profil()
    {
        $pasien = Pasien::where('user_id', Auth::id())->first();

        return view('pasien.profil.index', compact('pasien'));
    }

    public function editProfil()
    {
        $pasien = Pasien::where('user_id', Auth::id())->first();

        return view('pasien.profil.edit', compact('pasien'));
    }

    public function updateProfil(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'tanggal_lahir' => 'required|date',
        ]);

        $pasien = Pasien::where('user_id', Auth::id())->first();

        $pasien->user->update([
            'name' => $request->name,
        ]);

        $pasien->update([
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'tanggal_lahir' => $request->tanggal_lahir,
        ]);

        return redirect()->route('pasien.profil')
            ->with('success', 'Profil berhasil diperbarui.');
    }
}
