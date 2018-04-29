<?php

use Illuminate\Database\Seeder;

class UserReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         factory(App\UserReview::class,50) ->create();
    }
}
