@extends('dashboard')

@section('title' , ' ')

@push('styles')

@endpush

@section('mainTitle', 'All Leave Request')

@section('subTitle','All Leave Request')

@section('content')

<div class="container">
<table class="table table-dark table-striped-columns">
    <thead class="table-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Employee</th>
          <th scope="col">Leave Type</th>
          <th scope="col">Start Date</th>
          <th scope="col">Duration Days</th>
          <th scope="col">Current Status</th>
          <th scope="col">Change Status</th>

        </tr>
      </thead>
      <tbody class="table-secondary ">
          @foreach($leaveRequests as $leaveRequest)
              <tr class="text-dark">
                  <th scope="row">{{ $leaveRequest->id }}</th>
                  <td colspan="1">{{ $leaveRequest->employee->name }}</td>
                  <td colspan="1">{{ $leaveRequest->LeaveType->name }}</td>
                  <td colspan="1">{{ $leaveRequest->start_date }}</td>
                  <td colspan="1">{{ $leaveRequest->duration_days }}</td>
                  <td colspan="1">{{ $leaveRequest->status }}</td>
                  <td colspan="1">
                    <form action="{{ route('deny.leave' ,$leaveRequest->id) }}" method="post">
                        @csrf
                            <button type="submit" class="btn btn-danger">Denied</button>
                            <input type="text" name="reason" id="reason" placeholder="Enter Reason">
                    </form>

                    <hr>

                    <form action="{{ route('accept.leave', $leaveRequest->id) }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-success">Accept</button>
                    </form>


                  </td>



                  {{-- <td colspan="1">
                    <div class="dropdown">
                        <form action="{{ route('leavStatus.store') }}" method="post">
                            @csrf
                        <button class="btn btn-secondary dropdown-toggle" type="submit" data-bs-toggle="dropdown" aria-expanded="false">
                            Status
                        </button>
                        <select class="dropdown-menu form-select" multiple aria-label="Multiple select example">
                            <option value="Pending" >Pending</option>
                            <option value="Denied" onclick="">Denied</option>
                            <option value="Accept">Accept</option>
                        </select>
                    </form>
                    </div>

                    {{-- {{ $leaveRequest->Leavestatus->status }} --}}


                  </td> 
                  {{-- <td colspan="1">
                     <div class="d-flex justify-content-around">
                          <a href="{{ route('employees.leaveRequests.edit' ,[$employee->id , $leaveRequest->id ]) }}"><i class="fa-regular fa-pen-to-square text-dark"></i></a>
                          <form action="{{ route('employees.leaveRequests.destroy' , [$employee->id ,  $leaveRequest->id ]) }}" method="post">
                              @csrf
                              @method('delete')
                              <button type="submit" class="btn btn-outline-dark btn-sm"><i class="fa-solid fa-trash"></i></button>
                          </form>
                     </div>
                  </td> --}}

              </tr>
          @endforeach
      </tbody>
</table>
</div>

@endsection
