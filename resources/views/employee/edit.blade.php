@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Edit Client Information</h1>

    <form action="{{ route('employee.clients.update', ['clientId' => $client->id]) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $client->name }}">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $client->email }}">
        </div>
        <a href="{{ route('employee.clients.show', ['clientId' => $client->id]) }}" class="btn btn-secondary">Cancel</a>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
