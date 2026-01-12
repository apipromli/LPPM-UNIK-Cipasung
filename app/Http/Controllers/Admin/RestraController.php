<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Restra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RestraController extends Controller
{
    public function index()
    {
        $restras = Restra::latest()->paginate(10);
        return view('admin.restras.index', compact('restras'));
    }

    public function create()
    {
        return view('admin.restras.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'start_year' => 'required|integer|min:2000|max:2100',
            'end_year' => 'required|integer|min:2000|max:2100|gte:start_year',
            'description' => 'nullable',
            'document' => 'required|file|mimes:pdf,doc,docx|max:10240',
        ]);

        if ($request->hasFile('document')) {
            $validated['document'] = $request->file('document')->store('restra-documents', 'public');
        }

        Restra::create($validated);

        return redirect()->route('admin.restras.index')->with('success', 'Restra berhasil ditambahkan');
    }

    public function show(Restra $restra)
    {
        return view('admin.restras.show', compact('restra'));
    }

    public function edit(Restra $restra)
    {
        return view('admin.restras.edit', compact('restra'));
    }

    public function update(Request $request, Restra $restra)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'start_year' => 'required|integer|min:2000|max:2100',
            'end_year' => 'required|integer|min:2000|max:2100|gte:start_year',
            'description' => 'nullable',
            'document' => 'nullable|file|mimes:pdf,doc,docx|max:10240',
        ]);

        if ($request->hasFile('document')) {
            if ($restra->document) {
                Storage::disk('public')->delete($restra->document);
            }
            $validated['document'] = $request->file('document')->store('restra-documents', 'public');
        }

        $restra->update($validated);

        return redirect()->route('admin.restras.index')->with('success', 'Restra berhasil diupdate');
    }

    public function destroy(Restra $restra)
    {
        if ($restra->document) {
            Storage::disk('public')->delete($restra->document);
        }

        $restra->delete();

        return redirect()->route('admin.restras.index')->with('success', 'Restra berhasil dihapus');
    }
}
