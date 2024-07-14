@extends('master')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">License /</span> Fssai Form</h4>
       <div class="pull-left">
        <h2>Add Fssai License</h2>
    </div>
    <div x-data="{ showMessage: true }" x-show="showMessage" x-init="setTimeout(() => showMessage = false, 2000)">
        @if(Session::has('success'))
            <div class="alert alert-success bg-green-300">
                {{ Session::get('success') }}
                @php
                    Session::forget('success');
                @endphp
            </div>
        @else
        <div class="alert alert-error bg-green-300">
            {{ Session::get('error') }}
            @php
                Session::forget('error');
            @endphp
        </div>
         @endif
    </div>
    {{-- {{ dd($fssai) }} --}}
    <div class="row">
        <div class="p-2">
            <a class="btn btn-secondary float-end" href={{ route('dashboard') }} role="button">Back</a>
        </div>
        <div class="col-xl-12">
            <!-- HTML5 Inputs -->
            <div class="card  p-2">
                {{-- <form method="POST" action="{{ route('profile.image.update', $user->id) }}" enctype="multipart/form-data"> --}}
                <form action="{{ route('fssai.csv.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf 
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Impode CSV</label>
                        <input class="form-control" type="file" name="csv" id="formFile">
                        @error('cvv')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                      <div class="d-grid gap-2">
                        <button class="btn btn-primary" type="submit" name="submit">Send</button>
                    </div>
                </form>
            </div>
        </div>
</div>
@endsection
