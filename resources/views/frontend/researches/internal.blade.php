@extends('frontend.layouts.app')

@section('title', 'Data Penelitian Internal')

@section('content')
<div class="page-header">
    <div class="container">
        <h1>Data Penelitian Internal</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                <li class="breadcrumb-item">Penelitian</li>
                <li class="breadcrumb-item active">Data Penelitian Internal</li>
            </ol>
        </nav>
    </div>
</div>

<section class="py-4">
    <div class="container-fluid px-4">
        <!-- Filter Section - Sticky -->
        <div class="filter-sticky mb-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-3">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <div class="d-flex gap-3 align-items-center">
                                <div class="year-filters d-flex gap-2 flex-wrap">
                                    <a href="{{ route('research.internal') }}"
                                        class="btn btn-sm {{ !request('year') ? 'btn-primary' : 'btn-outline-primary' }}">
                                        Semua
                                    </a>
                                    @foreach($years as $year)
                                    <a href="{{ route('research.internal', ['year' => $year]) }}"
                                        class="btn btn-sm {{ request('year') == $year ? 'btn-primary' : 'btn-outline-primary' }}">
                                        {{ $year }}
                                    </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 text-end">
                            <span class="badge bg-info">
                                Total: {{ $researches->count() }} Data
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Table Excel Style -->
        @if($researches->count() > 0)
        <div class="excel-table-container">
            <div class="table-wrapper">
                <table class="table table-bordered table-hover excel-style-table table-striped">
                    <thead class="table-header-sticky">
                        <tr>
                            <th class="text-center" style="width: 50px;">NO</th>
                            <th style="min-width: 250px;">NAMA KETUA</th>
                            <th class="text-center" style="width: 150px;">NIDN</th>
                            <th style="min-width: 200px;">SKEMA</th>
                            <th style="min-width: 500px;">JUDUL</th>
                            <th class="text-center" style="width: 80px;">TAHUN</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($researches as $index => $research)
                        <tr>
                            <td class="text-center">{{ $index + 1 }}</td>
                            <td>{{ $research->researcher }}</td>
                            <td class="text-center">{{ $research->nidn ?? '-' }}</td>
                            <td>{{ $research->scheme ?? 'Penelitian Dosen Pemula' }}</td>
                            <td>{{ $research->title }}</td>
                            <td class="text-center">{{ $research->year }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-between align-items-center mt-3">
                    <small class="text-muted">
                        Showing {{ $researches->firstItem() }} to {{ $researches->lastItem() }} of {{ $researches->total() }} entries
                    </small>

                    <div class="d-flex gap-2">
                        <a href="{{ route('admin.researches.export.excel', request()->all()) }}"
                            class="btn btn-sm btn-success">
                            Export Excel
                        </a>

                        <a href="{{ route('admin.researches.export.pdf', request()->all()) }}"
                            class="btn btn-sm btn-danger">
                            Export PDF
                        </a>
                    </div>
                </div>

                <div class="mt-2">
                    {{ $researches->links() }}
                </div>


                {{-- Pagination --}}
                <div class="mt-4">
                    {{ $researches->links() }}
                </div>
            </div>
        </div>
        @else
        <div class="alert alert-info">
            <i class="bi bi-info-circle"></i>
            @if(request()->has('year'))
            Tidak ada penelitian pada tahun {{ request('year') }}.
            @else
            Data penelitian belum tersedia.
            @endif
        </div>
        @endif
    </div>
</section>
@endsection

@push('styles')
<style>
    /* Filter Sticky */
    .filter-sticky {
        position: sticky;
        top: 60px;
        /* Sesuaikan dengan tinggi navbar */
        z-index: 100;
        background: white;
    }

    /* Excel Table Container */
    .excel-table-container {
        background: white;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    .table-wrapper {
        overflow-x: auto;
        overflow-y: auto;
        max-height: calc(100vh - 280px);
        /* Adjust based on header height */
        position: relative;
    }

    /* Excel Style Table */
    .excel-style-table {
        margin: 0;
        font-size: 13px;
        border-collapse: separate;
        border-spacing: 0;
        width: 100%;
    }

    .excel-style-table thead th {
        background: #217346;
        color: white;
        font-weight: 600;
        padding: 12px 8px;
        text-align: left;
        border: 1px solid #1a5c37;
        white-space: nowrap;
    }

    .excel-style-table tbody td {
        padding: 10px 8px;
        border: 1px solid #dee2e6;
        background: white;
        vertical-align: top;
    }

    .excel-style-table tbody tr:nth-child(even) {
        background: #f8f9fa;
    }

    .excel-style-table tbody tr:hover {
        background: #e7f3ff;
    }

    /* Sticky Header */
    .table-header-sticky {
        position: sticky;
        top: 0;
        z-index: 10;
    }

    /* Year Filter Buttons */
    .year-filters .btn-sm {
        font-size: 13px;
        padding: 6px 16px;
        border-radius: 20px;
        transition: all 0.3s;
    }

    .year-filters .btn-outline-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(59, 130, 246, 0.3);
    }

    /* Scrollbar Styling */
    .table-wrapper::-webkit-scrollbar {
        width: 10px;
        height: 10px;
    }

    .table-wrapper::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 10px;
    }

    .table-wrapper::-webkit-scrollbar-thumb {
        background: #888;
        border-radius: 10px;
    }

    .table-wrapper::-webkit-scrollbar-thumb:hover {
        background: #555;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .filter-sticky {
            top: 56px;
        }

        .year-filters {
            flex-direction: column;
            width: 100%;
        }

        .year-filters .btn-sm {
            width: 100%;
        }

        .table-wrapper {
            max-height: calc(100vh - 320px);
        }

        .excel-style-table {
            font-size: 11px;
        }

        .excel-style-table thead th,
        .excel-style-table tbody td {
            padding: 8px 6px;
        }
    }

    /* Print Styles */
    @media print {

        .filter-sticky,
        .page-header {
            display: none;
        }

        .table-wrapper {
            max-height: none;
            overflow: visible;
        }

        .excel-style-table {
            font-size: 10px;
        }
    }
</style>
@endpush

@push('scripts')
<script>
    // Optional: Add export to Excel functionality
    function exportToExcel() {
        window.print();
    }

    // Smooth scroll untuk table
    document.addEventListener('DOMContentLoaded', function() {
        const tableWrapper = document.querySelector('.table-wrapper');
        if (tableWrapper) {
            // Auto-adjust table height based on viewport
            function adjustTableHeight() {
                const windowHeight = window.innerHeight;
                const tableTop = tableWrapper.getBoundingClientRect().top;
                const maxHeight = windowHeight - tableTop - 40;
                tableWrapper.style.maxHeight = maxHeight + 'px';
            }

            adjustTableHeight();
            window.addEventListener('resize', adjustTableHeight);
        }
    });
</script>
@endpush