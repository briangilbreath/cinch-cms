@extends('layouts.admin')


@section('content')

<h1>tags</h1>

<div class="table-responsive">
	<table class="table table-striped">
	  <thead>
	    <tr>
	      <th>Name</th>
	      <th>Date</th>
	      <th>Edit</th>
	      <th>Delete</th>
	    </tr>
	  </thead>
	  <tbody>
	   <div class="tags">
		
			@foreach($tags as $single_tag)
				<tr>
			      <td>{{link_to('tag/'.$single_tag->slug, $single_tag->name)}}</td>
			      <td>{{$single_tag->created_at}}</td>
			      <td>
			      	<a href="/admin/tag/{{$single_tag->id}}/edit">
					  <button class="btn btn-success btn-sm" type="button">
						Edit
					  </button>
					</a>
				  </td>

			      <td>
		      		{{ Form::open(array('url' => 'admin/tag/' . $single_tag->id, 'onsubmit' => 'if(!confirm("Are you sure to delete '. $single_tag->Name . ' item?")){return false;};')) }}
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

	


	<?php echo $tags->links(); ?>
@stop