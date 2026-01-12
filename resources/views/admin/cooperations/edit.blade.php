@extends('admin.layouts.app')

@section('title', 'Edit Kerjasama')

@section('content')
<div class="page-header">
    <h1>Edit Kerjasama</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.cooperations.index') }}">Kerjasama</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>
    </nav>
</div>

<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Form Edit Kerjasama</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.cooperations.update', $cooperation) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="partner_name" class="form-label">Nama Mitra <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('partner_name') is-invalid @enderror"
                            id="partner_name" name="partner_name" value="{{ old('partner_name', $cooperation->partner_name) }}" required>
                        @error('partner_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="cooperation_type" class="form-label">Jenis Kerjasama <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('cooperation_type') is-invalid @enderror"
                            id="cooperation_type" name="cooperation_type" value="{{ old('cooperation_type', $cooperation->cooperation_type) }}" required>
                        @error('cooperation_type')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="start_date" class="form-label">Tanggal Mulai <span class="text-danger">*</span></label>
                        <input type="date" class="form-control @error('start_date') is-invalid @enderror"
                            id="start_date" name="start_date" value="{{ old('start_date', $cooperation->start_date->format('Y-m-d')) }}" required>
                        @error('start_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="end_date" class="form-label">Tanggal Berakhir</label>
                        <input type="date" class="form-control @error('end_date') is-invalid @enderror"
                            id="end_date" name="end_date" value="{{ old('end_date', $cooperation->end_date ? $cooperation->end_date->format('Y-m-d') : '') }}">
                        @error('end_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                        <select class="form-select @error('status') is-invalid @enderror"
                            id="status" name="status" required>
                            <option value="">Pilih Status</option>
                            <option value="active" {{ old('status', $cooperation->status) == 'active' ? 'selected' : '' }}>Aktif</option>
                            <option value="expired" {{ old('status', $cooperation->status) == 'expired' ? 'selected' : '' }}>Berakhir</option>
                            <option value="terminated" {{ old('status', $cooperation->status) == 'terminated' ? 'selected' : '' }}>Dihentikan</option>
                        </select>
                        @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi</label>
                        <textarea class="form-control @error('description') is-invalid @enderror"
                            id="description" name="description" rows="4">{{ old('description', $cooperation->description) }}</textarea>
                        @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="document" class="form-label">Dokumen Kerjasama</label>
                        @if($cooperation->document)
                        <div class="mb-2">
                            <a href="{{ asset('storage/' . $cooperation->document) }}"
                                class="btn btn-sm btn-outline-primary" target="_blank">
                                <i class="bi bi-file-earmark-pdf"></i> Lihat Dokumen Saat Ini
                            </a>
                        </div>
                        @endif
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
                <a href="{{ route('admin.cooperations.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection