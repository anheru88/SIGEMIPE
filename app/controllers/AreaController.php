<?php

class AreaController extends BaseController {


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$areas = Area::where('estado', '=', '1')->paginate(10);
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
			$area->create($input);

			return Redirect::route('areas.index')
					->with('Guardado', 'Se creo una nueva area.');

		}else{
			$messages = $validation->messages();
			return Redirect::route('areas.index')
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
		$validation = Validator::make($input, Area::$rules);

		if($validation->passes())
		{

			$area = Area::find($id);
			$area->update($input);

			return Redirect::back();
		}
		
		return Redirect::home();
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
		return Redirect::back();
	}

}
