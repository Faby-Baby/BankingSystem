@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Client Details</h1>

    <div>
        <h2>{{ $client->name }}</h2>
        <p><strong>Email:</strong> {{ $client->email }}</p>
        
        <h3>Accounts:</h3>
        <ul>
        @foreach ($client->accounts as $account)
                <li>
                    {{ $account->account_number }} - {{ $account->account_type }}
                    <form action="{{ route('employee.accounts.confirmClose', ['accountId' => $account->id]) }}" method="GET" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-danger">Close Account</button>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="mt-3">
        <a href="{{ route('employee.clients.edit', ['clientId' => $client->id]) }}" class="btn btn-primary">Edit</a>
    </div>

</div>
@endsection
