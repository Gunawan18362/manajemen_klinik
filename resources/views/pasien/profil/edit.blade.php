@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header bg-warning text-white">
        Edit Profil
    </div>

    <div class="card-body">
        <form action="{{ route('pasien.profil.update') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" name="name" class="form-control"
                       value="{{ old('name', Auth::user()->name) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Alamat</label>
                <input type="text" name="alamat" class="form-control"
                       value="{{ old('alamat', $pasien->alamat) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">No HP</label>
                <input type="text" name="no_hp" class="form-control"
                       value="{{ old('no_hp', $pasien->no_hp) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" class="form-control"
                       value="{{ old('tanggal_lahir', $pasien->tanggal_lahir) }}" required>
            </div>

            <button class="btn btn-success">Simpan Perubahan</button>
        </form>
    </div>
</div>

@endsection
