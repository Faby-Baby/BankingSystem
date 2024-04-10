@extends('layouts.app')

@section('content')
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    <div class="px-4 py-5 my-5 text-center bg-body-tertiary rounded-3">
        <img class="img-fluid" src="{{ asset('images/UWI-Wordmark.webp') }}" alt="UWI Wordmark" width="300" />
        <h1 class="display-5 fw-bold text-body-emphasis">Welcome</h1>
        <div class="col-lg-6 mx-auto">
            <p class="lead mb-4">You've successfully loaded up the Laravel starter template for this assignment.</p>
        </div>
    </div>
@endsection
