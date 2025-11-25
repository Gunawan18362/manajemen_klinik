@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">
        Data Dokter
    </div>

    <div class="card-body">
        <a href="{{ route('admin.dokter.create') }}" class="btn btn-success mb-3">
            <i class="bi bi-plus-circle"></i> Tambah Dokter
        </a>

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Spesialis</th>
                    <th>No HP</th>
                    <th>Jadwal Praktek</th>
                    <th width="160px">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($dokters as $dokter)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $dokter->nama }}</td>
                    <td>{{ $dokter->spesialis }}</td>
                    <td>{{ $dokter->no_hp }}</td>
                    <td>{{ $dokter->jadwal_praktek }}</td>
                    <td>
                        <a href="{{ route('admin.dokter.edit', $dokter->id) }}"
                           class="btn btn-warning btn-sm">
                            <i class="bi bi-pencil-square"></i> Edit
                        </a>

                        <form action="{{ route('admin.dokter.destroy', $dokter->id) }}"
                              method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin ingin menghapus?')">
                                <i class="bi bi-trash"></i> Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
