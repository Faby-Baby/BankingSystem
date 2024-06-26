<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    public function client() {
        return $this->belongsTo(Client::class);
    }

    public function transactions() {
        return $this->hasMany(Transaction::class);
    }

    public function relatedTransactions() {
        return $this->hasMany(Transaction::class, 'related_account_id');
    }
}
