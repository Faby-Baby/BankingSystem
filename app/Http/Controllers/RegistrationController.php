<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    public function create() {

        return view('/registration-form');
    }

    public function send(Request $request) : RedirectResponse {
        $validate = $request->validate([
            'name' => 'string|required|max:255',
            'email' => 'string|email|required|unique:users',
            'password' => 'string|required|size:12',
            'dob' => 'required|date_format:d/m/Y',
            'phone' => 'required|size:10',
            'address' => 'string|max:255|required|'
        ]);

        DB::beginTransaction();

        try {
            // Manually set each attribute for the User
            $user = new User();
            $user->email = $validatedData['email'];
            $user->password = Hash::make($validatedData['password']); // Hash the password
            $user->role ='client';
            $user->save(); // Persist user to the database
    
            // Manually set each attribute for the Client, linked to the User
            $client = new Client();
            $client->user_id = $user->id; // Ensure you have a user_id foreign key in your Client model
            $client->name = $validatedData['name'];
            $client->phone = $validatedData['phone'];
            $client->address = $validatedData['address'];
            $client->save(); // Persist client to the database
    
            DB::commit();
    
            // Optionally, log the user in and redirect them to a dashboard or home page
            // Auth::login($user);
            // return redirect()->route('dashboard');
            
    
        } catch (\Exception $e) {
            DB::rollBack();
            
        }
    }
}
