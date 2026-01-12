@extends('admin.layouts.app')

@section('title', 'Kerjasama')

@section('content')
<div class="page-header">
    <h1>Kerjasama</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Kerjasama</li>
        </ol>
    </nav>
</div>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Daftar Kerjasama</h5>
        <a href="{{ route('admin.cooperations.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Tambah Kerjasama
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover datatable">
                <thead>
                    <tr>
                        <th width="50">No</th>
                        <th>Nama Mitra</th>
                        <th>Jenis Kerjasama</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Berakhir</th>
                        <th>Status</th>
                        <th width="150">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cooperations as $cooperation)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $cooperation->partner_name }}</td>
                        <td><span class="badge bg-info">{{ $cooperation->cooperation_type }}</span></td>
                        <td>{{ $cooperation->start_date->format('d M Y') }}</td>
                        <td>{{ $cooperation->end_date ? $cooperation->end_date->format('d M Y') : '-' }}</td>
                        <td>
                            @php
                            $statusClass = [
                            'active' => 'success',
                            'expired' => 'danger',
                            'terminated' => 'secondary'
                            ];
                            $statusText = [
                            'active' => 'Aktif',
                            'expired' => 'Berakhir',
                            'terminated' => 'Dihentikan'
                            ];
                            @endphp
                            <span class="badge bg-{{ $statusClass[$cooperation->status] }}">
                                {{ $statusText[$cooperation->status] }}
                            </span>
                        </td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('admin.cooperations.show', $cooperation) }}"
                                    class="btn btn-sm btn-info" title="Lihat">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('admin.cooperations.edit', $cooperation) }}"
                                    class="btn btn-sm btn-warning" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.cooperations.destroy', $cooperation) }}"
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