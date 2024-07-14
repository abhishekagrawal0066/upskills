<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\LicenseCategory;


class LicenseCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = LicenseCategory::all();
        return view('license_categories.index', compact('categories'))->with('i');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('license_categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:license_categories',
        ]);
        LicenseCategory::create($request->all());
        return redirect()->route('license_categories.index')
        ->with('success', 'License category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(LicenseCategory $licenseCategory)
    {
        return view('license_categories.show', compact('licenseCategory'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LicenseCategory $licenseCategory)
    {
        return view('license_categories.create', compact('licenseCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LicenseCategory $licenseCategory)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $licenseCategory->update($request->all());
        return redirect()->route('license_categories.index')
        ->with('success', 'License category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LicenseCategory $licenseCategory)
    {
        $licenseCategory->delete();

        return redirect()->route('license_categories.index')
            ->with('success', 'License category deleted successfully.');
    }
}
