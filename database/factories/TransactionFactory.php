<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Seller;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $seller = Seller::has('product')->get->random();
        $buyer = User::all()->except($seller->id)->random();
        return [

            'quantity' => $this->faker->numberBetween(1,10),
            'product_id' => $seller->product->random()->id,
            'buyer_id' => $buyer->id,
        ];
    }
}
