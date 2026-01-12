<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\VisionMission;
use App\Models\OrganizationalStructure;
use App\Models\Leader;
use App\Models\Staff;
use App\Models\Gallery;
use App\Models\BudgetRealization;

class AboutController extends Controller
{
    public function history()
    {
        $profile = Profile::first();
        return view('frontend.about.history', compact('profile'));
    }

    public function visionMission()
    {
        $visionMission = VisionMission::first();
        return view('frontend.about.vision-mission', compact('visionMission'));
    }

    public function organizationalStructure()
    {
        $structure = OrganizationalStructure::first();
        return view('frontend.about.organizational-structure', compact('structure'));
    }

    public function leaders()
    {
        $leaders = Leader::orderBy('order')->get();
        return view('frontend.about.leaders', compact('leaders'));
    }

    public function staff()
    {
        $staff = Staff::orderBy('order')->get();
        return view('frontend.about.staff', compact('staff'));
    }

    public function gallery()
    {
        $galleries = Gallery::latest()->paginate(12);
        return view('frontend.about.gallery', compact('galleries'));
    }

    public function budgetRealization()
    {
        $budgets = BudgetRealization::latest()->paginate(10);
        return view('frontend.about.budget-realization', compact('budgets'));
    }
}
