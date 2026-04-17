@extends('frontend.layouts.app')

@section('title', 'Pusat Studi')

@section('content')
<!-- Page Header -->
<div class="page-header">
    <div class="container">
        <h1>Pusat Studi</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                <li class="breadcrumb-item active">Pusat Studi</li>
            </ol>
        </nav>
    </div>
</div>

<section class="py-5">
    <div class="container">
        <div class="section-title mb-5">
            <h2>Pusat Studi di bawah LPPM</h2>
            <p class="text-muted">Lembaga kajian dan pengembangan bidang akademik dan sosial</p>
        </div>

        @if($studyCenters->count() > 0)
        <div class="row g-4">
            @foreach($studyCenters as $center)
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="card h-100 study-center-card">
                    @if($center->image)
                    <img src="{{ asset('storage/' . $center->image) }}"
                        class="card-img-top" alt="{{ $center->name }}"
                        style="height: 200px; object-fit: cover;">
                    @else
                    <div class="card-img-top d-flex align-items-center justify-content-center"
                        style="height:200px; background: linear-gradient(135deg, #1e3a8a, #3b82f6);">
                        <i class="bi bi-buildings text-white" style="font-size: 4rem;"></i>
                    </div>
                    @endif
                    <div class="card-body d-flex flex-column">
                        <div class="mb-2">
                            @if($center->short_name)
                            <span class="badge" style="background: var(--secondary-color); font-size:12px;">
                                {{ $center->short_name }}
                            </span>
                            @endif
                        </div>
                        <h5 class="card-title fw-bold" style="color: var(--primary-color);">
                            {{ $center->name }}
                        </h5>
                        <p class="card-text text-muted flex-grow-1">
                            {{ Str::limit($center->description, 120) }}
                        </p>
                        @if($center->head_name)
                        <div class="d-flex align-items-center mt-2 mb-3 p-2 bg-light rounded">
                            @if($center->head_photo)
                            <img src="{{ asset('storage/' . $center->head_photo) }}"
                                class="rounded-circle me-2" style="width:36px;height:36px;object-fit:cover;">
                            @else
                            <div class="rounded-circle me-2 d-flex align-items-center justify-content-center"
                                style="width:36px;height:36px;background:var(--secondary-color);">
                                <i class="bi bi-person-fill text-white" style="font-size:16px;"></i>
                            </div>
                            @endif
                            <div>
                                <small class="text-muted d-block" style="font-size:11px;">Ketua</small>
                                <small class="fw-semibold">{{ $center->head_name }}</small>
                            </div>
                        </div>
                        @endif
                        <a href="{{ route('study-centers.show', $center->slug) }}"
                            class="btn btn-outline-primary btn-sm mt-auto">
                            Selengkapnya <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center py-5">
            <i class="bi bi-buildings text-muted" style="font-size: 4rem;"></i>
            <p class="text-muted mt-3">Belum ada data pusat studi</p>
        </div>
        @endif
    </div>
</section>
@endsection

@push('styles')
<style>
.study-center-card {
    border: none;
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.08);
    transition: all 0.3s;
    overflow: hidden;
}
.study-center-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 30px rgba(0,0,0,0.15);
}
</style>
@endpush
