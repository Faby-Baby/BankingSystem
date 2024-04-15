<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $user = auth()->user();
        $clientId = $user->client->id;

        $client = Client::with('accounts')->find($clientId);
        return view('client.dashboard', compact('client'));
    }
}
