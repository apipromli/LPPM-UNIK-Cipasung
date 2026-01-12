@extends('admin.layouts.app')

@section('title', 'Edit Restra')

@section('content')
<div class="page-header">
    <h1>Edit Restra LPPM</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.restras.index') }}">Restra LPPM</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>
    </nav>
</div>

<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Form Edit Restra</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.restras.update', $restra) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="title" class="form-label">Judul Restra <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror"
                            id="title" name="title" value="{{ old('title', $restra->title) }}" required>
                        @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="start_year" class="form-label">Tahun Mulai <span class="text-danger">*</span></label>
                        <input type="number" class="form-control @error('start_year') is-invalid @enderror"
                            id="start_year" name="start_year" value="{{ old('start_year', $restra->start_year) }}"
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
                            id="end_year" name="end_year" value="{{ old('end_year', $restra->end_year) }}"
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
                            id="description" name="description" rows="4">{{ old('description', $restra->description) }}</textarea>
                        @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="document" class="form-label">Dokumen Restra</label>
                        <div class="mb-2">
                            <a href="{{ asset('storage/' . $restra->document) }}"
                                class="btn btn-sm btn-outline-primary" target="_blank">
                                <i class="bi bi-file-earmark-pdf"></i> Lihat Dokumen Saat Ini
                            </a>
                        </div>
                        <input type="file" class="form-control @error('document') is-invalid @enderror"
                            id="document" name="document" accept=".pdf,.doc,.docx">
                        <small class="text-muted">Format: PDF, DOC, DOCX. Maksimal 10MB. Kosongkan jika tidak ingin mengubah dokumen.</small>
                        @error('document')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> Update
                </button>
                <a href="{{ route('admin.restras.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection