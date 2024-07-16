<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\LicenseData;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\LicenseExpirationNotification as LicenseExpirationNotificationMail;

class LicenseExpirationNotification extends Command
{
    protected $signature = 'licenses:notify-expiration';
    protected $description = 'Send notifications for licenses nearing expiration';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // Get licenses expiring within 30 days (adjust as needed)
        $licenses = LicenseData::whereDate('license_expiry_date', '>=', Carbon::now())
            ->whereDate('license_expiry_date', '<=', Carbon::now()->addDays(30))
            ->get();

        foreach ($licenses as $license) {
            // Example: Send email notification
            Mail::to($license->email)->send(new LicenseExpirationNotificationMail($license));
        }

        $this->info('License expiration notifications sent successfully.');
    }
}
