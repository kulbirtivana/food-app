<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use App\User;

class ProfileTableSeeder extends Seeder
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

        foreach( range(1,30) as $index ){
        	DB::table( 'profiles' )->insert( array(
        		'username' => $faker->name,
        		'phone' => $faker->phoneNumber,
        		'address' => $faker->address,
        		'city' => $faker->city,
        		'province' => $faker->state,
        		'zip' => $faker->postCode,
        		'picture' => $faker->imageUrl($width = 640, $height =480),
        		'bio' => $faker->paragraph,
        		'user_id' => $faker->unique()->randomElement(User::pluck('id')->toArray()),


        	));
        }
    }
}
