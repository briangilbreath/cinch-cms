@extends('layouts/master')


@section('content')


	<article>

		<div class="post">
			<h2>{{$post->title}}</h2>
			<h5 class="date">{{$post->created_at}}</h5>
			<p> {{nl2br($post->body)}}</p>

			@if(!empty($post->tags))
				<span>
				Tags:
				@foreach ($post->tags as $tag)
				 {{link_to('tag/'. $tag->id,$tag->name)}}
				@endforeach
				</span>
			@endif
		</div>

	</article>


@if(Auth::user())
	{{ link_to_route('admin.post.edit', 'edit', $parameters = array('id' => $post->id), $attributes = array())}}
@endif
	

@stop