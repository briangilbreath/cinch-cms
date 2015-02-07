<?php

class UserController extends \BaseController {


	/**
     * Show the profile for the given user.
     */
    public function edit()
    {

    	//get userid from session
    	$id = Auth::user()->id;

    	//lookup user
        $user = User::find($id);

        if($user){
    		return View::make('admin/profile', array('user' => $user));
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
		
		$rules = array(
			'current_password'	=> 'required',
            'password'  	    => 'required',
        );

        $validator = Validator::make(Input::all(), $rules);


        // process validation
        if ($validator->fails()) {

        	Session::flash('message', 'Oops, errors!');
            return Redirect::to('admin/profile')
                ->withErrors($validator)
                ->withInput();

        } else {

        	try{



    		   // store
	           $user = User::find($id);
	           $current_password = Input::get('current_password');
	           $new_password = Hash::make(Input::get('password'));
	           
	           // if input current password doen't match old password, redirect
	           if (!Hash::check($current_password, $user->password)) {
	           		Session::flash('message', 'Oops, errors! Current password does not match');
			        return Redirect::to('/admin/profile')->withErrors('Please specify the good current password');
			   }else{

			   		//set new password after match
				 	$user->password = $new_password;
		          	$user->save();
			   }

			   

        	} catch ( Illuminate\Database\QueryException $e) {
				 Session::flash('message', 'Error ' . $e->errorInfo[2]);
			 
          		 return Redirect::to('admin/profile')->withInput()->withErrors($e->errorInfo);
			}


           // redirect
           Session::flash('message', 'Successfully updated user!');
   		   return Redirect::to('admin/profile');
         }
		
	}

}