@extends('dashboard')

@section('title' , ' Employee')

@push('styles')

@endpush

@section('mainTitle',' Employee')

@section('subTitle','Edit Employee')

@section('content')
<div class="container-fluid form-floating">
    <form action="{{ route('employees.update' ,$employee->id ) }}" method="post">
        @csrf
        @method('put')
        <div class="form-floating mb-4">
            <label for="name">Name</label>
            <input type="input" @class(['form-control', 'is-invalid' => $errors->has('name')]) id="name" name="name" placeholder="Your name" value = "{{ old('name' , $employee->name) }}">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

        <div class="form-floating mb-3">
            <label for="email">Email address</label>
            <input type="email" @class(['form-control', 'is-invalid' => $errors->has('email')]) id="email" name="email" placeholder="name@example.com" value = "{{ old('email' ,  $employee->email ) }}">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          {{-- <div class="form-floating">
            <label for="phone">Phone</label>
            <input type="text" @class(['form-control', 'is-invalid' => $errors->has('phone')]) id="phone" name="phone" placeholder="your phone" value = "{{ old('phone' ,  $employee->phone) }}">
            @error('phone')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        </div>

          <div class="form-floating mb-3">
            <label for="career"> Career </label>
            <input type="text" @class(['form-control', 'is-invalid' => $errors->has('career')]) id="career" name="career" placeholder="Your career" value = "{{ old('career' , $employee->career) }}">
             @error('career')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div> --}}

          <button type="submit" class="btn btn-primary">Edit</button>

    </form>
</div>
@endsection

@push('scripts')

@endpush
