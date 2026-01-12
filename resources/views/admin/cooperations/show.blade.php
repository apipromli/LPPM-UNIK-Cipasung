@extends('admin.layouts.app')

@section('title', 'Detail Kerjasama')

@section('content')
<div class="page-header">
    <h1>Detail Kerjasama</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.cooperations.index') }}">Kerjasama</a></li>
            <li class="breadcrumb-item active">Detail</li>
        </ol>
    </nav>
</div>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">{{ $cooperation->partner_name }}</h5>
        <div>
            <a href="{{ route('admin.cooperations.edit', $cooperation) }}" class="btn btn-warning btn-sm">
                <i class="bi bi-pencil"></i> Edit
            </a>
            <a href="{{ route('admin.cooperations.index') }}" class="btn btn-secondary btn-sm">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="fw-bold">Nama Mitra:</label>
                    <h4>{{ $cooperation->partner_name }}</h4>
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label class="fw-bold">Jenis Kerjasama:</label>
                    <p><span class="badge bg-info" style="font-size: 14px;">{{ $cooperation->cooperation_type }}</span></p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="mb-3">
                    <label class="fw-bold">Tanggal Mulai:</label>
                    <p>{{ $cooperation->start_date->format('d F Y') }}</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="mb-3">
                    <label class="fw-bold">Tanggal Berakhir:</label>
                    <p>{{ $cooperation->end_date ? $cooperation->end_date->format('d F Y') : 'Tidak ditentukan' }}</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="mb-3">
                    <label class="fw-bold">Status:</label>
                    <p>
                        @php
                        $statusClass = [
                        'active' => 'success',
                        'expired' => 'danger',
                        'terminated' => 'secondary'
                        ];
                        $statusText = [
                        'active' => 'Aktif',
                        'expired' => 'Berakhir',
                        'terminated' => 'Dihentikan'
                        ];
                        @endphp
                        <span class="badge bg-{{ $statusClass[$cooperation->status] }}" style="font-size: 14px;">
                            {{ $statusText[$cooperation->status] }}
                        </span>
                    </p>
                </div>
            </div>

            @if($cooperation->description)
            <div class="col-md-12">
                <div class="mb-3">
                    <label class="fw-bold">Deskripsi:</label>
                    <p class="text-justify">{{ $cooperation->description }}</p>
                </div>
            </div>
            @endif

            @if($cooperation->document)
            <div class="col-md-12">
                <div class="mb-3">
                    <label class="fw-bold">Dokumen:</label><br>
                    <a href="{{ asset('storage/' . $cooperation->document) }}"
                        class="btn btn-primary" target="_blank">
                        <i class="bi bi-download"></i> Download Dokumen Kerjasama
                    </a>
                </div>
            </div>
            @endif

            <div class="col-md-6">
                <div class="mb-3">
                    <label class="fw-bold">Tanggal Dibuat:</label>
                    <p>{{ $cooperation->created_at->format('d F Y H:i') }}</p>
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label class="fw-bold">Terakhir Diupdate:</label>
                    <p>{{ $cooperation->updated_at->format('d F Y H:i') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection