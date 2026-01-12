@extends('admin.layouts.app')

@section('title', 'Detail Realisasi Anggaran')

@section('content')
<div class="page-header">
    <h1>Detail Realisasi Anggaran</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.budget-realizations.index') }}">Realisasi Anggaran</a></li>
            <li class="breadcrumb-item active">Detail</li>
        </ol>
    </nav>
</div>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">{{ $budgetRealization->title }}</h5>
        <div>
            <a href="{{ route('admin.budget-realizations.edit', $budgetRealization) }}" class="btn btn-warning btn-sm">
                <i class="bi bi-pencil"></i> Edit
            </a>
            <a href="{{ route('admin.budget-realizations.index') }}" class="btn btn-secondary btn-sm">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="fw-bold">Tahun:</label>
                    <p><span class="badge bg-primary">{{ $budgetRealization->year }}</span></p>
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label class="fw-bold">Nama Kegiatan:</label>
                    <p>{{ $budgetRealization->title }}</p>
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label class="fw-bold">Jumlah Anggaran:</label>
                    <p class="fs-5 text-primary">Rp {{ number_format($budgetRealization->budget_amount, 0, ',', '.') }}</p>
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label class="fw-bold">Jumlah Realisasi:</label>
                    <p class="fs-5 text-success">Rp {{ number_format($budgetRealization->realization_amount, 0, ',', '.') }}</p>
                </div>
            </div>

            <div class="col-md-12">
                <div class="mb-3">
                    <label class="fw-bold">Persentase Realisasi:</label>
                    <div class="progress" style="height: 30px;">
                        <div class="progress-bar {{ $budgetRealization->percentage >= 80 ? 'bg-success' : ($budgetRealization->percentage >= 50 ? 'bg-warning' : 'bg-danger') }}"
                            role="progressbar" style="width: {{ $budgetRealization->percentage }}%">
                            {{ number_format($budgetRealization->percentage, 2) }}%
                        </div>
                    </div>
                </div>
            </div>

            @if($budgetRealization->description)
            <div class="col-md-12">
                <div class="mb-3">
                    <label class="fw-bold">Deskripsi:</label>
                    <p>{{ $budgetRealization->description }}</p>
                </div>
            </div>
            @endif

            @if($budgetRealization->document)
            <div class="col-md-12">
                <div class="mb-3">
                    <label class="fw-bold">Dokumen:</label><br>
                    <a href="{{ asset('storage/' . $budgetRealization->document) }}"
                        class="btn btn-primary" target="_blank">
                        <i class="bi bi-download"></i> Download Dokumen
                    </a>
                </div>
            </div>
            @endif

            <div class="col-md-6">
                <div class="mb-3">
                    <label class="fw-bold">Tanggal Dibuat:</label>
                    <p>{{ $budgetRealization->created_at->format('d F Y H:i') }}</p>
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label class="fw-bold">Terakhir Diupdate:</label>
                    <p>{{ $budgetRealization->updated_at->format('d F Y H:i') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection