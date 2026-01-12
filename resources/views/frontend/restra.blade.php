@extends('frontend.layouts.app')

@section('title', 'Rencana Strategis LPPM')

@section('content')
<div class="page-header">
    <div class="container">
        <h1>Rencana Strategis (Restra) LPPM</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                <li class="breadcrumb-item active">Restra LPPM</li>
            </ol>
        </nav>
    </div>
</div>

<section class="py-5">
    <div class="container">
        @if($restras->count() > 0)
        <div class="row g-4">
            @foreach($restras as $restra)
            <div class="col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <h4 class="fw-bold">{{ $restra->title }}</h4>
                            <span class="badge bg-primary">
                                {{ $restra->start_year }} - {{ $restra->end_year }}
                            </span>
                        </div>

                        @if($restra->description)
                        <p class="text-muted">{{ $restra->description }}</p>
                        @endif

                        <div class="mt-4">
                            <a href="{{ asset('storage/' . $restra->document) }}"
                                class="btn btn-primary w-100"
                                target="_blank">
                                <i class="bi bi-download"></i> Download Dokumen Restra
                            </a>
                        </div>

                        <div class="mt-3 pt-3 border-top">
                            <small class="text-muted">
                                <i class="bi bi-calendar"></i>
                                Ditambahkan: {{ $restra->created_at->format('d F Y') }}
                            </small>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-5 d-flex justify-content-center">
            {{ $restras->links() }}
        </div>
        @else
        <div class="alert alert-info">
            <i class="bi bi-info-circle"></i> Dokumen Restra LPPM belum tersedia.
        </div>
        @endif
    </div>
</section>
@endsection