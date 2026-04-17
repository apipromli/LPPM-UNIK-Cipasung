@extends('frontend.layouts.app')

@section('title', $studyCenter->name)

@section('content')
<!-- Page Header -->
<div class="page-header">
    <div class="container">
        <h1>{{ $studyCenter->name }}</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                <li class="breadcrumb-item"><a href="{{ route('study-centers.index') }}">Pusat Studi</a></li>
                <li class="breadcrumb-item active">{{ $studyCenter->short_name ?? $studyCenter->name }}</li>
            </ol>
        </nav>
    </div>
</div>

<section class="py-5">
    <div class="container">
        <div class="row">
            <!-- Main Content -->
            <div class="col-lg-8">
                @if($studyCenter->image)
                <img src="{{ asset('storage/' . $studyCenter->image) }}"
                    class="img-fluid rounded-3 mb-4 w-100"
                    style="max-height:380px; object-fit:cover;"
                    alt="{{ $studyCenter->name }}">
                @endif

                <div class="card mb-4">
                    <div class="card-body">
                        <h4 class="fw-bold mb-3" style="color: var(--primary-color);">
                            <i class="bi bi-info-circle me-2"></i>Tentang {{ $studyCenter->name }}
                        </h4>
                        <p class="lead">{{ $studyCenter->description }}</p>

                        @if($studyCenter->content)
                        <div class="mt-3">{!! $studyCenter->content !!}</div>
                        @endif
                    </div>
                </div>

                @if($studyCenter->vision || $studyCenter->mission)
                <div class="card mb-4">
                    <div class="card-body">
                        @if($studyCenter->vision)
                        <div class="mb-4">
                            <h5 class="fw-bold" style="color: var(--primary-color);">
                                <i class="bi bi-eye me-2"></i>Visi
                            </h5>
                            <div class="p-3 rounded" style="background: linear-gradient(135deg, #e0f2fe, #bfdbfe); border-left: 4px solid var(--secondary-color);">
                                <p class="mb-0">{{ $studyCenter->vision }}</p>
                            </div>
                        </div>
                        @endif

                        @if($studyCenter->mission)
                        <div>
                            <h5 class="fw-bold" style="color: var(--primary-color);">
                                <i class="bi bi-bullseye me-2"></i>Misi
                            </h5>
                            <div class="p-3 rounded" style="background: #f0fdf4; border-left: 4px solid #22c55e;">
                                <p class="mb-0" style="white-space: pre-line;">{{ $studyCenter->mission }}</p>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                @endif

                @if($studyCenter->programs)
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="fw-bold mb-3" style="color: var(--primary-color);">
                            <i class="bi bi-list-check me-2"></i>Program Kegiatan
                        </h5>
                        <p style="white-space: pre-line;">{{ $studyCenter->programs }}</p>
                    </div>
                </div>
                @endif
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <!-- Head Card -->
                @if($studyCenter->head_name)
                <div class="card mb-4">
                    <div class="card-header">
                        <h6 class="mb-0 fw-bold">Ketua Pusat Studi</h6>
                    </div>
                    <div class="card-body text-center">
                        @if($studyCenter->head_photo)
                        <img src="{{ asset('storage/' . $studyCenter->head_photo) }}"
                            class="rounded-circle mb-3"
                            style="width:100px;height:100px;object-fit:cover;border:3px solid var(--secondary-color);">
                        @else
                        <div class="rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3"
                            style="width:100px;height:100px;background:linear-gradient(135deg,var(--primary-color),var(--secondary-color));">
                            <i class="bi bi-person-fill text-white" style="font-size:2.5rem;"></i>
                        </div>
                        @endif
                        <h6 class="fw-bold mb-0">{{ $studyCenter->head_name }}</h6>
                        <small class="text-muted">Ketua {{ $studyCenter->short_name ?? '' }}</small>
                    </div>
                </div>
                @endif

                <!-- Contact Card -->
                @if($studyCenter->email || $studyCenter->phone)
                <div class="card mb-4">
                    <div class="card-header">
                        <h6 class="mb-0 fw-bold">Kontak</h6>
                    </div>
                    <div class="card-body">
                        @if($studyCenter->email)
                        <div class="d-flex align-items-center mb-2">
                            <i class="bi bi-envelope-fill me-2" style="color: var(--secondary-color);"></i>
                            <a href="mailto:{{ $studyCenter->email }}" class="text-decoration-none">
                                {{ $studyCenter->email }}
                            </a>
                        </div>
                        @endif
                        @if($studyCenter->phone)
                        <div class="d-flex align-items-center">
                            <i class="bi bi-telephone-fill me-2" style="color: var(--secondary-color);"></i>
                            <span>{{ $studyCenter->phone }}</span>
                        </div>
                        @endif
                    </div>
                </div>
                @endif

                <!-- Back Link -->
                <a href="{{ route('study-centers.index') }}" class="btn btn-outline-primary w-100">
                    <i class="bi bi-arrow-left me-1"></i>Kembali ke Daftar Pusat Studi
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
