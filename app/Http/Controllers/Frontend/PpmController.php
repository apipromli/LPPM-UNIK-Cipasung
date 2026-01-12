<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Ppm;
use Illuminate\Http\Request;

class PpmController extends Controller
{
    public function internal(Request $request)
    {
        // Jika request AJAX untuk modal detail
        if ($request->ajax() || $request->has('ajax')) {
            $query = Ppm::query();

            if ($request->has('all') && $request->all == '1') {
                // Return all data untuk modal
                $ppms = $query->orderBy('year', 'desc')->get();
                return response()->json($ppms);
            }
        }

        $query = Ppm::query();

        // Filter by year only
        if ($request->has('year') && $request->year != '') {
            $query->where('year', $request->year);
        }

        $ppms = $query->orderBy('year', 'desc')
            ->orderBy('executor', 'asc')
            ->get(); // Ambil semua data, tidak pakai pagination

        $years = Ppm::distinct()
            ->pluck('year')
            ->sort()
            ->reverse();

        return view('frontend.ppm.internal', compact('ppms', 'years'));
    }
}
