@extends('layouts.app')

@section('content')
<div class="container">

    <h3 class="mb-4">Laporan Pendaftaran Janji Temu</h3>

    {{-- Notifikasi --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="card shadow-sm">
        <div class="card-header bg-dark text-white">
            Cetak Laporan Berdasarkan Bulan
        </div>

        <div class="card-body">

            <form action="{{ route('admin.laporan.pdf') }}" method="GET" target="_blank">

                <div class="row mb-3">

                    {{-- Dropdown bulan --}}
                    <div class="col-md-6">
                        <label for="bulan" class="form-label">Pilih Bulan</label>
                        <select name="bulan" id="bulan" class="form-select" required>
                            <option value="">-- Pilih Bulan --</option>

                            @if(isset($bulanList) && count($bulanList) > 0)
                                @foreach ($bulanList as $b)
                                    <option value="{{ $b->value }}">
                                        {{ $b->bulan }}
                                    </option>
                                @endforeach
                            @else
                                <option value="">Belum ada data pendaftaran</option>
                            @endif

                        </select>
                    </div>

                    {{-- cetak PDF --}}
                    <div class="col-md-3 d-flex align-items-end">
                        <button type="submit" class="btn btn-danger w-100">
                            <i class="bi bi-file-earmark-pdf"></i> Cetak PDF
                        </button>
                    </div>

                </div>

            </form>

        </div>

    </div>

</div>
@endsection
