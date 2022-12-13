<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Buyer;
use App\Models\Product;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = ['quantity','buyer_id', 'product_id'];

    public function Product(){
        return $this->belongsTo(Product::class);
    }
    public function Buyer(){
        return $this->belongsTo(  Buyer::class);
    }
}
