<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

//        Note : Used for random seeding logic

        // TODO: clear DB
        DB::table('products')->delete();

        // Create 3 products
        $prod_1 = \App\Product::create(array(
            'name' => 'product_1'
        ));
        $prod_2 = \App\Product::create(array(
            'name' => 'product_2'
        ));
        $prod_3 = \App\Product::create(array(
            'name' => 'product_3'
        ));

    }
}
