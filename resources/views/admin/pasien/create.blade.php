@extends('layouts.app')

@section('content')
    
<h2>Tambah Pasien</h2>

<div class="card">
    <div class="card-body">

        <form action="{{ route('admin.pasien.store') }}" method="POST">
            @csrf

            <label>Nama</label>
            <input type="text" name="nama" class="form-control" required>

            <label class="mt-2">Email</label>
            <input type="email" name="email" class="form-control" required>

            <label class="mt-2">Password</label>
            <input type="password" name="password" class="form-control" required>

            <label class="mt-2">No HP</label>
            <input type="text" name="no_hp" class="form-control" required>

            <label class="mt-2">Alamat</label>
            <input type="text" name="alamat" class="form-control" required>

            <label class="mt-2">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" class="form-control" required>

            <button type="submit" class="btn btn-success mt-3">Simpan</button>
        </form>

        <a href="{{ route('admin.pasien.index') }}" class="btn btn-secondary mt-3">Kembali</a>

    </div>
</div>

@endsection
