<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LicenseType extends Model
{
    protected $fillable = ['name'];

    public function licenseData()
    {
        //If license_data belongs to a specific license_type:
        return $this->hasMany(LicenseData::class);
    }
}
