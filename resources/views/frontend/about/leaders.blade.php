@extends('frontend.layouts.app')

@section('title', 'Profil Pimpinan')

@section('content')
<div class="page-header">
    <div class="container">
        <h1>Profil Pimpinan LPPM</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                <li class="breadcrumb-item">Tentang Kami</li>
                <li class="breadcrumb-item active">Profil Pimpinan</li>
            </ol>
        </nav>
    </div>
</div>

<section class="py-5">
    <div class="container">
        @if($leaders->count() > 0)
        <div class="row g-4">
            @foreach($leaders as $leader)
            <div class="col-md-6 col-lg-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center p-4">
                        @if($leader->photo)
                        <img src="{{ asset('storage/' . $leader->photo) }}"
                            alt="{{ $leader->name }}"
                            class="rounded-circle mb-3"
                            style="width: 150px; height: 150px; object-fit: cover; border: 5px solid var(--bg-light);">
                        @else
                        <div class="rounded-circle mb-3 mx-auto d-flex align-items-center justify-content-center"
                            style="width: 150px; height: 150px; background: var(--bg-light);">
                            <i class="bi bi-person" style="font-size: 64px; color: var(--text-light);"></i>
                        </div>
                        @endif

                        <h5 class="fw-bold mb-2">{{ $leader->name }}</h5>
                        <p class="text-primary mb-3">{{ $leader->position }}</p>

                        @if($leader->biography)
                        <p class="text-muted small text-start">
                            {{ Str::limit($leader->biography, 150) }}
                        </p>
                        @endif

                        <div class="mt-3">
                            @if($leader->email)
                            <a href="mailto:{{ $leader->email }}" class="btn btn-sm btn-outline-primary me-2">
                                <i class="bi bi-envelope"></i>
                            </a>
                            @endif
                            @if($leader->phone)
                            <a href="tel:{{ $leader->phone }}" class="btn btn-sm btn-outline-primary">
                                <i class="bi bi-telephone"></i>
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="alert alert-info">
            <i class="bi bi-info-circle"></i> Data pimpinan belum tersedia.
        </div>
        @endif
    </div>
</section>
@endsection