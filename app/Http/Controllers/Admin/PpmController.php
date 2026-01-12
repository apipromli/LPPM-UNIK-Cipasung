<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ppm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PpmController extends Controller
{
    public function index()
    {
        $ppms = Ppm::latest()->paginate(10);
        return view('admin.ppm.index', compact('ppms'));
    }

    public function create()
    {
        return view('admin.ppm.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nidn' => 'nullable|string|max:20',
            'executor' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'year' => 'required|integer|min:2000|max:2100',
            'scheme' => 'required|in:Ibp,ITGbM,Lainnya',
            'location' => 'required|string|max:255',
            'description' => 'nullable',
            'document' => 'nullable|file|mimes:pdf,doc,docx|max:10240',
            'status' => 'required|in:planned,ongoing,completed',
        ]);

        if ($request->hasFile('document')) {
            $validated['document'] = $request->file('document')
                ->store('ppm-documents', 'public');
        }

        Ppm::create($validated);

        return redirect()
            ->route('admin.ppm.index')
            ->with('success', 'Data PPM berhasil ditambahkan');
    }

    public function show(Ppm $ppm)
    {
        return view('admin.ppm.show', compact('ppm'));
    }

    public function edit(Ppm $ppm)
    {
        return view('admin.ppm.edit', compact('ppm'));
    }

    public function update(Request $request, Ppm $ppm)
    {
        $validated = $request->validate([
            'nidn' => 'nullable|string|max:20',
            'executor' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'year' => 'required|integer|min:2000|max:2100',
            'scheme' => 'required|in:Ibp,ITGbM,Lainnya',
            'location' => 'required|string|max:255',
            'description' => 'nullable',
            'document' => 'nullable|file|mimes:pdf,doc,docx|max:10240',
            'status' => 'required|in:planned,ongoing,completed',
        ]);

        if ($request->hasFile('document')) {
            if ($ppm->document) {
                Storage::disk('public')->delete($ppm->document);
            }

            $validated['document'] = $request->file('document')
                ->store('ppm-documents', 'public');
        }

        $ppm->update($validated);

        return redirect()
            ->route('admin.ppm.index')
            ->with('success', 'Data PPM berhasil diupdate');
    }

    public function destroy(Ppm $ppm)
    {
        if ($ppm->document) {
            Storage::disk('public')->delete($ppm->document);
        }

        $ppm->delete();

        return redirect()
            ->route('admin.ppm.index')
            ->with('success', 'Data PPM berhasil dihapus');
    }
}
