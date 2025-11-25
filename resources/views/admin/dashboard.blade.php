@extends('layouts.app')

@section('content')
<div class="container">

    <h3 class="mb-4">Selamat datang, <strong>{{ Auth::user()->name }}</strong>!</h3>

    <div class="row">
        <div class="col-md-4 mb-4">
            <a href="{{ route('admin.dokter.index') }}" class="text-decoration-none">
                <div class="card shadow p-4 text-center">
                    <i class="bi bi-person-badge fs-1 text-primary"></i>
                    <h5 class="mt-3 text-dark">Data Dokter</h5>
                </div>
            </a>
        </div>

        <div class="col-md-4 mb-4">
            <a href="{{ route('admin.pasien.index') }}" class="text-decoration-none">
                <div class="card shadow p-4 text-center">
                    <i class="bi bi-people fs-1 text-success"></i>
                    <h5 class="mt-3 text-dark">Data Pasien</h5>
                </div>
            </a>
        </div>

        <div class="col-md-4 mb-4">
            <a href="{{ route('admin.pendaftaran.index') }}" class="text-decoration-none">
                <div class="card shadow p-4 text-center">
                    <i class="bi bi-clipboard-check fs-1 text-warning"></i>
                    <h5 class="mt-3 text-dark">Janji Temu</h5>
                </div>
            </a>
        </div>

        <div class="col-md-4 mb-4">
            <a href="{{ route('admin.laporan.index') }}" class="text-decoration-none">
                <div class="card shadow p-4 text-center">
                    <i class="bi bi-file-earmark-text fs-1 text-danger"></i>
                    <h5 class="mt-3 text-dark">Laporan</h5>
                </div>
            </a>
        </div>

        <div class="col-md-4 mb-4">
            <a href="{{ route('admin.chat.list') }}" class="text-decoration-none">
                <div class="card shadow p-4 text-center">
                    <i class="bi bi-chat-dots fs-1 text-info"></i>
                    <h5 class="mt-3 text-dark">Chat Pasien</h5>
                </div>
            </a>
        </div>

    </div>

</div>
@endsection
