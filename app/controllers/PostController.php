<?php

class PostController extends \BaseController {


	public function __construct()
    {
        $this->beforeFilter('csrf', array('on' => 'post'));
    }

    /**
	 * Display a listing of the resource, public front page.
	 *
	 * @return Response
	 */
	public function all()
	{
		$posts = Post::orderBy('created_at', 'desc')->paginate(4);

		return View::make('posts/all', array('posts' => $posts));
	}


	/**
	 * Display a listing of the resource, admin area.
	 *
	 * @return Response
	 */
	public function index()
	{
		$posts = Post::orderBy('created_at', 'desc')->paginate(12);


		return View::make('posts/index', array('posts' => $posts));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{

		//get list of tags
		$tags = Tag::all();
		$tag_names = array();
		foreach($tags as $tag){
			$tag_names[$tag->id] = $tag->name;
		}

		//get recent photos
		$photos = Photo::orderBy('created_at', 'desc')->paginate(6);
		$photo_names = array();
		foreach($photos as $photo){
			$photo_names[$photo->id] = $photo->name;
		}


		return View::make('posts/create', array('tag_names' => $tag_names, 'photo_names' => $photo_names, 'photos' => $photos));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{


		$rules = array(
            'title'       => 'required',
            'body'        => 'required',
      
        );

        $validator = Validator::make(Input::all(), $rules);


        // process validation
        if ($validator->fails()) {

            return Redirect::to('admin/post/create')
                ->withErrors($validator)
                ->withInput();

        } else {

		   // store
           $post = new Post;
           $post->title       = Input::get('title');
           $post->body        = Input::get('body');
           $tags              = Input::get('tags');
           $photos            = Input::get('photos');
           $post->save();

           // save post first to get ID created, then sync tags on post_tag
           if($tags){
           	$post->tags()->sync($tags);
           }

           // then sync tags on post_photo
           if($photos){
           	$post->photos()->sync($photos);
           }
           

           // redirect
           Session::flash('message', 'Successfully created post!');
           return Redirect::to('admin/post/'.$post->id.'/edit');

         }
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($slug)
	{
		//$post = Post::find($id);
		$post = Post::findBySlug($slug);

		if($post){
			return View::make('posts/show', array('post' => $post));
		}else{
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

		$post = Post::find($id);

		//get selected tags
		$post_tags = $post->tags;
		$selected_tags = array();
		foreach($post_tags as $tag){
			array_push($selected_tags, $tag->id);
		}

		//get selected photos
		$post_photos = $post->photos;
		$selected_photos = array();
		foreach($post_photos as $photo){
			array_push($selected_photos, $photo->id);
		}

		//get list of all tags
		$tags = Tag::all();
		$tag_names = array();
		foreach($tags as $tag){
			$tag_names[$tag->id] = $tag->name;
		}

		//get list of all photos
		$photos = Photo::orderBy('created_at', 'desc')->paginate(6);
		$photo_names = array();
		foreach($photos as $photo){
			$photo_names[$photo->id] = $photo->name;
		}

		$data = array(
			'post' => $post,
			'selected_tags' => $selected_tags,
			'tags' => $tag_names,
			'photos' => $photos,
			'selected_photos' => $selected_photos,
			'photo_names' => $photo_names
		);


		return View::make('posts/edit', $data);
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
            'title'       => 'required',
            'body'        => 'required',
        );

        $validator = Validator::make(Input::all(), $rules);


        // process validation
        if ($validator->fails()) {

        	Session::flash('message', 'Oops, errors!');
            return Redirect::to('admin/post/'.$id.'/edit')
                ->withErrors($validator)
                ->withInput();

        } else {



		   // store
           $post = Post::find($id);
           $post->title       = Input::get('title');
           $post->body        = Input::get('body');
           $tags              = Input::get('tags');
           $photos            = Input::get('photos');
           $post->save();

           // if tags, then sync tags on post_tag table
           // else if tags are all deselected, detach from pivot table
           if($tags){

           	$post->tags()->sync($tags);

       	   }else{

			$post_tags = $post->tags;
			$selected_tags = array();

			foreach($post_tags as $tag){
				array_push($selected_tags, $tag->id);
			}

			$post->tags()->detach($selected_tags);

       	   }

       	   // if photos, then sync photos on post_photo table
           // else if photos are all deselected, detach from pivot table
       	   if($photos){

           	$post->photos()->sync($photos);

       	   }else{

			$post_photos = $post->photos;
			$selected_photos = array();

			foreach($post_photos as $photo){
				array_push($selected_photos, $photo->id);
			}

			$post->photos()->detach($selected_photos);

       	   }

           // redirect
           Session::flash('message', 'Successfully updated post!');
   		   return Redirect::to('admin/post/'.$id.'/edit');
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
		 $post = Post::find($id);
		 $post->delete();

		   // redirect
           Session::flash('message', 'Successfully deleted post!');
   		   return Redirect::to('admin/post');
	}


}
