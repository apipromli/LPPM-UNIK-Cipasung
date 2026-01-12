@extends('admin.layouts.app')

@section('title', 'Data Penelitian')

@section('content')
<div class="page-header">
    <div class="container-fluid px-4">
        <h1>Data Penelitian</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Penelitian</li>
            </ol>
        </nav>
    </div>
</div>

<section class="py-4">
    <div class="container-fluid px-4">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white d-flex justify-content-between">
                <h5 class="mb-0">Daftar Penelitian</h5>
                <a href="{{ route('admin.researches.create') }}" class="btn btn-primary btn-sm">
                    <i class="bi bi-plus"></i> Tambah
                </a>
            </div>
            <hr>

            <form action="{{ route('admin.researches.import') }}"
                method="POST"
                enctype="multipart/form-data"
                class="mt-4">

                @csrf

                <div class="mb-3">
                    <label class="form-label fw-bold">Import Excel Penelitian</label>
                    <input type="file"
                        name="file"
                        class="form-control"
                        accept=".xlsx,.xls"
                        required>
                </div>

                <button class="btn btn-success">
                    Import Excel
                </button>
            </form>


            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th width="50">No</th>
                            <th>Peneliti</th>
                            <th>Skema</th>
                            <th>NIDN</th>
                            <th>Judul</th>
                            <th>Tahun</th>
                            <th width="140">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($researches as $research)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $research->researcher }}</td>
                            <td>{{ $research->scheme }}</td>
                            <td>{{ $research->nidn ?? '-' }}</td>
                            <td>{{ Str::limit($research->title, 60) }}</td>
                            <td>
                                <span class="badge bg-info">{{ $research->year }}</span>
                            </td>
                            <td>
                                <a href="{{ route('admin.researches.show', $research) }}" class="btn btn-sm btn-info">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('admin.researches.edit', $research) }}" class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form method="POST" action="{{ route('admin.researches.destroy', $research) }}"
                                    class="d-inline">
                                    @csrf @method('DELETE')
                                    <button onclick="return confirm('Hapus data?')" class="btn btn-sm btn-danger">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                {{-- PAGINATION --}}
                <div class="d-flex justify-content-between align-items-center mt-3">
                    <div class="text-muted">
                        Showing {{ $researches->firstItem() }} to {{ $researches->lastItem() }}
                        of {{ $researches->total() }} entries
                    </div>

                    {{ $researches->links() }}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection