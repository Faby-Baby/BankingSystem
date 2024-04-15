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

    public function trans($accountId) {
        // Retrieve the account
        $account = Account::findOrFail($accountId);

        // Retrieve transactions associated with the account
        $transactions = Transaction::where('account_id', $accountId)->get();

        return view('client.transactions', compact('transactions', 'account'));
    }
}
