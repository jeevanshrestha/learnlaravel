<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Product;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Seller extends User
{
    use HasFactory;

    public function product(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
