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
use Illuminate\Http\Request;

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
        if (!session('budget_pin_verified')) {
            return redirect()->route('about.budget-pin');
        }
        $budgets = BudgetRealization::latest()->paginate(10);
        return view('frontend.about.budget-realization', compact('budgets'));
    }

    public function showBudgetPin()
    {
        if (session('budget_pin_verified')) {
            return redirect()->route('about.budget-realization');
        }
        return view('frontend.about.budget-pin');
    }

    public function verifyBudgetPin(Request $request)
    {
        $pin = env('BUDGET_ACCESS_PIN', '2026');
        if ($request->pin === $pin) {
            session(['budget_pin_verified' => true]);
            return redirect()->route('about.budget-realization');
        }
        return back()->withErrors(['pin' => 'PIN tidak valid. Silakan coba lagi.']);
    }
}
