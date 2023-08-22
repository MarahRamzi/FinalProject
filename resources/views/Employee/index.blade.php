@extends('dashboard')

@section('title' , ' Employee')

@push('styles')

@endpush

@section('mainTitle',' Employee')

@section('subTitle',' Employee')

@section('content')

@if(session()->has('success'))
<div class=" alert alert-success d-flex align-items-center " role="alert">
    <i class="fa-solid fa-check"></i>
    <div class="container ">
        {{ session('success') }}
    </div>
</div>
@endif
<div class="container">

<table class="table table-bordered">
    <thead class="table-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Action</th>
        <th scope="col">Leave Request</th>


      </tr>
    </thead>
    <tbody class="table-secondary">
        @forelse ($employees as $employee)
            <tr>
                <th scope="row">{{ $employee->id }}</th>
                <td colspan="1">{{ $employee->name }}</td>
                <td colspan="1">{{ $employee->email }}</td>
                <td colspan="1">
                   <div class="d-flex justify-content-around">
                        <a href="{{ route('employees.edit' ,$employee->id) }}"><i class="fa-regular fa-pen-to-square text-dark"></i></a>
                        <form action="{{ route('employees.destroy' , $employee->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-outline-dark btn-sm"><i class="fa-solid fa-trash"></i></button>
                        </form>
                   </div>
                </td>
                <td colspan="1">
                    <a href="{{ route('employees.leaveRequests.create' , $employee->id) }}" class="text-dark link-underline-dark">Add Leave Request</a>
                    <hr>
                    <a href="{{ route('employees.leaveRequests.index' , $employee->id) }}" class="text-dark link-underline-dark">View Leave Request</a>

                </td>
            </tr>
        @empty
            <p>Ther is no employee</p>
        @endforelse
    </tbody>
  </table>
</div>

  @endsection
