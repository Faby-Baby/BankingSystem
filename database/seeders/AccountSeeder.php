<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Account;

class AccountSeeder extends Seeder
{
    public function run()
    {
        // Create 100 accounts
        Account::factory()->count(100)->create();
    }
}
