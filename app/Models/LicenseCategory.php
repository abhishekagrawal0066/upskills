<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LicenseCategory extends Model
{
    // use HasFactory;
    protected $fillable = ['name'];

    public function licenseData()
    {
      //  If license_data can have multiple license_categories:
        return $this->hasMany(LicenseData::class);
    }
}
