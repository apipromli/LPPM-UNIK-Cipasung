<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ppm;
use App\Exports\PpmExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class PpmExportController extends Controller
{
    public function excel(Request $request)
    {
        $filename = 'ppm' . ($request->year ? '-' . $request->year : '') . '.xlsx';
        return Excel::download(new PpmExport($request->year), $filename);
    }

    public function pdf(Request $request)
    {
        $query = Ppm::query();

        if ($request->year) {
            $query->where('year', $request->year);
        }

        $ppms = $query->orderBy('year', 'desc')->orderBy('executor', 'asc')->get();

        $pdf = Pdf::loadView('exports.ppm_pdf', compact('ppms'))
            ->setPaper('A4', 'landscape');

        $filename = 'ppm' . ($request->year ? '-' . $request->year : '') . '.pdf';
        return $pdf->download($filename);
    }
}
