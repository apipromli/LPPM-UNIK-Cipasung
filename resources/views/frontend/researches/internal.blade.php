@extends('frontend.layouts.app')

@section('title', 'Data Penelitian Internal')

@section('content')
<div class="page-header">
    <img src="/assets/images/image.png" alt="" class="watermark">
    <div class="container">
        <h1><i class="bi bi-journal-bookmark me-2" style="color:var(--gold-light);"></i>Data Penelitian Internal</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                <li class="breadcrumb-item">Penelitian</li>
                <li class="breadcrumb-item active">Data Penelitian Internal</li>
            </ol>
        </nav>
    </div>
</div>

<section class="py-4 pb-5">
    <div class="container-fluid px-4">

        {{-- ---- Filter & Export Bar ---- --}}
        <div class="data-toolbar mb-4">
            <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                <div class="d-flex flex-wrap align-items-center gap-2">
                    <span class="toolbar-label">Filter Tahun:</span>
                    <div class="year-filter-wrap d-flex gap-2 flex-wrap">
                        <a href="{{ route('research.internal') }}"
                            class="year-btn {{ !request('year') ? 'active' : '' }}">Semua</a>
                        @foreach($years as $year)
                        <a href="{{ route('research.internal', ['year' => $year]) }}"
                            class="year-btn {{ request('year') == $year ? 'active' : '' }}">{{ $year }}</a>
                        @endforeach
                    </div>
                </div>
                <div class="d-flex align-items-center gap-3">
                    <span class="data-count-badge">
                        <i class="bi bi-table me-1"></i>
                        Total: <strong>{{ $researches->total() }}</strong> Data
                    </span>
                    <a href="{{ route('admin.researches.export.excel', request()->only('year')) }}"
                        class="btn-export btn-export-excel">
                        <i class="bi bi-file-earmark-excel me-1"></i>Excel
                    </a>
                    <a href="{{ route('admin.researches.export.pdf', request()->only('year')) }}"
                        class="btn-export btn-export-pdf">
                        <i class="bi bi-file-earmark-pdf me-1"></i>PDF
                    </a>
                </div>
            </div>
        </div>

        {{-- ---- Table ---- --}}
        @if($researches->count() > 0)
        <div class="data-table-card">
            <div class="data-table-wrapper">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th style="width:52px;" class="text-center">No</th>
                            <th style="min-width:200px;">Nama Ketua</th>
                            <th style="width:130px;" class="text-center">NIDN</th>
                            <th style="min-width:180px;">Skema</th>
                            <th style="min-width:480px;">Judul Penelitian</th>
                            <th style="width:90px;" class="text-center">Tahun</th>
                            <th style="width:110px;" class="text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($researches as $index => $research)
                        <tr>
                            <td class="text-center text-muted fw-semibold">
                                {{ ($researches->currentPage() - 1) * $researches->perPage() + $loop->iteration }}
                            </td>
                            <td>
                                <div class="researcher-cell">
                                    <div class="researcher-avatar">{{ strtoupper(substr($research->researcher, 0, 1)) }}</div>
                                    <div>
                                        <div class="fw-semibold">{{ $research->researcher }}</div>
                                        @if($research->nidn)
                                        <small class="text-muted d-lg-none">NIDN: {{ $research->nidn }}</small>
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td class="text-center">
                                <span class="nidn-badge">{{ $research->nidn ?? '-' }}</span>
                            </td>
                            <td>
                                <span class="scheme-badge">{{ $research->scheme ?? 'Penelitian Dosen' }}</span>
                            </td>
                            <td>
                                <div class="title-cell">{{ $research->title }}</div>
                                @if($research->funding_source)
                                <small class="text-muted"><i class="bi bi-bank me-1"></i>{{ $research->funding_source }}</small>
                                @endif
                            </td>
                            <td class="text-center">
                                <span class="year-cell">{{ $research->year }}</span>
                            </td>
                            <td class="text-center">
                                <span class="status-badge {{ $research->status === 'completed' ? 'status-done' : 'status-ongoing' }}">
                                    {{ $research->status === 'completed' ? 'Selesai' : 'Berlangsung' }}
                                </span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="table-footer">
                <small class="text-muted">
                    Menampilkan {{ $researches->firstItem() }}–{{ $researches->lastItem() }} dari {{ $researches->total() }} data
                    &nbsp;·&nbsp; Halaman {{ $researches->currentPage() }} / {{ $researches->lastPage() }}
                </small>
                <div class="pagination-wrap">
                    @if($researches->hasPages())
                    <ul class="pagination mb-0">
                        @if($researches->onFirstPage())
                            <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $researches->previousPageUrl() }}">&laquo;</a></li>
                        @endif
                        @for($i = 1; $i <= $researches->lastPage(); $i++)
                            <li class="page-item {{ $researches->currentPage() == $i ? 'active' : '' }}">
                                <a class="page-link" href="{{ $researches->url($i) }}">{{ $i }}</a>
                            </li>
                        @endfor
                        @if($researches->hasMorePages())
                            <li class="page-item"><a class="page-link" href="{{ $researches->nextPageUrl() }}">&raquo;</a></li>
                        @else
                            <li class="page-item disabled"><span class="page-link">&raquo;</span></li>
                        @endif
                    </ul>
                    @endif
                </div>
            </div>
        </div>
        @else
        <div class="empty-state">
            <i class="bi bi-journal-x"></i>
            <h5>Tidak Ada Data</h5>
            <p>{{ request('year') ? 'Tidak ada penelitian pada tahun '.request('year').'.' : 'Data penelitian belum tersedia.' }}</p>
            @if(request('year'))
            <a href="{{ route('research.internal') }}" class="btn btn-primary btn-sm">Tampilkan Semua</a>
            @endif
        </div>
        @endif

    </div>
