<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Leader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LeaderController extends Controller
{
    public function index()
    {
        $leaders = Leader::orderBy('order')->paginate(10);
        return view('admin.leaders.index', compact('leaders'));
    }

    public function create()
    {
        return view('admin.leaders.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'biography' => 'nullable',
            'email' => 'nullable|email',
            'phone' => 'nullable|string|max:20',
            'order' => 'nullable|integer',
        ]);

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('leaders', 'public');
        }

        Leader::create($validated);

        return redirect()->route('admin.leaders.index')->with('success', 'Pimpinan berhasil ditambahkan');
    }

    public function show(Leader $leader)
    {
        return view('admin.leaders.show', compact('leader'));
    }

    public function edit(Leader $leader)
    {
        return view('admin.leaders.edit', compact('leader'));
    }

    public function update(Request $request, Leader $leader)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'biography' => 'nullable',
            'email' => 'nullable|email',
            'phone' => 'nullable|string|max:20',
            'order' => 'nullable|integer',
        ]);

        if ($request->hasFile('photo')) {
            if ($leader->photo) {
                Storage::disk('public')->delete($leader->photo);
            }
            $validated['photo'] = $request->file('photo')->store('leaders', 'public');
        }

        $leader->update($validated);

        return redirect()->route('admin.leaders.index')->with('success', 'Pimpinan berhasil diupdate');
    }

    public function destroy(Leader $leader)
    {
        if ($leader->photo) {
            Storage::disk('public')->delete($leader->photo);
        }

        $leader->delete();

        return redirect()->route('admin.leaders.index')->with('success', 'Pimpinan berhasil dihapus');
    }
}
