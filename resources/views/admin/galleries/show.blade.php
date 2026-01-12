@extends('admin.layouts.app')

@section('title', 'Detail Galeri')

@section('content')
<div class="page-header">
    <h1>Detail Galeri</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.galleries.index') }}">Galeri</a></li>
            <li class="breadcrumb-item active">Detail</li>
        </ol>
    </nav>
</div>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">{{ $gallery->title }}</h5>
        <div>
            <a href="{{ route('admin.galleries.edit', $gallery) }}" class="btn btn-warning btn-sm">
                <i class="bi bi-pencil"></i> Edit
            </a>
            <a href="{{ route('admin.galleries.index') }}" class="btn btn-secondary btn-sm">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="mb-4 text-center">
            <img src="{{ asset('storage/' . $gallery->image) }}"
                alt="{{ $gallery->title }}"
                class="img-fluid rounded"
                style="max-height: 500px;">
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="fw-bold">Judul:</label>
                    <p>{{ $gallery->title }}</p>
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label class="fw-bold">Kategori:</label>
                    <p><span class="badge bg-primary">{{ ucfirst($gallery->category) }}</span></p>
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label class="fw-bold">Tanggal Kegiatan:</label>
                    <p>{{ $gallery->event_date ? $gallery->event_date->format('d F Y') : '-' }}</p>
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label class="fw-bold">Tanggal Dibuat:</label>
                    <p>{{ $gallery->created_at->format('d F Y H:i') }}</p>
                </div>
            </div>

            @if($gallery->description)
            <div class="col-md-12">
                <div class="mb-3">
                    <label class="fw-bold">Deskripsi:</label>
                    <p>{{ $gallery->description }}</p>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection