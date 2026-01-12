<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Performance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PerformanceController extends Controller
{
    public function index()
    {
        $performances = Performance::latest()->paginate(10);
        return view('admin.performances.index', compact('performances'));
    }

    public function create()
    {
        return view('admin.performances.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'year' => 'required|integer|min:2000|max:2100',
            'title' => 'required|string|max:255',
            'description' => 'required',
            'document' => 'nullable|file|mimes:pdf,doc,docx|max:10240',
            'metrics' => 'nullable|json',
        ]);

        if ($request->hasFile('document')) {
            $validated['document'] = $request->file('document')->store('performance-documents', 'public');
        }

        Performance::create($validated);

        return redirect()->route('admin.performances.index')->with('success', 'Kinerja berhasil ditambahkan');
    }

    public function show(Performance $performance)
    {
        return view('admin.performances.show', compact('performance'));
    }

    public function edit(Performance $performance)
    {
        return view('admin.performances.edit', compact('performance'));
    }

    public function update(Request $request, Performance $performance)
    {
        $validated = $request->validate([
            'year' => 'required|integer|min:2000|max:2100',
            'title' => 'required|string|max:255',
            'description' => 'required',
            'document' => 'nullable|file|mimes:pdf,doc,docx|max:10240',
            'metrics' => 'nullable|json',
        ]);

        if ($request->hasFile('document')) {
            if ($performance->document) {
                Storage::disk('public')->delete($performance->document);
            }
            $validated['document'] = $request->file('document')->store('performance-documents', 'public');
        }

        $performance->update($validated);

        return redirect()->route('admin.performances.index')->with('success', 'Kinerja berhasil diupdate');
    }

    public function destroy(Performance $performance)
    {
        if ($performance->document) {
            Storage::disk('public')->delete($performance->document);
        }

        $performance->delete();

        return redirect()->route('admin.performances.index')->with('success', 'Kinerja berhasil dihapus');
    }
}
