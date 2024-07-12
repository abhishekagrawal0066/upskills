@extends('master')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
       {{-- <h5 class="card-header">HTML5 Inputs</h5> --}}
    <div class="pull-left">
        <h2>Account / Notifications</h2>
    </div>
    <div class="row">
        
        <div class="col-xl-12">
            <!-- HTML5 Inputs -->
            <div class="card  p-2">
                @foreach (auth()->user()->unreadNotifications as $notification)
                    <div>
                        <div class="alert alert-primary" role="alert">
                            {{-- "Dear {{  $notification->company_name }}, your License {{  $notification->license_number }} is expiring soon. Renew now to stay compliant." --}}
                            Dear {{  $notification->data['applicant_name'] }}, your {{ $notification->data['company_name']}} license <a href={{route('fssai.view',$notification->data['id'])}} class="alert-link">(License Number: {{  $notification->data['license_number'] }}) </a>is expiring on {{date("d-m-Y", strtotime($notification->data['license_expiry_date'])) }}.Renew now to continue using our services hassle-free. 

                        </div>
                    </div>
                    {{-- {{  $notification->markAsRead();  }} --}}

                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

{{-- <h1>Notifications</h1>

@foreach ($findExpiredfssai as $notification)
    <div>
        <strong>{{ $notification->license_type }}</strong>
        <p>{{ $notification->license_category }}</p>
    </div>

@endforeach --}}
{{-- "id" => 4
"license_type" => "New License"
"license_category" => "Railway License"
"license_renewal_year" => "2"
"company_name" => "Abhishek"
"applicant_name" => "Demo"
"email" => "abhishekagrawal00066@gmail.com"
"number" => "9999999999"
"license_number" => "4444444444444444"
"reference_number" => "222222222222222222"
"license_start_date" => "2024-02-03"
"license_expiry_date" => "2024-03-01"
"money_received" => "555"
"other_messaage" => "Demo1223"
"created_at" => "2024-02-28 09:25:03"
"updated_at" => "2024-02-28 09:25:03"
"license_status" => 0
] --}}
