@extends('dashboard')

@section('title' , 'Type')

@push('styles')

@endpush

@section('mainTitle','Add Leave Type')

@section('subTitle','Leave Type')

@section('content')
<div class="container-fluid form-floating">
    <form action="{{ route('leaveTypes.store') }}" method="post">
        @csrf
        <div class="form-floating mb-4">
            <label for="name">Name</label>
            <input type="input" @class(['form-control', 'is-invalid' => $errors->has('name')]) id="name" name="name" placeholder="Determine Leave Type" value = "{{ old('name') }}">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <button type="submit" class="btn btn-primary">create</button>

        </form>
    </div>
    @endsection
