@extends('layouts.auth', ['title' => 'Login'])

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h4>Login</h4>
        </div>

        <div class="card-body">
            @if (session('status'))
                <div class="text-center">
                    <div class="badge badge-warning">
                        {{ session('status') }}
                    </div>
                </div>
            @endif
            <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate="">
                @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                        tabindex="1" required autofocus>
                    @error('email')
                        <div class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <div class="d-block">
                        <label for="password" class="control-label">Password</label>
                        <div class="float-right">
                            <a href="/forgot-password" class="text-small">
                                Forgot Password?
                            </a>
                        </div>
                    </div>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" tabindex="2" required>
                    @error('password')
                        <div class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                        <label class="custom-control-label" for="remember-me">Remember Me</label>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                        Login
                    </button>
                </div>
            </form>
            <code>
            <p>Admin: admin@gmail.com</p>
            <p>Password: password</p>
            <br>
            <p>Siswa: siswa@gmail.com</p>
            <p>Password: password</p>

            </code>
            <p>Mendaftar sebagai siswa silahkan <a href="{{ route('register') }}">Register Siswa</p>
        </div>
    </div>
@endsection
