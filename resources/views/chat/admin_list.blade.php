@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header bg-success text-white">
        Daftar Pasien
    </div>

    <div class="card-body">
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama Pasien</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach($pasiens as $p)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $p->name }}</td>
                    <td>{{ $p->email }}</td>

                    <td>
                        @php
                            $unread = \App\Models\PrivateChat::where('user_id', $p->id)
                                ->where('sender_role', 'pasien')
                                ->where('is_read', false)
                                ->count();
                        @endphp

                        <a href="{{ route('admin.chat.room', $p->id) }}"
                           class="btn btn-success btn-sm position-relative">

                           <i class="bi bi-chat-dots"></i> Chat

                           @if($unread > 0)
                               {{-- Titik merah indikator pesan baru --}}
                               <span class="position-absolute top-0 start-100 translate-middle 
                                            p-2 bg-danger border border-light rounded-circle">
                               </span>
                           @endif

                        </a>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
