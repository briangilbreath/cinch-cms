@extends('layouts/master')


@section('content')

	<div class="tags">
		<ul>
			@foreach($tags as $tag)

				<li>{{link_to('tag/'. $tag->slug, $tag->name)}}</li>

			@endforeach
		</ul>
	</div>


	<?php echo $tags->links(); ?>
@stop