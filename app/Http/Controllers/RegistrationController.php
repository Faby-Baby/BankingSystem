<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class RegistrationController extends Controller
{
    public function create() {

        return view('/registration-form');
    }

    public function send(Request $request) : RedirectResponse {
        $validate = $request->validate([
            'name' => 'string|required|max:255',
            'email' => 'string|email|required|unique:users',
            'password' => 'string|required|min:8',
            'dob' => 'required|date_format:Y-m-d',
            'phone' => 'required|size:12',
            'address' => 'string|max:255|required|'
        ]);


        DB::beginTransaction();

        try {
            // Manually set each attribute for the User
            $user = new User();
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = Hash::make($request->input('password')); // Hash the password
            $user->role ='client';
            $user->save(); // Persist user to the database
    
            // Manually set each attribute for the Client, linked to the User
            $client = new Client();
            $client->user_id = $user->id; // Ensure you have a user_id foreign key in your Client model
            $client->name = $request->input('name');
            $client->email = $request->input('email');
            $client->telephone = $request->input('phone');
            $client->date_of_birth = $request->input('dob');
            $client->address = $request->input('address');
            $client->save(); // Persist client to the database
    
            DB::commit();
    
            // Optionally, log the user in and redirect them to a dashboard or home page
            Auth::login($user);
    
            return redirect('/dashboard')->with('success', 'Registration successful');
    
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error("An error occurred: " . $e->getMessage());
            return redirect('/register')->with('error', 'Registration failed');
        }

        return redirect('/');
    }
}
