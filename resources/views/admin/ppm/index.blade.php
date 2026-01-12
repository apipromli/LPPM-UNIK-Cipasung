@extends('admin.layouts.app')

@section('title', 'Data PPM')

@section('content')
<div class="page-header">
    <h1>Data Pengabdian kepada Masyarakat</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Data PPM</li>
        </ol>
    </nav>
</div>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Daftar PPM</h5>
        <a href="{{ route('admin.ppm.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Tambah PPM
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover datatable">
                <thead>
                    <tr>
                        <th width="50">No</th>
                        <th>Judul</th>
                        <th>Pelaksana</th>
                        <th>Tahun</th>
                        <th>Lokasi</th>
                        <th>Status</th>
                        <th width="150">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ppms as $ppm)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ Str::limit($ppm->title, 50) }}</td>
                        <td>{{ $ppm->executor }}</td>
                        <td><span class="badge bg-info">{{ $ppm->year }}</span></td>
                        <td>{{ $ppm->location }}</td>
                        <td>
                            @php
                            $statusClass = [
                            'planned' => 'warning',
                            'ongoing' => 'info',
                            'completed' => 'success'
                            ];
                            $statusText = [
                            'planned' => 'Direncanakan',
                            'ongoing' => 'Berjalan',
                            'completed' => 'Selesai'
                            ];
                            @endphp
                            <span class="badge bg-{{ $statusClass[$ppm->status] }}">
                                {{ $statusText[$ppm->status] }}
                            </span>
                        </td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('admin.ppm.show', $ppm) }}"
                                    class="btn btn-sm btn-info" title="Lihat">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('admin.ppm.edit', $ppm) }}"
                                    class="btn btn-sm btn-warning" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.ppm.destroy', $ppm) }}"
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