<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Ppm;
use Illuminate\Http\Request;

class PpmController extends Controller
{
    public function internal(Request $request)
    {
        $query = Ppm::query();

        if ($request->filled('year')) {
            $query->where('year', $request->year);
        }

        $ppms = $query->orderBy('year', 'desc')
            ->orderBy('executor', 'asc')
            ->paginate(30)
            ->withQueryString();

        $years = Ppm::distinct()
            ->orderBy('year', 'desc')
            ->pluck('year');

        return view('frontend.ppm.internal', compact('ppms', 'years'));
    }
}
