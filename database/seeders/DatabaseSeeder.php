<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            'name'     => 'jose luis',
            'email'    => 'barbozagonzalesjose@gmail.com',
            'password' => bcrypt('2chidivavu'),
            'role'      => 'admin',
        ]);

        Category::create([
            'name' => 'inpods',
            'description' => 'auriculares inalambricos que funcionan con blouthue genial'
        ]);

        Category::create([
            'name' => 'other',
            'description' => 'otra cosa diferente a un inpods'
        ]);


        /* Create 10 products */
        Product::factory(10)->create();
    }
}
