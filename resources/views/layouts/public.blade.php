<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Klinik Sehat')</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #b5e8f4, #d7e8ff);
            min-height: 100vh;
            margin: 0;
        }

        .navbar-custom {
            background: #ffffffc7;
            backdrop-filter: blur(10px);
            padding: 12px 0;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }

        .btn-primary-custom {
            background: #007bff;
            border-radius: 25px;
            padding: 8px 22px;
            border: none;
            font-weight: 600;
            transition: 0.3s;
            color: white;
        }

        .btn-primary-custom:hover {
            background: #0066d4;
        }

        .public-card {
            background: #ffffff;
            border-radius: 25px;
            padding: 40px;
            width: 450px;
            margin: 50px auto;
            box-shadow: 0px 12px 25px rgba(0, 0, 0, 0.1);
            animation: fadeIn 0.8s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>

    @stack('styles')

</head>

<body>

    {{-- NAVIGATION --}}
    <nav class="navbar navbar-custom fixed-top">
        <div class="container d-flex justify-content-between align-items-center">
            <a href="/" class="navbar-brand fw-bold">
                <img src="https://cdn-icons-png.flaticon.com/512/2966/2966485.png" width="28" class="me-2">
                Klinik Sehat
            </a>

            @if(
            !Auth::check() &&
            !request()->is('login') &&
            !request()->is('register') &&
            !request()->routeIs('login') &&
            !request()->routeIs('register')
            )
            <a href="{{ route('login') }}" class="btn btn-primary-custom">Login</a>
            @endif

        </div>
    </nav>

    {{-- KONTEN HALAMAN --}}
    <div style="padding-top: 100px;">
        @yield('content')
    </div>

</body>

</html>