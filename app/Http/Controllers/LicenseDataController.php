<?php

namespace App\Http\Controllers;
use App\Models\LicenseData;
use App\Models\LicenseType;
use App\Models\LicenseCategory;

use Illuminate\Http\Request;

class LicenseDataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $licenses = LicenseData::all();
        return view('licenses.index', compact('licenses'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $licenseTypes = LicenseType::all();
        $licenseCategories = LicenseCategory::all();
        return view('licenses.create', compact('licenseTypes', 'licenseCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'license_type_id' => 'required|exists:license_types,id',
            'license_category_id' => 'required|exists:license_categories,id',
            'license_renewal_year' => 'required|integer',
            'company_name' => 'required|string|max:255',
            'applicant_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'number' => 'required|string|max:255',
            'license_number' => 'required|string|max:255',
            'reference_number' => 'required|string|max:255',
            'license_start_date' => 'required|date',
            'license_expiry_date' => 'required|date',
            'money_received' => 'required|numeric',
            'profit' => 'required|numeric',
            'other_message' => 'nullable|string',
            'license_status' => 'required|string|max:255',
        ]);

        License::create($request->all());

        return redirect()->route('licenses.index')
            ->with('success', 'License created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(License $license)
    {
        return view('licenses.show', compact('license'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(License $license)
    {
        $licenseTypes = LicenseType::all();
        $licenseCategories = LicenseCategory::all();
        return view('licenses.edit', compact('license', 'licenseTypes', 'licenseCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, License $license)
    {
        $request->validate([
            'license_type_id' => 'required|exists:license_types,id',
            'license_category_id' => 'required|exists:license_categories,id',
            'license_renewal_year' => 'required|integer',
            'company_name' => 'required|string|max:255',
            'applicant_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'number' => 'required|string|max:255',
            'license_number' => 'required|string|max:255',
            'reference_number' => 'required|string|max:255',
            'license_start_date' => 'required|date',
            'license_expiry_date' => 'required|date',
            'money_received' => 'required|numeric',
            'profit' => 'required|numeric',
            'other_message' => 'nullable|string',
            'license_status' => 'required|string|max:255',
        ]);

        $license->update($request->all());

        return redirect()->route('licenses.index')
            ->with('success', 'License updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(License $license)
    {
        $license->delete();

        return redirect()->route('licenses.index')
            ->with('success', 'License deleted successfully.');
    }
}
