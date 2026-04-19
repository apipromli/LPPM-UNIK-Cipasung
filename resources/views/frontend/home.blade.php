@extends('frontend.layouts.app')

@section('title', 'Beranda')

@section('content')

{{-- ============================================================ --}}
{{-- 1. HERO SECTION                                               --}}
{{-- ============================================================ --}}
<section class="hero-section">
    <div class="container">
        <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2"></button>
            </div>
            <div class="carousel-inner">
                <!-- Slide 1 -->
                <div class="carousel-item active">
                    <div class="row align-items-center">
                        <div class="col-lg-6" data-aos="fade-right">
                            <div class="hero-badge mb-3">
                                <span><i class="bi bi-patch-check-fill me-1"></i>Lembaga Resmi Universitas</span>
                            </div>
                            <h1 class="display-4 fw-bold mb-4 hero-title">
                                Selamat Datang di<br><span class="hero-highlight">LPPM UNIK Cipasung</span>
                            </h1>
                            <p class="lead mb-4 hero-description">
                                Lembaga Penelitian dan Pengabdian kepada Masyarakat yang berkomitmen
                                mengembangkan penelitian berkualitas dan pengabdian bermanfaat bagi masyarakat.
                            </p>
                            <div class="d-flex flex-wrap gap-3 hero-buttons">
                                <a href="{{ route('about.history') }}" class="btn btn-hero-primary">
                                    <i class="bi bi-info-circle me-1"></i> Tentang Kami
                                </a>
                                <a href="{{ route('services.research') }}" class="btn btn-hero-outline">
                                    <i class="bi bi-book me-1"></i> Layanan Kami
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6 text-center d-none d-lg-block" data-aos="fade-left" data-aos-delay="200">
                            <img src="/assets/images/bg2.png" alt="LPPM" class="img-fluid hero-image">
                        </div>
                    </div>
                </div>
                <!-- Slide 2 -->
                <div class="carousel-item">
                    <div class="row align-items-center">
                        <div class="col-lg-6" data-aos="fade-right">
                            <div class="hero-badge mb-3">
                                <span><i class="bi bi-search me-1"></i>Penelitian & Inovasi</span>
                            </div>
                            <h1 class="display-4 fw-bold mb-4 hero-title">
                                Penelitian Inovatif<br><span class="hero-highlight">Berdampak Nyata</span>
                            </h1>
                            <p class="lead mb-4 hero-description">
                                Menghasilkan penelitian berkualitas tinggi yang memberikan solusi nyata
                                untuk permasalahan di masyarakat.
                            </p>
                            <div class="d-flex flex-wrap gap-3 hero-buttons">
                                <a href="{{ route('research.internal') }}" class="btn btn-hero-primary">
                                    <i class="bi bi-journal-text me-1"></i> Data Penelitian
                                </a>
                                <a href="{{ route('services.research') }}" class="btn btn-hero-outline">
                                    <i class="bi bi-lightbulb me-1"></i> Layanan Penelitian
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6 text-center d-none d-lg-block" data-aos="fade-left" data-aos-delay="200">
                            <img src="/assets/images/bg3.png" alt="Research" class="img-fluid hero-image">
                        </div>
                    </div>
                </div>
                <!-- Slide 3 -->
                <div class="carousel-item">
                    <div class="row align-items-center">
                        <div class="col-lg-6" data-aos="fade-right">
                            <div class="hero-badge mb-3">
                                <span><i class="bi bi-people-fill me-1"></i>Pengabdian Masyarakat</span>
                            </div>
                            <h1 class="display-4 fw-bold mb-4 hero-title">
                                Pengabdian untuk<br><span class="hero-highlight">Masyarakat Luas</span>
                            </h1>
                            <p class="lead mb-4 hero-description">
                                Melaksanakan program pengabdian masyarakat yang berkelanjutan untuk
                                meningkatkan kesejahteraan komunitas lokal.
                            </p>
                            <div class="d-flex flex-wrap gap-3 hero-buttons">
                                <a href="{{ route('services.community-service') }}" class="btn btn-hero-primary">
                                    <i class="bi bi-people me-1"></i> Program PPM
                                </a>
                                <a href="{{ route('ppm.internal') }}" class="btn btn-hero-outline">
                                    <i class="bi bi-clipboard-data me-1"></i> Data PPM
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6 text-center d-none d-lg-block" data-aos="fade-left" data-aos-delay="200">
                            <img src="/assets/images/bg4.png" alt="Community" class="img-fluid hero-image">
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
    </div>
