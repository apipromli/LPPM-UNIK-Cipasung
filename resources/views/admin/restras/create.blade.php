@extends('admin.layouts.app')

@section('title', 'Tambah Restra')

@section('content')
<div class="page-header">
    <h1>Tambah Restra LPPM</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.restras.index') }}">Restra LPPM</a></li>
            <li class="breadcrumb-item active">Tambah</li>
        </ol>
    </nav>
</div>

<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Form Tambah Restra</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.restras.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="title" class="form-label">Judul Restra <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror"
                            id="title" name="title" value="{{ old('title') }}"
                            placeholder="Contoh: Rencana Strategis LPPM UNIK Cipasung" required>
                        @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="start_year" class="form-label">Tahun Mulai <span class="text-danger">*</span></label>
                        <input type="number" class="form-control @error('start_year') is-invalid @enderror"
                            id="start_year" name="start_year" value="{{ old('start_year', date('Y')) }}"
                            min="2000" max="2100" required>
                        @error('start_year')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="end_year" class="form-label">Tahun Berakhir <span class="text-danger">*</span></label>
                        <input type="number" class="form-control @error('end_year') is-invalid @enderror"
                            id="end_year" name="end_year" value="{{ old('end_year', date('Y') + 5) }}"
                            min="2000" max="2100" required>
                        @error('end_year')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi</label>
                        <textarea class="form-control @error('description') is-invalid @enderror"
                            id="description" name="description" rows="4">{{ old('description') }}</textarea>
                        @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="document" class="form-label">Dokumen Restra <span class="text-danger">*</span></label>
                        <input type="file" class="form-control @error('document') is-invalid @enderror"
                            id="document" name="document" accept=".pdf,.doc,.docx" required>
                        <small class="text-muted">Format: PDF, DOC, DOCX. Maksimal 10MB</small>
                        @error('document')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> Simpan
                </button>
                <a href="{{ route('admin.restras.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection