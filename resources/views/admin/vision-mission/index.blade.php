@extends('admin.layouts.app')

@section('title', 'Visi & Misi')

@section('content')
<div class="page-header">
    <h1>Visi & Misi LPPM</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Visi & Misi</li>
        </ol>
    </nav>
</div>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Daftar Visi & Misi</h5>
        <a href="{{ route('admin.vision-missions.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Tambah Visi & Misi
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover datatable">
                <thead>
                    <tr>
                        <th width="50">No</th>
                        <th>Visi</th>
                        <th>Misi</th>
                        <th>Tanggal Dibuat</th>
                        <th width="150">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($visionMissions as $vm)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ Str::limit($vm->vision, 100) }}</td>
                        <td>{{ Str::limit($vm->mission, 100) }}</td>
                        <td>{{ $vm->created_at->format('d M Y') }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('admin.vision-missions.show', $vm) }}" class="btn btn-sm btn-info" title="Lihat">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('admin.vision-missions.edit', $vm) }}" class="btn btn-sm btn-warning" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.vision-missions.destroy', $vm) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
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