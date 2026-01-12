<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Research;
use App\Models\Ppm;
use App\Models\News;
use App\Models\Gallery;
use App\Models\Cooperation;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'totalResearches' => Research::count(),
            'totalPpm' => Ppm::count(),
            'totalNews' => News::count(),
            'totalGalleries' => Gallery::count(),
            'totalCooperations' => Cooperation::where('status', 'active')->count(),
            'recentNews' => News::latest()->take(5)->get(),
            'recentResearches' => Research::latest()->take(5)->get(),
        ];

        return view('admin.dashboard', $data);
    }
}
