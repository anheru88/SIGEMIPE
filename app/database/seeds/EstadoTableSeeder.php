<?php

class EstadoTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating

		$count = User::all()->count();

		if(!($count > 0)){

			$estados = [
				['nombre' => 'activo', 'created_at' => new DateTime(), 'updated_at' => new DateTime()], 
				['nombre' => 'inactivo', 'created_at' => new DateTime(), 'updated_at' => new DateTime()], 
				['nombre' => 'eliminado', 'created_at' => new DateTime(), 'updated_at' => new DateTime()] 
			];

			// Uncomment the below to run the seeder
			DB::table('estados')->insert($estados);	
		}
	}

}
