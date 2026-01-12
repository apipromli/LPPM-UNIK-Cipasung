@extends('admin.layouts.app')

@section('title', 'Detail PPM')

@section('content')
<div class="page-header">
    <h1>Detail Data PPM</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.ppm.index') }}">Data PPM</a></li>
            <li class="breadcrumb-item active">Detail</li>
        </ol>
    </nav>
</div>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">{{ $ppm->title }}</h5>
        <div>
            <a href="{{ route('admin.ppm.edit', $ppm) }}" class="btn btn-warning btn-sm">
                <i class="bi bi-pencil"></i> Edit
            </a>
            <a href="{{ route('admin.ppm.index') }}" class="btn btn-secondary btn-sm">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="mb-3">
                    <label class="fw-bold">Judul Kegiatan:</label>
                    <p>{{ $ppm->title }}</p>
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label class="fw-bold">Pelaksana:</label>
                    <p>{{ $ppm->executor }}</p>
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label class="fw-bold">Lokasi:</label>
                    <p>{{ $ppm->location }}</p>
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label class="fw-bold">Tahun:</label>
                    <p><span class="badge bg-info">{{ $ppm->year }}</span></p>
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label class="fw-bold">Status:</label>
                    <p>
                        @php
                        $statusClass = [
                        'planned' => 'warning',
                        'ongoing' => 'info',
                        'completed' => 'success'
                        ];
                        $statusText = [
                        'planned' => 'Direncanakan',
                        'ongoing' => 'Sedang Berjalan',
                        'completed' => 'Selesai'
                        ];
                        @endphp
                        <span class="badge bg-{{ $statusClass[$ppm->status] }}">
                            {{ $statusText[$ppm->status] }}
                        </span>
                    </p>
                </div>
            </div>

            @if($ppm->description)
            <div class="col-md-12">
                <div class="mb-3">
                    <label class="fw-bold">Deskripsi:</label>
                    <p class="text-justify">{{ $ppm->description }}</p>
                </div>
            </div>
            @endif

            @if($ppm->document)
            <div class="col-md-12">
                <div class="mb-3">
                    <label class="fw-bold">Dokumen:</label><br>
                    <a href="{{ asset('storage/' . $ppm->document) }}"
                        class="btn btn-primary" target="_blank">
                        <i class="bi bi-download"></i> Download Dokumen
                    </a>
                </div>
            </div>
            @endif

            <div class="col-md-6">
                <div class="mb-3">
                    <label class="fw-bold">Tanggal Dibuat:</label>
                    <p>{{ $ppm->created_at->format('d F Y H:i') }}</p>
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label class="fw-bold">Terakhir Diupdate:</label>
                    <p>{{ $ppm->updated_at->format('d F Y H:i') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection