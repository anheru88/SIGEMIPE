<?php

class AreaController extends BaseController {


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$areas = Area::where('estado', '=', '1')->paginate(20);
		return View::make('area.index', compact('areas'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$input['estado'] = 1;
		
		$validation = Validator::make($input, Area::$rules, Area::$messages);

		if($validation->passes())
		{
			$area = new Area;
			$nuevo = $area->create($input);

			$areas = Area::where('estado', '=', '1')->paginate(10);
			$pagina = $areas->getLastPage();
			
			return Redirect::to('/areas?page='.$pagina)
			->with('Guardado', 'Se creo el area con id: <strong>'.$nuevo->id.'</strong> <br/> Nombre: <strong>'.$nuevo->nombre.'</strong>');

		}else{
			return Redirect::back()
			->with('Error_Store', 'Revisar las validaciones.')
			->withInput()
			->withErrors($validation);
		}
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = array_except(Input::all(), '_method');
		$validation = Validator::make($input, Area::$rules, Area::$messages);

		if($validation->passes())
		{

			$area = Area::find($id);
			$area->update($input);

			return Redirect::back()
			->with('Actualizado', 'Se actualizo el area con id: <strong>'.$area->id.'</strong> <br/><strong> '.$area->nombre.'</strong>');
		}else{
			return Redirect::back()
			->with('Error_Update', 'Revisar las validaciones.')
			->with('id', $id)
			->withInput()
			->withErrors($validation);
		}
		
		
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$area = Area::find($id);
		$area->estado = 3;
		$area->save();
		return Redirect::back()
		->with('Borrado', 'Se Borro el area con id: <strong>'.$area->id.'</strong> <br/> Nombre : <strong>'.$area->nombre.'</strong>');
	}

}
