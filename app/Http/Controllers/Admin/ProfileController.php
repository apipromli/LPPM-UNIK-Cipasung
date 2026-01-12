<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $profiles = Profile::latest()->paginate(10);
        return view('admin.profile.index', compact('profiles'));
    }

    public function create()
    {
        return view('admin.profile.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('profiles', 'public');
        }

        Profile::create($validated);

        return redirect()->route('admin.profiles.index')->with('success', 'Profil berhasil ditambahkan');
    }

    public function show(Profile $profile)
    {
        return view('admin.profile.show', compact('profile'));
    }

    public function edit(Profile $profile)
    {
        return view('admin.profile.edit', compact('profile'));
    }

    public function update(Request $request, Profile $profile)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($profile->image) {
                Storage::disk('public')->delete($profile->image);
            }
            $validated['image'] = $request->file('image')->store('profiles', 'public');
        }

        $profile->update($validated);

        return redirect()->route('admin.profiles.index')->with('success', 'Profil berhasil diupdate');
    }

    public function destroy(Profile $profile)
    {
        if ($profile->image) {
            Storage::disk('public')->delete($profile->image);
        }

        $profile->delete();

        return redirect()->route('admin.profiles.index')->with('success', 'Profil berhasil dihapus');
    }
}
