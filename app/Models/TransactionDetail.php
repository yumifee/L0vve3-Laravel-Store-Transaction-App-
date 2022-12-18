<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory;
    protected $table = "transactiondetails";
    protected $fillable = [
        'code',
        'product_name',
        'quantity', 
        'price',
        'total_price'
    ];
}
