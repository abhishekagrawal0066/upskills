@extends('master')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">License /</span> Fssai Form</h4>
    @if (isset($license))
        <form action="{{ route('licenses.update', $license->id) }}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @else
        <form action="{{ route('licenses.store') }}" method="POST" enctype="multipart/form-data">
    @endif
    @csrf    
       {{-- <h5 class="card-header">HTML5 Inputs</h5> --}}
       <div class="pull-left">
        <h2>@if (isset($license)) Edit @else Add @endif Fssai License</h2>
    </div>
    
    {{-- {{ dd($fssai) }} --}}
    <div class="row">
        <div class="p-2">
            <a class="btn btn-secondary float-end" href={{ route('licenses.index') }} role="button">Back</a>
        </div>
            <div class="col-xl-6">
                <!-- HTML5 Inputs -->
                <div class="card mb-4">
                {{-- <h5 class="card-header">HTML5 Inputs</h5> --}}
                
                <div class="card-body">
                    <div class="mb-3">
                        {{-- {{$fssai->license_type}} --}}
                        <label for="license_type_id" class="form-label">License Type</label>
                        <select id="license_type_id" name="license_type_id" class="form-select">
                        <option value="">License Type Select</option>
                        @foreach ($licenseTypes as $licenseType)
                        <option value="{{ $licenseType->id }}" {{ (old('license_type_id') == $licenseType->id) ? 'selected' : '' }}>
                            {{ $licenseType->name }}
                        </option>
                        @endforeach
                        {{-- <option value="New License" {{old('license_type', (isset($fssai->license_type)) && $fssai->license_type == 'New License') ? "selected" : ''}}>New License</option>
                        <option value="Renewal"  {{old('license_type', (isset($fssai->license_type)) && $fssai->license_type == 'Renewal') ? "selected" : ''}}>Renewal</option> --}}
                        </select>
                        @error('license_type_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="license_category_id" class="form-label">License Category</label>
                        <select id="license_category_id" name="license_category_id" class="form-select">
                        <option value="">License Category</option>
                        @foreach ($licenseCategories as $licenseCategory)
                        <option value="{{ $licenseCategory->id }}" {{ (old('license_category_id') == $licenseCategory->id) ? 'selected' : '' }}>
                            {{ $licenseCategory->name }}
                        </option>
                        @endforeach
                        {{-- <option value="Railway License"{{ old('license_category',(isset($fssai->license_category)) && $fssai->license_category == 'Railway License') ? 'selected' : ''  }}>Railway License</option>
                        <option value="Shop License" {{ old('license_category',(isset($fssai->license_category)) && $fssai->license_category == 'Shop License') ? 'selected' : ''  }}>Shop License</option> --}}
                        </select>
                        @error('license_category_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="license_renewal_year" class="form-label">License Renewal Year</label>
                        <select id="license_renewal_year" name="license_renewal_year" class="form-select">
                            <option value="">License Renewal Year Select</option>
                            @for ($year = 1; $year <= 5; $year++)
                                <option value="{{ $year }}" {{ (old('license_renewal_year', $license->license_renewal_year ?? '') == $year) ? 'selected' : '' }}>
                                    {{ $year }}
                                </option>
                            @endfor
                        </select>
                        @error('license_renewal_year')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="mb-3 row">
                        <div class="col">
                        <label for="html5-taxt-input" class="col col-form-label">Company Name</label>
                        <input class="form-control" id="company_name" type="text" name="company_name" value="{{ old('company_name', $license->company_name ?? '') }}" id="html5-text-input" />
                    </div>
                    @error('company_name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>
                    <div class="mb-3 row">
                        <div class="col">
                        <label for="html5-taxt-input" class="col col-form-label">Applicant Name</label>
                        <input class="form-control" type="text" name="applicant_name" value="{{ old('applicant_name', $license->applicant_name ?? '') }}" id="html5-text-input" />
                        </div>
                        @error('applicant_name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3 row">
                        <div class="col">
                        <label for="html5-email-input" class="col-md-2 col-form-label">Email</label>
                        <input class="form-control" type="email" value="{{ old('email', $license->email ?? '') }}" name="email" id="html5-email-input" />
                        @error('email')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    </div>   
                    <div class="mb-3 row">
                        <div class="col">
                        <label for="html5-tel-input" class="col col-form-label">Phone No</label>
                        <input class="form-control" type="tel" value="{{ old('number', $license->number ?? '') }}" name="number" id="html5-tel-input" />
                        @error('number')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                    
                    </div>     
                </div>
                </div>
            </div>
            <div class="col-xl-6">
                <!-- HTML5 Inputs -->
                <div class="card mb-4">
                {{-- <h5 class="card-header">HTML5 Inputs</h5> --}}
                <div class="card-body">
                    
                    <div class="mb-3 row">
                        <div class="col">
                        <label for="html5-input" class="col col-form-label">License Number</label>
                        <input class="form-control" type="number" value="{{ old('license_number', $license->license_number ?? '') }}" name="license_number" id="html5-input" />
                        @error('license_number')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col">
                        <label for="html5-input" class="col col-form-label">Reference Number</label>
                        <input class="form-control" type="number" value="{{ old('reference_number', $license->reference_number ?? '') }}" name="reference_number" id="html5-input" />
                        @error('reference_number')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col">
                        <label for="html5-datetime-local-input" class="col col-form-label">License Start Date</label>
                        <input
                        class="form-control"
                        type="date"
                        value="{{ old('license_start_date', $license->license_start_date ?? '') }}"
                        name="license_start_date"
                        id="html5-datetime-local-input" />
                        @error('license_start_date')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col">
                        <label for="html5-datetime-local-input" class="col col-form-label">License Expiry Date</label>
                        <input
                        class="form-control"
                        type="date"
                        value="{{ old('license_expiry_date', $license->license_expiry_date ?? '') }}"
                        name="license_expiry_date"
                        id="html5-datetime-local-input" />
                        @error('license_expiry_date')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col">
                            <label for="html5-number-input" class="col col-form-label">Money Received</label>
                        <input class="form-control" type="number" value="{{ old('money_received', $license->money_received ?? '') }}" name="money_received" id="html5-number-input" />
                        </div>
                        @error('money_received')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3 row">
                        <div class="col">
                            <label for="html5-number-input" class="col col-form-label"> My Profit</label>
                        <input class="form-control" type="number" value="{{ old('profit', $license->profit ?? '') }}" name="profit" id="html5-number-input" />
                        </div>
                        @error('profit')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        {{-- {{$fssai->license_type}} --}}
                        <label for="defaultSelect" class="form-label">License Status</label>
                        <select id="license_status" name="license_status" class="form-select">
                            <option value="">License Status Select</option>
                            <option value="1" {{ old('license_status', (isset($license->license_status) && $license->license_status == '1')) ? 'selected' : '' }}>Completed</option>
                            <option value="0" {{ old('license_status', (isset($license->license_status) && $license->license_status == '0')) ? 'selected' : '' }}>Incomplete</option>
                        </select>
                        @error('license_status')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                </div>
            </div>
            <div class="col-xl-12">
                <div class="card-body">
                    <div class="mb-3 row">
                    <div class="">
                        <label for="exampleFormControlTextarea1" class="form-label">Other Message</label>
                        <textarea class="form-control" name="other_messaage" id="exampleFormControlTextarea1" rows="3">{{ old('other_messaage', $license->other_messaage ?? '') }}</textarea>
                    </div>
                    @error('other_messaage')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3 row">
                        <div class="d-grid gap-2">
                            <button class="btn btn-primary" type="submit" name="submit">Send</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
</div>
@endsection
