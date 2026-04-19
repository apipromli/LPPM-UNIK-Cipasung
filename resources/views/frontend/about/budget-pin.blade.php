@extends('frontend.layouts.app')
@section('title', 'Akses Realisasi Anggaran')
@section('content')
<div class="page-header">
    <div class="container">
        <h1>Realisasi Anggaran LPPM</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                <li class="breadcrumb-item">Tentang Kami</li>
                <li class="breadcrumb-item active">Realisasi Anggaran</li>
            </ol>
        </nav>
    </div>
</div>

<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="pin-card">
                    <div class="pin-icon"><i class="bi bi-shield-lock-fill"></i></div>
                    <h4>Akses Terbatas</h4>
                    <p class="text-muted">Halaman ini memerlukan PIN untuk melindungi kerahasiaan data anggaran. Silakan masukkan PIN yang telah diberikan.</p>

                    @if($errors->any())
                    <div class="alert alert-danger py-2">
                        <i class="bi bi-exclamation-circle"></i> {{ $errors->first() }}
                    </div>
                    @endif

                    <form method="POST" action="{{ route('about.budget-pin.verify') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Masukkan PIN</label>
                            <input type="password" name="pin" class="form-control form-control-lg text-center pin-input"
                                   maxlength="10" placeholder="● ● ● ●" autofocus autocomplete="off">
                        </div>
                        <button type="submit" class="btn btn-primary w-100 py-2">
                            <i class="bi bi-unlock"></i> Verifikasi PIN
                        </button>
                    </form>
                    <div class="mt-3 text-center">
                        <a href="{{ route('home') }}" class="text-muted small">← Kembali ke Beranda</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
.pin-card {
    background: #fff;
    border: 1px solid #e5e7eb;
    border-radius: 16px;
    padding: 40px 36px;
    text-align: center;
    box-shadow: 0 4px 24px rgba(14,66,38,.08);
}
.pin-icon {
    width: 72px; height: 72px;
    background: linear-gradient(135deg, #0e4226, #1a6638);
    border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    margin: 0 auto 20px;
    color: #fff; font-size: 2rem;
}
.pin-input {
    letter-spacing: 8px;
    font-size: 1.4rem;
    border: 2px solid #d1fae5;
    border-radius: 10px;
}
.pin-input:focus {
    border-color: #0e4226;
    box-shadow: 0 0 0 3px rgba(14,66,38,.1);
}
</style>
@endpush
