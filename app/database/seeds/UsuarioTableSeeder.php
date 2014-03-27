<?php

use Faker\Factory as Faker;

class UsuarioTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('usuarios')->delete();

		$faker = Faker::create();

		$usuario = array(
			['username' => 'admin', 'email' => 'admin@hotmail.com', 'password' => Hash::make('admin'), 'imagen' => '/img/app/profile/default.png','rol' => 'Admin', 'activo' => '1', 'estado' => '1', 'created_at' =>  new DateTime(), 'updated_at' =>  new DateTime()],
			['username' => 'usuario', 'email' => 'user@hotmail.com', 'password' => Hash::make('usuario'), 'imagen' => $faker->imageUrl(100, 100), 'rol' => 'Usuario', 'activo' => '1', 'estado' => '1', 'created_at' =>  new DateTime(), 'updated_at' =>  new DateTime()]
		);

		// Uncomment the below to run the seeder
		DB::table('usuarios')->insert($usuario);
	}

}
