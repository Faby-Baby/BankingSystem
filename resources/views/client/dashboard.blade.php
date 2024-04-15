@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <h2>Welcome, {{ $client->name }}</h2>
    <div class="row mt-4">
        @if ($client->accounts->isEmpty())
            <div class="col-md-12">
                <div class="alert alert-warning" role="alert">
                    You have no accounts. Please create an account to get started.
                </div>
                <a href="{{ route('client.create.account') }}" class="btn btn-primary">Create Account</a>
            </div>
        @else
            @foreach($client->accounts as $account)
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-header">
                        Account Overview - {{ $account->type }}
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Balance: ${{ $account->balance }}</h5>
                        <a href="{{ route('client.transactions', ['accountId' => $account->id]) }}" class="btn btn-primary">View Transactions</a>
                    </div>
                </div>
            </div>
            @endforeach
        @endif
    </div>
</div>

    
@endsection
