<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Research;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ResearchImport;



class ResearchController extends Controller
{
    public function index()
    {
        $researches = Research::latest()->paginate(10);
        return view('admin.researches.index', compact('researches'));
    }

    public function create()
    {
        return view('admin.researches.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nidn' => 'nullable|string|max:20',
            'researcher' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'year' => 'required|integer|min:2000|max:2100',
            'scheme' => 'required|string|max:255',
        ]);

        // SET DEFAULT
        $validated['type']   = 'internal';
        $validated['status'] = 'ongoing';

        Research::create($validated);

        return redirect()
            ->route('admin.researches.index')
            ->with('success', 'Penelitian berhasil ditambahkan');
    }
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls'
        ]);

        Excel::import(new ResearchImport, $request->file('file'));

        return redirect()
            ->route('admin.researches.index')
            ->with('success', 'Data penelitian berhasil diimport');
    }

    public function edit(Research $research)
    {
        return view('admin.researches.edit', compact('research'));
    }

    public function update(Request $request, Research $research)
    {
        $validated = $request->validate([
            'nidn' => 'nullable|string|max:20',
            'researcher' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'year' => 'required|integer|min:2000|max:2100',
            'scheme' => 'required|string|max:255',
        ]);

        $research->update($validated);

        return redirect()
            ->route('admin.researches.index')
            ->with('success', 'Penelitian berhasil diperbarui');
    }

    public function show(Research $research)
    {
        return view('admin.researches.show', compact('research'));
    }

    public function destroy(Research $research)
    {
        $research->delete();

        return redirect()
            ->route('admin.researches.index')
            ->with('success', 'Penelitian berhasil dihapus');
    }
}