</section>

{{-- ============================================================ --}}
{{-- 2. STATS COUNTER SECTION                                      --}}
{{-- ============================================================ --}}
<section class="stats-section">
    <div class="container">
        <div class="stats-wrapper">
            <div class="row g-0">
                <div class="col-6 col-md-3">
                    <div class="stat-item" data-aos="zoom-in" data-aos-delay="0">
                        <div class="stat-icon"><i class="bi bi-journal-bookmark-fill"></i></div>
                        <div class="stat-number counter" data-target="{{ $totalResearches }}">0</div>
                        <div class="stat-label">Penelitian</div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="stat-item" data-aos="zoom-in" data-aos-delay="100">
                        <div class="stat-icon"><i class="bi bi-people-fill"></i></div>
                        <div class="stat-number counter" data-target="{{ $totalPpm }}">0</div>
                        <div class="stat-label">Pengabdian Masyarakat</div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="stat-item" data-aos="zoom-in" data-aos-delay="200">
                        <div class="stat-icon"><i class="bi bi-person-workspace"></i></div>
                        <div class="stat-number">50<span>+</span></div>
                        <div class="stat-label">Dosen Peneliti</div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="stat-item border-end-0" data-aos="zoom-in" data-aos-delay="300">
                        <div class="stat-icon"><i class="bi bi-diagram-3-fill"></i></div>
                        <div class="stat-number counter" data-target="{{ $totalCooperations }}">0</div>
                        <div class="stat-label">Kerjasama Aktif</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ============================================================ --}}
{{-- 3. ABOUT BRIEF SECTION                                        --}}
{{-- ============================================================ --}}
<section class="py-5 about-brief-section">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6" data-aos="fade-right">
                <div class="about-image-wrapper">
                    <img src="/assets/images/profil.png" alt="LPPM UNIK Cipasung"
                        class="img-fluid rounded-3 about-img"
                        onerror="this.src='/assets/images/image.png'">
                    <div class="about-badge-float">
                        <i class="bi bi-award-fill"></i>
                        <span>Terakreditasi</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <div class="section-label">Tentang Kami</div>
                <h2 class="section-heading">LPPM UNIK Cipasung</h2>
                <div class="section-divider"></div>
                @if($profile && $profile->content)
                <div class="text-muted mb-4" style="line-height:1.8;">
                    {!! Str::limit(strip_tags($profile->content), 400) !!}
                </div>
                @else
                <p class="text-muted mb-4" style="line-height:1.8;">
                    Lembaga Penelitian dan Pengabdian kepada Masyarakat (LPPM) Universitas Islam KH. Ruhiyat Cipasung
                    merupakan lembaga yang bertugas mengkoordinasikan, mengelola, dan mengembangkan kegiatan penelitian
                    dan pengabdian kepada masyarakat di lingkungan universitas.
                </p>
                @endif
                <div class="row g-3 mb-4">
                    <div class="col-6">
                        <div class="about-feature">
                            <i class="bi bi-check-circle-fill text-success me-2"></i>
                            <span>Penelitian Bermutu</span>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="about-feature">
                            <i class="bi bi-check-circle-fill text-success me-2"></i>
                            <span>Pengabdian Nyata</span>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="about-feature">
                            <i class="bi bi-check-circle-fill text-success me-2"></i>
                            <span>Kerjasama Luas</span>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="about-feature">
                            <i class="bi bi-check-circle-fill text-success me-2"></i>
                            <span>Inovasi Akademik</span>
                        </div>
                    </div>
                </div>
                <a href="{{ route('about.history') }}" class="btn btn-primary me-2">
                    Baca Selengkapnya <i class="bi bi-arrow-right ms-1"></i>
                </a>
                <a href="{{ route('about.vision-mission') }}" class="btn btn-outline-primary">
                    Visi & Misi
                </a>
            </div>
        </div>
    </div>
