<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        DB::statement('SET FOREIGN_KEYS_CHECKS = 0');
//        User::truncate();
//        Category::truncate();
//        Product::truncate();
//        Transaction::truncate();
//        DB::table('category_product')->truncate();


        User::factory(1000)->create();
        Category::factory(30)->create();
        Product::factory(1000)->create()->each(function ($producto){
            $categorias = Category::all()->random(mt_rand(1,5))->pluck('id');
            $producto->categories()->attach($categorias);
        });

        Transaction::factory(1000)->create();
    }
}
