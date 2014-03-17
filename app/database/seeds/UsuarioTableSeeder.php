<?php

class UsuarioTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('usuarios')->delete();

		$usuario = array(
			['username' => 'admin', 'email' => 'admin@hotmail.com', 'password' => Hash::make('admin'), 'rol' => 'Admin', 'activo' => '1', 'estado' => '1', 'created_at' =>  new DateTime(), 'updated_at' =>  new DateTime()],
			['username' => 'user', 'email' => 'user@hotmail.com', 'password' => Hash::make('User'), 'rol' => 'Usuario', 'activo' => '1', 'estado' => '1', 'created_at' =>  new DateTime(), 'updated_at' =>  new DateTime()]
		);

		// Uncomment the below to run the seeder
		DB::table('usuarios')->insert($usuario);
	}

}
