<?php

class AuthenticationController extends BaseController {

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('authentications.login');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();

		$attempt = Auth::attempt([
			'username' => $input['username'],
			'password' => $input['password']
		]);

		//dd((boolean) Auth::user()->activo);

		if($attempt){
			if((boolean) Auth::user()->activo){
				return Redirect::intended('/');
			}else{
				dd('problem1');
			}
			
		}else{
			dd('problem2');	
		}		
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy()
	{
		Auth::logout();

		return Redirect::home();
	}

}
