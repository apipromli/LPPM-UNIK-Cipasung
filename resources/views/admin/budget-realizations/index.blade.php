@extends('admin.layouts.app')

@section('title', 'Realisasi Anggaran')

@section('content')
<div class="page-header">
    <h1>Realisasi Anggaran</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Realisasi Anggaran</li>
        </ol>
    </nav>
</div>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Daftar Realisasi Anggaran</h5>
        <a href="{{ route('admin.budget-realizations.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Tambah Realisasi Anggaran
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover datatable">
                <thead>
                    <tr>
                        <th width="50">No</th>
                        <th>Tahun</th>
                        <th>Kegiatan</th>
                        <th>Anggaran</th>
                        <th>Realisasi</th>
                        <th>Persentase</th>
                        <th width="150">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($budgets as $budget)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><strong>{{ $budget->year }}</strong></td>
                        <td>{{ $budget->title }}</td>
                        <td>Rp {{ number_format($budget->budget_amount, 0, ',', '.') }}</td>
                        <td>Rp {{ number_format($budget->realization_amount, 0, ',', '.') }}</td>
                        <td>
                            <span class="badge bg-{{ $budget->percentage >= 80 ? 'success' : ($budget->percentage >= 50 ? 'warning' : 'danger') }}">
                                {{ number_format($budget->percentage, 2) }}%
                            </span>
                        </td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('admin.budget-realizations.show', $budget) }}"
                                    class="btn btn-sm btn-info" title="Lihat">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('admin.budget-realizations.edit', $budget) }}"
                                    class="btn btn-sm btn-warning" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.budget-realizations.destroy', $budget) }}"
                                    method="POST" class="d-inline"
                                    onsubmit="return confirm('Yakin ingin menghapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" title="Hapus">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection