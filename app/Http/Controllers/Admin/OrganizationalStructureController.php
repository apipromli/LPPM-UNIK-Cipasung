<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrganizationalStructure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OrganizationalStructureController extends Controller
{
    public function index()
    {
        $structures = OrganizationalStructure::latest()->paginate(10);
        return view('admin.organizational-structure.index', compact('structures'));
    }

    public function create()
    {
        return view('admin.organizational-structure.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'description' => 'nullable',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('organizational-structures', 'public');
        }

        OrganizationalStructure::create($validated);

        return redirect()->route('admin.organizational-structures.index')->with('success', 'Struktur Organisasi berhasil ditambahkan');
    }

    public function show(OrganizationalStructure $organizationalStructure)
    {
        return view('admin.organizational-structure.show', compact('organizationalStructure'));
    }

    public function edit(OrganizationalStructure $organizationalStructure)
    {
        return view('admin.organizational-structure.edit', compact('organizationalStructure'));
    }

    public function update(Request $request, OrganizationalStructure $organizationalStructure)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'description' => 'nullable',
        ]);

        if ($request->hasFile('image')) {
            if ($organizationalStructure->image) {
                Storage::disk('public')->delete($organizationalStructure->image);
            }
            $validated['image'] = $request->file('image')->store('organizational-structures', 'public');
        }

        $organizationalStructure->update($validated);

        return redirect()->route('admin.organizational-structures.index')->with('success', 'Struktur Organisasi berhasil diupdate');
    }

    public function destroy(OrganizationalStructure $organizationalStructure)
    {
        if ($organizationalStructure->image) {
            Storage::disk('public')->delete($organizationalStructure->image);
        }

        $organizationalStructure->delete();

        return redirect()->route('admin.organizational-structures.index')->with('success', 'Struktur Organisasi berhasil dihapus');
    }
}
