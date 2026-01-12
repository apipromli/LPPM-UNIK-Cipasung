@extends('admin.layouts.app')

@section('title', 'Edit Berita')

@section('content')
<div class="page-header">
    <h1>Edit Berita</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.news.index') }}">Berita</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>
    </nav>
</div>

<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Form Edit Berita</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.news.update', $news) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="title" class="form-label">Judul Berita <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror"
                            id="title" name="title" value="{{ old('title', $news->title) }}" required>
                        @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="image" class="form-label">Gambar</label>
                        @if($news->image)
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $news->image) }}"
                                alt="{{ $news->title }}"
                                class="img-thumbnail"
                                style="max-height: 150px;">
                        </div>
                        @endif
                        <input type="file" class="form-control @error('image') is-invalid @enderror"
                            id="image" name="image" accept="image/*">
                        <small class="text-muted">Format: JPG, JPEG, PNG. Maksimal 2MB. Kosongkan jika tidak ingin mengubah gambar.</small>
                        @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="mb-3">
                        <label for="is_published" class="form-label">Status Publikasi</label>
                        <select class="form-select @error('is_published') is-invalid @enderror"
                            id="is_published" name="is_published">
                            <option value="1" {{ old('is_published', $news->is_published) == '1' ? 'selected' : '' }}>Published</option>
                            <option value="0" {{ old('is_published', $news->is_published) == '0' ? 'selected' : '' }}>Draft</option>
                        </select>
                        @error('is_published')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="mb-3">
                        <label for="published_at" class="form-label">Tanggal Publikasi</label>
                        <input type="datetime-local" class="form-control @error('published_at') is-invalid @enderror"
                            id="published_at" name="published_at"
                            value="{{ old('published_at', $news->published_at ? $news->published_at->format('Y-m-d\TH:i') : now()->format('Y-m-d\TH:i')) }}">
                        @error('published_at')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="content" class="form-label">Konten Berita <span class="text-danger">*</span></label>
                        <textarea class="form-control @error('content') is-invalid @enderror"
                            id="content" name="content" rows="12" required>{{ old('content', $news->content) }}</textarea>
                        @error('content')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> Update
                </button>
                <a href="{{ route('admin.news.index') }}" class="btn btn-secondary">
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
    CKEDITOR.replace('content', {
        height: 400
    });
</script>
@endpush