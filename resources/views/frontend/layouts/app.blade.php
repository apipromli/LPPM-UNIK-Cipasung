<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Beranda') - LPPM UNIK Cipasung</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- AOS Animation Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        :root {
            --primary-color: #1e3a8a;
            --secondary-color: #3b82f6;
            --accent-color: #f59e0b;
            --green-color: #046a1d;
            --text-dark: #1f2937;
            --text-light: #6b7280;
            --bg-light: #f9fafb;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            color: var(--text-dark);
            overflow-x: hidden;
        }

        /* Topbar */
        .topbar {
            background-color: var(--green-color);
            color: white;
            padding: 8px 0;
            font-size: 13px;
            position: relative;
            z-index: 1030;
        }

        .topbar a {
            color: white;
            text-decoration: none;
            margin-left: 15px;
            transition: all 0.3s;
        }

        .topbar a:hover {
            color: var(--accent-color);
        }

        /* Hide topbar on mobile */
        @media (max-width: 768px) {
            .topbar {
                display: none;
            }
        }

        /* Navbar - Updated */
        .navbar {
            background: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 10px 0;
            position: sticky;
            top: 0;
            z-index: 1020;
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            font-weight: 700;
            color: var(--primary-color) !important;
            font-size: 18px;
        }

        .navbar-brand img {
            height: 55px;
            margin-right: 12px;
        }

        .navbar-nav .nav-link {
            color: var(--text-dark);
            font-weight: 500;
            padding: 10px 14px !important;
            transition: all 0.3s;
            position: relative;
            font-size: 14px;
        }

        .navbar-nav .nav-link:hover,
        .navbar-nav .nav-link.active {
            color: var(--secondary-color);
        }

        .navbar-nav .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 0;
            left: 50%;
            background: var(--secondary-color);
            transition: all 0.3s;
            transform: translateX(-50%);
        }

        .navbar-nav .nav-link:hover::after,
        .navbar-nav .nav-link.active::after {
            width: 70%;
        }

        /* Dropdown - Updated */
        .navbar-nav .dropdown:hover .dropdown-menu {
            display: block;
            animation: fadeInDown 0.3s;
        }

        .dropdown-toggle::after {
            display: none !important;
        }

        .dropdown-menu {
            border: none;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
            border-radius: 8px;
            padding: 8px 0;
            margin-top: 0;
            min-width: 220px;
        }

        .dropdown-item {
            padding: 10px 20px;
            transition: all 0.3s;
            font-size: 14px;
        }

        .dropdown-item:hover {
            background: var(--secondary-color);
            color: white;
            padding-left: 25px;
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Hero Section - Updated with Carousel */
        .hero-section {
            background: linear-gradient(135deg, #1a7f3f 0%, #2d9f52 25%, #f39c12 75%, #e67e22 100%);
            /* background: linear-gradient(135deg,
                    #134e2a 0%,
                    #1f6f3a 30%,
                    #c28e0e 70%,
                    #b86d1b 100%); */

            color: white;
            padding: 50px 0;
            position: relative;
            overflow: hidden;
            min-height: 200px;
        }

        .hero-overlay {
            background: rgba(0, 0, 0, 0.35);
        }

        .hero-section h1,
        .hero-section p {
            text-shadow: 0 2px 6px rgba(0, 0, 0, .35);
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="rgba(255,255,255,0.1)" d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,112C672,96,768,96,864,112C960,128,1056,160,1152,160C1248,160,1344,128,1392,112L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>') no-repeat bottom;
            background-size: cover;
            opacity: 0.3;
        }

        /* Carousel Styling */
        #heroCarousel {
            position: relative;
            z-index: 2;
            width: 100%;
        }

        .carousel-item {
            padding: 40px 0;
            transition: transform 0.6s ease-in-out;
        }

        /* Hero Content Animations */
        .hero-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 20px;
            animation: fadeInUp 0.8s ease-out;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
        }

        .hero-description {
            font-size: 1.1rem;
            margin-bottom: 25px;
            line-height: 1.7;
            animation: fadeInUp 1s ease-out;
        }

        .hero-buttons {
            animation: fadeInUp 1.2s ease-out;
        }

        .hero-image {
            max-width: 85%;
            filter: drop-shadow(0 10px 30px rgba(0, 0, 0, 0.3));
            animation: floatAnimation 3s ease-in-out infinite;
            transition: transform 0.3s ease;
        }

        .hero-image:hover {
            transform: scale(1.05) translateY(-10px);
        }

        /* Carousel Controls */
        .carousel-control-prev,
        .carousel-control-next {
            width: 50px;
            height: 50px;
            background-color: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            top: 50%;
            transform: translateY(-50%);
            opacity: 0.7;
            transition: all 0.3s ease;
        }

        .carousel-control-prev:hover,
        .carousel-control-next:hover {
            opacity: 1;
            background-color: rgba(255, 255, 255, 0.3);
            transform: translateY(-50%) scale(1.1);
        }

        .carousel-control-prev {
            left: 20px;
        }

        .carousel-control-next {
            right: 20px;
        }

        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            width: 25px;
            height: 25px;
        }

        /* Carousel Indicators */
        .carousel-indicators {
            bottom: -40px;
        }

        .carousel-indicators button {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.5);
            border: 2px solid white;
            transition: all 0.3s ease;
        }

        .carousel-indicators button.active {
            background-color: white;
            transform: scale(1.3);
        }

        /* Button Styling */
        .hero-section .btn {
            padding: 12px 30px;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .hero-section .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
        }

        .hero-section .btn-primary {
            background-color: white;
            color: #1a7f3f;
            border: none;
        }

        .hero-section .btn-primary:hover {
            background-color: #f8f9fa;
            color: #2d9f52;
        }

        .hero-section .btn-outline-light {
            border: 2px solid white;
            color: white;
        }

        .hero-section .btn-outline-light:hover {
            background-color: white;
            color: #f39c12;
            border-color: white;
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes floatAnimation {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-20px);
            }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero-section {
                padding: 60px 0;
                min-height: auto;
            }

            .hero-title {
                font-size: 1.8rem;
            }

            .hero-description {
                font-size: 0.95rem;
            }

            .carousel-control-prev,
            .carousel-control-next {
                display: none;
            }

            .carousel-indicators {
                bottom: -30px;
            }

            .hero-buttons {
                flex-direction: column;
            }

            .hero-section .btn {
                width: 100%;
            }
        }

        @media (max-width: 576px) {
            .hero-title {
                font-size: 1.5rem;
            }

            .hero-section .btn {
                padding: 10px 20px;
                font-size: 0.9rem;
            }
        }

        /* Page Header */
        .page-header {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            padding: 50px 0;
            margin-bottom: 50px;
        }

        .page-header h1 {
            font-weight: 700;
            font-size: 2.2rem;
            margin-bottom: 10px;
        }

        .breadcrumb {
            background: transparent;
            margin: 0;
            padding: 0;
        }

        .breadcrumb-item a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
        }

        .breadcrumb-item.active {
            color: white;
        }

        /* Cards */
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            transition: all 0.3s;
            overflow: hidden;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }

        .card-img-top {
            height: 200px;
            object-fit: cover;
        }

        /* Section Title */
        .section-title {
            text-align: center;
            margin-bottom: 50px;
        }

        .section-title h2 {
            font-weight: 700;
            color: var(--primary-color);
            position: relative;
            display: inline-block;
            padding-bottom: 15px;
        }

        .section-title h2::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background: var(--accent-color);
        }

        /* Stats Counter */
        .stats-box {
            background: white;
            padding: 30px;
            border-radius: 12px;
            text-align: center;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            transition: all 0.3s;
        }

        .stats-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }

        .stats-box i {
            font-size: 48px;
            color: var(--secondary-color);
            margin-bottom: 15px;
        }

        .stats-box h3 {
            font-size: 36px;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 10px;
        }

        .stats-box p {
            color: var(--text-light);
            margin: 0;
        }

        /* News Card */
        .news-card {
            height: 100%;
        }

        .news-card .card-body {
            display: flex;
            flex-direction: column;
        }

        .news-card .card-title {
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 15px;
        }

        .news-card .card-text {
            flex-grow: 1;
            color: var(--text-light);
        }

        .news-meta {
            font-size: 14px;
            color: var(--text-light);
            margin-top: 15px;
            padding-top: 15px;
            border-top: 1px solid #e5e7eb;
        }

        /* Footer - Modern & Elegant Design */
        .footer {
            background: linear-gradient(45deg, #2d9f52 0%, #1a7f3f 35%, #e67e22 100%);
            position: relative;
            color: white;
            padding: 50px 0 0;
            margin-top: 80px;
            overflow: hidden;
        }

        .footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: url('/assets/images/background.png');
            background-size: cover;
            background-position: center;
            opacity: 0.08;
            z-index: 0;
        }

        /* Decorative elements */
        .footer::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 200px;
            background: linear-gradient(180deg, transparent 0%, rgba(0, 0, 0, 0.1) 100%);
            z-index: 0;
        }

        .footer>.container {
            position: relative;
            z-index: 1;
        }

        .footer h5 {
            font-weight: 700;
            margin-bottom: 15px;
            color: white;
            font-size: 15px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            position: relative;
            padding-bottom: 10px;
        }

        .footer h5::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 40px;
            height: 3px;
            background: linear-gradient(90deg, #f39c12, #e67e22);
            border-radius: 2px;
        }

        .footer-logo {
            max-width: 150px;
            margin-bottom: 15px;
            background: white;
            padding: 8px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease;
        }

        .footer-logo:hover {
            transform: scale(1.05);
        }

        .footer-description {
            color: rgba(255, 255, 255, 0.95);
            line-height: 1.6;
            margin-bottom: 15px;
            font-size: 14px;
        }

        .footer ul {
            list-style: none;
            padding: 0;
        }

        .footer ul li {
            margin-bottom: 8px;
            font-size: 14px;
        }

        .footer ul li a {
            color: rgba(255, 255, 255, 0.9);
            text-decoration: none;
            transition: all 0.3s;
            display: flex;
            align-items: flex-start;
        }

        .footer ul li a:hover {
            color: white;
            padding-left: 5px;
            text-shadow: 0 2px 8px rgba(255, 255, 255, 0.3);
        }

        .footer ul li i {
            margin-right: 8px;
            width: 18px;
            font-size: 14px;
            margin-top: 2px;
        }

        .footer-bottom {
            margin-top: 35px;
            padding: 20px 0;
            border-top: 1px solid rgba(255, 255, 255, 0.15);
            text-align: center;
            color: rgba(255, 255, 255, 0.85);
            font-size: 14px;
            background: rgba(0, 0, 0, 0.1);
        }

        .social-links {
            display: flex;
            gap: 10px;
            margin-top: 15px;
        }

        .social-links a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.15);
            color: white;
            transition: all 0.3s ease;
            font-size: 16px;
            backdrop-filter: blur(10px);
        }

        .social-links a:hover {
            background: linear-gradient(135deg, #f39c12, #e67e22);
            transform: translateY(-5px);
            box-shadow: 0 5px 20px rgba(243, 156, 18, 0.4);
        }

        /* Video Container - Larger & Better */
        .video-container {
            position: relative;
            padding-bottom: 65%;
            height: 0;
            overflow: hidden;
            border-radius: 12px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.4);
            background: rgba(0, 0, 0, 0.3);
            border: 3px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
        }

        .video-container:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.5);
            border-color: rgba(243, 156, 18, 0.3);
        }

        .video-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: 0;
        }

        /* Responsive */
        @media (max-width: 992px) {
            .footer {
                padding: 40px 0 0;
            }

            .footer h5 {
                font-size: 14px;
                margin-top: 20px;
            }
        }

        @media (max-width: 768px) {
            .footer {
                padding: 35px 0 0;
                margin-top: 60px;
            }

            .footer h5 {
                font-size: 14px;
                margin-top: 25px;
                margin-bottom: 12px;
            }

            .footer-description {
                font-size: 13px;
                margin-bottom: 12px;
            }

            .footer ul li {
                margin-bottom: 6px;
                font-size: 13px;
            }

            .video-container {
                margin-bottom: 20px;
                padding-bottom: 56.25%;
            }

            .footer-logo {
                max-width: 120px;
                padding: 6px;
            }

            .social-links a {
                width: 35px;
                height: 35px;
                font-size: 15px;
            }

            .footer-bottom {
                margin-top: 25px;
                padding: 18px 0;
                font-size: 13px;
            }
        }

        @media (max-width: 576px) {
            .footer ul li {
                font-size: 12px;
            }

            .footer-description {
                font-size: 12px;
            }

            .social-links {
                gap: 8px;
            }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .page-header h1 {
                font-size: 1.8rem;
            }

            .section-title h2 {
                font-size: 1.6rem;
            }

            .navbar-nav .nav-link {
                font-size: 15px;
                padding: 12px 16px !important;
            }


        }

        /* Utilities */
        .btn-primary {
            background: var(--secondary-color);
            border: none;
            padding: 12px 30px;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s;
        }

        .btn-primary:hover {
            background: var(--primary-color);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }

        .btn-outline-primary {
            color: var(--secondary-color);
            border: 2px solid var(--secondary-color);
            padding: 10px 28px;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s;
        }

        .btn-outline-primary:hover {
            background: var(--secondary-color);
            color: white;
        }

        .badge {
            padding: 6px 12px;
            border-radius: 6px;
            font-weight: 500;
        }
    </style>

    @stack('styles')
