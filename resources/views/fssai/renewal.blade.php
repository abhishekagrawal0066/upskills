@extends('master')

@section('content')
    
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">License /</span> Renewal</h4>
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
            <a class="btn btn-secondary float-end" href={{ route('dashboard') }} role="button">Back</a>
        </div>

      <div class="table-responsive text-nowrap" style="padding:5px">
        <table id="fssai" class="table table-striped" style="width:100%; border-collapse: collapse;">

          <thead>
            <tr>
              <th>No</th>
              <th>Company Name</th>
              <th>License Number</th>
              <th>Reference Number</th>
              <th>Start Date</th>
              <th>Expiry Date</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
            @foreach ($latTwoMonthDatas as $latTwoMonthData)
            <tr>
              <td>{{ ++$i }}</td>
              <td>{{ $latTwoMonthData->company_name}}</td>
              <td>{{ $latTwoMonthData->license_number}}</td>
              <td>{{ $latTwoMonthData->reference_number}}</td>
              <td>{{ $latTwoMonthData->license_start_date}}</td>
              <td>{{ $latTwoMonthData->license_expiry_date}}</td>
              @if ($latTwoMonthData->license_status == 1)
              <td class="text-success">Completed </td>
              @else
              <td class="text-danger">Incomplete </td>
              @endif

              {{-- <td class="text-secondary">{{ $allfssai->license_status == 1 ? "Completed" : "Incomplete"}}</td> --}}
              {{-- <td class="">{{ $allfssai->license_status == 1 ? "Completed" : "Incomplete"}}</td> --}}
              <td>
                <div class="dropdown">
                  <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                    <i class="bx bx-dots-vertical-rounded"></i>
                  </button>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href={{route('fssai.view',$latTwoMonthData->id)}}><i class="bx bx-show me-1"></i> View</a>
                    <a class="dropdown-item" href={{route('fssai.edit',$latTwoMonthData->id)}}><i class="bx bx-edit-alt me-1"></i> Edit</a>
                    <form method="post" action={{route('fssai.destroy',$latTwoMonthData->id)}}>
                        @method('delete')
                        @csrf
                        <button type="submit" class=" dropdown-item"><i class="bx bx-trash me-1"></i> Delete</button>
                        {{-- <a class="dropdown-item" href="javascript:void(0);"> Delete</a> --}}
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
