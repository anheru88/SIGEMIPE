<?php

use Faker\Factory as Faker;

class AreaTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('areas')->delete();

		$faker = Faker::create();

		foreach (range(1, 100) as $index) {
			Area::create([
				'nombre' => $faker->sentence(6),
				'estado' => $faker->randomNumber(1, 3)
			]);

		}		
	}

}
