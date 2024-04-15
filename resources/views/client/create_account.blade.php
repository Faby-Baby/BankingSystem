<!-- resources/views/client/create_account.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Create New Account</h2>
    <form action="{{ route('client.store.account') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="type">Account Type:</label>
            <input type="text" class="form-control" id="type" name="type" required>
        </div>
        <div class="form-group">
            <label for="initial_balance">Initial Balance:</label>
            <input type="number" class="form-control" id="initial_balance" name="initial_balance" required>
        </div>
        <button type="submit" class="btn btn-primary">Create Account</button>
    </form>
</div>
@endsection
