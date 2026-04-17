@extends('admin.layouts.app')

@section('title', 'Edit Pusat Studi')

@section('content')
<div class="page-header">
    <h1>Edit Pusat Studi</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.study-centers.index') }}">Pusat Studi</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>
    </nav>
</div>

<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Form Edit: {{ $studyCenter->name }}</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.study-centers.update', $studyCenter) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-8">
                    <div class="mb-3">
                        <label class="form-label">Nama Pusat Studi <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                            value="{{ old('name', $studyCenter->name) }}" required>
                        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Singkatan</label>
                        <input type="text" name="short_name" class="form-control @error('short_name') is-invalid @enderror"
                            value="{{ old('short_name', $studyCenter->short_name) }}">
                        @error('short_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Deskripsi Singkat <span class="text-danger">*</span></label>
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror"
                            rows="3" required>{{ old('description', $studyCenter->description) }}</textarea>
                        @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Konten Lengkap</label>
                        <textarea name="content" class="form-control @error('content') is-invalid @enderror"
                            rows="8">{{ old('content', $studyCenter->content) }}</textarea>
                        @error('content') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">Foto/Banner</label>
                        @if($studyCenter->image)
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $studyCenter->image) }}"
                                class="img-fluid rounded" style="max-height:120px;">
                        </div>
                        @endif
                        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror"
                            accept="image/*">
                        <small class="text-muted">Biarkan kosong jika tidak ingin mengganti</small>
                        @error('image') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nama Ketua</label>
                        <input type="text" name="head_name" class="form-control @error('head_name') is-invalid @enderror"
                            value="{{ old('head_name', $studyCenter->head_name) }}">
                        @error('head_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Foto Ketua</label>
                        @if($studyCenter->head_photo)
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $studyCenter->head_photo) }}"
                                class="img-fluid rounded-circle" style="height:60px;width:60px;object-fit:cover;">
                        </div>
                        @endif
                        <input type="file" name="head_photo" class="form-control @error('head_photo') is-invalid @enderror"
                            accept="image/*">
                        <small class="text-muted">Biarkan kosong jika tidak ingin mengganti</small>
                        @error('head_photo') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                            value="{{ old('email', $studyCenter->email) }}">
                        @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Telepon</label>
                        <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"
                            value="{{ old('phone', $studyCenter->phone) }}">
                        @error('phone') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Urutan</label>
                        <input type="number" name="order" class="form-control @error('order') is-invalid @enderror"
                            value="{{ old('order', $studyCenter->order) }}">
                        @error('order') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <div class="form-check form-switch">
                            <input type="checkbox" name="is_active" class="form-check-input"
                                id="is_active" value="1" {{ $studyCenter->is_active ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_active">Aktif</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Visi</label>
                        <textarea name="vision" class="form-control @error('vision') is-invalid @enderror"
                            rows="3">{{ old('vision', $studyCenter->vision) }}</textarea>
                        @error('vision') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Misi</label>
                        <textarea name="mission" class="form-control @error('mission') is-invalid @enderror"
                            rows="3">{{ old('mission', $studyCenter->mission) }}</textarea>
                        @error('mission') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Program Kegiatan</label>
                <textarea name="programs" class="form-control @error('programs') is-invalid @enderror"
                    rows="4">{{ old('programs', $studyCenter->programs) }}</textarea>
                @error('programs') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> Update
                </button>
                <a href="{{ route('admin.study-centers.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
