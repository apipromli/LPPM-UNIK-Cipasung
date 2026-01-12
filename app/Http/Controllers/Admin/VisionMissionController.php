<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VisionMission;
use Illuminate\Http\Request;

class VisionMissionController extends Controller
{
    public function index()
    {
        $visionMissions = VisionMission::latest()->paginate(10);
        return view('admin.vision-mission.index', compact('visionMissions'));
    }

    public function create()
    {
        return view('admin.vision-mission.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'vision' => 'required',
            'mission' => 'required',
        ]);

        VisionMission::create($validated);

        return redirect()->route('admin.vision-missions.index')->with('success', 'Visi Misi berhasil ditambahkan');
    }

    public function show(VisionMission $visionMission)
    {
        return view('admin.vision-mission.show', compact('visionMission'));
    }

    public function edit(VisionMission $visionMission)
    {
        return view('admin.vision-mission.edit', compact('visionMission'));
    }

    public function update(Request $request, VisionMission $visionMission)
    {
        $validated = $request->validate([
            'vision' => 'required',
            'mission' => 'required',
        ]);

        $visionMission->update($validated);

        return redirect()->route('admin.vision-missions.index')->with('success', 'Visi Misi berhasil diupdate');
    }

    public function destroy(VisionMission $visionMission)
    {
        $visionMission->delete();

        return redirect()->route('admin.vision-missions.index')->with('success', 'Visi Misi berhasil dihapus');
    }
}