</section>

{{-- ============================================================ --}}
{{-- 4. SERVICES SECTION                                           --}}
{{-- ============================================================ --}}
<section class="py-5 services-section">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <div class="section-label">Apa yang Kami Lakukan</div>
            <h2 class="section-heading">Layanan LPPM</h2>
            <div class="section-divider mx-auto"></div>
            <p class="text-muted mt-3">Berbagai layanan unggulan untuk sivitas akademika dan masyarakat</p>
        </div>
        <div class="row g-4">
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="0">
                <div class="service-card">
                    <div class="service-icon" style="background: linear-gradient(135deg, #1e3a8a, #3b82f6);">
                        <i class="bi bi-journal-text"></i>
                    </div>
                    <h5>Penelitian</h5>
                    <p class="text-muted">Layanan penelitian untuk dosen dan mahasiswa dengan berbagai skema pendanaan internal dan eksternal.</p>
                    <a href="{{ route('services.research') }}" class="service-link">
                        Lihat Layanan <i class="bi bi-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="service-card service-card-featured">
                    <div class="service-icon" style="background: linear-gradient(135deg, #046a1d, #22c55e);">
                        <i class="bi bi-people-fill"></i>
                    </div>
                    <h5>Pengabdian Masyarakat</h5>
                    <p>Program pengabdian kepada masyarakat untuk pemberdayaan dan pengembangan komunitas lokal yang berkelanjutan.</p>
                    <a href="{{ route('services.community-service') }}" class="service-link service-link-light">
                        Lihat Layanan <i class="bi bi-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                <div class="service-card">
                    <div class="service-icon" style="background: linear-gradient(135deg, #b45309, #f59e0b);">
                        <i class="bi bi-building-check"></i>
                    </div>
                    <h5>Kerjasama</h5>
                    <p class="text-muted">Membangun kerjasama strategis dengan berbagai institusi untuk pengembangan riset dan pengabdian.</p>
                    <a href="{{ route('services.cooperation') }}" class="service-link">
                        Lihat Layanan <i class="bi bi-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ============================================================ --}}
{{-- 5. PUSAT STUDI SECTION                                        --}}
{{-- ============================================================ --}}
@if($studyCenters->count() > 0)
<section class="py-5" style="background: var(--bg);">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <div class="section-label">Di Bawah Naungan LPPM</div>
            <h2 class="section-heading">Pusat Studi</h2>
            <div class="section-divider mx-auto"></div>
            <p class="text-muted mt-3">Pusat kajian dan pengembangan bidang akademik dan sosial</p>
        </div>
        <div class="row g-4 justify-content-center">
            @foreach($studyCenters as $center)
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="study-center-card h-100">
                    <div class="study-center-header">
                        @if($center->image)
                        <img src="{{ asset('storage/' . $center->image) }}"
                            alt="{{ $center->name }}"
                            style="width:100%;height:160px;object-fit:cover;">
                        @else
                        <div class="study-center-icon-wrap">
                            <i class="bi bi-buildings"></i>
                        </div>
                        @endif
                    </div>
                    <div class="study-center-body">
                        @if($center->short_name)
                        <span class="badge mb-2" style="background:var(--primary-mid);">{{ $center->short_name }}</span>
                        @endif
                        <h5 class="fw-bold">{{ $center->name }}</h5>
                        <p class="text-muted small">{{ Str::limit($center->description, 100) }}</p>
                        @if($center->head_name)
                        <div class="d-flex align-items-center mt-auto pt-2 border-top">
                            <i class="bi bi-person-badge me-2" style="color:var(--primary-mid);"></i>
                            <small><strong>Ketua:</strong> {{ $center->head_name }}</small>
                        </div>
                        @endif
                    </div>
                    <div class="study-center-footer">
                        <a href="{{ route('study-centers.show', $center->slug) }}" class="btn btn-sm btn-outline-primary w-100">
                            Lihat Detail <i class="bi bi-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-4" data-aos="fade-up">
            <a href="{{ route('study-centers.index') }}" class="btn btn-primary">
                Lihat Semua Pusat Studi <i class="bi bi-arrow-right ms-1"></i>
            </a>
        </div>
    </div>
