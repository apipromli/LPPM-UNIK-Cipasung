@extends('admin.layouts.app')

@section('title', 'Tambah Pusat Studi')

@section('content')
<div class="page-header">
    <h1>Tambah Pusat Studi</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.study-centers.index') }}">Pusat Studi</a></li>
            <li class="breadcrumb-item active">Tambah</li>
        </ol>
    </nav>
</div>

<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Form Tambah Pusat Studi</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.study-centers.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-md-8">
                    <div class="mb-3">
                        <label class="form-label">Nama Pusat Studi <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                            value="{{ old('name') }}" required
                            placeholder="contoh: Pusat Studi Gender dan Anak">
                        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Singkatan</label>
                        <input type="text" name="short_name" class="form-control @error('short_name') is-invalid @enderror"
                            value="{{ old('short_name') }}" placeholder="contoh: PSGA">
                        @error('short_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Deskripsi Singkat <span class="text-danger">*</span></label>
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror"
                            rows="3" required>{{ old('description') }}</textarea>
                        @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Konten Lengkap</label>
                        <textarea name="content" id="content" class="form-control @error('content') is-invalid @enderror"
                            rows="8">{{ old('content') }}</textarea>
                        @error('content') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">Foto/Banner</label>
                        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror"
                            accept="image/*" id="imageInput">
                        <div id="imagePreview" class="mt-2"></div>
                        @error('image') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nama Ketua</label>
                        <input type="text" name="head_name" class="form-control @error('head_name') is-invalid @enderror"
                            value="{{ old('head_name') }}">
                        @error('head_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Foto Ketua</label>
                        <input type="file" name="head_photo" class="form-control @error('head_photo') is-invalid @enderror"
                            accept="image/*">
                        @error('head_photo') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                            value="{{ old('email') }}">
                        @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Telepon</label>
                        <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"
                            value="{{ old('phone') }}">
                        @error('phone') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Urutan</label>
                        <input type="number" name="order" class="form-control @error('order') is-invalid @enderror"
                            value="{{ old('order', 0) }}">
                        @error('order') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <div class="form-check form-switch">
                            <input type="checkbox" name="is_active" class="form-check-input"
                                id="is_active" value="1" {{ old('is_active', 1) ? 'checked' : '' }}>
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
                            rows="3">{{ old('vision') }}</textarea>
                        @error('vision') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Misi</label>
                        <textarea name="mission" class="form-control @error('mission') is-invalid @enderror"
                            rows="3">{{ old('mission') }}</textarea>
                        @error('mission') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Program Kegiatan</label>
                <textarea name="programs" class="form-control @error('programs') is-invalid @enderror"
                    rows="4" placeholder="Tuliskan program-program kegiatan pusat studi...">{{ old('programs') }}</textarea>
                @error('programs') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> Simpan
                </button>
                <a href="{{ route('admin.study-centers.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.getElementById('imageInput').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('imagePreview').innerHTML =
                `<img src="${e.target.result}" class="img-fluid rounded" style="max-height:150px;">`;
        };
        reader.readAsDataURL(file);
    }
});
</script>
@endpush
