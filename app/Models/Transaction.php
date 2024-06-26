<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    public function account() {
        return $this->belongsTo(Account::class);
    }

    public function relatedAccount() {
        return $this->belongsTo('App\Models\Account', 'related_account_id');
    }
}
