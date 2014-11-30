@extends('layouts.admin')


@section('content')

<h1>Posts</h1>

<div class="table-responsive">
	<table class="table table-striped">
	  <thead>
	    <tr>
	      <th>Title</th>
	      <th>Date</th>
	      <th>Tags</th>
	      <th>Edit</th>
	      <th>Delete</th>
	    </tr>
	  </thead>
	  <tbody>
	   <div class="posts">
		
			@foreach($posts as $single_post)
				<tr>
			      <td>{{link_to($single_post->slug, $single_post->title)}}</td>
			      <td>{{$single_post->created_at}}</td>
			      <td>@if($single_post->tags)
							@if($single_post->tags->first())
								<span>
								@foreach ($single_post->tags as $tag)
								 {{link_to('tag/'. $tag->id,$tag->name)}}
								@endforeach
								</span>
							@endif
						@endif
				  </td>
			      <td>
			      	<a href="/admin/post/{{$single_post->id}}/edit">
					  <button class="btn btn-success btn-sm" type="button">
						Edit
					  </button>
					</a>
				  </td>

			      <td>
		      		{{ Form::open(array('url' => 'admin/post/' . $single_post->id, 'onsubmit' => 'if(!confirm("Are you sure to delete '. $single_post->title . ' item?")){return false;};')) }}
				        {{ Form::hidden('_method', 'DELETE') }}
				        {{ Form::submit('Delete?', array('class' => 'btn btn-warning')) }}
				    {{ Form::close() }}
			      </td>
			      
			   	</tr>
			@endforeach
	 	
	</div>
	   
	  </tbody>
	</table>
</div>

	


	<?php echo $posts->links(); ?>
@stop