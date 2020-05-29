<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Profile;
use App\Food;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Factory::create();

        foreach(range(1,10) as $index ){
        	DB::table('reviews')->insert(array(
        		'content' => $faker->paragraph,
        		'profile_id' => $faker->randomElement(profile::pluck('id')->toArray()),
                'food_id' => $faker->randomElement(Food::pluck('id')->toArray()),
        	));
        }
    }
}
