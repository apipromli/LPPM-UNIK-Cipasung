<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StaffController extends Controller
{
    public function index()
    {
        $staff = Staff::orderBy('order')->paginate(10);
        return view('admin.staff.index', compact('staff'));
    }

    public function create()
    {
        return view('admin.staff.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'email' => 'nullable|email',
            'phone' => 'nullable|string|max:20',
            'order' => 'nullable|integer',
        ]);

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('staff', 'public');
        }

        Staff::create($validated);

        return redirect()->route('admin.staff.index')->with('success', 'Staff berhasil ditambahkan');
    }

    public function show(Staff $staff)
    {
        return view('admin.staff.show', compact('staff'));
    }

    public function edit(Staff $staff)
    {
        return view('admin.staff.edit', compact('staff'));
    }

    public function update(Request $request, Staff $staff)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'email' => 'nullable|email',
            'phone' => 'nullable|string|max:20',
            'order' => 'nullable|integer',
        ]);
        if ($request->hasFile('photo')) {
            if ($staff->photo) {
                Storage::disk('public')->delete($staff->photo);
            }
            $validated['photo'] = $request->file('photo')->store('staff', 'public');
        }

        $staff->update($validated);

        return redirect()->route('admin.staff.index')->with('success', 'Staff berhasil diupdate');
    }

    public function destroy(Staff $staff)
    {
        if ($staff->photo) {
            Storage::disk('public')->delete($staff->photo);
        }

        $staff->delete();

        return redirect()->route('admin.staff.index')->with('success', 'Staff berhasil dihapus');
    }
}
