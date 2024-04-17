<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Account;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FundTransferTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test Case ID: TC_BS_003
     * Title: Transfer Funds Between Own Accounts
     * 
     * Objective: To verify that users can transfer funds between their own accounts.
     * Preconditions: The user has at least two accounts with sufficient funds in the source account.
     */
    public function testUserCanTransferFundsBetweenOwnAccounts()
    {
        // Arrange: Create a user with two accounts
        $user = User::factory()->create();
        $sourceAccount = Account::factory()->create([
            'user_id' => $user->id,
            'balance' => 1000,
            'account_type' => 'checking'
        ]);
        $destinationAccount = Account::factory()->create([
            'user_id' => $user->id,
            'balance' => 500,
            'account_type' => 'savings'
        ]);

        $transferAmount = 200;

        // Act: Simulate the user logging in and navigating to the fund transfer page
        $this->actingAs($user)
             ->get('/fund-transfer') // Use the correct route for your application
             ->assertSee('Transfer Funds'); // Confirm we're on the fund transfer page

        // Act: Posting the transfer request
        $response = $this->post('/fund-transfer', [
            'from_account_id' => $sourceAccount->id,
            'to_account_id' => $destinationAccount->id,
            'amount' => $transferAmount,
        ]);

        // Assert: Check for a confirmation message and account balance updates
        $response->assertSee('Funds transferred successfully');
        $this->assertDatabaseHas('accounts', [
            'id' => $sourceAccount->id,
            'balance' => $sourceAccount->balance - $transferAmount,
        ]);
        $this->assertDatabaseHas('accounts', [
            'id' => $destinationAccount->id,
            'balance' => $destinationAccount->balance + $transferAmount,
        ]);

        // Assert: Check if the user was redirected to a confirmation or dashboard page
        $response->assertRedirect('/dashboard'); // Use the correct redirection route
    }
}
//To execute this test, you would use the 
//php artisan test 
//command with a filter for the test class:
    //php artisan test --filter FundTransferTest