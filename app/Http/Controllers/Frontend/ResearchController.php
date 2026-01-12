<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Research;
use Illuminate\Http\Request;

class ResearchController extends Controller
{
    public function internal(Request $request)
    {
        $query = Research::where('type', 'internal');

        if ($request->filled('year')) {
            $query->where('year', $request->year);
        }

        $researches = $query
            ->orderBy('year', 'desc')
            ->orderBy('researcher', 'asc')
            ->paginate(15)
            ->withQueryString(); // PENTING untuk filter


        $years = Research::where('type', 'internal')
            ->distinct()
            ->orderBy('year', 'desc')
            ->pluck('year');

        return view('frontend.researches.internal', compact('researches', 'years'));
    }
}
