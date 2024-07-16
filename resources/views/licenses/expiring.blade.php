@extends('master')

@section('content')
    
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">License /</span> Expiring List</h4>
    <!-- Basic Bootstrap Table -->
    <div class="card" style="padding:5px">

      <div class="table-responsive text-nowrap" style="padding:5px">
        <table id="fssai" class="table table-striped" style="width:100%; border-collapse: collapse;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Company Name</th>
                    <th>Applicant Name</th>
                    <th>License Number</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($licenses as $license)
                    <tr>
                        <td width='10%'>{{ ++$i }}</td>
                        <td>{{ $license->company_name }}</td>
                        <td>{{ $license->applicant_name }}</td>
                        <td>{{ $license->license_number}}</td>
                        <td>{{ $license->license_start_date }}</td>
                        <td>{{ $license->license_expiry_date }}</td>            
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
