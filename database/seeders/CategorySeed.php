<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => "Electronics",
                "is_active" => true
            ],
            [
                'name' => "Apparel Accessories",
                "is_active" => true
            ],
            [
                'name' => "Furniture",
                "is_active" => true
            ],
            [
                'name' => "Kitchen",
                "is_active" => true
            ],
            [
                'name' => "Fashion",
                "is_active" => true
            ],
            [
                'name' => "Footwear",
                "is_active" => true
            ],
            [
                'name' => "Home Decoration",
                "is_active" => true
            ],
            [
                'name' => "Handbags, Purses and Wallets",
                "is_active" => true
            ],
            [
                'name' => "Travel Bags.",
                "is_active" => true
            ],
            [
                'name' => "Kids",
                "is_active" => false
            ],
            [
                'name' => "Menswear",
                "is_active" => false
            ]
        ];
        DB::table('categories')->insert($categories);
    }
}
