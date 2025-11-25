@extends('layouts.public')

@section('title', 'Registrasi Pasien')

@section('content')

<div class="public-card">

    <h3 class="text-center fw-bold mb-4">Registrasi Pasien</h3>

    <form method="POST" action="{{ route('register.process') }}">
        @csrf

        <label class="form-label">Nama Lengkap</label>
        <input type="text" name="name" class="form-control mb-3" required>

        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control mb-3" required>

        <label class="form-label">Password</label>
        <input type="password" name="password" class="form-control mb-3" required>

        <label class="form-label">Konfirmasi Password</label>
        <input type="password" name="password_confirmation" class="form-control mb-3" required>

        <label class="form-label">Alamat</label>
        <input type="text" name="alamat" class="form-control mb-3" required>

        <label class="form-label">No HP</label>
        <input type="text" name="no_hp" class="form-control mb-3" required>

        <label class="form-label">Tanggal Lahir</label>
        <input type="date" name="tanggal_lahir" class="form-control mb-4" required>

        <button class="btn btn-primary-custom w-100">Daftar</button>

        <div class="text-center mt-3">
            Sudah punya akun? <a href="{{ route('login') }}">Login</a>
        </div>
    </form>

</div>

@endsection
