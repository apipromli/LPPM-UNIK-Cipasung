@extends('frontend.layouts.app')

@section('title', 'Realisasi Anggaran')

@section('content')
<div class="page-header">
    <div class="container">
        <h1>Realisasi Anggaran LPPM</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                <li class="breadcrumb-item">Tentang Kami</li>
                <li class="breadcrumb-item active">Realisasi Anggaran</li>
            </ol>
        </nav>
    </div>
</div>

<section class="py-5">
    <div class="container">
        @if($budgets->count() > 0)
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="table-primary">
                    <tr>
                        <th>No</th>
                        <th>Tahun</th>
                        <th>Kegiatan</th>
                        <th>Anggaran</th>
                        <th>Realisasi</th>
                        <th>Persentase</th>
                        <th>Dokumen</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($budgets as $budget)
                    <tr>
                        <td>{{ $loop->iteration + ($budgets->currentPage() - 1) * $budgets->perPage() }}</td>
                        <td><strong>{{ $budget->year }}</strong></td>
                        <td>{{ $budget->title }}</td>
                        <td>Rp {{ number_format($budget->budget_amount, 0, ',', '.') }}</td>
                        <td>Rp {{ number_format($budget->realization_amount, 0, ',', '.') }}</td>
                        <td>
                            <div class="progress" style="height: 25px;">
                                <div class="progress-bar {{ $budget->percentage >= 80 ? 'bg-success' : ($budget->percentage >= 50 ? 'bg-warning' : 'bg-danger') }}"
                                    role="progressbar"
                                    style="width: {{ $budget->percentage }}%">
                                    {{ number_format($budget->percentage, 2) }}%
                                </div>
                            </div>
                        </td>
                        <td>
                            @if($budget->document)
                            <a href="{{ asset('storage/' . $budget->document) }}"
                                class="btn btn-sm btn-primary"
                                target="_blank">
                                <i class="bi bi-download"></i> Download
                            </a>
                            @else
                            <span class="text-muted">-</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-4 d-flex justify-content-center">
            {{ $budgets->links() }}
        </div>
        @else
        <div class="alert alert-info">
            <i class="bi bi-info-circle"></i> Data realisasi anggaran belum tersedia.
        </div>
        @endif
    </div>
</section>
@endsection