</section>
@endsection

@push('styles')
<style>
/* ---- Toolbar ---- */
.data-toolbar {
    background: var(--white);
    border: 1px solid var(--border);
    border-radius: var(--radius-lg);
    padding: 16px 20px;
    box-shadow: var(--shadow-sm);
}
.toolbar-label {
    font-size: 13px;
    font-weight: 600;
    color: var(--text-muted);
    white-space: nowrap;
}
.year-filter-wrap { flex-wrap: wrap; }
.year-btn {
    display: inline-block;
    padding: 6px 16px;
    border-radius: 50px;
    font-size: 13px;
    font-weight: 600;
    color: var(--primary);
    border: 1.5px solid var(--primary);
    text-decoration: none;
    transition: all .2s;
    line-height: 1;
}
.year-btn:hover { background: var(--primary); color: var(--white); }
.year-btn.active { background: var(--primary); color: var(--white); }
.data-count-badge {
    background: var(--bg);
    border: 1px solid var(--border);
    color: var(--text);
    padding: 6px 14px;
    border-radius: 8px;
    font-size: 13px;
    white-space: nowrap;
}
.btn-export {
    display: inline-flex;
    align-items: center;
    padding: 7px 14px;
    border-radius: 8px;
    font-size: 13px;
    font-weight: 600;
    text-decoration: none;
    transition: all .2s;
    border: none;
    line-height: 1.4;
}
.btn-export-excel { background: #1a7032; color: white; }
.btn-export-excel:hover { background: #155a28; color: white; transform: translateY(-1px); }
.btn-export-pdf { background: #c0392b; color: white; }
.btn-export-pdf:hover { background: #a93226; color: white; transform: translateY(-1px); }

/* ---- Table Card ---- */
.data-table-card {
    background: var(--white);
    border: 1px solid var(--border);
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-sm);
    overflow: hidden;
}
.data-table-wrapper {
    overflow-x: auto;
    overflow-y: auto;
    max-height: calc(100vh - 260px);
}
.data-table-wrapper::-webkit-scrollbar { width: 8px; height: 8px; }
.data-table-wrapper::-webkit-scrollbar-track { background: var(--bg); }
.data-table-wrapper::-webkit-scrollbar-thumb { background: #c8d5cc; border-radius: 4px; }
.data-table-wrapper::-webkit-scrollbar-thumb:hover { background: #9eb5a6; }

/* ---- Table Itself ---- */
.data-table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0;
    font-size: 13.5px;
}
.data-table thead th {
    background: var(--primary);
    color: rgba(255,255,255,.92);
    font-size: 11.5px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: .8px;
    padding: 14px 14px;
    border-bottom: 2px solid rgba(255,255,255,.15);
    white-space: nowrap;
    position: sticky;
    top: 0;
    z-index: 10;
}
.data-table thead th:first-child { border-radius: 0; }
.data-table tbody td {
    padding: 14px 14px;
    border-bottom: 1px solid var(--border);
    color: var(--text);
    vertical-align: middle;
    line-height: 1.55;
}
.data-table tbody tr:last-child td { border-bottom: none; }
.data-table tbody tr:nth-child(even) td { background: #f8faf9; }
.data-table tbody tr:hover td { background: #e8f3ec; }

/* ---- Cell Styles ---- */
.researcher-cell {
    display: flex;
    align-items: center;
    gap: 10px;
}
.researcher-avatar {
    width: 34px; height: 34px;
    border-radius: 50%;
    background: linear-gradient(135deg, var(--primary), var(--primary-mid));
    color: white;
    font-size: 13px;
    font-weight: 700;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}
.nidn-badge {
    font-size: 12.5px;
    font-family: 'Courier New', monospace;
    background: var(--bg);
    padding: 3px 8px;
    border-radius: 5px;
    border: 1px solid var(--border);
    color: var(--text);
}
.scheme-badge {
    display: inline-block;
    background: #e8f3ec;
    color: var(--primary);
    border: 1px solid #c3ddc9;
    padding: 3px 10px;
    border-radius: 50px;
    font-size: 12px;
    font-weight: 600;
}
.title-cell {
    font-size: 13.5px;
    line-height: 1.5;
    color: var(--dark);
    font-weight: 500;
}
.year-cell {
    display: inline-block;
    background: var(--primary);
    color: white;
    padding: 4px 12px;
    border-radius: 50px;
    font-size: 12.5px;
    font-weight: 700;
}
.status-badge {
    display: inline-block;
    padding: 4px 10px;
    border-radius: 50px;
    font-size: 11.5px;
    font-weight: 700;
}
.status-done { background: #dcfce7; color: #15803d; border: 1px solid #86efac; }
.status-ongoing { background: #fef9c3; color: #92400e; border: 1px solid #fde047; }

/* ---- Footer ---- */
.table-footer {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 14px 20px;
    border-top: 1px solid var(--border);
    background: var(--bg);
    flex-wrap: wrap;
    gap: 12px;
}
.pagination-wrap .pagination { margin-bottom: 0; }
.pagination-wrap .page-link {
    color: var(--primary);
    border-color: var(--border);
    font-size: 13px;
    padding: 6px 12px;
}
.pagination-wrap .page-item.active .page-link {
    background: var(--primary);
    border-color: var(--primary);
}

/* ---- Empty State ---- */
.empty-state {
    text-align: center;
    padding: 80px 24px;
    color: var(--text-muted);
}
.empty-state i { font-size: 3.5rem; margin-bottom: 16px; display: block; opacity: .4; }
.empty-state h5 { font-weight: 700; color: var(--text); margin-bottom: 8px; }

@media (max-width: 768px) {
    .data-toolbar { padding: 12px 14px; }
    .data-table-wrapper { max-height: calc(100vh - 300px); }
    .data-table { font-size: 12px; }
    .data-table thead th, .data-table tbody td { padding: 10px 10px; }
    .researcher-avatar { display: none; }
    .table-footer { flex-direction: column; align-items: flex-start; }
}
@media print {
    .data-toolbar, .table-footer { display: none; }
    .data-table-wrapper { max-height: none; overflow: visible; }
}
</style>
@endpush
