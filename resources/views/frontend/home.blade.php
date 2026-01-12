@extends('frontend.layouts.app')

@section('title', 'Beranda')

@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
                <!-- Indicators -->
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active"></button>
                    <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"></button>
                    <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2"></button>
                </div>

                <!-- Carousel Items -->
                <div class="carousel-inner">
                    <!-- Slide 1 -->
                    <div class="carousel-item active">
                        <div class="row align-items-center">
                            <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1000">
                                <h1 class="display-4 fw-bold mb-4 hero-title">
                                    Selamat Datang di<br>LPPM UNIK Cipasung
                                </h1>
                                <p class="lead mb-4 hero-description">
                                    Lembaga Penelitian dan Pengabdian kepada Masyarakat yang berkomitmen
                                    untuk mengembangkan penelitian berkualitas dan pengabdian yang bermanfaat bagi masyarakat.
                                </p>
                                <div class="d-flex gap-3 hero-buttons">
                                    <a href="{{ route('about.history') }}" class="btn btn-primary btn-lg">
                                        <i class="bi bi-info-circle"></i> Tentang Kami
                                    </a>
                                    <a href="{{ route('services.research') }}" class="btn btn-outline-light btn-lg">
                                        <i class="bi bi-book"></i> Layanan Kami
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-6 text-center d-none d-lg-block" data-aos="fade-left" data-aos-duration="5000">
                                <img src="/assets/images/bg2.png" alt="LPPM Illustration" class="img-fluid rounded hero-image">
                            </div>
                        </div>
                    </div>

                    <!-- Slide 2 -->
                    <div class="carousel-item">
                        <div class="row align-items-center">
                            <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1000">
                                <h1 class="display-4 fw-bold mb-4 hero-title">
                                    Penelitian Inovatif<br>Berdampak Nyata
                                </h1>
                                <p class="lead mb-4 hero-description">
                                    Menghasilkan penelitian berkualitas tinggi yang memberikan solusi nyata
                                    untuk permasalahan di masyarakat dan berkontribusi pada pengembangan ilmu pengetahuan.
                                </p>
                                <div class="d-flex gap-3 hero-buttons">
                                    <a href="{{ route('services.research') }}" class="btn btn-primary btn-lg">
                                        <i class="bi bi-search"></i> Penelitian Kami
                                    </a>
                                    <a href="" class="btn btn-outline-light btn-lg">
                                        <i class="bi bi-journal-text"></i> Publikasi
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-6 text-center d-none d-lg-block" data-aos="fade-left" data-aos-duration="5000">
                                <img src="/assets/images/bg3.png" alt="Research Illustration" class="img-fluid rounded hero-image">
                            </div>
                        </div>
                    </div>

                    <!-- Slide 3 -->
                    <div class="carousel-item">
                        <div class="row align-items-center">
                            <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1000">
                                <h1 class="display-4 fw-bold mb-4 hero-title">
                                    Pengabdian untuk<br>Masyarakat Luas
                                </h1>
                                <p class="lead mb-4 hero-description">
                                    Melaksanakan program pengabdian masyarakat yang berkelanjutan untuk
                                    meningkatkan kesejahteraan dan memberdayakan komunitas lokal.
                                </p>
                                <div class="d-flex gap-3 hero-buttons">
                                    <a href="{{ route('services.community-service') }}" class="btn btn-primary btn-lg">
                                        <i class="bi bi-people"></i> Pengabdian Masyarakat
                                    </a>
                                    <a href="" class="btn btn-outline-light btn-lg">
                                        <i class="bi bi-envelope"></i> Hubungi Kami
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-6 text-center d-none d-lg-block" data-aos="fade-left" data-aos-duration="5000">
                                <img src="/assets/images/bg4.png" alt="Community Service Illustration" class="img-fluid rounded hero-image">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Controls -->
                <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="py-5" style="margin-top: -50px; position: relative; z-index: 10;">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-3">
                <div class="stats-box">
                    <i class="bi bi-book"></i>
                    <h3>{{ $totalResearches }}</h3>
                    <p>Penelitian</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-box">
                    <i class="bi bi-building"></i>
                    <h3>{{ $totalPpm }}</h3>
                    <p>Pengabdian Masyarakat</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-box">
                    <i class="bi bi-people"></i>
                    <h3>50+</h3>
                    <p>Dosen Peneliti</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-box">
                    <i class="bi bi-award"></i>
                    <h3>25+</h3>
                    <p>Prestasi</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Latest News -->
