@extends('layouts.app')

@section('content')

<style>
.menu-card {
    border-radius: 12px;
    padding: 25px;
    text-align: center;
    transition: 0.2s;
    cursor: pointer;
}
.menu-card:hover {
    transform: scale(1.05);
}
.menu-icon {
    font-size: 40px;
    margin-bottom: 10px;
}
</style>

<div class="container">

    <h3 class="mb-4">Dashboard Pasien</h3>
    <p>Selamat datang, <strong>{{ $pasien->user->name }}</strong>!</p>

    <div class="row mt-4">
        <div class="col-md-4 mb-3">
            <a href="{{ route('pasien.profil') }}" class="text-decoration-none text-dark">
                <div class="menu-card shadow-sm bg-white">
                    <div class="menu-icon text-primary">
                        <i class="bi bi-person-circle"></i>
                    </div>
                    <h5>Profil Saya</h5>
                </div>
            </a>
        </div>

        <div class="col-md-4 mb-3">
            <a href="{{ route('pasien.pendaftaran.index') }}" class="text-decoration-none text-dark">
                <div class="menu-card shadow-sm bg-white">
                    <div class="menu-icon text-success">
                        <i class="bi bi-clipboard2-check"></i>
                    </div>
                    <h5>Pendaftaran</h5>
                </div>
            </a>
        </div>

        <div class="col-md-4 mb-3">
            <a href="{{ route('pasien.chat') }}" class="text-decoration-none text-dark">
                <div class="menu-card shadow-sm bg-white">
                    <div class="menu-icon text-info">
                        <i class="bi bi-chat-dots"></i>
                    </div>
                    <h5>Chat Admin</h5>
                </div>
            </a>
        </div>

    </div>

</div>

@endsection
