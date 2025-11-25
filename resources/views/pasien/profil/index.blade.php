@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header bg-success text-white">
        Profil Saya
    </div>

    <div class="card-body">

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <p><strong>Nama:</strong> {{ Auth::user()->name }}</p>
        <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
        <p><strong>Alamat:</strong> {{ $pasien->alamat }}</p>
        <p><strong>No HP:</strong> {{ $pasien->no_hp }}</p>
        <p><strong>Tanggal Lahir:</strong> {{ $pasien->tanggal_lahir }}</p>

        <a href="{{ route('pasien.profil.edit') }}" class="btn btn-primary mt-3">
            <i class="bi bi-pencil-square"></i> Edit Profil
        </a>
    </div>
</div>

@endsection
