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
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('areas.created');
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
		
		$validation = Validator::make($input, Area::$rules);

		if($validation->passes())
		{
			$area = new Area;
			$area->create($input);

			return Redirect::back();

		}else{

			$messages = $validation->messages();
			return Redirect::back();
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
       $area = Area::find($id);

       if((is_null($area)) or ($area->estado != 1))
       {
       		return "Este elemento no existe";
       }

       return $area->toJson();
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$area = Area::find($id);

		if(is_null($area))
		{
			return Redirect::route('area.index');
		}
        
        //return Redirect::back()->with('edit', $area);
        return View::make('area.edit', compact('area'));
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
