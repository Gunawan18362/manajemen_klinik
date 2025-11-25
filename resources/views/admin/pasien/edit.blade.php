@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header bg-warning text-white">
        Edit Data Pasien
    </div>

    <div class="card-body">
        <form action="{{ route('admin.pasien.update', $pasien->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" 
                       name="name" 
                       value="{{ $pasien->user->name }}" 
                       class="form-control" 
                       required>
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" 
                       name="email" 
                       value="{{ $pasien->user->email }}" 
                       class="form-control" 
                       required>
            </div>

            <div class="mb-3">
                <label class="form-label">No HP</label>
                <input type="text" 
                       name="no_hp" 
                       value="{{ $pasien->no_hp }}" 
                       class="form-control" 
                       required>
            </div>

            <div class="mb-3">
                <label class="form-label">Alamat</label>
                <input type="text" 
                       name="alamat" 
                       value="{{ $pasien->alamat }}" 
                       class="form-control" 
                       required>
            </div>

            <div class="mb-3">
                <label class="form-label">Tanggal Lahir</label>
                <input type="date" 
                       name="tanggal_lahir" 
                       value="{{ $pasien->tanggal_lahir }}" 
                       class="form-control" 
                       required>
            </div>

            <button type="submit" class="btn btn-primary">
                <i class="bi bi-save"></i> Update
            </button>

            <a href="{{ route('admin.pasien.index') }}" class="btn btn-secondary">
                Kembali
            </a>
        </form>
    </div>
</div>
@endsection
