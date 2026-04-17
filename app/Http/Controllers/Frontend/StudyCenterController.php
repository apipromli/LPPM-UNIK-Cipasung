<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\StudyCenter;

class StudyCenterController extends Controller
{
    public function index()
    {
        $studyCenters = StudyCenter::where('is_active', true)
            ->orderBy('order')
            ->get();

        return view('frontend.study-centers.index', compact('studyCenters'));
    }

    public function show($slug)
    {
        $studyCenter = StudyCenter::where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        return view('frontend.study-centers.show', compact('studyCenter'));
    }
}
