<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    $Faker = Faker::create();
	$product_count = Product::all()->count() + 1;
        foreach (range(1,2000)as $index){
            Product::create([
                'product_name' => $Faker->company,
                'code' => date("Y")."000000".$product_count,
                'quantity'=> 100,
                'price'=> $Faker-> numberBetween($min =500, $max = 100000),
            ]);
            $product_count++;
        }
    }
}
