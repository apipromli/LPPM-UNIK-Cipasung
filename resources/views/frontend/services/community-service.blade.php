@extends('frontend.layouts.app')

@section('title', 'Layanan Pengabdian Masyarakat')

@section('content')
<div class="page-header">
    <div class="container">
        <h1>Layanan Pengabdian Masyarakat</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                <li class="breadcrumb-item">Layanan</li>
                <li class="breadcrumb-item active">Pengabdian Masyarakat</li>
            </ol>
        </nav>
    </div>
</div>

<section class="py-5">
    <div class="container">
        @if($services->count() > 0)
        <div class="row g-4">
            @foreach($services as $service)
            <div class="col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-start mb-3">
                            @if($service->icon)
                            <i class="bi bi-{{ $service->icon }} me-3"
                                style="font-size: 48px; color: var(--secondary-color);"></i>
                            @else
                            <i class="bi bi-people me-3"
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
        @else
        <div class="alert alert-info">
            <i class="bi bi-info-circle"></i> Informasi layanan pengabdian masyarakat belum tersedia.
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