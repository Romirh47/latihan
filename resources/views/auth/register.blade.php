@extends('layouts.guest')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" id="name" aria-describedby="emailHelp" name="name"
                :value="old('name')" required autofocus autocomplete="name">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email"
                value="{{ old('email') }}" required autofocus autocomplete="username">
        </div>
        <div class="mb-4">
            <label for="exampleInputPassword1" class="form-label">Kata Sandi</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password" required
                autocomplete="current-password">
        </div>
        <div class="mb-4">
            <label for="exampleInputPassword1" class="form-label">Konfirmasi Kata Sandi</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password_confirmation" required
                autocomplete="new-password">
        </div>
        <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Daftar</button>
        <div class="d-flex align-items-center justify-content-center">
            <p class="fs-4 mb-0 fw-bold">Sudah punya akun?</p>
            <a class="text-primary fw-bold ms-2" href="{{ route('login') }}">Masuk</a>
        </div>
    </form>
@endsection
