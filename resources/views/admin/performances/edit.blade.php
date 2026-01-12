@extends('admin.layouts.app')

@section('title', 'Edit Kinerja')

@section('content')
<div class="page-header">
    <h1>Edit Kinerja LPPM</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.performances.index') }}">Kinerja LPPM</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>
    </nav>
</div>

<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Form Edit Kinerja</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.performances.update', $performance) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="year" class="form-label">Tahun <span class="text-danger">*</span></label>
                        <input type="number" class="form-control @error('year') is-invalid @enderror"
                            id="year" name="year" value="{{ old('year', $performance->year) }}"
                            min="2000" max="2100" required>
                        @error('year')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="title" class="form-label">Judul <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror"
                            id="title" name="title" value="{{ old('title', $performance->title) }}" required>
                        @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi <span class="text-danger">*</span></label>
                        <textarea class="form-control @error('description') is-invalid @enderror"
                            id="description" name="description" rows="6" required>{{ old('description', $performance->description) }}</textarea>
                        @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="document" class="form-label">Dokumen</label>
                        @if($performance->document)
                        <div class="mb-2">
                            <a href="{{ asset('storage/' . $performance->document) }}"
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

                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="metrics" class="form-label">Indikator Kinerja (JSON Format)</label>
                        <textarea class="form-control @error('metrics') is-invalid @enderror"
                            id="metrics" name="metrics" rows="6">{{ old('metrics', $performance->metrics ? json_encode($performance->metrics) : '') }}</textarea>
                        <small class="text-muted">
                            Format JSON. Contoh: {"total_penelitian": "50", "total_pengabdian": "30", "publikasi": "25"}
                        </small>
                        @error('metrics')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> Update
                </button>
                <a href="{{ route('admin.performances.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
@push('scripts')
<script src="https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('description');
</script>
@endpush