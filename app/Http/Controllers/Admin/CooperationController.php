<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cooperation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CooperationController extends Controller
{
    public function index()
    {
        $cooperations = Cooperation::latest()->paginate(10);
        return view('admin.cooperations.index', compact('cooperations'));
    }

    public function create()
    {
        return view('admin.cooperations.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'partner_name' => 'required|string|max:255',
            'cooperation_type' => 'required|string|max:255',
            'description' => 'nullable',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after:start_date',
            'document' => 'nullable|file|mimes:pdf,doc,docx|max:10240',
            'status' => 'required|in:active,expired,terminated',
        ]);

        if ($request->hasFile('document')) {
            $validated['document'] = $request->file('document')->store('cooperation-documents', 'public');
        }

        Cooperation::create($validated);

        return redirect()->route('admin.cooperations.index')->with('success', 'Kerjasama berhasil ditambahkan');
    }

    public function show(Cooperation $cooperation)
    {
        return view('admin.cooperations.show', compact('cooperation'));
    }

    public function edit(Cooperation $cooperation)
    {
        return view('admin.cooperations.edit', compact('cooperation'));
    }

    public function update(Request $request, Cooperation $cooperation)
    {
        $validated = $request->validate([
            'partner_name' => 'required|string|max:255',
            'cooperation_type' => 'required|string|max:255',
            'description' => 'nullable',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after:start_date',
            'document' => 'nullable|file|mimes:pdf,doc,docx|max:10240',
            'status' => 'required|in:active,expired,terminated',
        ]);

        if ($request->hasFile('document')) {
            if ($cooperation->document) {
                Storage::disk('public')->delete($cooperation->document);
            }
            $validated['document'] = $request->file('document')->store('cooperation-documents', 'public');
        }

        $cooperation->update($validated);

        return redirect()->route('admin.cooperations.index')->with('success', 'Kerjasama berhasil diupdate');
    }

    public function destroy(Cooperation $cooperation)
    {
        if ($cooperation->document) {
            Storage::disk('public')->delete($cooperation->document);
        }

        $cooperation->delete();

        return redirect()->route('admin.cooperations.index')->with('success', 'Kerjasama berhasil dihapus');
    }
}
