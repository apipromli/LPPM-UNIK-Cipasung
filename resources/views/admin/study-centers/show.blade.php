@extends('admin.layouts.app')

@section('title', 'Detail Pusat Studi')

@section('content')
<div class="page-header">
    <h1>Detail Pusat Studi</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.study-centers.index') }}">Pusat Studi</a></li>
            <li class="breadcrumb-item active">Detail</li>
        </ol>
    </nav>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between">
                <h5 class="mb-0">{{ $studyCenter->name }}</h5>
                <span class="badge bg-{{ $studyCenter->is_active ? 'success' : 'secondary' }}">
                    {{ $studyCenter->is_active ? 'Aktif' : 'Non-aktif' }}
                </span>
            </div>
            <div class="card-body">
                @if($studyCenter->image)
                <img src="{{ asset('storage/' . $studyCenter->image) }}"
                    class="img-fluid rounded mb-3" style="max-height:300px; width:100%; object-fit:cover;">
                @endif

                <table class="table table-borderless">
                    <tr>
                        <td width="150"><strong>Singkatan</strong></td>
                        <td>{{ $studyCenter->short_name ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Ketua</strong></td>
                        <td>{{ $studyCenter->head_name ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Email</strong></td>
                        <td>{{ $studyCenter->email ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Telepon</strong></td>
                        <td>{{ $studyCenter->phone ?? '-' }}</td>
                    </tr>
                </table>

                <h6 class="mt-3 fw-bold">Deskripsi</h6>
                <p>{{ $studyCenter->description }}</p>

                @if($studyCenter->vision)
                <h6 class="fw-bold">Visi</h6>
                <p>{{ $studyCenter->vision }}</p>
                @endif

                @if($studyCenter->mission)
                <h6 class="fw-bold">Misi</h6>
                <p>{{ $studyCenter->mission }}</p>
                @endif

                @if($studyCenter->programs)
                <h6 class="fw-bold">Program Kegiatan</h6>
                <p>{{ $studyCenter->programs }}</p>
                @endif

                @if($studyCenter->content)
                <h6 class="fw-bold">Konten Lengkap</h6>
                <div>{!! $studyCenter->content !!}</div>
                @endif
            </div>
        </div>
    </div>
    <div class="col-md-4">
        @if($studyCenter->head_photo)
        <div class="card mb-4">
            <div class="card-header"><h6 class="mb-0">Foto Ketua</h6></div>
            <div class="card-body text-center">
                <img src="{{ asset('storage/' . $studyCenter->head_photo) }}"
                    class="rounded-circle" style="width:120px;height:120px;object-fit:cover;">
                <p class="mt-2 fw-bold mb-0">{{ $studyCenter->head_name }}</p>
            </div>
        </div>
        @endif

        <div class="d-flex flex-column gap-2">
            <a href="{{ route('admin.study-centers.edit', $studyCenter) }}" class="btn btn-warning">
                <i class="bi bi-pencil"></i> Edit
            </a>
            <a href="{{ route('admin.study-centers.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
            <form action="{{ route('admin.study-centers.destroy', $studyCenter) }}" method="POST"
                onsubmit="return confirm('Yakin ingin menghapus?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger w-100">
                    <i class="bi bi-trash"></i> Hapus
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
