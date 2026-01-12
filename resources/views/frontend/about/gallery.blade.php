@extends('frontend.layouts.app')

@section('title', 'Galeri')

@section('content')
<div class="page-header">
    <div class="container">
        <h1>Galeri Kegiatan</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                <li class="breadcrumb-item">Tentang Kami</li>
                <li class="breadcrumb-item active">Galeri</li>
            </ol>
        </nav>
    </div>
</div>

<section class="py-5">
    <div class="container">
        @if($galleries->count() > 0)
        <div class="row g-4">
            @foreach($galleries as $gallery)
            <div class="col-md-4 col-lg-3">
                <div class="card border-0 shadow-sm h-100">
                    <img src="{{ asset('storage/' . $gallery->image) }}"
                        class="card-img-top"
                        alt="{{ $gallery->title }}"
                        style="height: 250px; object-fit: cover; cursor: pointer;"
                        data-bs-toggle="modal"
                        data-bs-target="#galleryModal{{ $gallery->id }}">
                    <div class="card-body">
                        <h6 class="card-title">{{ $gallery->title }}</h6>
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-muted">
                                <i class="bi bi-calendar"></i>
                                {{ $gallery->event_date ? $gallery->event_date->format('d M Y') : '-' }}
                            </small>
                            <span class="badge bg-primary">{{ ucfirst($gallery->category) }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal for each gallery -->
            <div class="modal fade" id="galleryModal{{ $gallery->id }}" tabindex="-1">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">{{ $gallery->title }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <img src="{{ asset('storage/' . $gallery->image) }}"
                                class="img-fluid w-100 mb-3"
                                alt="{{ $gallery->title }}">
                            @if($gallery->description)
                            <p>{{ $gallery->description }}</p>
                            @endif
                            <small class="text-muted">
                                <i class="bi bi-calendar"></i>
                                {{ $gallery->event_date ? $gallery->event_date->format('d F Y') : '-' }}
                            </small>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-5 d-flex justify-content-center">
            {{ $galleries->links() }}
        </div>
        @else
        <div class="alert alert-info">
            <i class="bi bi-info-circle"></i> Galeri belum tersedia.
        </div>
        @endif
    </div>
</section>
@endsection