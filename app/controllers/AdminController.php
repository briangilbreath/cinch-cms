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
		return View::make('admin/index');
	}


	public function options()
	{

		$options = new src\Option;
		$intro = $options->loadIntro();

		$data = array(
			'intro' => $intro,
		);

		return View::make('admin/options', $data);
	}




	public function clear_cache()
	{
		Cache::flush();

		// redirect
		Session::flash('message', 'Site cache cleared');
		return Redirect::to('admin/options');
	}

	

}