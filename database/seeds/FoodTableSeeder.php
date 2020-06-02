<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Profile;
use App\User;


class FoodTableSeeder extends Seeder
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

        foreach(range(1,40 ) as $index){
        	DB::table('food')->insert(array(
        		'foodname' => $faker->name,
        		'photo' => $faker->imageURL($width = 600, $height = 480, $category = "food"),
        		'ingredients' => $faker->paragraph,
        		'profile_id' => $faker->randomElement(Profile::pluck('id')->toArray()),


        	));
        }
    }
}
