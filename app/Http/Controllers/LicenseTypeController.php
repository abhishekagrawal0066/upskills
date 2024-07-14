<?php

namespace App\Http\Controllers;
use App\Models\LicenseType;
use Illuminate\Http\Request;

class LicenseTypeController extends Controller
{
    public function index()
    {
        $types = LicenseType::all();
        return view('license_types.index', compact('types'))->with('i');
    }

    public function create()
    {
        return view('license_types.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255||unique:license_types',
        ]);

        LicenseType::create($request->all());

        return redirect()->route('license_types.index')
            ->with('success', 'License type created successfully.');
    }

    public function show(LicenseType $licenseType)
    {
        return view('license_types.show', compact('licenseType'));
    }

    public function edit(LicenseType $licenseType)
    {
        return view('license_types.create', compact('licenseType'));
    }

    public function update(Request $request, LicenseType $licenseType)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $licenseType->update($request->all());

        return redirect()->route('license_types.index')
            ->with('success', 'License type updated successfully.');
    }

    public function destroy(LicenseType $licenseType)
    {
        $licenseType->delete();

        return redirect()->route('license_types.index')
            ->with('success', 'License type deleted successfully.');
    }
}