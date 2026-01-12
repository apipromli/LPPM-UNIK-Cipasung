@extends('admin.layouts.app')

@section('title', 'Detail Penelitian')

@section('content')
<div class="page-header">
    <div class="container-fluid px-4">
        <h1>Detail Penelitian</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.researches.index') }}">Penelitian</a></li>
                <li class="breadcrumb-item active">Detail</li>
            </ol>
        </nav>
    </div>
</div>

<section class="py-4">
    <div class="container-fluid px-4">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white d-flex justify-content-between">
                <h5 class="mb-0">{{ $research->title }}</h5>
                <a href="{{ route('admin.researches.index') }}" class="btn btn-secondary btn-sm">
                    Kembali
                </a>
            </div>

            <div class="card-body">
                <dl class="row">
                    <dt class="col-md-3">Peneliti</dt>
                    <dd class="col-md-9">{{ $research->researcher }}</dd>

                    <dt class="col-md-3">Skema</dt>
                    <dd class="col-md-9">{{ $research->scheme }}</dd>

                    <dt class="col-md-3">Tahun</dt>
                    <dd class="col-md-9">
                        <span class="badge bg-info">{{ $research->year }}</span>
                    </dd>

                    <dt class="col-md-3">Judul</dt>
                    <dd class="col-md-9">{{ $research->title }}</dd>

                    <dt class="col-md-3">Dibuat</dt>
                    <dd class="col-md-9">{{ $research->created_at->format('d F Y') }}</dd>
                </dl>
            </div>
        </div>
    </div>
</section>
@endsection