<?php

use Faker\Factory;
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
    	$faker = Factory::create();
		$faker->addProvider(new Faker\Provider\id_ID\PhoneNumber($faker));
		$faker->addProvider(new Faker\Provider\id_ID\Address($faker));
	    factory(App\User::class, 50)->create()->each(function ($user) use ($faker) {
	    	$profile = new \App\Profile;
	    	$profile->user_id = $user->id;
	    	$profile->phone_number = $faker->phoneNumber;
	    	$profile->gender = is_float(rand() / 2) ? "Male" : "Female";
	    	$profile->birth_day = $faker->dateTimeBetween($startDate = '-50 years', $endDate = 'now', $timezone = "Asia/Jakarta");
	    	$profile->address = $faker->address;
	    	$profile->save();
	    });
    }
}
