<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Cooperation;

class ServiceController extends Controller
{
    public function research()
    {
        $services = Service::where('type', 'penelitian')
            ->orderBy('order')
            ->get();

        return view('frontend.services.research', compact('services'));
    }

    public function communityService()
    {
        $services = Service::where('type', 'pengabdian')
            ->orderBy('order')
            ->get();

        return view('frontend.services.community-service', compact('services'));
    }

    public function cooperation()
    {
        $services = Service::where('type', 'kerjasama')
            ->orderBy('order')
            ->get();

        $cooperations = Cooperation::where('status', 'active')
            ->latest()
            ->paginate(12);

        return view('frontend.services.cooperation', compact('services', 'cooperations'));
    }
}
