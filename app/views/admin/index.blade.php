@extends('layouts/master')


@section('content')

	<h1>"Welcome. Your email address is {{Auth::user()->email}}<h1>


	<hr>

	<h3>Posts</h3>
	<ul>
		<li>{{ link_to_route('admin.post.create', 'Create Post')}}</li>
		<li>{{ link_to_route('admin.post.index', 'Post Listing')}}</li>
	</ul>

	<h3>Tags</h3>
	<ul>
		<li>{{ link_to_route('admin.tag.create', 'Create Tag')}}</li>
		<li>{{ link_to_route('admin.tag.index', 'Tag Listing')}}</li>
	</ul>

	<h3>Image</h3>
	<ul>
		<li>{{ link_to_route('admin.photo.create', 'Upload Image')}}</li>
		<li>{{ link_to_route('admin.photo.index', 'Image Listing')}}</li>
	</ul>

@stop