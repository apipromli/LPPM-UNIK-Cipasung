@extends('frontend.layouts.app')

@section('title', $news->title)

@section('content')
<div class="page-header">
    <div class="container">
        <h1>{{ $news->title }}</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                <li class="breadcrumb-item"><a href="{{ route('news.index') }}">Berita</a></li>
                <li class="breadcrumb-item active">Detail</li>
            </ol>
        </nav>
    </div>
</div>

<section class="py-5">
    <div class="container">
        <div class="row">
            <!-- Main Content -->
            <div class="col-lg-8">
                <article class="card border-0 shadow-sm mb-4">
                    @if($news->image)
                    <img src="{{ asset('storage/' . $news->image) }}"
                        class="card-img-top"
                        alt="{{ $news->title }}"
                        style="max-height: 500px; object-fit: cover;">
                    @endif

                    <div class="card-body p-4">
                        <div class="news-meta mb-4 pb-3 border-bottom">
                            <div class="row">
                                <div class="col-md-6">
                                    <small class="text-muted">
                                        <i class="bi bi-person"></i> {{ $news->user->name }}
                                    </small>
                                </div>
                                <div class="col-md-6 text-md-end">
                                    <small class="text-muted">
                                        <i class="bi bi-calendar"></i>
                                        {{ $news->published_at ? $news->published_at->format('d F Y') : $news->created_at->format('d F Y') }}
                                    </small>
                                    <small class="text-muted ms-3">
                                        <i class="bi bi-eye"></i> {{ $news->views }} views
                                    </small>
                                </div>
                            </div>
                        </div>

                        <div class="news-content">
                            {!! $news->content !!}
                        </div>

                        <div class="mt-4 pt-4 border-top">
                            <a href="{{ route('news.index') }}" class="btn btn-outline-primary">
                                <i class="bi bi-arrow-left"></i> Kembali ke Daftar Berita
                            </a>
                        </div>
                    </div>
                </article>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <!-- Related News -->
                @if($relatedNews->count() > 0)
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Berita Terkait</h5>
                    </div>
                    <div class="card-body p-3">
                        @foreach($relatedNews as $related)
                        <div class="d-flex mb-3 pb-3 border-bottom">
                            @if($related->image)
                            <img src="{{ asset('storage/' . $related->image) }}"
                                alt="{{ $related->title }}"
                                class="rounded me-3"
                                style="width: 80px; height: 80px; object-fit: cover;">
                            @else
                            <div class="rounded me-3 d-flex align-items-center justify-content-center"
                                style="width: 80px; height: 80px; background: var(--bg-light);">
                                <i class="bi bi-newspaper" style="font-size: 24px; color: var(--text-light);"></i>
                            </div>
                            @endif
                            <div class="flex-grow-1">
                                <h6 class="mb-1">
                                    <a href="{{ route('news.detail', $related->slug) }}"
                                        class="text-decoration-none text-dark">
                                        {{ Str::limit($related->title, 50) }}
                                    </a>
                                </h6>
                                <small class="text-muted">
                                    <i class="bi bi-calendar"></i>
                                    {{ $related->published_at ? $related->published_at->format('d M Y') : $related->created_at->format('d M Y') }}
                                </small>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Quick Links -->
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Link Cepat</h5>
                    </div>
                    <div class="card-body p-3">
                        <div class="list-group list-group-flush">
                            <a href="{{ route('research.internal') }}" class="list-group-item list-group-item-action">
                                <i class="bi bi-book text-primary"></i> Data Penelitian
                            </a>
                            <a href="{{ route('ppm.internal') }}" class="list-group-item list-group-item-action">
                                <i class="bi bi-building text-primary"></i> Data PPM
                            </a>
                            <a href="{{ route('about.gallery') }}" class="list-group-item list-group-item-action">
                                <i class="bi bi-images text-primary"></i> Galeri
                            </a>
                            <a href="{{ route('services.research') }}" class="list-group-item list-group-item-action">
                                <i class="bi bi-gear text-primary"></i> Layanan
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
    .news-content {
        font-size: 16px;
        line-height: 1.8;
        text-align: justify;
    }

    .news-content p {
        margin-bottom: 20px;
    }

    .news-content img {
        max-width: 100%;
        height: auto;
        margin: 20px 0;
        border-radius: 8px;
    }

    .news-content h1,
    .news-content h2,
    .news-content h3,
    .news-content h4,
    .news-content h5,
    .news-content h6 {
        margin-top: 30px;
        margin-bottom: 15px;
        color: var(--primary-color);
    }

    .news-content ul,
    .news-content ol {
        padding-left: 30px;
        margin-bottom: 20px;
    }

    .news-content li {
        margin-bottom: 10px;
    }

    .news-content blockquote {
        border-left: 4px solid var(--secondary-color);
        padding-left: 20px;
        margin: 20px 0;
        font-style: italic;
        color: var(--text-light);
    }
</style>
@endpush