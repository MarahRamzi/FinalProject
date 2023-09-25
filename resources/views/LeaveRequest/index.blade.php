@extends('dashboard')

@section('title' , ' ')

@push('styles')

@endpush

@section('mainTitle', " $employee->name Request")

@section('subTitle','Leave Request')

@section('content')

@if(session()->has('success'))
<div class=" alert alert-success d-flex align-items-center " role="alert">
    <i class="fa-solid fa-check"></i>
    <div class="container-fluid ">
        {{ session('success') }}
    </div>
</div>
@endif

<table class="table table-dark table-striped-columns container">
    <thead class="table-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Leave Type</th>
          <th scope="col">Start Date</th>
          <th scope="col">Duration Days</th>
          <th scope="col">Status</th>
          <th scope="col">Action</th>

        </tr>
      </thead>
      <tbody class="table-secondary ">
          @forelse ($leaveRequests as $leaveRequest)
              <tr class="text-dark">
                  <th scope="row">{{ $leaveRequest->id }}</th>
                  <td colspan="1">{{ $leaveRequest->LeaveType->name }}</td>
                  <td colspan="1">{{ $leaveRequest->start_date }}</td>
                  <td colspan="1">{{ $leaveRequest->duration_days }}</td>
                  <td colspan="1">{{$leaveRequest->status}}</td>
                  <td colspan="1">
                    @if($leaveRequest->status != 'Accept')
                     <div class="d-flex justify-content-around">
                          <a href="{{ route('employees.leaveRequests.edit' ,[$employee->id , $leaveRequest->id ]) }}"><i class="fa-regular fa-pen-to-square text-dark"></i></a>
                          <form action="{{ route('employees.leaveRequests.destroy' , [$employee->id ,  $leaveRequest->id ]) }}" method="post">
                              @csrf
                              @method('delete')
                              <button type="submit" class="btn btn-outline-dark btn-sm"><i class="fa-solid fa-trash"></i></button>
                          </form>
                     </div>
                     @endif
                  </td>

              </tr>

          @empty
              <p>Ther is no leave request</p>
          @endforelse
      </tbody>
</table>

@endsection
