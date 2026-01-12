@extends('admin.layouts.app')

@section('title', 'Detail Profil')

@section('content')
<div class="page-header">
    <h1>Detail Profil/Sejarah</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.profiles.index') }}">Profil/Sejarah</a></li>
            <li class="breadcrumb-item active">Detail</li>
        </ol>
    </nav>
</div>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">{{ $profile->title }}</h5>
        <div>
            <a href="{{ route('admin.profiles.edit', $profile) }}" class="btn btn-warning btn-sm">
                <i class="bi bi-pencil"></i> Edit
            </a>
            <a href="{{ route('admin.profiles.index') }}" class="btn btn-secondary btn-sm">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>
    </div>
    <div class="card-body">
        @if($profile->image)
        <div class="mb-4">
            <img src="{{ asset('storage/' . $profile->image) }}" alt="{{ $profile->title }}" class="img-fluid rounded" style="max-height: 400px;">
        </div>
        @endif

        <div class="mb-3">
            <label class="fw-bold">Judul:</label>
            <p>{{ $profile->title }}</p>
        </div>

        <div class="mb-3">
            <label class="fw-bold">Konten:</label>
            <div class="border rounded p-3 bg-light">
                {!! $profile->content !!}
            </div>
        </div>

        <div class="mb-3">
            <label class="fw-bold">Tanggal Dibuat:</label>
            <p>{{ $profile->created_at->format('d F Y H:i') }}</p>
        </div>

        <div class="mb-3">
            <label class="fw-bold">Terakhir Diupdate:</label>
            <p>{{ $profile->updated_at->format('d F Y H:i') }}</p>
        </div>
    </div>
</div>
@endsection