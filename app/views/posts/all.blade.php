@extends('layouts/master')


@section('content')

	<div class="posts">
	@foreach($posts as $single_post)

		<div class="post">

				<h2>{{link_to($single_post->slug, $single_post->title)}}</h2>
				<h5 class="date">{{$single_post->created_at}}</h5>
				<p> {{Str::words($single_post->body,$words = 50, $end='...');}}</p>
				@if($single_post->tags)
					@if($single_post->tags->first())
						<span class="tags">
						Tags:
						@foreach ($single_post->tags as $tag)
						 {{link_to('tag/'. $tag->slug ,$tag->name)}}
						@endforeach
						</span>
					@endif
				@endif

		</div>

	@endforeach
	</div>


	<?php echo $posts->links(); ?>
@stop