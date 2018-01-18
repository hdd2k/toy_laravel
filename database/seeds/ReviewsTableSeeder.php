<?php

use Illuminate\Database\Seeder;

class ReviewsTableSeeder extends Seeder
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
        DB::table('reviews')->delete();

        // 3 for product_1
        \App\Review::create(array(
            'content' => 'pretty good stuff',
            'product_id' => 1,
        ));
        \App\Review::create(array(
            'content' => 'did not like',
            'product_id' => 1,
        ));
        \App\Review::create(array(
            'content' => 'not bad',
            'product_id' => 1,
        ));
        // 1 for product_2
        \App\Review::create(array(
            'content' => 'HATE IT',
            'product_id' => 2,
        ));
        // 2 for product_3
        \App\Review::create(array(
            'content' => 'LOVE IT',
            'product_id' => 3,
        ));
        \App\Review::create(array(
            'content' => 'what is this?',
            'product_id' => 3,
        ));

    }
}
