<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard') - Admin LPPM UNIK Cipasung</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

    <!-- Custom CSS -->
    <style>
        :root {
            --sidebar-width: 260px;
            --topbar-height: 60px;
            --primary-color: #0d6efd;
            --sidebar-bg: #1a1d20;
            --sidebar-hover: #2c3034;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            overflow-x: hidden;
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: var(--sidebar-width);
            background: var(--sidebar-bg);
            transition: all 0.3s;
            z-index: 1000;
            overflow-y: auto;
            /* Tambahkan ini */
            overflow-x: hidden;
            /* Tambahkan ini */
        }

        /* Custom Scrollbar untuk Sidebar */
        .sidebar::-webkit-scrollbar {
            width: 6px;
        }

        .sidebar::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.05);
        }

        .sidebar::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 3px;
        }

        .sidebar::-webkit-scrollbar-thumb:hover {
            background: rgba(255, 255, 255, 0.3);
        }

        .sidebar .logo {
            padding: 20px 20px 20px;
            text-align: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            position: sticky;
            top: 0;
            background: var(--sidebar-bg);
            z-index: 10;
        }

        .sidebar .logo h4 {
            color: white;
            margin: 0;
            font-size: 18px;
            font-weight: 600;
        }

        .sidebar .logo p {
            color: rgba(255, 255, 255, 0.6);
            margin: 5px 0 0;
            font-size: 12px;
        }

        .sidebar-menu {
            list-style: none;
            padding: 20px 0 80px 0;
            /* Tambah padding bottom */
            margin: 0;
        }

        .sidebar-menu li {
            margin-bottom: 5px;
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            padding: 12px 20px;
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            transition: all 0.3s;
        }

        .sidebar-menu a:hover,
        .sidebar-menu a.active {
            background: var(--sidebar-hover);
            color: white;
        }

        .sidebar-menu a i {
            width: 25px;
            font-size: 18px;
            margin-right: 10px;
        }

        /* Section Label */
        .sidebar-section-label {
            padding: 15px 20px 10px 20px;
            color: rgba(255, 255, 255, 0.4);
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 600;
        }

        .main-content {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
            background: #f8f9fa;
        }

        .topbar {
            background: white;
            height: var(--topbar-height);
            padding: 0 30px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.08);
            position: sticky;
            top: 0;
            z-index: 999;
        }

        .content-wrapper {
            padding: 30px;
        }

        .page-header {
            margin-bottom: 30px;
        }

        .page-header h1 {
            font-size: 28px;
            font-weight: 600;
            color: #2c3034;
            margin: 0;
        }

        .breadcrumb {
            background: none;
            padding: 0;
            margin: 10px 0 0;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            margin-bottom: 30px;
        }

        .card-header {
            background: white;
            border-bottom: 1px solid #e9ecef;
            padding: 20px;
            font-weight: 600;
        }

        .stats-card {
            background: linear-gradient(135deg, var(--primary-color), #0a58ca);
            color: white;
            padding: 25px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .stats-card h3 {
            font-size: 32px;
            font-weight: 700;
            margin: 0;
        }

        .stats-card p {
            margin: 5px 0 0;
            opacity: 0.9;
        }

        .btn-primary {
            background: var(--primary-color);
            border: none;
            padding: 10px 20px;
            border-radius: 6px;
        }

        .btn-primary:hover {
            background: #0a58ca;
        }

        .table {
            background: white;
        }

        .badge {
            padding: 6px 12px;
            font-weight: 500;
        }

        @media (max-width: 768px) {
            .sidebar {
                margin-left: calc(-1 * var(--sidebar-width));
            }

            .sidebar.active {
                margin-left: 0;
            }

            .main-content {
                margin-left: 0;
            }

            .mobile-toggle {
                display: block !important;
            }
        }

        .mobile-toggle {
            display: none;
            cursor: pointer;
        }
    </style>

    @stack('styles')
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="logo">
            <h4>LPPM UNIK Cipasung</h4>
            <p>Admin Panel</p>
        </div>

        <ul class="sidebar-menu">
            <li>
                <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="bi bi-speedometer2"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="sidebar-section-label">TENTANG KAMI</li>

            <li>
                <a href="{{ route('admin.profiles.index') }}" class="{{ request()->routeIs('admin.profiles.*') ? 'active' : '' }}">
                    <i class="bi bi-info-circle"></i>
                    <span>Profil/Sejarah</span>
                </a>
            </li>

            <li>
                <a href="{{ route('admin.vision-missions.index') }}" class="{{ request()->routeIs('admin.vision-missions.*') ? 'active' : '' }}">
                    <i class="bi bi-eye"></i>
                    <span>Visi & Misi</span>
                </a>
            </li>

            <li>
                <a href="{{ route('admin.organizational-structures.index') }}" class="{{ request()->routeIs('admin.organizational-structures.*') ? 'active' : '' }}">
                    <i class="bi bi-diagram-3"></i>
                    <span>Struktur Organisasi</span>
                </a>
            </li>

            <li>
                <a href="{{ route('admin.leaders.index') }}" class="{{ request()->routeIs('admin.leaders.*') ? 'active' : '' }}">
                    <i class="bi bi-person-badge"></i>
                    <span>Pimpinan</span>
                </a>
            </li>

            <li>
                <a href="{{ route('admin.staff.index') }}" class="{{ request()->routeIs('admin.staff.*') ? 'active' : '' }}">
                    <i class="bi bi-people"></i>
                    <span>Staf</span>
                </a>
            </li>

            <li>
                <a href="{{ route('admin.galleries.index') }}" class="{{ request()->routeIs('admin.galleries.*') ? 'active' : '' }}">
                    <i class="bi bi-images"></i>
                    <span>Galeri</span>
                </a>
            </li>

            <li>
                <a href="{{ route('admin.budget-realizations.index') }}" class="{{ request()->routeIs('admin.budget-realizations.*') ? 'active' : '' }}">
                    <i class="bi bi-cash-stack"></i>
                    <span>Realisasi Anggaran</span>
                </a>
            </li>

            <li class="sidebar-section-label">LAYANAN & DATA</li>

            <li>
                <a href="{{ route('admin.services.index') }}" class="{{ request()->routeIs('admin.services.*') ? 'active' : '' }}">
                    <i class="bi bi-gear"></i>
                    <span>Layanan</span>
                </a>
            </li>

            <li>
                <a href="{{ route('admin.researches.index') }}" class="{{ request()->routeIs('admin.researches.*') ? 'active' : '' }}">
                    <i class="bi bi-book"></i>
                    <span>Penelitian</span>
                </a>
            </li>

            <li>
                <a href="{{ route('admin.ppm.index') }}" class="{{ request()->routeIs('admin.ppm.*') ? 'active' : '' }}">
                    <i class="bi bi-building"></i>
                    <span>Data PPM</span>
                </a>
            </li>

            <li>
                <a href="{{ route('admin.cooperations.index') }}" class="{{ request()->routeIs('admin.cooperations.*') ? 'active' : '' }}">
                    <i class="bi bi-handshake"></i>
                    <span>Kerjasama</span>
                </a>
            </li>

            <li class="sidebar-section-label">KONTEN</li>

            <li>
                <a href="{{ route('admin.news.index') }}" class="{{ request()->routeIs('admin.news.*') ? 'active' : '' }}">
                    <i class="bi bi-newspaper"></i>
                    <span>Berita</span>
                </a>
            </li>

            <li>
                <a href="{{ route('admin.restras.index') }}" class="{{ request()->routeIs('admin.restras.*') ? 'active' : '' }}">
                    <i class="bi bi-file-earmark-text"></i>
                    <span>Restra LPPM</span>
                </a>
            </li>

            <li>
                <a href="{{ route('admin.performances.index') }}" class="{{ request()->routeIs('admin.performances.*') ? 'active' : '' }}">
                    <i class="bi bi-graph-up"></i>
                    <span>Kinerja LPPM</span>
                </a>
            </li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Topbar -->
        <div class="topbar">
            <div class="d-flex align-items-center">
                <button class="btn btn-link mobile-toggle" id="sidebarToggle">
                    <i class="bi bi-list fs-4"></i>
                </button>
                <h5 class="mb-0 ms-3">Selamat Datang, {{ auth()->user()->name }}</h5>
            </div>

            <div class="d-flex align-items-center gap-3">
                <a href="{{ route('home') }}" class="btn btn-sm btn-outline-primary" target="_blank">
                    <i class="bi bi-globe"></i> Lihat Website
                </a>

                <div class="dropdown">
                    <button class="btn btn-link text-dark dropdown-toggle" type="button" data-bs-toggle="dropdown">
                        <i class="bi bi-person-circle fs-4"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="#">
                                <i class="bi bi-person"></i> Profil
                            </a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger">
                                    <i class="bi bi-box-arrow-right"></i> Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Content -->
        <div class="content-wrapper">
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle me-2"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            @endif

            @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-circle me-2"></i>
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            @endif

            @yield('content')
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

    <script>
        // Sidebar Toggle for Mobile
        document.getElementById('sidebarToggle')?.addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('active');
        });

        // Initialize DataTables
        $(document).ready(function() {
            if ($('.datatable').length) {
                $('.datatable').DataTable({
                    language: {
                        url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/id.json'
                    }
                });
            }
        });

        // Auto hide alerts
        setTimeout(function() {
            $('.alert').fadeOut('slow');
        }, 5000);
    </script>

    @stack('scripts')
</body>

</html>