<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Transaction;
use App\Models\Seller;

class Product extends Model
{
    use HasFactory;

    const   AVAILABLE_PRODUCT = 'available';
    const   UNAVAILABLE_PRODUCT = 'unavailable';

    protected $fillable = ['name','description','quantity', 'status', 'image', 'seller_id'];

    public function isAvailable()
    {
        return $this->Status == Product::AVAILABLE_PRODUCT;
    }

    public function isNotAvailable()
    {
        return $this->Status == Product::UNAVAILABLE_PRODUCT;
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function seller()
    {
        return$this->belongsTo(Seller::class);
    }

    public function transaction()
    {
        return$this->hasMany(Transaction::class);
    }
}
