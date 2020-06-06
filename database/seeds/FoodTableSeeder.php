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
        		'foodname' => $faker->name($category = "food"),
        		'photo' => $faker->imageURL($width = 600, $height = 480, $category = "food"),
                'slug' => $faker->slug,
        		'ingredients' => $faker->paragraph,
                'price' => $faker->randomFloat(2,0,6),
        		'user_id' => $faker->randomElement(User::pluck('id')->toArray()),


        	));
        }
    }
}
