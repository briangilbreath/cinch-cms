<?php

class TagController extends \BaseController {

	protected $cache_time = 15;

	public function __construct()
    {
        $this->beforeFilter('csrf', array('on' => 'post'));
    }

	/**
	 * Display a listing of the resource, public front page. Cached.
	 *
	 * @return Response
	 */
	public function all()
	{
		$tags = Tag::remember($this->cache_time)->orderBy('created_at', 'desc')->paginate(10);

		return View::make('tags/all', array('tags' => $tags));
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$tags = Tag::orderBy('created_at', 'desc')->paginate(10);


		return View::make('tags/index', array('tags' => $tags));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('tags/create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{


		$rules = array(
            'name'       => 'required',
        );

        $validator = Validator::make(Input::all(), $rules);


        // process validation
        if ($validator->fails()) {

            return Redirect::to('admin/tag/create')
                ->withErrors($validator)
                ->withInput();

        } else {

		   // store
           $tag             = new Tag;
           $tag->name       = Input::get('name');
           $tag->save();

           // redirect
           Session::flash('message', 'Successfully created tag!');
           return Redirect::to('admin/tag');

         }
	}



	/**
	 * Display the specified resource. Cached.
	 *
	 * @param  int  $idate(format)
	 * @return Response
	 */
	public function show($slug)
	{
		$tag = Tag::remember($this->cache_time)->where('slug','=', $slug)->with([
		    'posts' => function ($query) {
		        $query->remember($this->cache_time);
		     }
		])->first();

		if(isset($tag)){

			// fetch query
			$posts = $tag->posts()->orderBy('created_at', 'desc')->remember($this->cache_time)->with([
		    'tags' => function ($query) {
		        $query->remember($this->cache_time);
		     }
			])->paginate(5);

			
			// pass meta description
			View::share('page_title', $tag->name);

			
		    return View::make('tags/show', array('posts' => $posts, 'title'=>$tag->name));
		    	
		  

		}else{
			//if no tag found, redirect to homepage
			return Redirect::to('/');
		}

		

		
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$tag = Tag::find($id);

		return View::make('tags/edit', array('tag' => $tag));
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
            'name'       => 'required',
        );

        $validator = Validator::make(Input::all(), $rules);


        // process validation
        if ($validator->fails()) {

        	Session::flash('message', 'Oops, errors!');
            return Redirect::to('admin/tag/'.$id.'/edit')
                ->withErrors($validator)
                ->withInput();

        } else {



		   // store
           $tag = Tag::find($id);
           $tag->name       = Input::get('name');
           $tag->save();

           // redirect
           Session::flash('message', 'Successfully updated tag!');
   		   return Redirect::to('admin/tag/'.$id.'/edit');
         }
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		 $tag = Tag::find($id);
		 $tag->delete();

		   // redirect
           Session::flash('message', 'Successfully deleted tag!');
   		   return Redirect::to('admin/tag');
	}


}
