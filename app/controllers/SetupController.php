<?php

class SetupController extends \BaseController {

	public function __construct()
    {
        $this->beforeFilter('csrf', array('on' => 'post'));
    }


	/**
	 * Displays install.php
	 * GET /sessions
	 *
	 * @return Response
	 */
	public function install()
	{

		$result = Option::where('key','installed')->first();

		if($result){
			$option = $result->value;
		}

		//if it finds result, and its true
		if($result && $option == 'true'){
			// redirect
           Session::flash('message', 'Already Installed!');
           return Redirect::to('/');
         // else if it finds$option and its false
		}elseif($result && $result == 'false'){
			Session::flash('message', 'Need to Install!');
			return View::make('admin/install', array('result' => $result));
		}else{
			Session::flash('message', 'Need to Install!');
			return View::make('admin/install', array('result' => $result));
		}


		
	}


	public function create_admin_user()
	{
		//TODO
	}


}