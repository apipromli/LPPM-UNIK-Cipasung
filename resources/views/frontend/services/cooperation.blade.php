@extends('frontend.layouts.app')

@section('title', 'Kerjasama')

@section('content')
<div class="page-header">
    <div class="container">
        <h1>Kerjasama</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                <li class="breadcrumb-item">Layanan</li>
                <li class="breadcrumb-item active">Kerjasama</li>
            </ol>
        </nav>
    </div>
</div>

<section class="py-5">
    <div class="container">
        <!-- Service Information -->
        @if($services->count() > 0)
        <div class="row g-4 mb-5">
            @foreach($services as $service)
            <div class="col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-start mb-3">
                            @if($service->icon)
                            <i class="bi bi-{{ $service->icon }} me-3"
                                style="font-size: 48px; color: var(--secondary-color);"></i>
                            @else
                            <i class="bi bi-handshake me-3"
                                style="font-size: 48px; color: var(--secondary-color);"></i>
                            @endif
                            <div>
                                <h4 class="mb-2">{{ $service->title }}</h4>
                            </div>
                        </div>
                        <div class="service-description">
                            {!! $service->description !!}
                        </div>
                        @if($service->link)
                        <a href="{{ $service->link }}" class="btn btn-outline-primary mt-3" target="_blank">
                            Selengkapnya <i class="bi bi-arrow-right"></i>
                        </a>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif

        <!-- Active Cooperations -->
        <div class="section-title mb-4">
            <h2>Kerjasama Aktif</h2>
            <p class="text-muted">Daftar kerjasama yang sedang berjalan</p>
        </div>

        @if($cooperations->count() > 0)
        <div class="row g-4">
            @foreach($cooperations as $cooperation)
            <div class="col-md-6 col-lg-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <h5 class="fw-bold">{{ $cooperation->partner_name }}</h5>
                            <span class="badge bg-success">{{ ucfirst($cooperation->status) }}</span>
                        </div>
                        <p class="text-primary mb-2">
                            <i class="bi bi-file-text"></i> {{ $cooperation->cooperation_type }}
                        </p>
                        @if($cooperation->description)
                        <p class="text-muted">{{ Str::limit($cooperation->description, 100) }}</p>
                        @endif
                        <div class="mt-3 pt-3 border-top">
                            <small class="text-muted d-block">
                                <i class="bi bi-calendar-check"></i>
                                Mulai: {{ $cooperation->start_date->format('d M Y') }}
                            </small>
                            @if($cooperation->end_date)
                            <small class="text-muted d-block">
                                <i class="bi bi-calendar-x"></i>
                                Berakhir: {{ $cooperation->end_date->format('d M Y') }}
                            </small>
                            @endif
                        </div>
                        @if($cooperation->document)
                        <a href="{{ asset('storage/' . $cooperation->document) }}"
                            class="btn btn-sm btn-outline-primary mt-3 w-100"
                            target="_blank">
                            <i class="bi bi-download"></i> Dokumen
                        </a>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <!-- Pagination -->
        <div class="mt-5 d-flex justify-content-center">
            {{ $cooperations->links() }}
        </div>
        @else
        <div class="alert alert-info">
            <i class="bi bi-info-circle"></i> Belum ada kerjasama aktif yang terdaftar.
        </div>
        @endif
    </div>
</section>
@endsection
@push('styles')
<style>
    .service-description {
        line-height: 1.8;
        color: var(--text-light);
    }

    .service-description ul,
    .service-description ol {
        padding-left: 25px;
    }

    .service-description li {
        margin-bottom: 8px;
    }
</style>
@endpush