</section>
@endif

{{-- ============================================================ --}}
{{-- 6. LATEST RESEARCH SECTION                                    --}}
{{-- ============================================================ --}}
@if($latestResearch->count() > 0)
<section class="py-5">
    <div class="container">
        <div class="row align-items-center mb-5">
            <div class="col-md-8" data-aos="fade-right">
                <div class="section-label">Data Terkini</div>
                <h2 class="section-heading mb-0">Penelitian Terbaru</h2>
            </div>
            <div class="col-md-4 text-md-end" data-aos="fade-left">
                <a href="{{ route('research.internal') }}" class="btn btn-outline-primary">
                    Lihat Semua <i class="bi bi-arrow-right ms-1"></i>
                </a>
            </div>
        </div>
        <div class="research-list">
            @foreach($latestResearch as $research)
            <div class="research-item" data-aos="fade-up" data-aos-delay="{{ $loop->index * 60 }}">
                <div class="research-num">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</div>
                <div class="research-info flex-grow-1">
                    <h6 class="fw-bold mb-1">{{ Str::limit($research->title, 80) }}</h6>
                    <div class="d-flex flex-wrap gap-2 align-items-center">
                        <small class="text-muted"><i class="bi bi-person me-1"></i>{{ $research->researcher }}</small>
                        <small class="text-muted"><i class="bi bi-calendar me-1"></i>{{ $research->year }}</small>
                        @if($research->scheme)
                        <span class="badge bg-light text-secondary border" style="font-size:11px;">{{ $research->scheme }}</span>
                        @endif
                    </div>
                </div>
                <div class="research-status">
                    <span class="badge bg-{{ $research->status === 'completed' ? 'success' : 'warning' }}">
                        {{ $research->status === 'completed' ? 'Selesai' : 'Berlangsung' }}
                    </span>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- ============================================================ --}}
{{-- 7. LATEST NEWS SECTION                                        --}}
{{-- ============================================================ --}}
<section class="py-5" style="background: var(--bg);">
    <div class="container">
        <div class="row align-items-center mb-5">
            <div class="col-md-8" data-aos="fade-right">
                <div class="section-label">Informasi Terkini</div>
                <h2 class="section-heading mb-0">Berita & Kegiatan</h2>
            </div>
            <div class="col-md-4 text-md-end" data-aos="fade-left">
                <a href="{{ route('news.index') }}" class="btn btn-outline-primary">
                    Semua Berita <i class="bi bi-arrow-right ms-1"></i>
                </a>
            </div>
        </div>

        @if($latestNews->count() > 0)
        <div class="row g-4">
            {{-- Featured news (first item, larger) --}}
            @if($latestNews->first())
            <div class="col-lg-5" data-aos="fade-right">
                @php $featured = $latestNews->first(); @endphp
                <div class="news-card-featured h-100">
                    @if($featured->image)
                    <img src="{{ asset('storage/' . $featured->image) }}"
                        alt="{{ $featured->title }}"
                        class="news-featured-img">
                    @else
                    <div class="news-featured-img-placeholder">
                        <i class="bi bi-newspaper"></i>
                    </div>
                    @endif
                    <div class="news-featured-body">
                        <div class="news-meta-bar mb-2">
                            <span><i class="bi bi-calendar3 me-1"></i>
                                {{ $featured->published_at ? $featured->published_at->format('d M Y') : $featured->created_at->format('d M Y') }}
                            </span>
                            <span><i class="bi bi-eye me-1"></i>{{ $featured->views }}</span>
                        </div>
                        <h4 class="fw-bold">
                            <a href="{{ route('news.detail', $featured->slug) }}" class="text-decoration-none text-white stretched-link">
                                {{ Str::limit($featured->title, 80) }}
                            </a>
                        </h4>
                        <p class="text-white-50 mb-0">{{ Str::limit(strip_tags($featured->content), 120) }}</p>
                    </div>
                </div>
            </div>
            @endif

            {{-- Remaining news items --}}
            <div class="col-lg-7">
                <div class="row g-3">
                    @foreach($latestNews->skip(1)->take(5) as $news)
                    <div class="col-12" data-aos="fade-left" data-aos-delay="{{ $loop->index * 80 }}">
                        <div class="news-list-item">
                            @if($news->image)
                            <img src="{{ asset('storage/' . $news->image) }}"
                                alt="{{ $news->title }}" class="news-list-thumb">
                            @else
                            <div class="news-list-thumb-placeholder">
                                <i class="bi bi-newspaper"></i>
                            </div>
                            @endif
                            <div class="news-list-body">
                                <h6 class="fw-semibold mb-1">
                                    <a href="{{ route('news.detail', $news->slug) }}" class="text-decoration-none stretched-link"
                                        style="color: var(--text);">
                                        {{ Str::limit($news->title, 70) }}
                                    </a>
                                </h6>
                                <div class="news-meta-bar">
                                    <span><i class="bi bi-calendar3 me-1"></i>
                                        {{ $news->published_at ? $news->published_at->format('d M Y') : $news->created_at->format('d M Y') }}
                                    </span>
                                    <span><i class="bi bi-eye me-1"></i>{{ $news->views }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @else
        <div class="text-center py-5">
            <i class="bi bi-newspaper text-muted" style="font-size:3rem;"></i>
            <p class="text-muted mt-3">Belum ada berita tersedia</p>
        </div>
        @endif
    </div>
</section>

{{-- ============================================================ --}}
{{-- 8. GALLERY SECTION                                            --}}
{{-- ============================================================ --}}
@if($galleries->count() > 0)
<section class="py-5">
    <div class="container">
        <div class="row align-items-center mb-5">
            <div class="col-md-8" data-aos="fade-right">
                <div class="section-label">Dokumentasi</div>
                <h2 class="section-heading mb-0">Galeri Kegiatan</h2>
            </div>
            <div class="col-md-4 text-md-end" data-aos="fade-left">
                <a href="{{ route('about.gallery') }}" class="btn btn-outline-primary">
                    Semua Galeri <i class="bi bi-arrow-right ms-1"></i>
                </a>
            </div>
        </div>
        <div class="gallery-grid">
            @foreach($galleries->take(8) as $gallery)
            <div class="gallery-item" data-aos="zoom-in" data-aos-delay="{{ $loop->index * 50 }}">
                <img src="{{ asset('storage/' . $gallery->image) }}"
                    alt="{{ $gallery->title }}" loading="lazy">
                <div class="gallery-overlay">
                    <h6 class="text-white fw-semibold">{{ Str::limit($gallery->title, 35) }}</h6>
                    @if($gallery->event_date)
                    <small class="text-white-50">
                        <i class="bi bi-calendar me-1"></i>{{ $gallery->event_date->format('d M Y') }}
                    </small>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- ============================================================ --}}
{{-- 9. COOPERATION / PARTNERS SECTION                             --}}
{{-- ============================================================ --}}
@if($activeCooperations->count() > 0)
<section class="py-5" style="background: var(--bg);">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <div class="section-label">Jaringan Kami</div>
            <h2 class="section-heading">Mitra Kerjasama</h2>
            <div class="section-divider mx-auto"></div>
            <p class="text-muted mt-3">Institusi dan lembaga yang telah bersinergi dengan LPPM</p>
        </div>
        <div class="row g-3 justify-content-center">
            @foreach($activeCooperations as $coop)
            <div class="col-6 col-md-4 col-lg-2" data-aos="zoom-in" data-aos-delay="{{ $loop->index * 50 }}">
                <div class="partner-card">
                    <div class="partner-icon">
                        <i class="bi bi-building-fill"></i>
                    </div>
                    <p class="partner-name">{{ Str::limit($coop->partner_name, 30) }}</p>
                    <span class="partner-type">{{ ucfirst($coop->cooperation_type ?? '') }}</span>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-4" data-aos="fade-up">
            <a href="{{ route('services.cooperation') }}" class="btn btn-primary">
                Lihat Semua Kerjasama <i class="bi bi-arrow-right ms-1"></i>
            </a>
        </div>
    </div>
