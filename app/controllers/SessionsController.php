<?php

class SessionsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /sessions
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /sessions/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('sessions.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /sessions
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();

		$attempt = Auth::attempt([
			'email'    => $input['email'],
			'password' => $input['password']

		]);


		Session::flash('message', 'Sucessfully logged in!');

		if($attempt){
			return Redirect::intended('/admin');
		} 


		Session::flash('message', 'Sorry, does not compute.');
		return Redirect::back()->withInput();

	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /sessions/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy()
	{
		Auth::logout();

		Session::flash('message', 'Goodbye!');

		return Redirect::to('/');
	}

}