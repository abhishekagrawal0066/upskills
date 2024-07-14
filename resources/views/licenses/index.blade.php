@extends('master')

@section('content')
    
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">License /</span> Type List</h4>
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
        <div>
            <a class="btn btn-primary float-end" href={{ route('licenses.create')}} role="button">Add</a>
        </div>

      <div class="table-responsive text-nowrap" style="padding:5px">
        <table id="fssai" class="table table-striped" style="width:100%; border-collapse: collapse;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Type</th>
                    <th>Category</th>
                    <th>Renewal Year</th>
                    <th>Company Name</th>
                    <th>Applicant Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($licenses as $license)
                    <tr>
                        <td width='10%'>{{ ++$i }}</td>
                        <td>{{ $license->licenseType->name }}</td>
                        <td>{{ $license->licenseCategory->name }}</td>
                        <td>{{ $license->license_renewal_year }}</td>
                        <td>{{ $license->company_name }}</td>
                        <td>{{ $license->applicant_name }}</td>
                        <td>{{ $license->email }}</td>
                        <td width='10%'>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                  <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                  {{-- <a class="dropdown-item" href={{route('license_categories.show', $category->id)}}><i class="bx bx-show me-1"></i> View</a> --}}
                                  <a class="dropdown-item" href={{route('licenses.edit', $license->id)}}><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                  <form method="post" action={{route('licenses.destroy', $license->id)}}>
                                      @method('delete')
                                      @csrf
                                      <button type="submit" class=" dropdown-item"><i class="bx bx-trash me-1"></i> Delete</button>
                                  </form>
                                </div>
                              </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
      </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
      new DataTable('#fssai', {
      layout: {
          topStart: {
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
          }
        }
      });
    } );
    </script>
@endsection