<section class="py-5">
    <div class="container">
        <div class="section-title">
            <h2>Berita Terbaru</h2>
            <p class="text-muted">Informasi dan kegiatan terkini LPPM UNIK Cipasung</p>
        </div>

        <div class="row g-4">
            @forelse($latestNews as $news)
            <div class="col-md-4">
                <div class="card news-card">
                    @if($news->image)
                    <img src="{{ asset('storage/' . $news->image) }}"
                        class="card-img-top" alt="{{ $news->title }}">
                    @else
                    <img src="https://via.placeholder.com/400x200/3b82f6/ffffff?text=LPPM+News"
                        class="card-img-top" alt="{{ $news->title }}">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="{{ route('news.detail', $news->slug) }}" class="text-decoration-none">
                                {{ Str::limit($news->title, 60) }}
                            </a>
                        </h5>
                        <p class="card-text">
                            {{ Str::limit(strip_tags($news->content), 100) }}
                        </p>
                        <div class="news-meta">
                            <small>
                                <i class="bi bi-calendar"></i>
                                {{ $news->published_at ? $news->published_at->format('d M Y') : $news->created_at->format('d M Y') }}
                                <span class="ms-3">
                                    <i class="bi bi-eye"></i> {{ $news->views }}
                                </span>
                            </small>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center">
                <p class="text-muted">Belum ada berita tersedia</p>
            </div>
            @endforelse
        </div>

        @if($latestNews->count() > 0)
        <div class="text-center mt-4">
            <a href="{{ route('news.index') }}" class="btn btn-primary">
                Lihat Semua Berita <i class="bi bi-arrow-right"></i>
            </a>
        </div>
        @endif
    </div>
</section>

<!-- Gallery Section -->
@if($galleries->count() > 0)
<section class="py-5" style="background: var(--bg-light);">
    <div class="container">
        <div class="section-title">
            <h2>Galeri Kegiatan</h2>
            <p class="text-muted">Dokumentasi kegiatan LPPM UNIK Cipasung</p>
        </div>

        <div class="row g-3">
            @foreach($galleries as $gallery)
            <div class="col-md-3 col-6">
                <div class="card">
                    <img src="{{ asset('storage/' . $gallery->image) }}"
                        class="card-img-top" alt="{{ $gallery->title }}"
                        style="height: 200px; object-fit: cover;">
                    <div class="card-body p-2">
                        <small class="d-block fw-bold">{{ Str::limit($gallery->title, 40) }}</small>
                        <small class="text-muted">
                            <i class="bi bi-calendar"></i>
                            {{ $gallery->event_date ? $gallery->event_date->format('d M Y') : '-' }}
                        </small>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="text-center mt-4">
            <a href="{{ route('about.gallery') }}" class="btn btn-primary">
                Lihat Semua Galeri <i class="bi bi-arrow-right"></i>
            </a>
        </div>
    </div>
</section>
@endif

<!-- Services Section -->
<section class="py-5">
    <div class="container">
        <div class="section-title">
            <h2>Layanan Kami</h2>
            <p class="text-muted">Berbagai layanan yang kami sediakan</p>
        </div>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="card text-center p-4">
                    <div class="mb-3">
                        <i class="bi bi-book" style="font-size: 64px; color: var(--secondary-color);"></i>
                    </div>
                    <h4>Penelitian</h4>
                    <p class="text-muted">
                        Layanan penelitian untuk dosen dan mahasiswa dengan berbagai skema pendanaan
                    </p>
                    <a href="{{ route('services.research') }}" class="btn btn-outline-primary">
                        Selengkapnya <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-center p-4">
                    <div class="mb-3">
                        <i class="bi bi-people" style="font-size: 64px; color: var(--secondary-color);"></i>
                    </div>
                    <h4>Pengabdian Masyarakat</h4>
                    <p class="text-muted">
                        Program pengabdian kepada masyarakat untuk pemberdayaan dan pengembangan
                    </p>
                    <a href="{{ route('services.community-service') }}" class="btn btn-outline-primary">
                        Selengkapnya <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-center p-4">
                    <div class="mb-3">
                        <i class="bi bi-building-check" style="font-size: 64px; color: var(--secondary-color);"></i>
                    </div>
                    <h4>Kerjasama</h4>
                    <p class="text-muted">
                        Membangun kerjasama dengan berbagai institusi untuk pengembangan riset
                    </p>
                    <a href="{{ route('services.cooperation') }}" class="btn btn-outline-primary">
                        Selengkapnya <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection