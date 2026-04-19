<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Beranda') - LPPM UNIK Cipasung</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Merriweather:wght@700;900&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        /* ================================================================
           DESIGN SYSTEM — LPPM UNIK Cipasung
           Palette: Forest Green + University Gold (Prestigious Academic)
        ================================================================ */
        :root {
            --primary:        #0e4226;   /* deep forest green */
            --primary-mid:    #1a6638;   /* medium green */
            --primary-light:  #2d8653;   /* light green */
            --gold:           #b8940a;   /* university gold */
            --gold-light:     #d4aa1c;   /* hover gold */
            --gold-pale:      #fdf6d8;   /* very pale gold bg */
            --dark:           #111827;
            --text:           #1f2937;
            --text-muted:     #6b7280;
            --bg:             #f7f9f7;
            --bg-alt:         #eef2ee;
            --white:          #ffffff;
            --border:         #d1ddd4;
            --shadow-sm:      0 1px 4px rgba(14,66,38,.08);
            --shadow:         0 4px 20px rgba(14,66,38,.12);
            --shadow-lg:      0 12px 40px rgba(14,66,38,.16);
            --radius:         10px;
            --radius-lg:      16px;
        }

        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Inter', sans-serif;
            font-size: 15px;
            line-height: 1.7;
            color: var(--text);
            background: var(--white);
            overflow-x: hidden;
        }

        h1,h2,h3,h4,h5,h6 { font-family: 'Inter', sans-serif; }

        /* ---- Topbar ---- */
        .topbar {
            background: var(--primary);
            color: rgba(255,255,255,.9);
            padding: 9px 0;
            font-size: 12.5px;
            font-weight: 500;
            letter-spacing: .3px;
        }
        .topbar a { color: rgba(255,255,255,.85); text-decoration: none; margin-left: 14px; transition: color .2s; }
        .topbar a:hover { color: var(--gold-light); }
        .topbar .bi { font-size: 13px; }
        @media (max-width: 768px) { .topbar { display: none; } }

        /* ---- Navbar ---- */
        .navbar {
            background: var(--white);
            box-shadow: 0 2px 12px rgba(14,66,38,.10);
            padding: 0;
            position: sticky;
            top: 0;
            z-index: 1020;
            border-bottom: 2px solid transparent;
            transition: border-color .3s;
        }
        .navbar.scrolled { border-bottom-color: var(--gold); }
        .navbar .container { min-height: 68px; }

        .navbar-brand {
            display: flex;
            align-items: center;
            padding: 8px 0;
            text-decoration: none;
        }
        .navbar-brand img { height: 52px; margin-right: 12px; }
        .navbar-brand-text { line-height: 1.25; }
        .navbar-brand-text .brand-main {
            display: block;
            font-size: 15px;
            font-weight: 800;
            color: var(--primary);
            letter-spacing: -.3px;
        }
        .navbar-brand-text .brand-sub {
            display: block;
            font-size: 11px;
            font-weight: 400;
            color: var(--text-muted);
        }

        .navbar-nav .nav-link {
            color: var(--text) !important;
            font-weight: 500;
            font-size: 13.5px;
            padding: 22px 13px !important;
            transition: color .2s;
            position: relative;
            white-space: nowrap;
        }
        .navbar-nav .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0; left: 50%;
            width: 0; height: 3px;
            background: var(--gold);
            border-radius: 2px 2px 0 0;
            transform: translateX(-50%);
            transition: width .25s;
        }
        .navbar-nav .nav-link:hover,
        .navbar-nav .nav-link.active { color: var(--primary) !important; }
        .navbar-nav .nav-link:hover::after,
        .navbar-nav .nav-link.active::after { width: 70%; }

        /* Dropdown caret hide */
        .dropdown-toggle::after { display: none !important; }

        .dropdown-menu {
            border: 1px solid var(--border);
            border-radius: var(--radius);
            box-shadow: var(--shadow-lg);
            padding: 8px 0;
            min-width: 230px;
            margin-top: 0 !important;
            animation: dropFade .2s ease;
        }
        @keyframes dropFade {
            from { opacity:0; transform:translateY(-6px); }
            to   { opacity:1; transform:translateY(0); }
        }
        .dropdown-item {
            font-size: 13.5px;
            font-weight: 500;
            padding: 9px 18px;
            color: var(--text);
            transition: all .2s;
        }
        .dropdown-item:hover {
            background: var(--bg);
            color: var(--primary);
            padding-left: 24px;
        }
        .dropdown-item i { width: 18px; }
        .dropdown-divider { margin: 4px 0; border-color: var(--border); }

        .btn-admin-nav {
            background: var(--primary);
            color: var(--white) !important;
            border: none;
            padding: 8px 18px !important;
            border-radius: 8px;
            font-size: 13px !important;
            font-weight: 600 !important;
            margin-left: 6px;
            transition: background .2s, transform .2s !important;
        }
        .btn-admin-nav::after { display: none !important; }
        .btn-admin-nav:hover {
            background: var(--primary-mid) !important;
            transform: translateY(-1px) !important;
        }

        /* ---- Hero ---- */
        .hero-section {
            background: linear-gradient(135deg, #0a3119 0%, #0e4226 40%, #1a6638 80%, #0e4226 100%);
            color: var(--white);
            padding: 56px 0 80px;
            position: relative;
            overflow: hidden;
            min-height: 200px;
        }
        .hero-section::before {
            content: '';
            position: absolute; inset: 0;
            background: url("data:image/svg+xml,%3Csvg width='80' height='80' viewBox='0 0 80 80' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23c9a227' fill-opacity='0.04'%3E%3Cpath d='M50 50c0-5.523 4.477-10 10-10s10 4.477 10 10-4.477 10-10 10c0 5.523-4.477 10-10 10s-10-4.477-10-10 4.477-10 10-10zM10 10c0-5.523 4.477-10 10-10s10 4.477 10 10-4.477 10-10 10c0 5.523-4.477 10-10 10S0 25.523 0 20s4.477-10 10-10z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }
        .hero-section::after {
            content: '';
            position: absolute; bottom: -1px; left: 0; right: 0;
            height: 60px;
            background: var(--white);
            clip-path: ellipse(55% 100% at 50% 100%);
        }
        .hero-title {
            font-size: 2.6rem;
            font-weight: 800;
            line-height: 1.2;
            letter-spacing: -.5px;
        }
        .hero-highlight { color: var(--gold-light); }
        .hero-description { font-size: 1.05rem; opacity: .9; line-height: 1.8; }
        .hero-badge span {
            display: inline-block;
            background: rgba(255,255,255,.12);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(255,255,255,.25);
            color: rgba(255,255,255,.9);
            padding: 5px 14px;
            border-radius: 50px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .5px;
        }
        .hero-image {
            max-width: 88%;
            filter: drop-shadow(0 16px 40px rgba(0,0,0,.3));
            animation: float 4s ease-in-out infinite;
        }
        @keyframes float { 0%,100%{transform:translateY(0)} 50%{transform:translateY(-16px)} }

        .btn-hero-primary {
            background: var(--gold);
            color: var(--primary) !important;
            border: none;
            padding: 12px 28px;
            border-radius: 8px;
            font-weight: 700;
            font-size: 14px;
            letter-spacing: .3px;
            transition: all .25s;
            box-shadow: 0 4px 16px rgba(184,148,10,.35);
        }
        .btn-hero-primary:hover {
            background: var(--gold-light);
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(184,148,10,.45);
        }
        .btn-hero-outline {
            background: transparent;
            color: var(--white) !important;
            border: 2px solid rgba(255,255,255,.6);
            padding: 12px 28px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 14px;
            transition: all .25s;
        }
        .btn-hero-outline:hover {
            background: rgba(255,255,255,.12);
            border-color: var(--white);
        }

        /* Carousel */
        .carousel-item { padding: 10px 0; }
        .carousel-control-prev,
        .carousel-control-next {
            width: 44px; height: 44px;
            background: rgba(255,255,255,.15);
            border-radius: 50%;
            top: 50%; transform: translateY(-50%);
            border: 1px solid rgba(255,255,255,.25);
            transition: background .2s;
        }
        .carousel-control-prev { left: 16px; }
        .carousel-control-next { right: 16px; }
        .carousel-control-prev:hover,
        .carousel-control-next:hover { background: rgba(255,255,255,.25); }
        .carousel-indicators { bottom: -44px; }
        .carousel-indicators button {
            width: 10px; height: 10px;
            border-radius: 50%;
            background: rgba(255,255,255,.4);
            border: 2px solid rgba(255,255,255,.6);
            transition: all .2s;
        }
        .carousel-indicators button.active {
            background: var(--gold);
            border-color: var(--gold);
            transform: scale(1.3);
        }
        @media (max-width: 768px) {
            .hero-section { padding: 40px 0 60px; }
            .hero-title { font-size: 1.75rem; }
            .hero-description { font-size: .95rem; }
            .btn-hero-primary, .btn-hero-outline { width: 100%; }
            .carousel-control-prev, .carousel-control-next { display: none; }
        }

        /* ---- Page Header (inner pages) ---- */
        .page-header {
            position: relative;
            background-image: url('/assets/images/banner.png');
            background-size: cover;
            background-position: center top;
            color: var(--white);
            padding: 56px 0 52px;
            margin-bottom: 50px;
            overflow: hidden;
        }
        .page-header::before {
            content: '';
            position: absolute; inset: 0;
            background: linear-gradient(135deg,
                rgba(10,49,25,.88) 0%,
                rgba(14,66,38,.78) 50%,
                rgba(26,102,56,.70) 100%);
        }
        .page-header::after {
            content: '';
            position: absolute; bottom: -1px; left: 0; right: 0;
            height: 50px;
            background: var(--white);
            clip-path: ellipse(55% 100% at 50% 100%);
        }
        .page-header .container { position: relative; z-index: 2; }
        .page-header h1 {
            font-size: 2rem;
            font-weight: 800;
            letter-spacing: -.4px;
            margin-bottom: 10px;
            text-shadow: 0 2px 8px rgba(0,0,0,.3);
        }
        .page-header .watermark {
            position: absolute;
            right: -20px; top: 50%;
            transform: translateY(-50%);
            opacity: .06;
            width: 320px;
            pointer-events: none;
        }
        .breadcrumb { background: transparent; padding: 0; margin: 0; }
        .breadcrumb-item a { color: rgba(255,255,255,.75); text-decoration: none; }
        .breadcrumb-item a:hover { color: var(--gold-light); }
        .breadcrumb-item.active { color: rgba(255,255,255,.95); }
        .breadcrumb-item + .breadcrumb-item::before { color: rgba(255,255,255,.5); }

        /* ---- Section Titles ---- */
        .section-title {
            text-align: center;
            margin-bottom: 48px;
        }
        .section-title h2 {
            font-size: 1.85rem;
            font-weight: 800;
            color: var(--primary);
            position: relative;
            display: inline-block;
            padding-bottom: 14px;
            letter-spacing: -.4px;
        }
        .section-title h2::after {
            content: '';
            position: absolute;
            bottom: 0; left: 50%;
            transform: translateX(-50%);
            width: 52px; height: 4px;
            background: linear-gradient(90deg, var(--primary), var(--gold));
            border-radius: 2px;
        }
        .section-label {
            color: var(--gold);
            font-size: 11.5px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 2.5px;
            margin-bottom: 6px;
            display: block;
        }
        .section-heading {
            font-size: 1.85rem;
            font-weight: 800;
            color: var(--primary);
            letter-spacing: -.4px;
            line-height: 1.2;
        }
        .section-divider {
            width: 52px; height: 4px;
            background: linear-gradient(90deg, var(--primary), var(--gold));
            border-radius: 2px;
            margin-top: 12px;
        }

        /* ---- Cards ---- */
        .card {
            border: 1px solid var(--border);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-sm);
            transition: transform .25s, box-shadow .25s;
            overflow: hidden;
        }
        .card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-lg);
        }
        .card-img-top { height: 210px; object-fit: cover; }

        /* News card */
        .news-card { height: 100%; }
        .news-card .card-body { display: flex; flex-direction: column; }
        .news-card .card-title {
            font-weight: 700;
            font-size: 15px;
            color: var(--primary);
            line-height: 1.45;
        }
        .news-card .card-title a { color: inherit; }
        .news-card .card-title a:hover { color: var(--gold); }
        .news-card .card-text { color: var(--text-muted); flex-grow: 1; font-size: 14px; }
        .news-meta { font-size: 12.5px; color: var(--text-muted); margin-top: 14px; padding-top: 14px; border-top: 1px solid var(--border); }

        /* ---- Stats ---- */
        .stats-box {
            background: var(--white);
            border: 1px solid var(--border);
            border-radius: var(--radius-lg);
            padding: 32px 24px;
            text-align: center;
            box-shadow: var(--shadow-sm);
            transition: all .25s;
        }
        .stats-box:hover { transform: translateY(-4px); box-shadow: var(--shadow); }
        .stats-box i { font-size: 40px; color: var(--primary); margin-bottom: 12px; }
        .stats-box h3 { font-size: 2.4rem; font-weight: 800; color: var(--primary); margin-bottom: 6px; }
        .stats-box p { color: var(--text-muted); margin: 0; font-size: 13.5px; font-weight: 500; }

        /* ---- Buttons ---- */
        .btn-primary {
            background: var(--primary);
            border: none;
            padding: 10px 24px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 14px;
            transition: background .2s, transform .2s;
        }
        .btn-primary:hover { background: var(--primary-mid); transform: translateY(-1px); }

        .btn-outline-primary {
            color: var(--primary);
            border: 2px solid var(--primary);
            padding: 9px 22px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 14px;
            transition: all .2s;
        }
        .btn-outline-primary:hover { background: var(--primary); color: var(--white); }

        .btn-gold {
            background: var(--gold);
            color: var(--primary);
            border: none;
            padding: 10px 24px;
            border-radius: 8px;
            font-weight: 700;
            transition: all .2s;
        }
        .btn-gold:hover { background: var(--gold-light); transform: translateY(-1px); }

        .badge {
            padding: 5px 11px;
            border-radius: 6px;
            font-weight: 600;
            font-size: 12px;
        }

        /* ---- Footer ---- */
        .footer {
            background: var(--primary);
            background-image: linear-gradient(160deg, #0a3119 0%, #0e4226 60%, #0d3b22 100%);
            color: rgba(255,255,255,.88);
            padding: 56px 0 0;
            margin-top: 80px;
            position: relative;
            overflow: hidden;
        }
        .footer::before {
            content: '';
            position: absolute; inset: 0;
            background: url('/assets/images/background.jpg') center/cover no-repeat;
            opacity: .04;
        }
        .footer > .container { position: relative; z-index: 1; }
        .footer h5 {
            font-weight: 700;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: var(--gold-light);
            margin-bottom: 18px;
            padding-bottom: 10px;
            position: relative;
        }
        .footer h5::after {
            content: '';
            position: absolute; bottom: 0; left: 0;
            width: 32px; height: 2px;
            background: var(--gold);
        }
        .footer-logo { max-width: 130px; margin-bottom: 14px; background: var(--white); padding: 8px; border-radius: 8px; }
        .footer-description { color: rgba(255,255,255,.75); line-height: 1.7; font-size: 13.5px; margin-bottom: 16px; }
        .footer ul { list-style: none; padding: 0; }
        .footer ul li { margin-bottom: 9px; font-size: 13.5px; color: rgba(255,255,255,.75); }
        .footer ul li a {
            color: rgba(255,255,255,.75);
            text-decoration: none;
            display: flex;
            align-items: flex-start;
            gap: 8px;
            transition: color .2s, padding .2s;
        }
        .footer ul li a:hover { color: var(--gold-light); padding-left: 4px; }
        .footer ul li i { width: 16px; margin-top: 3px; font-size: 13px; flex-shrink: 0; }
        .social-links { display: flex; gap: 9px; margin-top: 16px; }
        .social-links a {
            width: 36px; height: 36px;
            border-radius: 8px;
            background: rgba(255,255,255,.1);
            border: 1px solid rgba(255,255,255,.15);
            color: rgba(255,255,255,.8);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 15px;
            transition: all .2s;
        }
        .social-links a:hover {
            background: var(--gold);
            color: var(--primary);
            border-color: var(--gold);
            transform: translateY(-3px);
        }
        .video-container {
            position: relative;
            padding-bottom: 58%;
            height: 0;
            border-radius: var(--radius);
            overflow: hidden;
            box-shadow: 0 8px 28px rgba(0,0,0,.35);
            border: 2px solid rgba(255,255,255,.1);
        }
        .video-container iframe { position: absolute; inset: 0; width: 100%; height: 100%; border: 0; }
        .footer-bottom {
            margin-top: 40px;
            padding: 18px 0;
            border-top: 1px solid rgba(255,255,255,.12);
            text-align: center;
            color: rgba(255,255,255,.55);
            font-size: 13px;
        }
        @media (max-width: 992px) { .footer { padding: 40px 0 0; } }

        /* ---- Misc Utilities ---- */
        .bg-light-green { background: var(--bg); }
        .bg-alt { background: var(--bg-alt); }
        .text-primary-custom { color: var(--primary) !important; }
        .text-gold { color: var(--gold) !important; }

        /* ---- Responsive General ---- */
        @media (max-width: 768px) {
            .page-header h1 { font-size: 1.5rem; }
            .section-heading { font-size: 1.5rem; }
            .footer { margin-top: 56px; }
            .footer h5 { margin-top: 24px; }
        }
    </style>

    @stack('styles')
</head>

<body>
    <!-- Topbar -->
    <div class="topbar">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <i class="bi bi-telephone me-1"></i>(0265) 123-4567
                    <span class="mx-2 opacity-50">|</span>
                    <i class="bi bi-envelope me-1"></i>lppm@unik.ac.id
                </div>
                <div>
                    <a href="#" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
                    <a href="#" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
                    <a href="#" aria-label="YouTube"><i class="bi bi-youtube"></i></a>
                </div>
            </div>
        </div>
    </div>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg" id="mainNav">
        <div class="container d-flex align-items-center">
            <a class="navbar-brand me-auto" href="{{ route('home') }}">
                <img src="/assets/images/image.png" alt="Logo LPPM" onerror="this.style.display='none'">
            </a>

            <button class="navbar-toggler border-0 ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-lg-center">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Beranda</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->routeIs('about.*') ? 'active' : '' }}" href="#" data-bs-toggle="dropdown">Tentang Kami</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('about.history') }}"><i class="bi bi-building"></i> Sejarah/Profil</a></li>
                            <li><a class="dropdown-item" href="{{ route('about.vision-mission') }}"><i class="bi bi-eye"></i> Visi &amp; Misi</a></li>
                            <li><a class="dropdown-item" href="{{ route('about.organizational-structure') }}"><i class="bi bi-diagram-3"></i> Struktur Organisasi</a></li>
                            <li><a class="dropdown-item" href="{{ route('about.leaders') }}"><i class="bi bi-person-badge"></i> Profil Pimpinan</a></li>
                            <li><a class="dropdown-item" href="{{ route('about.staff') }}"><i class="bi bi-people"></i> Staf LPPM</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{ route('about.gallery') }}"><i class="bi bi-images"></i> Galeri Kegiatan</a></li>
                            <li><a class="dropdown-item" href="{{ route('about.budget-realization') }}"><i class="bi bi-cash-stack"></i> Realisasi Anggaran</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->routeIs('services.*') ? 'active' : '' }}" href="#" data-bs-toggle="dropdown">Layanan</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('services.research') }}"><i class="bi bi-journal-text"></i> Layanan Penelitian</a></li>
                            <li><a class="dropdown-item" href="{{ route('services.community-service') }}"><i class="bi bi-people-fill"></i> Pengabdian Masyarakat</a></li>
                            <li><a class="dropdown-item" href="{{ route('services.cooperation') }}"><i class="bi bi-building-check"></i> Kerjasama</a></li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('news.*') ? 'active' : '' }}" href="{{ route('news.index') }}">Berita</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->routeIs('research.*') || request()->routeIs('restra') || request()->routeIs('performance') ? 'active' : '' }}" href="#" data-bs-toggle="dropdown">Penelitian</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('research.internal') }}"><i class="bi bi-journal-bookmark"></i> Data Penelitian Internal</a></li>
                            <li><a class="dropdown-item" href="{{ route('restra') }}"><i class="bi bi-file-earmark-text"></i> Renstra LPPM</a></li>
                            <li><a class="dropdown-item" href="{{ route('performance') }}"><i class="bi bi-bar-chart-line"></i> Kinerja LPPM</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->routeIs('ppm.*') ? 'active' : '' }}" href="#" data-bs-toggle="dropdown">PPM</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('ppm.internal') }}"><i class="bi bi-people"></i> Data PPM Internal</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->routeIs('study-centers.*') ? 'active' : '' }}" href="#" data-bs-toggle="dropdown">Pusat Studi</a>
                        <ul class="dropdown-menu">
                            <li>
                                <span class="dropdown-item-text" style="font-size:10.5px;color:var(--gold);font-weight:700;text-transform:uppercase;letter-spacing:1.5px;padding:6px 18px;">Di bawah LPPM</span>
                            </li>
                            <li><a class="dropdown-item" href="{{ route('study-centers.index') }}"><i class="bi bi-buildings"></i> Semua Pusat Studi</a></li>
                            @php $navStudyCenters = \App\Models\StudyCenter::where('is_active',true)->orderBy('order')->get(); @endphp
                            @foreach($navStudyCenters as $sc)
                            <li><a class="dropdown-item" href="{{ route('study-centers.show', $sc->slug) }}">
                                <i class="bi bi-chevron-right" style="font-size:10px;"></i>
                                {{ $sc->short_name ? $sc->short_name.' — ' : '' }}{{ Str::limit($sc->name, 30) }}
                            </a></li>
                            @endforeach
                        </ul>
                    </li>

                    @auth
                    @if(auth()->user()->isAdmin())
                    <li class="nav-item">
                        <a class="nav-link btn-admin-nav" href="{{ route('admin.dashboard') }}">
                            <i class="bi bi-speedometer2 me-1"></i>Admin
                        </a>
                    </li>
                    @endif
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <img src="/assets/images/image.png" alt="Logo LPPM" class="footer-logo" onerror="this.style.display='none'">
                    <h5>LPPM UNIK Cipasung</h5>
                    <p class="footer-description">
                        Lembaga Penelitian dan Pengabdian kepada Masyarakat<br>
                        Universitas Islam KH. Ruhiyat Cipasung, Tasikmalaya
                    </p>
                    <div class="social-links">
                        <a href="#" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
                        <a href="#" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
                        <a href="#" aria-label="YouTube"><i class="bi bi-youtube"></i></a>
                        <a href="#" aria-label="Twitter"><i class="bi bi-twitter-x"></i></a>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6">
                    <h5>Navigasi</h5>
                    <ul>
                        <li><a href="{{ route('home') }}"><i class="bi bi-chevron-right"></i>Beranda</a></li>
                        <li><a href="{{ route('about.history') }}"><i class="bi bi-chevron-right"></i>Tentang Kami</a></li>
                        <li><a href="{{ route('research.internal') }}"><i class="bi bi-chevron-right"></i>Penelitian</a></li>
                        <li><a href="{{ route('ppm.internal') }}"><i class="bi bi-chevron-right"></i>PPM</a></li>
                        <li><a href="{{ route('study-centers.index') }}"><i class="bi bi-chevron-right"></i>Pusat Studi</a></li>
                        <li><a href="{{ route('news.index') }}"><i class="bi bi-chevron-right"></i>Berita</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6">
                    <h5>Kontak</h5>
                    <ul>
                        <li><i class="bi bi-geo-alt-fill"></i>Jl. KH. Ruhiyat No. 123, Cipasung, Tasikmalaya</li>
                        <li><i class="bi bi-telephone-fill"></i>(0265) 123-4567</li>
                        <li><i class="bi bi-envelope-fill"></i>lppm@unik.ac.id</li>
                        <li><i class="bi bi-globe"></i>www.unik.ac.id</li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6">
                    <h5>Video Profil</h5>
                    <div class="video-container">
                        <iframe src="https://www.youtube.com/embed/ECoKq5Uu_jw"
                            title="Profil LPPM UNIK Cipasung"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                <p>&copy; {{ date('Y') }} LPPM UNIK Cipasung &mdash; Universitas Islam KH. Ruhiyat Cipasung. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({ duration: 900, once: true, offset: 60 });

        // Navbar scroll effect
        const nav = document.getElementById('mainNav');
        window.addEventListener('scroll', () => {
            nav.classList.toggle('scrolled', window.scrollY > 80);
        });

        // Hover dropdown on desktop
        document.querySelectorAll('.navbar-nav .dropdown').forEach(el => {
            el.addEventListener('mouseenter', function() {
                if (window.innerWidth >= 992) this.querySelector('.dropdown-menu')?.classList.add('show');
            });
            el.addEventListener('mouseleave', function() {
                if (window.innerWidth >= 992) this.querySelector('.dropdown-menu')?.classList.remove('show');
            });
        });
    </script>
    @stack('scripts')
</body>
</html>