</section>
@endif

{{-- ============================================================ --}}
{{-- 10. CTA SECTION                                               --}}
{{-- ============================================================ --}}
<section class="cta-section">
    <div class="container">
        <div class="cta-wrapper" data-aos="zoom-in">
            <div class="row align-items-center g-4">
                <div class="col-lg-8">
                    <h2 class="cta-title">Siap Berkolaborasi dengan LPPM?</h2>
                    <p class="cta-desc">
                        Bergabunglah dalam kegiatan penelitian dan pengabdian masyarakat bersama
                        LPPM UNIK Cipasung untuk menciptakan dampak positif bagi bangsa.
                    </p>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a href="{{ route('services.research') }}" class="btn btn-cta me-2">
                        <i class="bi bi-rocket-takeoff me-1"></i> Mulai Penelitian
                    </a>
                    <a href="{{ route('about.history') }}" class="btn btn-cta-outline">
                        <i class="bi bi-info-circle me-1"></i> Pelajari Lebih
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('styles')
<style>
/* home.blade.php — uses new design system vars from layouts/app.blade.php */

/* ---- Hero Enhancements ---- */
.hero-highlight { color: var(--gold-light); }
/* ---- Stats Section ---- */
.stats-section {
    margin-top: -30px;
    position: relative;
    z-index: 10;
    padding-bottom: 0;
}
.stats-wrapper {
    background: white;
    border-radius: 16px;
    box-shadow: 0 8px 40px rgba(0,0,0,.12);
    overflow: hidden;
}
.stat-item {
    padding: 32px 24px;
    text-align: center;
    border-right: 1px solid #e5e7eb;
    transition: background .3s;
}
.stat-item:hover {
    background: var(--bg);
}
.stat-icon {
    font-size: 2rem;
    color: var(--primary-mid);
    margin-bottom: 10px;
}
.stat-number {
    font-size: 2.5rem;
    font-weight: 800;
    color: var(--primary);
    line-height: 1;
    margin-bottom: 6px;
}
.stat-number span {
    font-size: 1.6rem;
    color: var(--gold);
}
.stat-label {
    font-size: 13px;
    color: var(--text-muted);
    font-weight: 500;
}
@media (max-width: 767px) {
    .stat-item {
        padding: 20px 16px;
        border-right: 1px solid #e5e7eb;
        border-bottom: 1px solid #e5e7eb;
    }
    .stat-number { font-size: 1.8rem; }
    .stat-label { font-size: 12px; }
}

