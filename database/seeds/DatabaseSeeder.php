<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Profile;
use App\Food;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $this->call( (new UsersTableSeeder())->run());
		$this->call( (new ProfileTableSeeder())->run());
        $this->call( (new FoodTableSeeder())->run());
        $this->call( (new ReviewsTableSeeder())->run());    }
}
