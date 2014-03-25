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

		if($attempt){
			if(Auth::user()->estado == 1){
				if((boolean) Auth::user()->activo){
					return Redirect::intended('/');
				}else{
					Auth::logout();
					return Redirect::back()->with('flash_message', '<strong>Usuario no Activo</strong>. <br> Comuniquese con el Administrador del Sistema')
					->withInput();
				}
			}else{
				Auth::logout();
				return Redirect::back()->with('flash_message',  '<strong> Comuniquese con el Administrador del Sistema </strong>.')
					->withInput();
			}
		}else{
			return Redirect::back()->with('flash_message', '<strong> Credenciales Incorrectas </strong>. <br> Comuniquese con el Administrador del Sistema')->withInput();

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
