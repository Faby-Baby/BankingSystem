@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Transactions</h1>
    <table class="table">
        <thead>
            <tr>
                <th> Related Account</th>
                <th> Amount</th>
                <th> Type</th>
                <th> Timestamp<th>
            </tr>
        </thead>
        <tbody>
            @forelse($transactions as $transaction)
            <tr>
                <td>{{ $transaction->related_account_id ? $transaction->relatedAccount->name: 'N/A' }}</td>
                <td>{{ number_format($transaction->amount,2) }} {{ $transaction->currency }}</td>
                <td>{{ ucfirst($transaction->type) }}</td>
                <td>{{ $transaction->created_at ->format('Y-m-d H:i:s')}}</td>
            </tr>
            @empty
                <tr>
                    <td colspan="4">No transactions found</td>

                </tr>
        @endforelse
        </tbody>
    </table>

</div>
@endsection
