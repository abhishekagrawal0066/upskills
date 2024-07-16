@component('mail::message')
# License Expiration Notification

Hello {{ $license->applicant_name }},

This is a notification that your license ({{ $license->license_number }}) is expiring on {{ $license->license_expiry_date->format('Y-m-d') }}.

Please take necessary action to renew your license.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
