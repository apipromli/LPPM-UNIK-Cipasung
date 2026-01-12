@extends('admin.layouts.app')

@section('title', 'Galeri')

@section('content')
<div class="page-header">
    <h1>Galeri</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Galeri</li>
        </ol>
    </nav>
</div>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Daftar Galeri</h5>
        <a href="{{ route('admin.galleries.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Tambah Galeri
        </a>
    </div>
    <div class="card-body">
        <div class="row g-3">
            @foreach($galleries as $gallery)
            <div class="col-md-3">
                <div class="card h-100">
                    <img src="{{ asset('storage/' . $gallery->image) }}"
                        class="card-img-top"
                        alt="{{ $gallery->title }}"
                        style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h6 class="card-title">{{ Str::limit($gallery->title, 40) }}</h6>
                        <p class="card-text">
                            <small class="text-muted">
                                <i class="bi bi-tag"></i> {{ ucfirst($gallery->category) }}
                            </small><br>
                            <small class="text-muted">
                                <i class="bi bi-calendar"></i>
                                {{ $gallery->event_date ? $gallery->event_date->format('d M Y') : '-' }}
                            </small>
                        </p>
                        <div class="btn-group w-100" role="group">
                            <a href="{{ route('admin.galleries.show', $gallery) }}"
                                class="btn btn-sm btn-info">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="{{ route('admin.galleries.edit', $gallery) }}"
                                class="btn btn-sm btn-warning">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('admin.galleries.destroy', $gallery) }}"
                                method="POST" class="d-inline"
                                onsubmit="return confirm('Yakin ingin menghapus?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-4 d-flex justify-content-center">
            {{ $galleries->links() }}
        </div>
    </div>
</div>
@endsection