</head>

<body>
    <!-- Topbar -->
    <div class="topbar">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <i class="bi bi-telephone"></i> (0265) 123-4567
                    <i class="bi bi-envelope ms-3"></i> lppm@unik.ac.id
                </div>
                <div class="col-md-6 text-end">
                    <a href="#"><i class="bi bi-facebook"></i></a>
                    <a href="#"><i class="bi bi-twitter-x"></i></a>
                    <a href="#"><i class="bi bi-instagram"></i></a>
                    <a href="#"><i class="bi bi-youtube"></i></a>
                </div>
            </div>
        </div>
    </div>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="/assets/images/image.png" alt="Logo LPPM" onerror="this.style.display='none'">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                            Beranda
                        </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link {{ request()->routeIs('about.*') ? 'active' : '' }}"
                            href="#" role="button" data-bs-toggle="dropdown">
                            Tentang Kami
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('about.history') }}">
                                <i class="bi bi-building me-2 text-primary"></i>Sejarah/Profil
                            </a></li>
                            <li><a class="dropdown-item" href="{{ route('about.vision-mission') }}">
                                <i class="bi bi-eye me-2 text-primary"></i>Visi &amp; Misi
                            </a></li>
                            <li><a class="dropdown-item" href="{{ route('about.organizational-structure') }}">
                                <i class="bi bi-diagram-3 me-2 text-primary"></i>Struktur Organisasi
                            </a></li>
                            <li><a class="dropdown-item" href="{{ route('about.leaders') }}">
                                <i class="bi bi-person-badge me-2 text-primary"></i>Profil Pimpinan
                            </a></li>
                            <li><a class="dropdown-item" href="{{ route('about.staff') }}">
                                <i class="bi bi-people me-2 text-primary"></i>Staf LPPM
                            </a></li>
                            <li><a class="dropdown-item" href="{{ route('about.gallery') }}">
                                <i class="bi bi-images me-2 text-primary"></i>Galeri
                            </a></li>
                            <li><a class="dropdown-item" href="{{ route('about.budget-realization') }}">
                                <i class="bi bi-cash-stack me-2 text-primary"></i>Realisasi Anggaran
                            </a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link {{ request()->routeIs('services.*') ? 'active' : '' }}"
                            href="#" role="button" data-bs-toggle="dropdown">
                            Layanan
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('services.research') }}">
                                <i class="bi bi-journal-text me-2 text-primary"></i>Layanan Penelitian
                            </a></li>
                            <li><a class="dropdown-item" href="{{ route('services.community-service') }}">
                                <i class="bi bi-people-fill me-2 text-success"></i>Pengabdian Masyarakat
                            </a></li>
                            <li><a class="dropdown-item" href="{{ route('services.cooperation') }}">
                                <i class="bi bi-handshake me-2 text-warning"></i>Kerjasama
                            </a></li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('news.*') ? 'active' : '' }}" href="{{ route('news.index') }}">
                            Berita
                        </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link {{ request()->routeIs('research.*') ? 'active' : '' }}"
                            href="#" role="button" data-bs-toggle="dropdown">
                            Penelitian
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('research.internal') }}">
                                <i class="bi bi-journal-text me-2 text-primary"></i>Data Penelitian Internal
                            </a></li>
                            <li><a class="dropdown-item" href="{{ route('restra') }}">
                                <i class="bi bi-file-earmark-text me-2 text-primary"></i>Renstra LPPM
                            </a></li>
                            <li><a class="dropdown-item" href="{{ route('performance') }}">
                                <i class="bi bi-bar-chart me-2 text-primary"></i>Kinerja LPPM
                            </a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link {{ request()->routeIs('ppm.*') ? 'active' : '' }}"
                            href="#" role="button" data-bs-toggle="dropdown">
                            PPM
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('ppm.internal') }}">
                                <i class="bi bi-people me-2 text-success"></i>Data PPM Internal
                            </a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link {{ request()->routeIs('study-centers.*') ? 'active' : '' }}"
                            href="#" role="button" data-bs-toggle="dropdown">
                            Pusat Studi
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="dropdown-header" style="color: var(--secondary-color); font-size:11px; font-weight:700; text-transform:uppercase; letter-spacing:1px;">
                                    Di bawah LPPM
                                </div>
                            </li>
                            <li><a class="dropdown-item" href="{{ route('study-centers.index') }}">
                                <i class="bi bi-buildings me-2" style="color:#7c3aed;"></i>Semua Pusat Studi
                            </a></li>
                            @php
                                $navStudyCenters = \App\Models\StudyCenter::where('is_active', true)->orderBy('order')->get();
                            @endphp
                            @foreach($navStudyCenters as $sc)
                            <li><a class="dropdown-item" href="{{ route('study-centers.show', $sc->slug) }}">
                                <i class="bi bi-chevron-right me-2 text-muted" style="font-size:11px;"></i>
                                {{ $sc->short_name ? $sc->short_name . ' - ' : '' }}{{ Str::limit($sc->name, 35) }}
                            </a></li>
                            @endforeach
                        </ul>
                    </li>

                    @auth
                    @if(auth()->user()->isAdmin())
                    <li class="nav-item">
                        <a class="nav-link btn btn-primary text-white ms-2" href="{{ route('admin.dashboard') }}">
                            <i class="bi bi-speedometer2"></i> Admin
                        </a>
                    </li>
                    @endif
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <!-- Logo & Description -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <img src="/assets/images/image.png" alt="Logo LPPM" class="footer-logo" onerror="this.style.display='none'">
                    <h5>LPPM UNIK CIPASUNG</h5>
                    <p class="footer-description">
                        Lembaga Penelitian dan Pengabdian kepada Masyarakat
                        Universitas Islam KH. Ruhiyat Cipasung
                    </p>
                    <div class="social-links">
                        <a href="#" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
                        <a href="#" aria-label="Twitter"><i class="bi bi-twitter-x"></i></a>
                        <a href="#" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
                        <a href="#" aria-label="YouTube"><i class="bi bi-youtube"></i></a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="col-lg-2 col-md-6 mb-4">
                    <h5>Link Cepat</h5>
                    <ul>
                        <li><a href="{{ route('home') }}"><i class="bi bi-chevron-right"></i> Beranda</a></li>
                        <li><a href="{{ route('about.history') }}"><i class="bi bi-chevron-right"></i> Tentang Kami</a></li>
                        <li><a href="{{ route('research.internal') }}"><i class="bi bi-chevron-right"></i> Penelitian</a></li>
                        <li><a href="{{ route('ppm.internal') }}"><i class="bi bi-chevron-right"></i> Pengabdian</a></li>
                        <li><a href="{{ route('news.index') }}"><i class="bi bi-chevron-right"></i> Berita</a></li>
                    </ul>
                </div>

                <!-- Contact -->
                <div class="col-lg-3 col-md-6 mb-4">
                    <h5>Kontak</h5>
                    <ul>
                        <li>
                            <i class="bi bi-geo-alt-fill"></i>
                            Jl. KH. Ruhiyat No. 123, Cipasung, Tasikmalaya
                        </li>
                        <li>
                            <i class="bi bi-telephone-fill"></i>
                            (0265) 123-4567
                        </li>
                        <li>
                            <i class="bi bi-envelope-fill"></i>
                            lppm@unik.ac.id
                        </li>
                        <li>
                            <i class="bi bi-globe"></i>
                            www.unik.ac.id
                        </li>
                    </ul>
                </div>

                <!-- Video Profile - FIXED -->
                <div class="col-lg-3 col-md-6 mb-4">
                    <h5>Profil LPPM</h5>
                    <div class="video-container">
                        <iframe
                            src="https://www.youtube.com/embed/ECoKq5Uu_jw"
                            title="Profil LPPM UNIK Cipasung"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen>
                        </iframe>
                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                <p>&copy; {{ date('Y') }} LPPM UNIK Cipasung. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
        // Initialize AOS
        AOS.init({
            duration: 1000,
            once: true
        });
    </script>
    <script>
        // Smooth scroll
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Active nav on scroll
        window.addEventListener('scroll', function() {
            let scrollPos = window.scrollY;

            // Add shadow to navbar on scroll
            if (scrollPos > 100) {
                document.querySelector('.navbar').style.boxShadow = '0 4px 15px rgba(0,0,0,0.15)';
            } else {
                document.querySelector('.navbar').style.boxShadow = '0 2px 10px rgba(0,0,0,0.1)';
            }
        });

        // Dropdown hover
        const dropdowns = document.querySelectorAll('.navbar-nav .dropdown');

        dropdowns.forEach(dropdown => {
            dropdown.addEventListener('mouseenter', function() {
                const menu = this.querySelector('.dropdown-menu');
                if (menu) {
                    menu.classList.add('show');
                }
            });

            dropdown.addEventListener('mouseleave', function() {
                const menu = this.querySelector('.dropdown-menu');
                if (menu) {
                    menu.classList.remove('show');
                }
            });
        });
    </script>

    @stack('scripts')
</body>

</html>