<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    protected $fillable = [
        'transactions_id', 'shipping_status', 'products_id', 'price', 'resi', 'code'
    ];

    protected $hidden = [];
}
