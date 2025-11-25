@extends('layouts.public')

@section('title', 'Klinik Sehat')

@section('content')
<div class="public-card text-center">
    <h2 class="fw-bold">Selamat Datang di<br>Klinik Sehat</h2>

    <p class="text-muted mt-2">
        Sistem pendaftaran pasien modern, cepat, dan mudah digunakan.
    </p>

    <a href="{{ route('register.form') }}" class="btn btn-primary-custom mt-3">
        Daftar Sekarang
    </a>
</div>
@endsection
