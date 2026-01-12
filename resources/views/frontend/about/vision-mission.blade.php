@extends('frontend.layouts.app')

@section('title', 'Visi & Misi')

@section('content')
<div class="page-header">
    <div class="container">
        <h1>Visi & Misi LPPM</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                <li class="breadcrumb-item">Tentang Kami</li>
                <li class="breadcrumb-item active">Visi & Misi</li>
            </ol>
        </nav>
    </div>
</div>

<section class="py-5">
    <div class="container">
        @if($visionMission)
        <div class="row g-4">
            <!-- Visi -->
            <div class="col-md-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-5">
                        <div class="d-flex align-items-center mb-4">
                            <div class="icon-box me-3">
                                <i class="bi bi-eye" style="font-size: 48px; color: var(--secondary-color);"></i>
                            </div>
                            <h2 class="mb-0">VISI</h2>
                        </div>
                        <div class="vision-content p-4" style="background: var(--bg-light); border-radius: 12px;">
                            {!! $visionMission->vision !!}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Misi -->
            <div class="col-md-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-5">
                        <div class="d-flex align-items-center mb-4">
                            <div class="icon-box me-3">
                                <i class="bi bi-target" style="font-size: 48px; color: var(--secondary-color);"></i>
                            </div>
                            <h2 class="mb-0">MISI</h2>
                        </div>
                        <div class="mission-content p-4" style="background: var(--bg-light); border-radius: 12px;">
                            {!! $visionMission->mission !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="alert alert-info">
            <i class="bi bi-info-circle"></i> Informasi visi & misi belum tersedia.
        </div>
        @endif
    </div>
</section>
@endsection

@push('styles')
<style>
    .vision-content,
    .mission-content {
        font-size: 16px;
        line-height: 1.8;
    }

    .vision-content p,
    .mission-content p {
        margin-bottom: 15px;
    }

    .mission-content ol,
    .mission-content ul {
        padding-left: 30px;
    }

    .mission-content li {
        margin-bottom: 10px;
    }
</style>
@endpush