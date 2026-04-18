@extends('layouts.app')

@section('content')
<style>
    * { box-sizing: border-box; margin: 0; padding: 0; }

    body {
        font-family: 'Inter', 'Segoe UI', sans-serif;
        background: #f0f4f0;
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .login-page {
        width: 100%;
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #0a3520 0%, #0e4226 50%, #1a5c35 100%);
        padding: 20px;
        position: relative;
        overflow: hidden;
    }

    .login-page::before {
        content: '';
        position: absolute;
        top: -120px; right: -120px;
        width: 400px; height: 400px;
        border-radius: 50%;
        background: rgba(184,148,10,.12);
    }
    .login-page::after {
        content: '';
        position: absolute;
        bottom: -80px; left: -80px;
        width: 300px; height: 300px;
        border-radius: 50%;
        background: rgba(255,255,255,.04);
    }

    .login-card {
        width: 100%;
        max-width: 960px;
        background: #fff;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 30px 80px rgba(0,0,0,.25);
        display: grid;
        grid-template-columns: 1fr 1fr;
        position: relative;
        z-index: 1;
    }

    /* LEFT PANEL */
    .login-left {
        background: linear-gradient(160deg, #0e4226 0%, #1a6638 60%, #b8940a 100%);
        padding: 50px 40px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        position: relative;
        overflow: hidden;
    }
    .login-left::before {
        content: '';
        position: absolute;
        top: -60px; right: -60px;
        width: 220px; height: 220px;
        border-radius: 50%;
        background: rgba(255,255,255,.06);
    }
    .login-left::after {
        content: '';
        position: absolute;
        bottom: -40px; left: -40px;
        width: 160px; height: 160px;
        border-radius: 50%;
        background: rgba(184,148,10,.15);
    }

    .left-logo {
        width: 130px;
        margin-bottom: 28px;
        position: relative;
        z-index: 1;
        filter: drop-shadow(0 4px 12px rgba(0,0,0,.2));
    }

    .left-title {
        color: #fff;
        font-size: 1.6rem;
        font-weight: 800;
        line-height: 1.3;
        margin-bottom: 10px;
        position: relative;
        z-index: 1;
    }

    .left-subtitle {
        color: rgba(255,255,255,.8);
        font-size: .9rem;
        line-height: 1.6;
        margin-bottom: 32px;
        position: relative;
        z-index: 1;
    }

    .left-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: rgba(255,255,255,.12);
        border: 1px solid rgba(255,255,255,.2);
        color: #fff;
        padding: 10px 20px;
        border-radius: 50px;
        font-size: .82rem;
        font-weight: 500;
        backdrop-filter: blur(6px);
        position: relative;
        z-index: 1;
    }
    .left-badge span { color: #f7d878; }

    /* RIGHT PANEL */
    .login-right {
        padding: 50px 44px;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .form-title {
        font-size: 1.75rem;
        font-weight: 800;
        color: #0e4226;
        margin-bottom: 4px;
    }
    .form-desc {
        color: #6b7280;
        font-size: .9rem;
        margin-bottom: 32px;
    }

    .alert-error {
        background: #fef2f2;
        border: 1px solid #fecaca;
        border-radius: 10px;
        padding: 12px 16px;
        color: #b91c1c;
        font-size: .875rem;
        margin-bottom: 20px;
    }

    .field-group {
        margin-bottom: 18px;
    }
    .field-label {
        display: block;
        font-size: .82rem;
        font-weight: 600;
        color: #374151;
        margin-bottom: 6px;
        letter-spacing: .3px;
    }
    .field-wrap {
        position: relative;
    }
    .field-icon {
        position: absolute;
        left: 14px;
        top: 50%;
        transform: translateY(-50%);
        color: #9ca3af;
        font-size: 15px;
        pointer-events: none;
    }
    .field-input {
        width: 100%;
        padding: 13px 14px 13px 42px;
        font-size: .92rem;
        border-radius: 10px;
        border: 1.8px solid #e5e7eb;
        background: #f9fafb;
        color: #111827;
        transition: .2s ease;
        outline: none;
    }
    .field-input:focus {
        border-color: #0e4226;
        background: #fff;
        box-shadow: 0 0 0 3px rgba(14,66,38,.1);
    }
    .field-input.is-invalid {
        border-color: #ef4444;
    }
    .invalid-msg {
        color: #ef4444;
        font-size: .78rem;
        margin-top: 4px;
    }

    .row-options {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 24px;
        font-size: .85rem;
    }
    .remember-label {
        display: flex;
        align-items: center;
        gap: 7px;
        color: #4b5563;
        cursor: pointer;
    }
    .remember-label input[type="checkbox"] {
        width: 16px;
        height: 16px;
        accent-color: #0e4226;
    }

    .btn-login {
        width: 100%;
        padding: 14px;
        border-radius: 10px;
        border: none;
        background: linear-gradient(135deg, #0e4226, #1a6638);
        color: #fff;
        font-size: .95rem;
        font-weight: 700;
        letter-spacing: .3px;
        cursor: pointer;
        transition: .25s ease;
        box-shadow: 0 4px 14px rgba(14,66,38,.3);
    }
    .btn-login:hover {
        transform: translateY(-1px);
        box-shadow: 0 6px 20px rgba(14,66,38,.4);
        background: linear-gradient(135deg, #1a6638, #2d8653);
    }
    .btn-login:active { transform: translateY(0); }

    .back-link {
        display: block;
        text-align: center;
        margin-top: 20px;
        color: #6b7280;
        font-size: .85rem;
        text-decoration: none;
    }
    .back-link:hover { color: #0e4226; }

    @media (max-width: 700px) {
        .login-card { grid-template-columns: 1fr; }
        .login-left { display: none; }
        .login-right { padding: 36px 24px; }
    }
</style>

<div class="login-page">
    <div class="login-card">

        {{-- LEFT --}}
        <div class="login-left">
            <img src="{{ asset('assets/images/image.png') }}" alt="Logo LPPM" class="left-logo"
                 onerror="this.src=''; this.alt='LPPM'">
            <div class="left-title">LPPM UNIK Cipasung</div>
            <div class="left-subtitle">
                Lembaga Penelitian dan Pengabdian kepada Masyarakat<br>
                Universitas Islam KH. Ruhiyat
            </div>
            <div class="left-badge">
                <span>&#9679;</span> Sistem Manajemen Riset & PKM
            </div>
        </div>

        {{-- RIGHT --}}
        <div class="login-right">
            <div class="form-title">Selamat Datang</div>
            <div class="form-desc">Masuk ke panel admin LPPM</div>

            @if ($errors->any())
            <div class="alert-error">
                {{ $errors->first() }}
            </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="field-group">
                    <label class="field-label">Email</label>
                    <div class="field-wrap">
                        <i class="bi bi-envelope field-icon"></i>
                        <input type="email" name="email"
                               class="field-input {{ $errors->has('email') ? 'is-invalid' : '' }}"
                               value="{{ old('email') }}"
                               placeholder="admin@lppm.unik.ac.id"
                               required autofocus>
                    </div>
                    @error('email') <div class="invalid-msg">{{ $message }}</div> @enderror
                </div>

                <div class="field-group">
                    <label class="field-label">Password</label>
                    <div class="field-wrap">
                        <i class="bi bi-lock field-icon"></i>
                        <input type="password" name="password"
                               class="field-input {{ $errors->has('password') ? 'is-invalid' : '' }}"
                               placeholder="••••••••"
                               required>
                    </div>
                    @error('password') <div class="invalid-msg">{{ $message }}</div> @enderror
                </div>

                <div class="row-options">
                    <label class="remember-label">
                        <input type="checkbox" name="remember"> Ingat Saya
                    </label>
                </div>

                <button type="submit" class="btn-login">Masuk ke Dashboard</button>
            </form>

            <a href="{{ route('home') }}" class="back-link">← Kembali ke Website</a>
        </div>

    </div>
</div>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
@endsection
