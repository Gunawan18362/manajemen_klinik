@extends('layouts.app')

@section('content')

<h2>Data Pasien</h2>

<a href="{{ route('admin.pasien.create') }}" class="btn btn-success mb-3">+ Tambah Pasien</a>

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card">
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>No HP</th>
                <th>Alamat</th>
                <th>Tanggal Lahir</th>
                <th>Aksi</th>
            </tr>

            @foreach ($pasiens as $ps)
                <tr>
                    <td>{{ $ps->user->name }}</td>
                    <td>{{ $ps->user->email }}</td>
                    <td>{{ $ps->no_hp }}</td>
                    <td>{{ $ps->alamat }}</td>
                    <td>{{ $ps->tanggal_lahir }}</td>
                    <td>
                        <a href="{{ route('admin.pasien.edit', $ps->id) }}" class="btn btn-warning btn-sm">
                            Edit
                        </a>

                        <form action="{{ route('admin.pasien.destroy', $ps->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</div>

@endsection
