@extends('layouts.app')

@section('content')
@if ($errors->any())
        <div class="alert alert-danger">
            <ul>
    @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
    @endforeach
            </ul>
        </div>
    @endif
    @if (session()->has('error'))
        <div class="alert alert-success">
            {{ session()->get('error') }}
        </div>
    @endif

    <form class="row g-3" action="/register" method="post">
        @csrf
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="col-md-12 mb-3">
            <label for="name" class="form-label fw-bold ">Name<span class="text-danger">*</span></label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
        </div>

        <div class="col-md-12 mb-3">
            <label for="email" class="form-label fw-bold">Email<span class="text-danger">*</span></label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
        </div>

        <div class="col-md-12 mb-3">
            <label for="password" class="form-label fw-bold">Password<span class="text-danger">*</span></label>
            <input type="password" name="password" id="password" class="form-control">
        </div>

        <div class="mb-3 col-md-6">
            <label for="dob" class="form-label fw-bold">Date of Birth<span class="text-danger">*</span></label>
            <input type="date" name="dob" id="dob" class="form-control" value="{{ old('dob') }}">
        </div>

        <div class="mb-3 form-group required">
            <label for="phone" class="form-label fw-bold">Phone <span class="text-danger">*</span></label>
            <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone') }}">
            <p class="form-text text-body-secondary">Format: xxx-xxx-xxxx</p>
        </div>

        <div class="mb-3">
            <label for="address" class="form-label fw-bold">Address <span class="text-danger">*</span></label>
            <input type="text" name="address" id="address" value="{{ old('address') }}" class="form-control" placeholder="3385 Drake Street, Ovals Village, Antigua & Barbuda">
        </div>
        
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Register</button>
        </div>
    </form>
@endsection