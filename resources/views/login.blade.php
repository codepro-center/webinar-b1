@extends('template')

@section('content')
<section class="container">
    <div class="row">
        <div class="col-12 col-md-8 offset-md-1 col-lg-6 offset-lg-3 px-lg-5">
            <div class="card my-lg-5">
                <div class="card-body p-lg-4">
                    @error('login_error')
                        <div class="alert alert-danger mb-3" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                    <h1 class="card-title fs-3 fw-semibold text-center mb-3">Login</h1>
                    <form action="{{ route('auth') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="email" class="form-label fw-semibold">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Masukkan email" value="{{ old('email') }}" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="password" class="form-label fw-semibold">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Masukkan password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="d-flex justify-content-end mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="remember_me" name="remember_me" {{ old('remember_me') ? "checked" : '' }}>
                                <label class="form-check-label" for="remember_me">
                                    Ingat Saya?
                                </label>
                            </div>
                        </div>
                        <button class="btn btn-primary w-100">
                            Masuk
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection