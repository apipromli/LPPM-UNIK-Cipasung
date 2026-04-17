<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StudyCenter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class StudyCenterController extends Controller
{
    public function index()
    {
        $studyCenters = StudyCenter::orderBy('order')->latest()->paginate(10);
        return view('admin.study-centers.index', compact('studyCenters'));
    }

    public function create()
    {
        return view('admin.study-centers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'short_name'  => 'nullable|string|max:50',
            'description' => 'required|string',
            'content'     => 'nullable|string',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'head_name'   => 'nullable|string|max:255',
            'head_photo'  => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'email'       => 'nullable|email|max:255',
            'phone'       => 'nullable|string|max:30',
            'vision'      => 'nullable|string',
            'mission'     => 'nullable|string',
            'programs'    => 'nullable|string',
            'is_active'   => 'boolean',
            'order'       => 'nullable|integer',
        ]);

        $validated['slug'] = Str::slug($validated['name']);
        $validated['is_active'] = $request->boolean('is_active', true);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('study-centers', 'public');
        }

        if ($request->hasFile('head_photo')) {
            $validated['head_photo'] = $request->file('head_photo')->store('study-centers/heads', 'public');
        }

        StudyCenter::create($validated);

        return redirect()->route('admin.study-centers.index')->with('success', 'Pusat Studi berhasil ditambahkan');
    }

    public function show(StudyCenter $studyCenter)
    {
        return view('admin.study-centers.show', compact('studyCenter'));
    }

    public function edit(StudyCenter $studyCenter)
    {
        return view('admin.study-centers.edit', compact('studyCenter'));
    }

    public function update(Request $request, StudyCenter $studyCenter)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'short_name'  => 'nullable|string|max:50',
            'description' => 'required|string',
            'content'     => 'nullable|string',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'head_name'   => 'nullable|string|max:255',
            'head_photo'  => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'email'       => 'nullable|email|max:255',
            'phone'       => 'nullable|string|max:30',
            'vision'      => 'nullable|string',
            'mission'     => 'nullable|string',
            'programs'    => 'nullable|string',
            'is_active'   => 'boolean',
            'order'       => 'nullable|integer',
        ]);

        $validated['slug'] = Str::slug($validated['name']);
        $validated['is_active'] = $request->boolean('is_active', true);

        if ($request->hasFile('image')) {
            if ($studyCenter->image) {
                Storage::disk('public')->delete($studyCenter->image);
            }
            $validated['image'] = $request->file('image')->store('study-centers', 'public');
        }

        if ($request->hasFile('head_photo')) {
            if ($studyCenter->head_photo) {
                Storage::disk('public')->delete($studyCenter->head_photo);
            }
            $validated['head_photo'] = $request->file('head_photo')->store('study-centers/heads', 'public');
        }

        $studyCenter->update($validated);

        return redirect()->route('admin.study-centers.index')->with('success', 'Pusat Studi berhasil diupdate');
    }

    public function destroy(StudyCenter $studyCenter)
    {
        if ($studyCenter->image) {
            Storage::disk('public')->delete($studyCenter->image);
        }
        if ($studyCenter->head_photo) {
            Storage::disk('public')->delete($studyCenter->head_photo);
        }

        $studyCenter->delete();

        return redirect()->route('admin.study-centers.index')->with('success', 'Pusat Studi berhasil dihapus');
    }
}
