@extends('layouts/master')


@section('content')

	<div class="posts">
	@foreach($posts as $post)

		<div class="post row">

			@if($post->photos()->first())
			<div class="col-md-4">
				<img src="/uploads/{{$post->photos()->first()['thumb_name']}}">
			</div>
			@endif

			<div class="col-md-8">
				<h2>{{link_to('post/'. $post->id, $post->title)}}</h2>
				<h5 class="date">{{$post->created_at}}</h5>
				<p> {{$post->body}}</p>

				<span>
				Tags:
				@foreach ($post->tags as $tag)
				 {{link_to('tag/'. $tag->id,$tag->name)}}
				@endforeach
				</span>
			</div>
		</div>

	@endforeach
	</div>


	<?php echo $posts->links(); ?>
@stop