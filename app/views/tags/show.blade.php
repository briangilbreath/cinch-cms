@extends('layouts/master')


@section('content')

<h2>Posts tagged with "{{$title}}"</h2>
	<div class="posts">
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
	</div>


	<?php echo $posts->links(); ?>
@stop