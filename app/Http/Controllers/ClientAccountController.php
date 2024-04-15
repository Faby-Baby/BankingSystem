<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

class ClientAccountController extends Controller
{
    public function create()
    {
        return view('client.create_account');
    }

    public function store(Request $request)
    {
        $client = auth()->user()->client;

        // Validation rules
        $validatedData = $request->validate([
            'type' => 'required|string',
            'initial_balance' => 'required|numeric|min:0',
            
        ]);

        $accountNumber =  mt_rand(1000000000, 9999999999);

        // Create a new account
        $account = new Account();
        $account->client_id = $client->id;
        $account->account_number = $accountNumber;
        $account->account_type = $request->input('type');
        $account->balance = $request->input('initial_balance');
        $account->date_opened = now();
        $account->status = 'active';
        $account->save();

        // Redirect back to client dashboard or wherever appropriate
        return redirect()->route('client.dash')->with('success', 'Account created successfully!');
    }
}

