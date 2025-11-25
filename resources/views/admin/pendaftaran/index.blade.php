@extends('layouts.app')

@section('content')

<h3 class="mb-4">Daftar Pendaftaran Pasien</h3>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

@if(session('error'))
<div class="alert alert-danger">{{ session('error') }}</div>
@endif


<div class="card shadow-sm">
    <div class="card-header bg-success text-white">
        Pendaftaran Pasien
    </div>

    <div class="card-body">

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama Pasien</th>
                    <th>Dokter</th>
                    <th>Tanggal</th>
                    <th>Jam</th>
                    <th>Keluhan</th>
                    <th>Status</th>
                    <th width="200px">Aksi</th>
                </tr>
            </thead>

            <tbody>

                @forelse($pendaftarans as $p)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $p->pasien->user->name }}</td>
                    <td>{{ $p->dokter->nama }}</td>
                    <td>{{ \Carbon\Carbon::parse($p->tanggal)->format('d M Y') }}</td>
                    <td>{{ $p->jam ? \Carbon\Carbon::parse($p->jam)->format('H:i') : '-' }}</td>
                    <td>{{ $p->keluhan }}</td>

                    <td>
                        @if($p->status === 'disetujui')
                            <span class="badge bg-success">Disetujui</span>
                        @elseif($p->status === 'ditolak')
                            <span class="badge bg-danger">Ditolak</span>
                        @else
                            <span class="badge bg-warning text-dark">Menunggu</span>
                        @endif
                    </td>

                    <td>
                        @if($p->status === 'menunggu')
                            <form action="{{ route('admin.pendaftaran.approve', $p->id) }}"
                                  method="POST" class="d-inline">
                                @csrf
                                <button class="btn btn-success btn-sm">
                                    Setujui
                                </button>
                            </form>
                            <form action="{{ route('admin.pendaftaran.reject', $p->id) }}"
                                  method="POST" class="d-inline">
                                @csrf
                                <button class="btn btn-danger btn-sm">
                                    Tolak
                                </button>
                            </form>

                        @elseif($p->status === 'disetujui')
                            <span class="text-success fw-bold">Janji temu disetujui</span>

                        @elseif($p->status === 'ditolak')
                            <span class="text-danger fw-bold">Janji temu ditolak</span>
                        @endif
                    </td>

                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center py-3">
                        Belum ada pendaftaran.
                    </td>
                </tr>
                @endforelse

            </tbody>

        </table>

    </div>
</div>

@endsection
