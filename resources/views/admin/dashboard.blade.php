@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="page-header">
    <h1>Dashboard</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </nav>
</div>

<div class="row">
    <!-- Stats Cards -->
    <div class="col-md-3">
        <div class="stats-card" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h3>{{ $totalResearches }}</h3>
                    <p>Total Penelitian</p>
                </div>
                <i class="bi bi-book fs-1"></i>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="stats-card" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h3>{{ $totalPpm }}</h3>
                    <p>Total PPM</p>
                </div>
                <i class="bi bi-building fs-1"></i>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="stats-card" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h3>{{ $totalNews }}</h3>
                    <p>Total Berita</p>
                </div>
                <i class="bi bi-newspaper fs-1"></i>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="stats-card" style="background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h3>{{ $totalCooperations }}</h3>
                    <p>Kerjasama Aktif</p>
                </div>
                <i class="bi bi-handshake fs-1"></i>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- Recent News -->
    <div class="col-md-6">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Berita Terbaru</h5>
                <a href="{{ route('admin.news.index') }}" class="btn btn-sm btn-primary">
                    Lihat Semua
                </a>
            </div>
            <div class="card-body">
                @forelse($recentNews as $news)
                <div class="d-flex mb-3 pb-3 border-bottom">
                    <div class="flex-grow-1">
                        <h6 class="mb-1">{{ Str::limit($news->title, 50) }}</h6>
                        <small class="text-muted">
                            <i class="bi bi-calendar"></i>
                            {{ $news->published_at ? $news->published_at->format('d M Y') : $news->created_at->format('d M Y') }}
                        </small>
                    </div>
                    <div>
                        <span class="badge bg-{{ $news->is_published ? 'success' : 'warning' }}">
                            {{ $news->is_published ? 'Published' : 'Draft' }}
                        </span>
                    </div>
                </div>
                @empty
                <p class="text-center text-muted">Belum ada berita</p>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Recent Research -->
    <div class="col-md-6">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Penelitian Terbaru</h5>
                <a href="{{ route('admin.researches.index') }}" class="btn btn-sm btn-primary">
                    Lihat Semua
                </a>
            </div>
            <div class="card-body">
                @forelse($recentResearches as $research)
                <div class="d-flex mb-3 pb-3 border-bottom">
                    <div class="flex-grow-1">
                        <h6 class="mb-1">{{ Str::limit($research->title, 50) }}</h6>
                        <small class="text-muted">
                            <i class="bi bi-person"></i> {{ $research->researcher }} |
                            <i class="bi bi-calendar"></i> {{ $research->year }}
                        </small>
                    </div>
                    <div>
                        <span class="badge bg-{{ $research->status == 'completed' ? 'success' : 'info' }}">
                            {{ $research->status == 'completed' ? 'Selesai' : 'Berjalan' }}
                        </span>
                    </div>
                </div>
                @empty
                <p class="text-center text-muted">Belum ada penelitian</p>
                @endforelse
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Galeri Terbaru</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    @forelse($totalGalleries > 0 ? \App\Models\Gallery::latest()->take(6)->get() : [] as $gallery)
                    <div class="col-md-2">
                        <img src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $gallery->title }}" class="img-fluid rounded" style="height: 120px; object-fit: cover; width: 100%;">
                        <small class="d-block mt-2">{{ Str::limit($gallery->title, 20) }}</small>
                    </div>
                    @empty
                    <p class="text-center text-muted">Belum ada galeri</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
```