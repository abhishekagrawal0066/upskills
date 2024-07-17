@extends('master')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">License /</span> Fssai Form</h4>
    
        <form action="{{ route('xml.xmlstore')}}" method="POST" enctype="multipart/form-data">
            @csrf    
           <h2>Add Fssai License</h2>
            
            <div class="row">
                <div class="p-2">
                    <a class="btn btn-secondary float-end" href={{ route('licenses.index') }} role="button">Back</a>
                </div>
                
                <div class="col-xl-12">
                    <!-- HTML5 Inputs -->
                    <div class="card mb-4">
                        <div class="card-body">
                            
                            <div class="mb-3">
                                <label for="xml_file" class="form-label">XML File Upload</label>
                                <input  class="form-control" type="file" name="xml_file" required>
                                @error('xml_file')
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
