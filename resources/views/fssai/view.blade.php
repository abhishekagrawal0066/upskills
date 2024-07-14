@extends('master')

@section('content')
    
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">License /</span> Fssai View</h4>
    <div x-data="{ showMessage: true }" x-show="showMessage" x-init="setTimeout(() => showMessage = false, 2000)">
        @if(Session::has('success'))
            <div class="alert alert-success bg-green-300">
                {{ Session::get('success') }}
                @php
                    Session::forget('success');
                @endphp
            </div>
            
         @endif
    </div>
    <!-- Basic Bootstrap Table -->
    <div class="card" style="padding:5px">
        <div class="p-2">
            <a class="btn btn-secondary float-end" href={{ route('fssai.list') }} role="button">Back</a>
        </div>

      {{-- <div class="tdasdsadasdasable-responsive text-nowrap" style="padding:5px"> --}}
        <div class="row">
            <div class="col">
                <div class="pull-left">
                    <h3 class="p-2">View Customer Fssai License Details</h3>
                </div>

                <div class="col-xl-12">
                    <div class="card-body">
                        <ul class="list-group list-group-horizontal p-3">
                            <li class="list-group-item col-xl-6 p-3">Company Name</li>
                            <li class="list-group-item col-xl-6 p-3">{{ $fssai->company_name }}</li>
                        </ul>
                        <ul class="list-group list-group-horizontal p-3">
                            <li class="list-group-item col-xl-6 p-3">License Type</li>
                            <li class="list-group-item col-xl-6 p-3">{{ $fssai->license_type }}</li>
                        </ul>
                        <ul class="list-group list-group-horizontal p-3">
                            <li class="list-group-item col-xl-6 p-3">Applicant Name</li>
                            <li class="list-group-item col-xl-6 p-3">{{ $fssai->applicant_name }}</li>
                        </ul>
                        <ul class="list-group list-group-horizontal p-3">
                            <li class="list-group-item col-xl-6 p-3">Phone No</li>
                            <li class="list-group-item col-xl-6 p-3">{{ $fssai->number }}</li>
                        </ul>
                        <ul class="list-group list-group-horizontal p-3">
                            <li class="list-group-item col-xl-6 p-3">Email</li>
                            <li class="list-group-item col-xl-6 p-3">{{ $fssai->email }}</li>
                        </ul>
                        <ul class="list-group list-group-horizontal p-3">
                            <li class="list-group-item col-xl-6 p-3">License Number</li>
                            <li class="list-group-item col-xl-6 p-3">{{ $fssai->license_number }}</li>
                        </ul>
                        <ul class="list-group list-group-horizontal p-3">
                            <li class="list-group-item col-xl-6 p-3">Reference Number</li>
                            <li class="list-group-item col-xl-6 p-3">{{ $fssai->reference_number }}</li>
                        </ul>
                        <ul class="list-group list-group-horizontal p-3">
                            <li class="list-group-item col-xl-6 p-3">License Category</li>
                            <li class="list-group-item col-xl-6 p-3">{{ $fssai->license_category }}</li>
                        </ul>
                        <ul class="list-group list-group-horizontal p-3">
                            <li class="list-group-item col-xl-6 p-3">License Renewal Year</li>
                            <li class="list-group-item col-xl-6 p-3">{{ $fssai->license_renewal_year }} Years</li>
                        </ul>
                        <ul class="list-group list-group-horizontal p-3">
                            <li class="list-group-item col-xl-6 p-3">License Start Date</li>
                            <li class="list-group-item col-xl-6 p-3">{{ $fssai->license_start_date }}</li>
                        </ul>
                        <ul class="list-group list-group-horizontal p-3">
                            <li class="list-group-item col-xl-6 p-3">License Expiry Date</li>
                            <li class="list-group-item col-xl-6 p-3">{{ $fssai->license_expiry_date }}</li>
                        </ul>
                        <ul class="list-group list-group-horizontal p-3">
                            <li class="list-group-item col-xl-6 p-3">Money Received</li>
                            <li class="list-group-item col-xl-6 p-3">{{ $fssai->money_received }}</li>
                        </ul>
                        <ul class="list-group list-group-horizontal p-3">
                            <li class="list-group-item col-xl-6 p-3">License Status</li>
                            <li class="list-group-item col-xl-6 p-3 text-success">{{  $fssai->license_status == 1 ? "Completed" : "Incomplete" }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
</div>
@endsection
