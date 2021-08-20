<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 30; $i++) {
            Product::create([
                'user_id' => User::inRandomOrder()->first()->id,
                'name' => 'Product Seed - ' . Str::random(20),
                'image' => 'randomDummyImage' . Str::random(20),
                'price' => random_int(100, 900),
                'category_id' => Category::inRandomOrder()->first()->id,
                'description' => Str::random(100, 800),
            ]);
        }
    }
}
