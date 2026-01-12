@extends('frontend.layouts.app')

@section('title', 'Staf LPPM')

@section('content')
<div class="page-header">
    <div class="container">
        <h1>Staf LPPM</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                <li class="breadcrumb-item">Tentang Kami</li>
                <li class="breadcrumb-item active">Staf LPPM</li>
            </ol>
        </nav>
    </div>
</div>

<section class="py-5">
    <div class="container">
        @if($staff->count() > 0)
        <div class="row g-4">
            @foreach($staff as $staf)
            <div class="col-md-6 col-lg-3">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center p-4">
                        @if($staf->photo)
                        <img src="{{ asset('storage/' . $staf->photo) }}"
                            alt="{{ $staf->name }}"
                            class="rounded-circle mb-3"
                            style="width: 120px; height: 120px; object-fit: cover; border: 4px solid var(--bg-light);">
                        @else
                        <div class="rounded-circle mb-3 mx-auto d-flex align-items-center justify-content-center"
                            style="width: 120px; height: 120px; background: var(--bg-light);">
                            <i class="bi bi-person" style="font-size: 48px; color: var(--text-light);"></i>
                        </div>
                        @endif

                        <h6 class="fw-bold mb-1">{{ $staf->name }}</h6>
                        <p class="text-primary small mb-2">{{ $staf->position }}</p>

                        <div class="mt-2">
                            @if($staf->email)
                            <small class="d-block text-muted">
                                <i class="bi bi-envelope"></i> {{ $staf->email }}
                            </small>
                            @endif
                            @if($staf->phone)
                            <small class="d-block text-muted">
                                <i class="bi bi-telephone"></i> {{ $staf->phone }}
                            </small>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="alert alert-info">
            <i class="bi bi-info-circle"></i> Data staf belum tersedia.
        </div>
        @endif
    </div>
</section>
@endsection