@extends('admin.layouts.app')

@section('title', 'Detail Restra')

@section('content')
<div class="page-header">
    <h1>Detail Restra LPPM</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.restras.index') }}">Restra LPPM</a></li>
            <li class="breadcrumb-item active">Detail</li>
        </ol>
    </nav>
</div>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">{{ $restra->title }}</h5>
        <div>
            <a href="{{ route('admin.restras.edit', $restra) }}" class="btn btn-warning btn-sm">
                <i class="bi bi-pencil"></i> Edit
            </a>
            <a href="{{ route('admin.restras.index') }}" class="btn btn-secondary btn-sm">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="mb-3">
                    <label class="fw-bold">Judul:</label>
                    <h4>{{ $restra->title }}</h4>
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label class="fw-bold">Periode:</label>
                    <p>
                        <span class="badge bg-primary" style="font-size: 16px;">
                            {{ $restra->start_year }} - {{ $restra->end_year }}
                        </span>
                    </p>
                </div>
            </div>

            @if($restra->description)
            <div class="col-md-12">
                <div class="mb-3">
                    <label class="fw-bold">Deskripsi:</label>
                    <p>{{ $restra->description }}</p>
                </div>
            </div>
            @endif

            <div class="col-md-12">
                <div class="mb-3">
                    <label class="fw-bold">Dokumen:</label><br>
                    <a href="{{ asset('storage/' . $restra->document) }}"
                        class="btn btn-primary" target="_blank">
                        <i class="bi bi-download"></i> Download Dokumen Restra
                    </a>
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label class="fw-bold">Tanggal Dibuat:</label>
                    <p>{{ $restra->created_at->format('d F Y H:i') }}</p>
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label class="fw-bold">Terakhir Diupdate:</label>
                    <p>{{ $restra->updated_at->format('d F Y H:i') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection