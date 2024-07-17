<?php

namespace App\Http\Controllers;
use App\Models\LicenseData;
use App\Models\LicenseType;
use App\Models\LicenseCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LicenseDataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $licenses = LicenseData::all();
        return view('licenses.index', compact('licenses'))->with('i');
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
        LicenseData::create($request->all());

        return redirect()->route('licenses.index')
            ->with('success', 'License created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(LicenseData $license)
    {
        return view('licenses.show', compact('license'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LicenseData $license)
    {
        $licenseTypes = LicenseType::all();
        $licenseCategories = LicenseCategory::all();
        return view('licenses.create', compact('license', 'licenseTypes', 'licenseCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LicenseData $license)
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
    public function destroy(LicenseData $license)
    {
        $license->delete();

        return redirect()->route('licenses.index')
            ->with('success', 'License deleted successfully.');
    }
    public function listExpiring()
    {
        // Get licenses expiring within 30 days (adjust as needed)
        $licenses = LicenseData::whereDate('license_expiry_date', '>=', Carbon::now())
            ->whereDate('license_expiry_date', '<=', Carbon::now()->addDays(30))
            ->get();
        return view('licenses.expiring')->with('licenses', $licenses)->with('i');
    }
    public function upload()
    {
        return view('xml.index');
    }
    public function uploadXML(Request $request)
    {
        // Validate the uploaded file
        $request->validate([
            'xml_file' => 'required|file|mimes:xml',
        ]);

        // Retrieve the uploaded file
        $file = $request->file('xml_file');
        $xmlContent = file_get_contents($file);

        // Parse the XML content
        $xml = simplexml_load_string($xmlContent);
        $json = json_encode($xml);
        $data = json_decode($json, true);
        // Process the data and update the database
        foreach ($data['your_data_key'] as $item) {
            // Assuming 'your_data_key' is the key where your data resides in the XML
            // Update your database with the parsed data
            YourModel::updateOrCreate(
                ['identifier' => $item['identifier']], // Replace with your unique identifier field
                ['field1' => $item['field1'], 'field2' => $item['field2']] // Replace with your actual fields
            );
        }

        return back()->with('success', 'XML file uploaded and data updated successfully.');
    }
}
