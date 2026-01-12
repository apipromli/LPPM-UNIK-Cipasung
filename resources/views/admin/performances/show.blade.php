@extends('admin.layouts.app')

@section('title', 'Detail Kinerja')

@section('content')
<div class="page-header">
    <h1>Detail Kinerja LPPM</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.performances.index') }}">Kinerja LPPM</a></li>
            <li class="breadcrumb-item active">Detail</li>
        </ol>
    </nav>
</div>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">{{ $performance->title }}</h5>
        <div>
            <a href="{{ route('admin.performances.edit', $performance) }}" class="btn btn-warning btn-sm">
                <i class="bi bi-pencil"></i> Edit
            </a>
            <a href="{{ route('admin.performances.index') }}" class="btn btn-secondary btn-sm">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="mb-3">
                    <label class="fw-bold">Judul:</label>
                    <h4>{{ $performance->title }}</h4>
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label class="fw-bold">Tahun:</label>
                    <p><span class="badge bg-info" style="font-size: 16px;">{{ $performance->year }}</span></p>
                </div>
            </div>

            <div class="col-md-12">
                <div class="mb-3">
                    <label class="fw-bold">Deskripsi:</label>
                    <div class="border rounded p-3 bg-light">
                        {!! $performance->description !!}
                    </div>
                </div>
            </div>

            @if($performance->metrics)
            <div class="col-md-12">
                <div class="mb-3">
                    <label class="fw-bold">Indikator Kinerja:</label>
                    <div class="row g-3 mt-2">
                        @foreach($performance->metrics as $key => $value)
                        <div class="col-md-4">
                            <div class="card border-primary">
                                <div class="card-body text-center">
                                    <h6 class="text-muted mb-2">{{ ucwords(str_replace('_', ' ', $key)) }}</h6>
                                    <h3 class="text-primary mb-0">{{ $value }}</h3>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif

            @if($performance->document)
            <div class="col-md-12">
                <div class="mb-3">
                    <label class="fw-bold">Dokumen:</label><br>
                    <a href="{{ asset('storage/' . $performance->document) }}"
                        class="btn btn-primary" target="_blank">
                        <i class="bi bi-download"></i> Download Laporan Kinerja
                    </a>
                </div>
            </div>
            @endif

            <div class="col-md-6">
                <div class="mb-3">
                    <label class="fw-bold">Tanggal Dibuat:</label>
                    <p>{{ $performance->created_at->format('d F Y H:i') }}</p>
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label class="fw-bold">Terakhir Diupdate:</label>
                    <p>{{ $performance->updated_at->format('d F Y H:i') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection