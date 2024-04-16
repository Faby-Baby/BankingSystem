@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Confirm Account Closure</h1>
    <p>Are you sure you want to close the account: {{ $account->account_number }}?</p>
    <form action="{{ route('employee.accounts.close', ['accountId' => $account->id]) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Yes, Close Account</button>
        <a href="{{ route('employee.clients.show', ['clientId' => $account->client_id]) }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
