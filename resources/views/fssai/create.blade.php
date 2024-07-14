@extends('master')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">License /</span> Fssai Form</h4>
    @if (isset($fssai))
        <form action="{{ route('fssai.update', $fssai->id) }}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @else
        <form action="{{ route('fssai.store') }}" method="POST" enctype="multipart/form-data">
    @endif
    {{-- <form action="{{ route('fssai.store') }}" method="post"> --}}
    @csrf    
       {{-- <h5 class="card-header">HTML5 Inputs</h5> --}}
       <div class="pull-left">
        <h2>@if (isset($fssai)) Edit @else Add @endif Fssai License</h2>
    </div>
    
    {{-- {{ dd($fssai) }} --}}
    <div class="row">
        <div class="p-2">
            <a class="btn btn-secondary float-end" href={{ route('fssai.list') }} role="button">Back</a>
        </div>
            <div class="col-xl-6">
                <!-- HTML5 Inputs -->
                <div class="card mb-4">
                {{-- <h5 class="card-header">HTML5 Inputs</h5> --}}
                
                <div class="card-body">
                    <div class="mb-3">
                        {{-- {{$fssai->license_type}} --}}
                        <label for="defaultSelect" class="form-label">License Type</label>
                        <select id="defaultSelect" name="license_type" class="form-select">
                        <option value="">License Type Select</option>
                        <option value="New License" {{old('license_type', (isset($fssai->license_type)) && $fssai->license_type == 'New License') ? "selected" : ''}}>New License</option>
                        <option value="Renewal"  {{old('license_type', (isset($fssai->license_type)) && $fssai->license_type == 'Renewal') ? "selected" : ''}}>Renewal</option>
                        </select>
                        @error('license_type')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="defaultSelect" class="form-label">License Category</label>
                        <select id="defaultSelect" name="license_category" class="form-select">
                        <option value="">License Category</option>
                        <option value="Railway License"{{ old('license_category',(isset($fssai->license_category)) && $fssai->license_category == 'Railway License') ? 'selected' : ''  }}>Railway License</option>
                        <option value="Shop License" {{ old('license_category',(isset($fssai->license_category)) && $fssai->license_category == 'Shop License') ? 'selected' : ''  }}>Shop License</option>
                        </select>
                        @error('license_category')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="defaultSelect" class="form-label">License Renewal Year</label>
                        <select id="defaultSelect" name="license_renewal_year" class="form-select">
                        <option value="">License Renewal Year Select</option>
                        <option value="1" {{ old('license_renewal_year',(isset($fssai->license_renewal_year)) && $fssai->license_renewal_year =='1') ? 'selected' : ''  }}>1</option>
                        <option value="2" {{ old('license_renewal_year',(isset($fssai->license_renewal_year)) && $fssai->license_renewal_year =='2') ? 'selected' : ''  }}>2</option>
                        <option value="3" {{ old('license_renewal_year',(isset($fssai->license_renewal_year)) && $fssai->license_renewal_year =='3') ? 'selected' : ''  }}>3</option>
                        <option value="4" {{ old('license_renewal_year',(isset($fssai->license_renewal_year)) && $fssai->license_renewal_year =='4') ? 'selected' : ''  }}>4</option>
                        <option value="5" {{ old('license_renewal_year',(isset($fssai->license_renewal_year)) && $fssai->license_renewal_year =='5') ? 'selected' : ''  }}>5</option>
                        </select>
                        @error('license_renewal_year')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="mb-3 row">
                        <div class="col">
                        <label for="html5-taxt-input" class="col col-form-label">Company Name</label>
                        <input class="form-control" id="company_name" type="text" name="company_name" value="{{ old('company_name', $fssai->company_name ?? '') }}" id="html5-text-input" />
                    </div>
                    @error('company_name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>
                    <div class="mb-3 row">
                        <div class="col">
                        <label for="html5-taxt-input" class="col col-form-label">Applicant Name</label>
                        <input class="form-control" type="text" name="applicant_name" value="{{ old('applicant_name', $fssai->applicant_name ?? '') }}" id="html5-text-input" />
                        </div>
                        @error('applicant_name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3 row">
                        <div class="col">
                        <label for="html5-email-input" class="col-md-2 col-form-label">Email</label>
                        <input class="form-control" type="email" value="{{ old('email', $fssai->email ?? '') }}" name="email" id="html5-email-input" />
                        @error('email')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    </div>   
                    <div class="mb-3 row">
                        <div class="col">
                        <label for="html5-tel-input" class="col col-form-label">Phone No</label>
                        <input class="form-control" type="tel" value="{{ old('number', $fssai->number ?? '') }}" name="number" id="html5-tel-input" />
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
                        <input class="form-control" type="number" value="{{ old('license_number', $fssai->license_number ?? '') }}" name="license_number" id="html5-input" />
                        @error('license_number')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col">
                        <label for="html5-input" class="col col-form-label">Reference Number</label>
                        <input class="form-control" type="number" value="{{ old('reference_number', $fssai->reference_number ?? '') }}" name="reference_number" id="html5-input" />
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
                        value="{{ old('license_start_date', $fssai->license_start_date ?? '') }}"
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
                        value="{{ old('license_expiry_date', $fssai->license_expiry_date ?? '') }}"
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
                        <input class="form-control" type="number" value="{{ old('money_received', $fssai->money_received ?? '') }}" name="money_received" id="html5-number-input" />
                        </div>
                        @error('money_received')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3 row">
                        <div class="col">
                            <label for="html5-number-input" class="col col-form-label"> My Profit</label>
                        <input class="form-control" type="number" value="{{ old('profit', $fssai->profit ?? '') }}" name="profit" id="html5-number-input" />
                        </div>
                        @error('profit')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        {{-- {{$fssai->license_type}} --}}
                        <label for="defaultSelect" class="form-label">License Status</label>
                        <select id="defaultSelect" name="license_status" class="form-select">
                        <option value="">License Status Select</option>
                        <option value="1" {{old('license_status', (isset($fssai->license_status)) && $fssai->license_status == '1') ? "selected" : ''}}>Completed</option>
                        <option value="0"  {{old('license_status', (isset($fssai->license_status)) && $fssai->license_status == '0') ? "selected" : ''}}>Incomplete</option>
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
                        <textarea class="form-control" name="other_messaage" id="exampleFormControlTextarea1" rows="3">{{ old('other_messaage', $fssai->other_messaage ?? '') }}</textarea>
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
