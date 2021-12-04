<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name_product' => 'Hoodie Tokyo Revengers',
            'stock' => '25',
            'price' => '175000',
            'desc' => 'Hoodie Dari Anime Tokyo Revengers',
            'pict' => 'aku',

        ]);
    }
}
