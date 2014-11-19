<?php 

class AdminController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /admin
	 *
	 * @return Response
	 */
	public function index()
	{
		return "Welcome. Your email address is " . Auth::user()->email;
	}

	

}