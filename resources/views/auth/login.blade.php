@extends('layouts.app')

@section('content')
<div class="login-container">
    <div class="login-wrapper">

        {{-- LEFT : ILLUSTRATION --}}
        <div class="login-illustration">
            <div class="illustration-content">
                <div class="illustration-graphic">
                    <img src="{{ asset('assets/images/login.jpg') }}"
                        alt="Login Illustration"
                        style="max-width:100%; height:auto;">
                </div>

                <div class="illustration-text">
                    <h2>Selamat Datang di</h2>
                    <h3>LPPM UNIK Cipasung</h3>
                    <p>Sistem Manajemen Penelitian dan Pengabdian Masyarakat</p>
                </div>
            </div>
        </div>

        {{-- RIGHT : FORM --}}
        <div class="login-form-section">
            <div class="login-form-container">

                <div class="logo-section">
                    <img src="{{ asset('assets/images/image.png') }}" class="main-logo" alt="Logo LPPM">
                </div>

                <div class="form-header">
                    <h1>Login</h1>
                    <p>Masukkan kredensial admin</p>
                </div>
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    {{-- Email --}}
                    <div class="form-group floating-group">
                        <span class="input-icon">@</span>
                        <input type="email"
                            name="email"
                            class="form-control floating-input"
                            value="{{ old('email') }}"
                            required
                            placeholder=" ">
                        <label class="floating-label">Email Admin</label>
                    </div>

                    {{-- Password --}}
                    <div class="form-group floating-group">
                        <span class="input-icon">🔒</span>
                        <input type="password"
                            name="password"
                            class="form-control floating-input"
                            required
                            placeholder=" ">
                        <label class="floating-label">Password</label>
                    </div>

                    {{-- Remember --}}
                    <div class="form-options">
                        <label class="checkbox">
                            <input type="checkbox" name="remember">
                            <span>Ingat Saya</span>
                        </label>
                    </div>

                    <button class="btn-login" type="submit">
                        Login →
                    </button>
                </form>

            </div>
        </div>

    </div>
</div>
<style>
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    .login-container {
        min-height: calc(90vh - 64px);
        /* OFFSET NAVBAR */
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #f5f7fb, #e8f4fd);
        padding: 12px;
    }

    .login-wrapper {
        display: grid;
        grid-template-columns: 1fr 1fr;
        width: 100%;
        max-width: 1000px;
        height: 560px;
        background: #fff;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 20px 50px rgba(0, 0, 0, .08);
    }

    /* LEFT */
    .login-illustration {
        background: linear-gradient(135deg, #1a7f3f 0%, #2d9f52 25%, #f39c12 75%, #e67e22 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 32px;
    }

    .illustration-text {
        color: white;
        text-align: center;
    }

    .illustration-text h2 {
        font-weight: 300;
    }

    .illustration-text h3 {
        font-size: 1.8rem;
        font-weight: 700;
    }

    /* RIGHT */
    .login-form-section {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .login-form-container {
        width: 100%;
        max-width: 360px;
    }

    .logo-section {
        display: flex;
        justify-content: center;
        margin-bottom: 16px;
    }

    .main-logo {
        width: 220px;
        background: #fff;
        padding: 10px;
        border-radius: 12px;
        box-shadow: 0 6px 18px rgba(0, 0, 0, .15);
    }

    .form-header {
        text-align: center;
        margin-bottom: 20px;
    }

    .form-group {
        margin-bottom: 14px;
    }

    .form-control {
        width: 100%;
        padding: 12px;
        border-radius: 10px;
        border: 1.8px solid #e2e8f0;
        background: #f7fafc;
    }

    .form-options {
        margin: 10px 0 18px;
    }

    .btn-login {
        width: 100%;
        padding: 14px;
        border-radius: 10px;
        border: none;
        background: linear-gradient(135deg, #1E5EFF, #0D47A1);
        color: #fff;
        font-weight: 600;
        cursor: pointer;
    }

    /* MOBILE */
    @media (max-width: 900px) {
        .login-wrapper {
            grid-template-columns: 1fr;
            height: auto;
        }

        .login-illustration {
            display: none;
        }
    }

    /* Left Side - Illustration */
    .login-illustration {
        background: linear-gradient(135deg, #1E5EFF 0%, #0D47A1 100%);
        padding: 60px 40px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        position: relative;
        overflow: hidden;
    }

    .illustration-content {
        width: 100%;
        max-width: 500px;
        text-align: center;
        position: relative;
        z-index: 2;
    }

    .illustration-graphic {
        width: 100%;
        max-width: 500px;
        margin: 0 auto 30px;
    }

    .illustration-graphic svg {
        width: 100%;
        height: auto;
    }

    .illustration-text {
        color: #ffffff;
    }

    .illustration-text h2 {
        font-size: 1.8rem;
        font-weight: 300;
        margin-bottom: 8px;
        opacity: 0.95;
    }

    .illustration-text h3 {
        font-size: 2.2rem;
        font-weight: 700;
        margin-bottom: 12px;
    }

    .illustration-text p {
        font-size: 1rem;
        opacity: 0.85;
        line-height: 1.5;
    }

    /* =========================
   FLOATING INPUT
========================= */
    .floating-group {
        position: relative;
        margin-bottom: 18px;
    }

    .input-icon {
        position: absolute;
        left: 14px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 16px;
        color: #94a3b8;
        pointer-events: none;
    }

    .floating-input {
        width: 100%;
        padding: 14px 14px 14px 44px;
        font-size: .95rem;
        border-radius: 12px;
        border: 1.8px solid #e2e8f0;
        background: #f8fafc;
        transition: .25s ease;
    }

    .floating-input:focus {
        background: #fff;
        border-color: #1E5EFF;
        box-shadow: 0 0 0 3px rgba(30, 94, 255, .12);
        outline: none;
    }

    /* Floating Label */
    .floating-label {
        position: absolute;
        left: 44px;
        top: 50%;
        transform: translateY(-50%);
        font-size: .9rem;
        color: #94a3b8;
        background: #fff;
        padding: 0 6px;
        pointer-events: none;
        transition: .25s ease;
    }

    /* Saat focus / terisi */
    .floating-input:focus+.floating-label,
    .floating-input:not(:placeholder-shown)+.floating-label {
        top: -8px;
        font-size: .75rem;
        color: #1E5EFF;
        font-weight: 600;
    }
</style>
@endsection