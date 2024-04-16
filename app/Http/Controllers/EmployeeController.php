<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Client;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        // Retrieve all clients with their associated accounts
        $query = Client::with('accounts');

        // Check if a search query is provided
        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = $request->search;
            // Filter clients by name or any other relevant fields
            $query->where('name', 'like', '%' . $searchTerm . '%');
        }

        // Execute the query
        $clients = $query->get();

        // If no clients were found, set $clients to an empty collection
        if ($clients->isEmpty()) {
            $clients = collect();
        }

        return view('employee.index', compact('clients'));
    }

    public function show($clientId) {
        // Retrieve the client with the specified ID along with their associated accounts
        $client = Client::with('accounts')->findOrFail($clientId);

        return view('employee.show', compact('client'));
    }

    public function edit($clientId) {
        $client = Client::findOrFail($clientId);
        return view('employee.edit', compact('client'));
    }

    public function update(Request $request, $clientId) {
        $client = Client::findOrFail($clientId);

        // Update client information based on form data
        $client->update($request->all());

        return redirect()->route('employee.show', ['clientId' => $client->id])->with('success', 'Client information updated successfully.');
    }

    public function confirmCloseAccount($accountId)
    {
        $account = Account::findOrFail($accountId);
        return view('employee.confirm_close', compact('account'));
    }

    public function closeAccount($accountId)
    {
        $account = Account::findOrFail($accountId);
        // Close the account (perform necessary logic)
        $account->delete();
        return redirect()->route('employee.clients.show', ['clientId' => $account->client_id])->with('success', 'Account closed successfully.');
}


}
