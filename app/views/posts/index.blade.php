@extends('layouts/master')


@section('content')

	<div class="posts">
	@foreach($posts as $post)

		<div class="post">

				<h2>{{link_to('post/'. $post->id, $post->title)}}</h2>
				<h5 class="date">{{$post->created_at}}</h5>
				<p> {{Str::words($post->body,$words = 50, $end='...');}}</p>

				@if(!empty($post->tags))
					<span>
					Tags:
					@foreach ($post->tags as $tag)
					 {{link_to('tag/'. $tag->id,$tag->name)}}
					@endforeach
					</span>
				@endif

		</div>

	@endforeach
	</div>


	<?php echo $posts->links(); ?>
@stop