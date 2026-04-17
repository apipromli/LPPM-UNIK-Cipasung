<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Data Penelitian Internal LPPM UNIK Cipasung</title>
<style>
    body { font-family: DejaVu Sans, sans-serif; font-size: 11px; color: #1f2937; margin: 0; padding: 0; }
    .header { background: #0e4226; color: white; padding: 14px 20px; margin-bottom: 16px; }
    .header h2 { margin: 0 0 2px; font-size: 15px; font-weight: bold; }
    .header p { margin: 0; font-size: 11px; opacity: .85; }
    .meta { padding: 0 20px 10px; font-size: 11px; color: #6b7280; }
    table { width: 100%; border-collapse: collapse; font-size: 10.5px; }
    thead th {
        background: #0e4226;
        color: white;
        padding: 8px 10px;
        text-align: left;
        font-weight: bold;
        font-size: 10px;
        text-transform: uppercase;
        letter-spacing: .5px;
    }
    tbody td { padding: 8px 10px; border-bottom: 1px solid #e5e7eb; vertical-align: top; }
    tbody tr:nth-child(even) td { background: #f8faf9; }
    .badge-done { background: #dcfce7; color: #15803d; padding: 2px 7px; border-radius: 4px; font-size: 10px; }
    .badge-ongoing { background: #fef9c3; color: #92400e; padding: 2px 7px; border-radius: 4px; font-size: 10px; }
    .footer { margin-top: 20px; padding: 10px 20px; font-size: 10px; color: #9ca3af; text-align: center; }
</style>
</head>
<body>
<div class="header">
    <h2>Data Penelitian Internal</h2>
    <p>LPPM Universitas Islam KH. Ruhiyat Cipasung &nbsp;|&nbsp; Dicetak: {{ date('d F Y') }}</p>
</div>
<div class="meta">Total: {{ count($researches) }} data</div>
<table>
    <thead>
        <tr>
            <th style="width:30px;">No</th>
            <th style="width:50px;">Tahun</th>
            <th style="width:160px;">Nama Peneliti</th>
            <th style="width:80px;">NIDN</th>
            <th style="width:100px;">Skema</th>
            <th>Judul Penelitian</th>
            <th style="width:70px;">Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($researches as $i => $research)
        <tr>
            <td>{{ $i + 1 }}</td>
            <td>{{ $research->year }}</td>
            <td>{{ $research->researcher }}</td>
            <td>{{ $research->nidn ?? '-' }}</td>
            <td>{{ $research->scheme ?? '-' }}</td>
            <td>{{ $research->title }}</td>
            <td>
                @if($research->status === 'completed')
                <span class="badge-done">Selesai</span>
                @else
                <span class="badge-ongoing">Berlangsung</span>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="footer">
    &copy; {{ date('Y') }} LPPM UNIK Cipasung &mdash; Dokumen ini digenerate secara otomatis
</div>
</body>
</html>
