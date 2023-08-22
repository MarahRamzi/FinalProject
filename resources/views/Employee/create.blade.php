@extends('dashboard')

@section('title' , ' Employee')

@push('styles')

@endpush

@section('mainTitle',' Employee')

@section('subTitle','Create Employee')

@section('content')
<div class="container-fluid form-floating">
    <form action="{{ route('employees.store') }}" method="post">
        @csrf
        <div class="form-floating mb-4">
            <label for="name">Name</label>
            <input type="input" @class(['form-control', 'is-invalid' => $errors->has('name')]) id="name" name="name" placeholder="Your name" value = "{{ old('name') }}">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

        <div class="form-floating mb-3">
            <label for="email">Email address</label>
            <input type="email" @class(['form-control', 'is-invalid' => $errors->has('email')]) id="email" name="email" placeholder="name@example.com" value = "{{ old('email') }}">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          {{-- <div class="form-floating">
            <label for="phone">Phone</label>
            <input type="text" @class(['form-control', 'is-invalid' => $errors->has('phone')]) id="phone" name="phone" placeholder="your phone" value = "{{ old('phone') }}">
            @error('phone')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

          <div class="form-floating mb-3">
            <label for="career"> Career </label>
            <input type="text" @class(['form-control', 'is-invalid' => $errors->has('career')]) id="career" name="career" placeholder="Your career" value = "{{ old('career') }}">
          @error('career')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div> --}}

          <button type="submit" class="btn btn-primary">create</button>

    </form>
</div>
@endsection

@push('scripts')

@endpush
