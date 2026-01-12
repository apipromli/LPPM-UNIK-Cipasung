@extends('admin.layouts.app')

@section('title', 'Edit Realisasi Anggaran')

@section('content')
<div class="page-header">
    <h1>Edit Realisasi Anggaran</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.budget-realizations.index') }}">Realisasi Anggaran</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>
    </nav>
</div>

<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Form Edit Realisasi Anggaran</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.budget-realizations.update', $budgetRealization) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="year" class="form-label">Tahun <span class="text-danger">*</span></label>
                        <input type="number" class="form-control @error('year') is-invalid @enderror"
                            id="year" name="year" value="{{ old('year', $budgetRealization->year) }}"
                            min="2000" max="2100" required>
                        @error('year')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="title" class="form-label">Nama Kegiatan <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror"
                            id="title" name="title" value="{{ old('title', $budgetRealization->title) }}" required>
                        @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="budget_amount" class="form-label">Jumlah Anggaran (Rp) <span class="text-danger">*</span></label>
                        <input type="number" class="form-control @error('budget_amount') is-invalid @enderror"
                            id="budget_amount" name="budget_amount" value="{{ old('budget_amount', $budgetRealization->budget_amount) }}"
                            min="0" step="0.01" required>
                        @error('budget_amount')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="realization_amount" class="form-label">Jumlah Realisasi (Rp) <span class="text-danger">*</span></label>
                        <input type="number" class="form-control @error('realization_amount') is-invalid @enderror"
                            id="realization_amount" name="realization_amount" value="{{ old('realization_amount', $budgetRealization->realization_amount) }}"
                            min="0" step="0.01" required>
                        @error('realization_amount')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="document" class="form-label">Dokumen</label>
                        @if($budgetRealization->document)
                        <div class="mb-2">
                            <a href="{{ asset('storage/' . $budgetRealization->document) }}"
                                class="btn btn-sm btn-outline-primary" target="_blank">
                                <i class="bi bi-file-earmark"></i> Lihat Dokumen Saat Ini
                            </a>
                        </div>
                        @endif
                        <input type="file" class="form-control @error('document') is-invalid @enderror"
                            id="document" name="document" accept=".pdf,.doc,.docx">
                        <small class="text-muted">Format: PDF, DOC, DOCX. Maksimal 5MB. Kosongkan jika tidak ingin mengubah dokumen.</small>
                        @error('document')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi</label>
                        <textarea class="form-control @error('description') is-invalid @enderror"
                            id="description" name="description" rows="4">{{ old('description', $budgetRealization->description) }}</textarea>
                        @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="alert alert-info">
                <i class="bi bi-info-circle"></i> Persentase akan dihitung otomatis berdasarkan jumlah anggaran dan realisasi.
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> Update
                </button>
                <a href="{{ route('admin.budget-realizations.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection