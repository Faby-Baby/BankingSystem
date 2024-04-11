<?php

namespace Database\Factories;

use App\Models\Account;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionFactory extends Factory
{
    protected $model = Transaction::class;

    public function definition()
    {
        $account = Account::inRandomOrder()->first();
        $transactionType = $this->faker->randomElement(['deposit', 'withdrawal', 'transfer', 'bill_payment', 'currency_exchange']);
        $relatedAccount = ($transactionType == 'transfer') ? Account::inRandomOrder()->first() : null;

        return [
            'account_id' => $account ? $account->id : Account::factory(),
            'type' => $transactionType,
            'amount' => $this->faker->randomFloat(2, 10, 10000),
            'currency' => 'USD',
            'exchange_rate' => ($this->faker->boolean(30) && $transactionType == 'currency_exchange') ? $this->faker->randomFloat(6, 0.5, 1.5) : null,
            'related_account_id' => $relatedAccount ? $relatedAccount->id : null,
        ];
    }
}
