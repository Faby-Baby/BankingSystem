@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Client Management</h1>

    <!-- Search form -->
    <form action="{{ route('employee.clients') }}" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" id='search' name="search" class="form-control" placeholder="Search for clients...">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </form>

    <!-- Display list of clients -->
    @if ($clients->isEmpty())
        <p>No clients found.</p>
    @else
        @foreach ($clients as $client)
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $client->name }}</h5>
                    <ul class="list-group list-group-flush">
                        @foreach ($client->accounts as $account)
                            <li class="list-group-item">{{ $account->account_number }} - {{ $account->account_type }}</li>
                        @endforeach
                    </ul>
                    <div class="mt-3">
                        <a href="{{ route('employee.clients.show', ['clientId' => $client->id]) }}" class="btn btn-info">View Details</a>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</div>
@endsection
