@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Pendaftaran Saya</h3>

    <a href="{{ route('pasien.pendaftaran.create') }}" class="btn btn-primary mb-3">+ Buat Janji Baru</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Dokter</th>
                <th>Tanggal</th>
                <th>Keluhan</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>
            @foreach($pendaftarans as $p)
            <tr>
                <td>{{ $p->dokter->nama }}</td>
                <td>{{ $p->tanggal }}</td>
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
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection