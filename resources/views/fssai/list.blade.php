@extends('master')

@section('content')
    
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">License /</span> Fssai list</h4>
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
            <a class="btn btn-primary float-end" href="" role="button">Add</a>
        </div>

      <div class="table-responsive text-nowrap" style="padding:5px">
        <table id="fssai" class="table table-striped" style="width:100%; border-collapse: collapse;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Applicant Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($licenseData as $data)
                    <tr>
                        <td>{{ $data->id }}</td>
                        <td>{{ $data->applicant_name }}</td>
                        <td>{{ $data->email }}</td>
                        <td>
                            <a href="{{ route('license_data.show', $data->id) }}">View</a>
                            <a href="{{ route('license_data.edit', $data->id) }}">Edit</a>
                            <form action="{{ route('license_data.destroy', $data->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
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
