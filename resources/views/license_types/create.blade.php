@extends('master')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">License /</span> Type Form</h4>
    @if (isset($licenseType))
    <form method="POST" action="{{ route('license_types.update', $licenseType->id) }}">
        @method('PUT')
        @csrf
    
    @else
        <form method="POST" action="{{ route('license_types.store') }}">
        @csrf
    @endif
    {{-- <form action="{{ route('fssai.store') }}" method="post"> --}}
    @csrf    
       {{-- <h5 class="card-header">HTML5 Inputs</h5> --}}
       <div class="pull-left">
        <h2>@if (isset($licenseType)) Edit @else Add @endif License Type</h2>
    </div>
    
    {{-- {{ dd($fssai) }} --}}
    <div class="row">
        <div class="p-2">
            <a class="btn btn-secondary float-end" href={{ route('license_types.index') }} role="button">Back</a>
        </div>
            <div class="col-xl-12">
                <!-- HTML5 Inputs -->
                <div class="card mb-8">
                    {{-- <h5 class="card-header">HTML5 Inputs</h5> --}}
                
                    <div class="card-body">
                        <div class="mb-6 row">
                            <div class="col">
                                <label for="html5-taxt-input" class="col col-form-label">Name</label>
                                <input class="form-control" id="name" type="text" name="name" value="{{ old('name', $licenseType->name ?? '') }}" id="html5-text-input" />
                            </div>
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="mb-6 row p-5">
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary" type="submit" name="submit">Send</button>
                    </div>
                </div>
            </div>
        </form>
</div>
@endsection