/* ---- Section Labels / Headings ---- */
.section-label {
    color: var(--primary-mid);
    font-size: 13px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 2px;
    margin-bottom: 8px;
}
.section-heading {
    font-size: 2rem;
    font-weight: 700;
    color: var(--primary);
    margin-bottom: 12px;
}
.section-divider {
    width: 60px;
    height: 4px;
    background: linear-gradient(90deg, var(--primary-mid), var(--gold));
    border-radius: 2px;
}

/* ---- About Brief ---- */
.about-brief-section {
    background: white;
}
.about-image-wrapper {
    position: relative;
    display: inline-block;
    width: 100%;
}
.about-img {
    width: 100%;
    max-height: 420px;
    object-fit: cover;
    box-shadow: 0 16px 40px rgba(0,0,0,.12);
}
.about-badge-float {
    position: absolute;
    bottom: -15px;
    right: -10px;
    background: linear-gradient(135deg, var(--gold), var(--gold-light));
    color: white;
    padding: 12px 20px;
    border-radius: 12px;
    box-shadow: 0 8px 25px rgba(184,148,10,.4);
    display: flex;
    align-items: center;
    gap: 8px;
    font-weight: 600;
}
.about-badge-float i { font-size: 1.4rem; }
.about-feature {
    display: flex;
    align-items: center;
    font-size: 14px;
    font-weight: 500;
}

