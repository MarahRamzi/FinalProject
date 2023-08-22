@extends('dashboard')

@section('title' , '')

@push('styles')

@endpush

@section('mainTitle',' Add Leave Request')

@section('subTitle','Leave Request')

@section('content')

{{-- <h3>{{ $employee->name }} Request</h3> --}}

<form action="{{ route('employees.leaveRequests.store' , $employee->id) }}" method="post">
    @csrf
<div class="row  container mt-5">
    <div class=" col-md-12 form-floating mb-3">
        <label for="floatingSelect">Leave Type:  </label>
        <select class="form-select col-md-12" name="leave_type_id" id="leave_type_id" aria-label="Floating label select example">
          <option selected>Choose Leave Type</option>
          @foreach ( $LeaveTypes as $Leavetype )
          <option value="{{ $Leavetype->id }}">{{ $Leavetype->name }}</option>
          @endforeach
        </select>
      </div>

      <div class="form-group col-md-6 ">
        <label for="start_date">Start Date:</label>
        <input type="date" @class(['form-control', 'is-invalid' => $errors->has('start_date')]) id="start_date" name="start_date" value="{{ old('start_date') }}">
        @error('start_date')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="form-group col-md-6">
        <label for="duration_days">Duration Days:</label>
        <input type="text" @class(['form-control', 'is-invalid' => $errors->has('duration_days')]) id="duration_days" name="duration_days" value="{{ old('duration_days') }}">
        @error('duration_days')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <button type="submit" class="m-3 btn btn-primary " >Create</button>
</div>

</form>

@endsection

