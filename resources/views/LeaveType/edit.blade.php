@extends('dashboard')

@section('title' , 'Type')

@push('styles')

@endpush

@section('mainTitle','Edit Leave Type')

@section('subTitle','Leave Type')

@section('content')
<div class="container-fluid form-floating">
    <form action="{{ route('leaveTypes.update' , $leaveType->id) }}" method="post">
        @csrf
        @method('put')
        <div class="form-floating mb-4">
            <label for="name">Name</label>
            <input type="input" @class(['form-control', 'is-invalid' => $errors->has('name')]) id="name" name="name" placeholder="Determine Leave Type" value = "{{ old('name' , $leaveType->name) }}">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <button type="submit" class="btn btn-primary">Edit</button>

        </form>
    </div>
    @endsection
