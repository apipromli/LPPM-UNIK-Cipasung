@extends('frontend.layouts.app')

@section('title', 'Kinerja LPPM')

@section('content')
<div class="page-header">
    <div class="container">
        <h1>Kinerja LPPM</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                <li class="breadcrumb-item active">Kinerja LPPM</li>
            </ol>
        </nav>
    </div>
</div>

<section class="py-5">
    <div class="container">
        @if($performances->count() > 0)
        <div class="row g-4">
            @foreach($performances as $performance)
            <div class="col-md-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div>
                                <h4 class="fw-bold mb-2">{{ $performance->title }}</h4>
                                <span class="badge bg-primary">Tahun {{ $performance->year }}</span>
                            </div>
                        </div>

                        <div class="performance-description mb-4">
                            {!! $performance->description !!}
                        </div>

                        @if($performance->metrics)
                        <div class="metrics-section mb-4">
                            <h5 class="fw-bold mb-3">Indikator Kinerja:</h5>
                            <div class="row g-3">
                                @foreach($performance->metrics as $key => $value)
                                <div class="col-md-4">
                                    <div class="metric-box p-3 border rounded">
                                        <h6 class="text-muted mb-1">{{ ucwords(str_replace('_', ' ', $key)) }}</h6>
                                        <h3 class="mb-0 text-primary">{{ $value }}</h3>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endif

                        @if($performance->document)
                        <a href="{{ asset('storage/' . $performance->document) }}"
                            class="btn btn-primary"
                            target="_blank">
                            <i class="bi bi-download"></i> Download Laporan Lengkap
                        </a>
                        @endif

                        <div class="mt-3 pt-3 border-top">
                            <small class="text-muted">
                                <i class="bi bi-calendar"></i>
                                Dipublikasikan: {{ $performance->created_at->format('d F Y') }}
                            </small>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-5 d-flex justify-content-center">
            {{ $performances->links() }}
        </div>
        @else
        <div class="alert alert-info">
            <i class="bi bi-info-circle"></i> Data kinerja LPPM belum tersedia.
        </div>
        @endif
    </div>
</section>
@endsection

@push('styles')
<style>
    .performance-description {
        line-height: 1.8;
        color: var(--text-dark);
    }

    .performance-description p {
        margin-bottom: 15px;
    }

    .metric-box {
        background: var(--bg-light);
        transition: all 0.3s;
    }

    .metric-box:hover {
        transform: translateY(-3px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }
</style>
@endpush