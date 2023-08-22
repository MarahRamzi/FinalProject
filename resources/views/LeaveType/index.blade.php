@extends('dashboard')

@section('title' , ' Type')

@push('styles')

@endpush

@section('mainTitle',' Leave Type')

@section('subTitle',' Leave Type')

@section('content')

@if(session()->has('success'))
<div class=" alert alert-success d-flex align-items-center" style= "--bs-bg-opacity: .5;">
    <i class="fa-solid fa-check"></i>
    <div class="container-fluid ">
        {{ session('success') }}
    </div>
</div>
@endif
<div class="container-fluid mx-3">
    <div class="card" style="width: 18rem;">
        <div class="card-header bg-secondary bg-gradient">
          Leave Type
        </div>
        <ul class="list-group list-group-flush">
        @foreach ($types as $type)
          <li class="list-group-item">{{ $type->name }}
        <div class="d-flex justify-content-around">
                <a href="{{ route('leaveTypes.edit' ,$type->id) }}"><i class="fa-regular fa-pen-to-square text-dark"></i></a>
                <form action="{{ route('leaveTypes.destroy' , $type->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-outline-dark btn-sm"><i class="fa-solid fa-trash"></i></button>
                </form>
            </div>

         </li>

         @endforeach

        </ul>
      </div>

</div>

@endsection
