<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LicenseData extends Model
{
    // use HasFactory;
    protected $fillable = [
        'license_type_id',
        'license_category_id',
        'license_renewal_year',
        'company_name',
        'applicant_name',
        'email',
        'number',
        'license_number',
        'reference_number',
        'license_start_date',
        'license_expiry_date',
        'money_received',
        'profit',
        'other_message',
        'license_status',
    ];
    public function licenseType()
    {
        return $this->belongsTo(LicenseType::class);
    }

    public function licenseCategory()
    {
        return $this->belongsTo(LicenseCategory::class);
    }

}

