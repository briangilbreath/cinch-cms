@extends('layouts/master')


@section('content')

<h1>Posts tagged with "{{$title}}"</h1>
	<div class="posts">

	@if($posts->count())
		@foreach($posts as $post)

			<div class="post">
				<h2>{{link_to('post/'. $post->slug, $post->title)}}</h2>
				<h5 class="date">{{$post->created_at}}</h5>
				<p> {{$post->body}}</p>

				<span>
				Tags:
				@foreach ($post->tags as $tag)
				 {{link_to('tag/'. $tag->slug, $tag->name)}}
				@endforeach
				</span>
			</div>

		@endforeach
	@else

	No posts tagged with "{{$title}}" yet.

	@endif
	</div>


	<?php echo $posts->links(); ?>
@stop