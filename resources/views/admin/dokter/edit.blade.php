@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header bg-warning text-white">
        Edit Dokter
    </div>

    <div class="card-body">
        <form action="{{ route('admin.dokter.update', $dokter->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Nama Dokter</label>
                <input type="text" name="nama" value="{{ $dokter->nama }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Spesialis</label>
                <input type="text" name="spesialis" value="{{ $dokter->spesialis }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">No HP</label>
                <input type="text" name="no_hp" value="{{ $dokter->no_hp }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Hari Praktek</label>
                <select name="hari" class="form-select" required>
                    <option value="">-- Pilih Hari --</option>
                    <option value="Senin">Senin</option>
                    <option value="Selasa">Selasa</option>
                    <option value="Rabu">Rabu</option>
                    <option value="Kamis">Kamis</option>
                    <option value="Jumat">Jumat</option>
                    <option value="Sabtu">Sabtu</option>
                    <option value="Minggu">Minggu</option>
                </select>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Jam Mulai</label>
                    <input type="time" name="jam_mulai" class="form-control" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Jam Selesai</label>
                    <input type="time" name="jam_selesai" class="form-control" required>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">
                <i class="bi bi-save"></i> Update
            </button>

            <a href="{{ route('admin.dokter.index') }}" class="btn btn-secondary">
                Kembali
            </a>
        </form>
    </div>
</div>
@endsection