/* ---- Services ---- */
.services-section { background: var(--bg); }
.service-card {
    background: white;
    border-radius: 16px;
    padding: 36px 28px;
    text-align: center;
    box-shadow: 0 4px 20px rgba(0,0,0,.07);
    transition: all .3s;
    height: 100%;
    border: 2px solid transparent;
}
.service-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 12px 36px rgba(0,0,0,.13);
    border-color: var(--primary-mid);
}
.service-card-featured {
    background: linear-gradient(135deg, var(--primary) 0%, var(--primary-mid) 100%);
    color: white;
    border: none;
}
.service-card-featured h5 { color: white; }
.service-card-featured p { color: rgba(255,255,255,.85); }
.service-icon {
    width: 72px;
    height: 72px;
    border-radius: 18px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 20px;
    font-size: 1.8rem;
    color: white;
}
.service-card h5 {
    font-size: 1.1rem;
    font-weight: 700;
    color: var(--primary);
    margin-bottom: 12px;
}
.service-link {
    color: var(--primary-mid);
    font-weight: 600;
    font-size: 14px;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 4px;
    transition: gap .2s;
}
.service-link:hover { gap: 8px; }
.service-link-light {
    color: rgba(255,255,255,.9);
}
.service-link-light:hover { color: white; }

/* ---- Pusat Studi Cards ---- */
.study-center-card {
    background: white;
    border-radius: 14px;
    overflow: hidden;
    box-shadow: 0 4px 20px rgba(0,0,0,.08);
    transition: all .3s;
    display: flex;
    flex-direction: column;
}
.study-center-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 36px rgba(0,0,0,.14);
}
.study-center-icon-wrap {
    height: 160px;
    background: linear-gradient(135deg, var(--primary), var(--primary-mid));
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 3rem;
    color: white;
}
.study-center-body {
    padding: 18px 20px;
    flex-grow: 1;
}
.study-center-body h5 {
    color: var(--primary);
    font-size: 15px;
    margin-bottom: 8px;
}
.study-center-footer {
    padding: 12px 20px 20px;
}

/* ---- Research List ---- */
.research-list {
    border: 1px solid #e5e7eb;
    border-radius: 12px;
    overflow: hidden;
}
.research-item {
    display: flex;
    align-items: center;
    gap: 20px;
    padding: 16px 20px;
    border-bottom: 1px solid #f3f4f6;
    background: white;
    transition: background .2s;
    position: relative;
}
.research-item:last-child { border-bottom: none; }
.research-item:hover { background: #f9fafb; }
.research-num {
    font-size: 1.3rem;
    font-weight: 800;
    color: #e5e7eb;
    min-width: 36px;
    line-height: 1;
}
.research-info h6 { font-size: 14px; }
.research-status { margin-left: auto; white-space: nowrap; }

/* ---- News ---- */
.news-card-featured {
    position: relative;
    border-radius: 14px;
    overflow: hidden;
    height: 100%;
    min-height: 340px;
}
.news-featured-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    position: absolute;
    top: 0; left: 0;
}
.news-featured-img-placeholder {
    width: 100%;
    height: 100%;
    position: absolute;
    top: 0; left: 0;
    background: linear-gradient(135deg, var(--primary), var(--primary-mid));
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 4rem;
    color: rgba(255,255,255,.3);
}
.news-featured-body {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    padding: 24px;
    background: linear-gradient(to top, rgba(0,0,0,.85) 0%, transparent 100%);
    color: white;
}
.news-meta-bar {
    display: flex;
    gap: 12px;
    font-size: 12px;
    color: rgba(255,255,255,.75);
}
.news-list-item {
    display: flex;
    gap: 14px;
    padding: 12px;
    background: white;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0,0,0,.06);
    transition: all .2s;
    position: relative;
    overflow: hidden;
}
.news-list-item:hover {
    box-shadow: 0 4px 18px rgba(0,0,0,.1);
    transform: translateX(3px);
}
.news-list-thumb {
    width: 80px;
    height: 64px;
    object-fit: cover;
    border-radius: 8px;
    flex-shrink: 0;
}
.news-list-thumb-placeholder {
    width: 80px;
    height: 64px;
    border-radius: 8px;
    background: linear-gradient(135deg, var(--primary), var(--primary-mid));
    display: flex;
    align-items: center;
    justify-content: center;
    color: rgba(255,255,255,.5);
    font-size: 1.4rem;
    flex-shrink: 0;
}
.news-list-body { flex: 1; }
.news-list-body .news-meta-bar { color: var(--text-muted); margin-top: 4px; }

