@extends('layouts.public')

@section('title', 'Login')

@section('content')

<div class="public-card">

    <h3 class="text-center fw-bold mb-4">Login</h3>

    <form action="{{ route('login.process') }}" method="POST">
        @csrf

        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control mb-3" required>

        <label class="form-label">Password</label>
        <input type="password" name="password" class="form-control mb-4" required>

        <button class="btn btn-primary-custom w-100">Login</button>

        <div class="text-center mt-3">
            Belum punya akun?
            <a href="{{ route('register.form') }}" class="text-primary">Daftar</a>
        </div>
    </form>

</div>

@endsection
