<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use App\Models\Transaction;

class TransactionController extends Controller
{
    //
    public function index()
    {
        $transactions = Transaction::all();
        return view('/transaction', compact('transactions'));
    }

    public function trans(Request $request) {
        $client_id = $request->route('client_id');

        // Fetch all accounts belonging to the client
    $accounts = Account::where('client_id', $client_id)->with('transactions')->get();
    
    // Flatten the transactions from all accounts into a single collection
    $transactions = collect();
    foreach ($accounts as $account) {
        $transactions = $transactions->merge($account->transactions);
    }
        return view('transaction', compact('transactions'));
    }
}
