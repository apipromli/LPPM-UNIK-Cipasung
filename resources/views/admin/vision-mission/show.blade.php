@extends('admin.layouts.app')

@section('title', 'Detail Visi & Misi')

@section('content')
<div class="page-header">
    <h1>Detail Visi & Misi</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.vision-missions.index') }}">Visi & Misi</a></li>
            <li class="breadcrumb-item active">Detail</li>
        </ol>
    </nav>
</div>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Visi & Misi LPPM</h5>
        <div>
            <a href="{{ route('admin.vision-missions.edit', $visionMission) }}" class="btn btn-warning btn-sm">
                <i class="bi bi-pencil"></i> Edit
            </a>
            <a href="{{ route('admin.vision-missions.index') }}" class="btn btn-secondary btn-sm">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="mb-4">
            <h5 class="fw-bold">VISI</h5>
            <div class="border rounded p-3 bg-light">
                {!! $visionMission->vision !!}
            </div>
        </div>

        <div class="mb-4">
            <h5 class="fw-bold">MISI</h5>
            <div class="border rounded p-3 bg-light">
                {!! $visionMission->mission !!}
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label class="fw-bold">Tanggal Dibuat:</label>
                <p>{{ $visionMission->created_at->format('d F Y H:i') }}</p>
            </div>
            <div class="col-md-6">
                <label class="fw-bold">Terakhir Diupdate:</label>
                <p>{{ $visionMission->updated_at->format('d F Y H:i') }}</p>
            </div>
        </div>
    </div>
</div>
@endsection