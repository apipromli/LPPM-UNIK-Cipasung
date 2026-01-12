@extends('admin.layouts.app')

@section('title', 'Restra LPPM')

@section('content')
<div class="page-header">
    <h1>Rencana Strategis LPPM</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Restra LPPM</li>
        </ol>
    </nav>
</div>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Daftar Restra LPPM</h5>
        <a href="{{ route('admin.restras.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Tambah Restra
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover datatable">
                <thead>
                    <tr>
                        <th width="50">No</th>
                        <th>Judul</th>
                        <th>Periode</th>
                        <th>Dokumen</th>
                        <th>Tanggal Dibuat</th>
                        <th width="150">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($restras as $restra)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $restra->title }}</td>
                        <td>
                            <span class="badge bg-primary">
                                {{ $restra->start_year }} - {{ $restra->end_year }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ asset('storage/' . $restra->document) }}"
                                class="btn btn-sm btn-outline-primary" target="_blank">
                                <i class="bi bi-file-earmark-pdf"></i> Lihat
                            </a>
                        </td>
                        <td>{{ $restra->created_at->format('d M Y') }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('admin.restras.show', $restra) }}"
                                    class="btn btn-sm btn-info" title="Lihat">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('admin.restras.edit', $restra) }}"
                                    class="btn btn-sm btn-warning" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.restras.destroy', $restra) }}"
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