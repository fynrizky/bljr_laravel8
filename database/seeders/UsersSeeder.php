<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'name_product' => 'Hoodie Tokyo Revengers',
            'stock' => '25',
            'price' => '175000',
            'desc' => 'Hoodie Dari Anime Tokyo Revengers',
            'pict' => 'aku',

        ]);
    }
}
