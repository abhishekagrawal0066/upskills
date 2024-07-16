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
           <h2>@if (isset($license)) Edit @else Add @endif Fssai License</h2>
            
            <div class="row">
                <div class="p-2">
                    <a class="btn btn-secondary float-end" href={{ route('licenses.index') }} role="button">Back</a>
                </div>
                <div class="col-xl-6">
                    <!-- HTML5 Inputs -->
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="license_type_id" class="form-label">License Type</label>
                                <select id="license_type_id" name="license_type_id" class="form-select">
                                    <option value="">License Type Select</option>
                                    @foreach ($licenseTypes as $type)
                                        <option value="{{ $type->id }}" {{ (old('license_type_id', $license->license_type_id ?? '') == $type->id) ? 'selected' : '' }}>
                                            {{ $type->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('license_type_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="license_category_id" class="form-label">License Category</label>
                                <select id="license_category_id" name="license_category_id" class="form-select">
                                    <option value="">License Category Select</option>
                                    @foreach ($licenseCategories as $category)
                                        <option value="{{ $category->id }}" {{ (old('license_category_id', $license->license_category_id ?? '') == $category->id) ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
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
                            <div class="mb-3">
                                <label for="company_name" class="form-label">Company Name</label>
                                <input class="form-control" id="company_name" type="text" name="company_name" value="{{ old('company_name', $license->company_name ?? '') }}" />
                                @error('company_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="applicant_name" class="form-label">Applicant Name</label>
                                <input class="form-control" type="text" name="applicant_name" value="{{ old('applicant_name', $license->applicant_name ?? '') }}" />
                                @error('applicant_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input class="form-control" type="email" value="{{ old('email', $license->email ?? '') }}" name="email" />
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="number" class="form-label">Phone No</label>
                                <input class="form-control" type="tel" value="{{ old('number', $license->number ?? '') }}" name="number" />
                                @error('number')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <!-- HTML5 Inputs -->
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="license_number" class="form-label">License Number</label>
                                <input class="form-control" type="number" value="{{ old('license_number', $license->license_number ?? '') }}" name="license_number" />
                                @error('license_number')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="reference_number" class="form-label">Reference Number</label>
                                <input class="form-control" type="number" value="{{ old('reference_number', $license->reference_number ?? '') }}" name="reference_number" />
                                @error('reference_number')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="license_start_date" class="form-label">License Start Date</label>
                                <input class="form-control" type="date" value="{{ old('license_start_date', $license->license_start_date ?? '') }}" name="license_start_date" />
                                @error('license_start_date')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="license_expiry_date" class="form-label">License Expiry Date</label>
                                <input class="form-control" type="date" value="{{ old('license_expiry_date', $license->license_expiry_date ?? '') }}" name="license_expiry_date" />
                                @error('license_expiry_date')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="money_received" class="form-label">Money Received</label>
                                <input class="form-control" type="number" value="{{ old('money_received', $license->money_received ?? '') }}" name="money_received" />
                                @error('money_received')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="profit" class="form-label">My Profit</label>
                                <input class="form-control" type="number" value="{{ old('profit', $license->profit ?? '') }}" name="profit" />
                                @error('profit')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="license_status" class="form-label">License Status</label>
                                <select id="license_status" name="license_status" class="form-select">
                                    <option value="">License Status Select</option>
                                    <option value="1" {{ old('license_status', (isset($license->license_status) && $license->license_status == '1')) ? 'selected' : '' }}>Completed</option>
                                    <option value="0" {{ old('license_status', (isset($license->license_status) && $license->license_status == '0')) ? 'selected' : '' }}>Incomplete</option>
                                </select>
                                @error('license_status')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="other_message" class="form-label">Other Message</label>
                                <textarea class="form-control" name="other_message">{{ old('other_message', $license->other_message ?? '') }}</textarea>
                                @error('other_message')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="card-body">
                        <div class="mb-3">
                            <div class="d-grid gap-2">
                                <button class="btn btn-primary" type="submit" name="submit">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
