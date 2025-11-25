<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klinik Sehat</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            font-family: "Poppins", sans-serif;
            background: linear-gradient(135deg, #b6e8f7, #d9e5ff);
            min-height: 100vh;
            margin: 0;
        }

        .sidebar {
            width: 240px;
            position: fixed;
            left: 0;
            top: 0;
            height: 100vh;
            background: rgba(255, 255, 255, 0.35);
            backdrop-filter: blur(12px);
            padding-top: 30px;
            box-shadow: 3px 0 12px rgba(0, 0, 0, 0.08);
        }

        .sidebar h4 {
            text-align: center;
            font-weight: 700;
            margin-bottom: 25px;
            color: #064e3b;
        }

        .sidebar a {
            display: block;
            padding: 14px 22px;
            margin: 6px 12px;
            border-radius: 10px;
            color: #064e3b;
            font-weight: 500;
            text-decoration: none;
            transition: 0.2s;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: rgba(255, 255, 255, 0.55);
        }

        .content {
            margin-left: 240px;
            padding: 40px;
        }

        .modern-card {
            background: white;
            padding: 30px;
            border-radius: 18px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.07);
            animation: fadeIn .4s ease;
        }

        @keyframes fadeIn {
            from { opacity:0; transform:translateY(20px); }
            to { opacity:1; transform:translateY(0); }
        }
    </style>

    @stack('styles')
</head>

<body>

@if(Auth::check())
<div class="sidebar">

    <h4>
        <img src="https://cdn-icons-png.flaticon.com/512/2966/2966485.png" width="26" class="me-2">
        Klinik Sehat
    </h4>

    @if(Auth::user()->role === 'admin')

        <a href="{{ route('admin.dashboard') }}" class="{{ request()->is('admin/dashboard') ? 'active' : '' }}">
            <i class="bi bi-speedometer2"></i> Dashboard
        </a>

        <a href="{{ route('admin.dokter.index') }}" class="{{ request()->is('admin/dokter*') ? 'active' : '' }}">
            <i class="bi bi-person-badge"></i> Data Dokter
        </a>

        <a href="{{ route('admin.pasien.index') }}" class="{{ request()->is('admin/pasien*') ? 'active' : '' }}">
            <i class="bi bi-people"></i> Data Pasien
        </a>

        <a href="{{ route('admin.pendaftaran.index') }}" class="{{ request()->is('admin/pendaftaran*') ? 'active' : '' }}">
            <i class="bi bi-calendar-check"></i> Janji Temu
        </a>

        <a href="{{ route('admin.laporan.index') }}" class="{{ request()->is('admin/laporan*') ? 'active' : '' }}">
            <i class="bi bi-file-earmark-text"></i> Laporan
        </a>

        <a href="{{ route('admin.chat.list') }}" class="{{ request()->is('admin/chat*') ? 'active' : '' }}">
            <i class="bi bi-chat-dots"></i> Chat Pasien
        </a>

    @endif

    @if(Auth::user()->role === 'pasien')

        <a href="{{ route('pasien.dashboard') }}" class="{{ request()->is('pasien/dashboard') ? 'active' : '' }}">
            <i class="bi bi-house"></i> Dashboard
        </a>

        <a href="{{ route('pasien.profil') }}" class="{{ request()->is('pasien/profil*') ? 'active' : '' }}">
            <i class="bi bi-person-circle"></i> Profil Saya
        </a>

        <a href="{{ route('pasien.pendaftaran.index') }}" class="{{ request()->is('pasien/pendaftaran*') ? 'active' : '' }}">
            <i class="bi bi-clipboard-check"></i> Pendaftaran
        </a>

        <a href="{{ route('pasien.chat') }}" class="{{ request()->is('pasien/chat*') ? 'active' : '' }}">
            <i class="bi bi-chat-left-text"></i> Chat Admin
        </a>

    @endif

    <hr class="mx-3">

    <form action="{{ route('logout') }}" method="POST" class="mx-3">
        @csrf
        <button class="btn btn-danger w-100">
            <i class="bi bi-box-arrow-right"></i> Logout
        </button>
    </form>

</div>
@endif

<div class="content">
    <div class="modern-card">
        @yield('content')
    </div>
</div>

</body>
</html>
