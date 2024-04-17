<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
class UserAuthenticationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test Case ID: TC_BS_001
     * Title: Login with Valid Credentials
     * 
     * Objective: To verify that users can successfully log in with valid credentials.
     * Preconditions: The user has an account with valid username and password.
     */
    public function testUserCanLoginWithValidCredentials()
    {
        // Arrange: Create a user
        $user = User::factory()->create([
            'password' => bcrypt($password = 'i-love-laravel'),
        ]);

        // Act: Attempt to login with the created user credentials
        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => $password,
        ]);
        // Assert: Check if the user was redirected to the home page
        $response->assertRedirect('/home');

        // Follow the redirect and see if we can access the home page
        $this->get('/home')->assertSee('Dashboard');
        
        // Additional checks can include seeing if a session variable was set
        $this->assertAuthenticatedAs($user);
    }
}