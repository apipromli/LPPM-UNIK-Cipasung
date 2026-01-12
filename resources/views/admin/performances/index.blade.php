@extends('admin.layouts.app')

@section('title', 'Kinerja LPPM')

@section('content')
<div class="page-header">
    <h1>Kinerja LPPM</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Kinerja LPPM</li>
        </ol>
    </nav>
</div>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Daftar Kinerja LPPM</h5>
        <a href="{{ route('admin.performances.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Tambah Kinerja
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover datatable">
                <thead>
                    <tr>
                        <th width="50">No</th>
                        <th>Tahun</th>
                        <th>Judul</th>
                        <th>Dokumen</th>
                        <th>Tanggal Dibuat</th>
                        <th width="150">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($performances as $performance)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><span class="badge bg-info">{{ $performance->year }}</span></td>
                        <td>{{ Str::limit($performance->title, 60) }}</td>
                        <td>
                            @if($performance->document)
                            <a href="{{ asset('storage/' . $performance->document) }}"
                                class="btn btn-sm btn-outline-primary" target="_blank">
                                <i class="bi bi-file-earmark-pdf"></i> Lihat
                            </a>
                            @else
                            <span class="text-muted">-</span>
                            @endif
                        </td>
                        <td>{{ $performance->created_at->format('d M Y') }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('admin.performances.show', $performance) }}"
                                    class="btn btn-sm btn-info" title="Lihat">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('admin.performances.edit', $performance) }}"
                                    class="btn btn-sm btn-warning" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.performances.destroy', $performance) }}"
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