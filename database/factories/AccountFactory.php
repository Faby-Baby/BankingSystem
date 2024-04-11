<?php

namespace Database\Factories;

use App\Models\Account;
use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

class AccountFactory extends Factory
{
    protected $model = Account::class;

    public function definition()
    {
        return [
            'client_id' => Client::factory(),  // Ensure you have Client model and its factory
            'account_number' => $this->faker->unique()->bankAccountNumber,
            'account_type' => $this->faker->randomElement(['savings', 'checking', 'business']),
            'balance' => $this->faker->numberBetween(100, 10000),
            'date_opened' => $this->faker->date(),
            'status' => $this->faker->randomElement(['active', 'suspended', 'closed'])
        ];
    }
}
