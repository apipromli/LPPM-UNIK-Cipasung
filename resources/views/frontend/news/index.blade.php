@extends('frontend.layouts.app')

@section('title', 'Berita')

@section('content')
<div class="page-header">
    <div class="container">
        <h1>Berita LPPM</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                <li class="breadcrumb-item active">Berita</li>
            </ol>
        </nav>
    </div>
</div>

<section class="py-5">
    <div class="container">
        @if($news->count() > 0)
        <div class="row g-4">
            @foreach($news as $item)
            <div class="col-md-4">
                <div class="card news-card border-0 shadow-sm">
                    @if($item->image)
                    <img src="{{ asset('storage/' . $item->image) }}"
                        class="card-img-top"
                        alt="{{ $item->title }}"
                        style="height: 220px; object-fit: cover;">
                    @else
                    <img src="https://via.placeholder.com/400x220/3b82f6/ffffff?text=LPPM+News"
                        class="card-img-top"
                        alt="{{ $item->title }}"
                        style="height: 220px; object-fit: cover;">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="{{ route('news.detail', $item->slug) }}"
                                class="text-decoration-none text-dark">
                                {{ Str::limit($item->title, 60) }}
                            </a>
                        </h5>
                        <p class="card-text text-muted">
                            {{ Str::limit(strip_tags($item->content), 120) }}
                        </p>
                        <div class="d-flex justify-content-between align-items-center mt-3 pt-3 border-top">
                            <small class="text-muted">
                                <i class="bi bi-calendar"></i>
                                {{ $item->published_at ? $item->published_at->format('d M Y') : $item->created_at->format('d M Y') }}
                            </small>
                            <small class="text-muted">
                                <i class="bi bi-eye"></i> {{ $item->views }}
                            </small>
                        </div>
                        <a href="{{ route('news.detail', $item->slug) }}"
                            class="btn btn-outline-primary btn-sm mt-3 w-100">
                            Selengkapnya <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-5 d-flex justify-content-center">
            {{ $news->links() }}
        </div>
        @else
        <div class="alert alert-info">
            <i class="bi bi-info-circle"></i> Belum ada berita yang dipublikasikan.
        </div>
        @endif
    </div>
</section>
@endsection