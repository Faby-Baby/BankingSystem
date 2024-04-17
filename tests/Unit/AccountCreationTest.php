<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
}

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
class AccountCreationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test Case ID: TC_BS_002
     * Title: Open a New Savings Account
     * 
     * Objective: To verify that customers can open a new savings account through the system.
     * Preconditions: The user is logged in and has required personal and financial information ready.
     */
    public function testUserCanOpenSavingsAccount()
    {
        // Arrange: Create a user and assume they're logged in
        $user = User::factory()->create();

        // Act: Simulate the user logging in
        $this->actingAs($user);

        // Act: Navigate to the account creation section and select "Savings Account"
        $response = $this->get('/account-creation'); // URL may differ based on your routes
        $response->assertSee('Savings Account'); // Check that the page has the option to create a Savings Account

        // Act: Fill in the required personal and financial information and submit
        $accountData = [
            'account_type' => 'savings', // this field may differ based on your form
            'amount' => 1000, // example field
            // Add other necessary fields here
        ];
        $response = $this->post('/account-creation', $accountData);

        // Assert: Check for a confirmation message and that a new account is created
        $response->assertSee('Account successfully created');
        $this->assertDatabaseHas('accounts', [
            'user_id' => $user->id,
            'type' => 'savings',
            // Add other fields and their values that should be in the database here
        ]);

        // Assert: Check if the user was redirected to the confirmation page or dashboard
        $response->assertRedirect('/dashboard'); // The redirect location may differ
    }
}