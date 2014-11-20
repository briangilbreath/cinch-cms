@extends('layouts/master')


@section('content')


	<article>

		<div class="post">
			<h2>{{$post->title}}</h2>
			<h5 class="date">{{$post->created_at}}</h5>
			<p> {{nl2br($post->body)}}</p>

			@if($post->tags)
				@if($post->tags->first())
				<span>
				Tags:
				@foreach ($post->tags as $tag)
				 {{link_to('tag/'. $tag->id,$tag->name)}}
				@endforeach
				</span>
				@endif
			@endif
		</div>

	</article>


@if(Auth::user())
	{{ link_to_route('admin.post.edit', 'edit', $parameters = array('id' => $post->id), $attributes = array())}}
@endif
	

@stop