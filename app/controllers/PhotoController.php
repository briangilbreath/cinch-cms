<?php

class PhotoController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /photo
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /photo/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('photos/create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /photo
	 *
	 * @return Response
	 */
	public function store()
	{


		$rules = array(
            'fileName'    => 'required',
        );

        $validator = Validator::make(Input::all(), $rules);


        // process validation
        if ($validator->fails()) {

           		return Redirect::back()
                ->withErrors($validator)
                ->withInput();

        } else {

        	// get input
        	$input = Input::all();

        	//get filename/path
			$fileName = $input['fileName']->getClientOriginalName();
			$fileThumbName = '200-'. $fileName;
			$filePath = '/uploads/';
			$publicUploadPath = public_path() . $filePath;

			$image = Image::make($input['fileName']->getRealPath());

			//save image, create folder if necessary
			File::exists($publicUploadPath) or File::makeDirectory($publicUploadPath);

			$image->save($publicUploadPath . $fileName)
				->fit(200,200)
				->greyScale()
				->save($publicUploadPath . $fileThumbName);


			//save to db
			$photo = new Photo;
			$photo->name = $fileName;
			$photo->thumb_name = $fileThumbName;
			$photo->path = $publicUploadPath;
			$photo->title = $input['title'];
			$photo->save();

			// redirect
	        Session::flash('message', 'Successfully uploaded photo. <img src="'. $filePath . $fileThumbName.'">');
	        return Redirect::route('admin.photo.create');
		 

        }


		
	}

	/**
	 * Display the specified resource.
	 * GET /photo/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /photo/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /photo/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{

	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /photo/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}