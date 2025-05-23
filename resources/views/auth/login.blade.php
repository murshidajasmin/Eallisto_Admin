@extends('layouts.app')

@section('content')
<style>
    body {
        margin: 0;
        padding: 0;
        background: linear-gradient(to right, #A9A9A9, #764ba2);
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .login-container {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 90vh;
    }

    .login-box {
        background: white;
        padding: 40px 30px;
        border-radius: 12px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        width: 100%;
        max-width: 400px;
    }

    .login-box h2 {
        text-align: center;
        margin-bottom: 25px;
        color: #333;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-control {
        width: 91%;
        padding: 12px 15px;
        border-radius: 8px;
        border: 1px solid #ccc;
        font-size: 14px;
        transition: border 0.3s;
    }

    .form-control:focus {
        outline: none;
        border-color: #667eea;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.2);
    }

    .btn-login {
        width: 100%;
        background: #667eea;
        border: none;
        padding: 12px;
        border-radius: 8px;
        font-size: 16px;
        font-weight: bold;
        color: white;
        cursor: pointer;
        transition: background 0.3s;
    }

    .btn-login:hover {
        background: #556cd6;
    }

    .forgot-password {
        display: block;
        margin-top: 15px;
        text-align: right;
        font-size: 13px;
        color: #555;
    }

    .forgot-password:hover {
        color: #333;
        text-decoration: underline;
    }
</style>

<div class="login-container">
    <div class="login-box">
        <h2>Admin Login</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <input id="username" type="text"
                       class="form-control @error('username') is-invalid @enderror"
                       name="username" value="{{ old('username') }}" required autofocus
                       placeholder="Username">

                @error('username')
                    <span class="text-danger" style="font-size: 13px;">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <input id="password" type="password"
                       class="form-control @error('password') is-invalid @enderror"
                       name="password" required
                       placeholder="Password">

                @error('password')
                    <span class="text-danger" style="font-size: 13px;">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn-login">Login</button>

        </form>
    </div>
</div>
@endsection
