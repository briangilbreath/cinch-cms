<?php

class PostController extends \BaseController {


	public function __construct()
    {
        $this->beforeFilter('csrf', array('on' => 'post'));
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$posts = Post::orderBy('created_at', 'desc')->paginate(4);


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
		$photos = Photo::orderBy('created_at', 'desc')->take(12)->get();
		$photo_names = array();
		foreach($photos as $photo){
			$photo_names[$photo->id] = $photo->name;
		}


		return View::make('posts/create', array('tag_names' => $tag_names, 'photo_names' => $photo_names));
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
           if($tags){
           	$post->photos()->sync($photos);
           }
           

           // redirect
           Session::flash('message', 'Successfully created post!');
           return Redirect::to('admin/post');

         }
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$post = Post::find($id);

		return View::make('posts/show', array('post' => $post));
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

		//get list of all tags
		$tags = Tag::all();
		$tag_names = array();
		foreach($tags as $tag){
			$tag_names[$tag->id] = $tag->name;
		}


		return View::make('posts/edit', array('post' => $post, 'selected_tags' => $selected_tags, 'tags' => $tag_names));
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
           Session::flash('message', 'Successfully delete post!');
   		   return Redirect::to('admin/post');
	}


}