/* ---- Gallery ---- */
.gallery-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    grid-template-rows: repeat(2, 200px);
    gap: 10px;
}
.gallery-grid .gallery-item:first-child {
    grid-column: span 2;
    grid-row: span 2;
}
.gallery-item {
    position: relative;
    border-radius: 10px;
    overflow: hidden;
    cursor: pointer;
}
.gallery-item img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform .4s;
}
.gallery-item:hover img { transform: scale(1.08); }
.gallery-overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    padding: 16px 14px 12px;
    background: linear-gradient(to top, rgba(0,0,0,.75) 0%, transparent 100%);
    opacity: 0;
    transition: opacity .3s;
}
.gallery-item:hover .gallery-overlay { opacity: 1; }
@media (max-width: 768px) {
    .gallery-grid {
        grid-template-columns: repeat(2, 1fr);
        grid-template-rows: auto;
    }
    .gallery-grid .gallery-item:first-child {
        grid-column: span 2;
        grid-row: span 1;
    }
    .gallery-item { height: 150px; }
}

/* ---- Partner Cards ---- */
.partner-card {
    background: white;
    border-radius: 12px;
    padding: 20px 12px;
    text-align: center;
    box-shadow: 0 2px 12px rgba(0,0,0,.07);
    transition: all .3s;
    height: 100%;
}
.partner-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 24px rgba(0,0,0,.12);
}
.partner-icon {
    font-size: 2rem;
    color: var(--primary-mid);
    margin-bottom: 8px;
}
.partner-name {
    font-size: 12px;
    font-weight: 600;
    color: var(--text);
    margin-bottom: 4px;
    line-height: 1.3;
}
.partner-type {
    font-size: 11px;
    color: var(--text-muted);
    background: var(--bg);
    padding: 2px 8px;
    border-radius: 20px;
}

/* ---- CTA Section ---- */
.cta-section {
    padding: 60px 0;
    background: white;
}
.cta-wrapper {
    background: linear-gradient(135deg, var(--primary) 0%, #1a6638 60%, var(--primary-mid) 100%);
    border-radius: 20px;
    padding: 50px 48px;
    position: relative;
    overflow: hidden;
}
.cta-wrapper::before {
    content: '';
    position: absolute;
    top: -40%;
    right: -10%;
    width: 360px;
    height: 360px;
    background: rgba(255,255,255,.06);
    border-radius: 50%;
}
.cta-title {
    color: white;
    font-weight: 700;
    font-size: 1.8rem;
    margin-bottom: 12px;
}
.cta-desc {
    color: rgba(255,255,255,.8);
    font-size: 15px;
    margin-bottom: 0;
}
.btn-cta {
    background: white;
    color: var(--primary);
    border: none;
    padding: 12px 24px;
    border-radius: 50px;
    font-weight: 600;
    transition: all .3s;
}
.btn-cta:hover {
    background: var(--gold);
    color: var(--primary);
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(0,0,0,.2);
}
.btn-cta-outline {
    background: transparent;
    color: white;
    border: 2px solid rgba(255,255,255,.6);
    padding: 12px 24px;
    border-radius: 50px;
    font-weight: 600;
    transition: all .3s;
}
.btn-cta-outline:hover {
    background: rgba(255,255,255,.15);
    border-color: white;
    color: white;
}
@media (max-width: 768px) {
    .cta-wrapper { padding: 32px 24px; }
    .cta-title { font-size: 1.4rem; }
    .btn-cta, .btn-cta-outline { width: 100%; margin-bottom: 8px; }
}
</style>
@endpush

@push('scripts')
<script>
// Animated counter
function animateCounters() {
    document.querySelectorAll('.counter').forEach(el => {
        const target = parseInt(el.getAttribute('data-target')) || 0;
        const duration = 1800;
        const step = target / (duration / 16);
        let current = 0;
        const timer = setInterval(() => {
            current += step;
            if (current >= target) {
                el.textContent = target;
                clearInterval(timer);
            } else {
                el.textContent = Math.floor(current);
            }
        }, 16);
    });
}

// Trigger counter when stats section is visible
const statsObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            animateCounters();
            statsObserver.disconnect();
        }
    });
}, { threshold: 0.3 });

const statsSection = document.querySelector('.stats-section');
if (statsSection) statsObserver.observe(statsSection);
</script>
@endpush
