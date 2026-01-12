<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Research;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\ResearchExport;

class ResearchExportController extends Controller
{
    public function excel(Request $request)
    {
        return Excel::download(
            new ResearchExport($request->year),
            'penelitian.xlsx'
        );
    }

    public function pdf(Request $request)
    {
        $query = Research::query();

        if ($request->year) {
            $query->where('year', $request->year);
        }

        $researches = $query->orderBy('year', 'desc')->get();

        $pdf = Pdf::loadView('exports.research_pdf', compact('researches'))
            ->setPaper('A4', 'landscape');

        return $pdf->download('penelitian.pdf');
    }
}
