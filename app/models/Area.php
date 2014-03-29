<?php

class Area extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'nombre'          =>  'required|min:2'
	);

	public static $messages = array(
		'nombre.required' => 'El Campo: Nombre es Obligatorio.',
		'nombre.min'	  => 'El Campo: Nombre debe ser mayor a :min'
	);

}
