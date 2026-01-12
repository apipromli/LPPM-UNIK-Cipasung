@extends('admin.layouts.app')

@section('title', 'Detail Struktur Organisasi')

@section('content')
<div class="page-header">
    <h1>Detail Struktur Organisasi</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.organizational-structures.index') }}">Struktur Organisasi</a></li>
            <li class="breadcrumb-item active">Detail</li>
        </ol>
    </nav>
</div>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">{{ $organizationalStructure->title }}</h5>
        <div>
            <a href="{{ route('admin.organizational-structures.edit', $organizationalStructure) }}" class="btn btn-warning btn-sm">
                <i class="bi bi-pencil"></i> Edit
            </a>
            <a href="{{ route('admin.organizational-structures.index') }}" class="btn btn-secondary btn-sm">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="mb-4">
            <img src="{{ asset('storage/' . $organizationalStructure->image) }}"
                alt="{{ $organizationalStructure->title }}"
                class="img-fluid rounded">
        </div>

        <div class="mb-3">
            <label class="fw-bold">Judul:</label>
            <p>{{ $organizationalStructure->title }}</p>
        </div>

        @if($organizationalStructure->description)
        <div class="mb-3">
            <label class="fw-bold">Deskripsi:</label>
            <p>{{ $organizationalStructure->description }}</p>
        </div>
        @endif

        <div class="mb-3">
            <label class="fw-bold">Tanggal Dibuat:</label>
            <p>{{ $organizationalStructure->created_at->format('d F Y H:i') }}</p>
        </div>

        <div class="mb-3">
            <label class="fw-bold">Terakhir Diupdate:</label>
            <p>{{ $organizationalStructure->updated_at->format('d F Y H:i') }}</p>
        </div>
    </div>
</div>
@endsection