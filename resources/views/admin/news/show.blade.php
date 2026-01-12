@extends('admin.layouts.app')

@section('title', 'Detail Berita')

@section('content')
<div class="page-header">
    <h1>Detail Berita</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.news.index') }}">Berita</a></li>
            <li class="breadcrumb-item active">Detail</li>
        </ol>
    </nav>
</div>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">{{ $news->title }}</h5>
        <div>
            <a href="{{ route('admin.news.edit', $news) }}" class="btn btn-warning btn-sm">
                <i class="bi bi-pencil"></i> Edit
            </a>
            <a href="{{ route('admin.news.index') }}" class="btn btn-secondary btn-sm">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>
    </div>
    <div class="card-body">
        @if($news->image)
        <div class="mb-4 text-center">
            <img src="{{ asset('storage/' . $news->image) }}"
                alt="{{ $news->title }}"
                class="img-fluid rounded"
                style="max-height: 400px;">
        </div>
        @endif

        <div class="row">
            <div class="col-md-12">
                <div class="mb-3">
                    <label class="fw-bold">Judul:</label>
                    <h4>{{ $news->title }}</h4>
                </div>
            </div>

            <div class="col-md-3">
                <div class="mb-3">
                    <label class="fw-bold">Penulis:</label>
                    <p>{{ $news->user->name }}</p>
                </div>
            </div>

            <div class="col-md-3">
                <div class="mb-3">
                    <label class="fw-bold">Status:</label>
                    <p>
                        <span class="badge bg-{{ $news->is_published ? 'success' : 'warning' }}">
                            {{ $news->is_published ? 'Published' : 'Draft' }}
                        </span>
                    </p>
                </div>
            </div>

            <div class="col-md-3">
                <div class="mb-3">
                    <label class="fw-bold">Tanggal Publikasi:</label>
                    <p>{{ $news->published_at ? $news->published_at->format('d F Y H:i') : '-' }}</p>
                </div>
            </div>

            <div class="col-md-3">
                <div class="mb-3">
                    <label class="fw-bold">Views:</label>
                    <p><span class="badge bg-info">{{ $news->views }}</span></p>
                </div>
            </div>

            <div class="col-md-12">
                <div class="mb-3">
                    <label class="fw-bold">Konten:</label>
                    <div class="border rounded p-3 bg-light">
                        {!! $news->content !!}
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label class="fw-bold">Tanggal Dibuat:</label>
                    <p>{{ $news->created_at->format('d F Y H:i') }}</p>
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label class="fw-bold">Terakhir Diupdate:</label>
                    <p>{{ $news->updated_at->format('d F Y H:i') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection