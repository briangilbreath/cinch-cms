@extends('layouts/master')


@section('content')

	<div class="posts">
	@foreach($posts as $single_post)

		<div class="post">

				<h2>{{link_to('post/'. $single_post->id, $single_post->title)}}</h2>
				<h5 class="date">{{$single_post->created_at}}</h5>
				<p> {{Str::words($single_post->body,$words = 50, $end='...');}}</p>

				@if(!empty($single_post->tags))
					<span>
					Tags:
					@foreach ($single_post->tags as $tag)
					 {{link_to('tag/'. $tag->id,$tag->name)}}
					@endforeach
					</span>
				@endif

		</div>

	@endforeach
	</div>


	<?php echo $posts->links(); ?>
@stop