<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BudgetRealization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BudgetRealizationController extends Controller
{
    public function index()
    {
        $budgets = BudgetRealization::latest()->paginate(10);
        return view('admin.budget-realizations.index', compact('budgets'));
    }

    public function create()
    {
        return view('admin.budget-realizations.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'year' => 'required|integer|min:2000|max:2100',
            'title' => 'required|string|max:255',
            'budget_amount' => 'required|numeric|min:0',
            'realization_amount' => 'required|numeric|min:0',
            'description' => 'nullable',
            'document' => 'nullable|file|mimes:pdf,doc,docx|max:5120',
        ]);

        // Hitung persentase
        $validated['percentage'] = ($validated['realization_amount'] / $validated['budget_amount']) * 100;

        if ($request->hasFile('document')) {
            $validated['document'] = $request->file('document')->store('budget-documents', 'public');
        }

        BudgetRealization::create($validated);

        return redirect()->route('admin.budget-realizations.index')->with('success', 'Realisasi Anggaran berhasil ditambahkan');
    }

    public function show(BudgetRealization $budgetRealization)
    {
        return view('admin.budget-realizations.show', compact('budgetRealization'));
    }

    public function edit(BudgetRealization $budgetRealization)
    {
        return view('admin.budget-realizations.edit', compact('budgetRealization'));
    }

    public function update(Request $request, BudgetRealization $budgetRealization)
    {
        $validated = $request->validate([
            'year' => 'required|integer|min:2000|max:2100',
            'title' => 'required|string|max:255',
            'budget_amount' => 'required|numeric|min:0',
            'realization_amount' => 'required|numeric|min:0',
            'description' => 'nullable',
            'document' => 'nullable|file|mimes:pdf,doc,docx|max:5120',
        ]);

        // Hitung persentase
        $validated['percentage'] = ($validated['realization_amount'] / $validated['budget_amount']) * 100;

        if ($request->hasFile('document')) {
            if ($budgetRealization->document) {
                Storage::disk('public')->delete($budgetRealization->document);
            }
            $validated['document'] = $request->file('document')->store('budget-documents', 'public');
        }

        $budgetRealization->update($validated);

        return redirect()->route('admin.budget-realizations.index')->with('success', 'Realisasi Anggaran berhasil diupdate');
    }

    public function destroy(BudgetRealization $budgetRealization)
    {
        if ($budgetRealization->document) {
            Storage::disk('public')->delete($budgetRealization->document);
        }

        $budgetRealization->delete();

        return redirect()->route('admin.budget-realizations.index')->with('success', 'Realisasi Anggaran berhasil dihapus');
    }
}
