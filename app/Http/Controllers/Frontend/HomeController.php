<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Gallery;
use App\Models\Research;
use App\Models\Ppm;
use App\Models\Restra;
use App\Models\Performance;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data = [
            'latestNews' => News::where('is_published', true)
                ->latest('published_at')
                ->take(6)
                ->get(),
            'galleries' => Gallery::latest()->take(8)->get(),
            'totalResearches' => Research::count(),
            'totalPpm' => Ppm::count(),
        ];

        return view('frontend.home', $data);
    }

    public function news()
    {
        $news = News::where('is_published', true)
            ->latest('published_at')
            ->paginate(12);

        return view('frontend.news.index', compact('news'));
    }

    public function newsDetail($slug)
    {
        $news = News::where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();

        $news->incrementViews();

        $relatedNews = News::where('is_published', true)
            ->where('id', '!=', $news->id)
            ->latest('published_at')
            ->take(4)
            ->get();

        return view('frontend.news.detail', compact('news', 'relatedNews'));
    }

    public function restra()
    {
        $restras = Restra::latest()->paginate(10);
        return view('frontend.restra', compact('restras'));
    }

    public function performance()
    {
        $performances = Performance::latest()->paginate(10);
        return view('frontend.performance', compact('performances'));
    }
}
