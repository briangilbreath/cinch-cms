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
			//Session::flash('message', 'Need to Install!');
			return View::make('admin/install', array('result' => $result));
		}else{
			//Session::flash('message', 'Need to Install!');
			return View::make('admin/install', array('result' => $result));
		}


		
	}


	public function create_admin_user()
	{
		

		$rules = array(
            'username'       => 'required',
            'password'        => 'required',
      
        );

        $validator = Validator::make(Input::all(), $rules);


        // process validation
        if ($validator->fails()) {

            return Redirect::to('install')
                ->withErrors($validator)
                ->withInput();

        } else {

        	try{
        		// store user
	           $user = new User;
	           $user->username    = Input::get('username');
	           $user->email       = Input::get('email');
	           $user->password    = Hash::make(Input::get('password'));
	           $user->save();

	           // set option
	           $option = new Option;
	           $option->key = 'installed';
	           $option->value = 'true';
	           $option->save();

			} catch ( Illuminate\Database\QueryException $e) {
				 Session::flash('message', 'Error ' . $e->errorInfo[2]);
			 
          		 return Redirect::to('install/')->withInput()->withErrors($e->errorInfo);
			}


		     
           // redirect
           Session::flash('message', 'Successfully created admin user: ' . $user->username);
           return Redirect::to('login/');

         }


	}


}