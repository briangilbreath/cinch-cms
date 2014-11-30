@extends('layouts.admin')


@section('content')

<h1>Photos</h1>

<div class="table-responsive">
	<table class="table table-striped">
	  <thead>
	    <tr>
	      <th>Photo</th>
	      <th>Title</th>
	      <th>Date</th>
	      <th>Edit</th>
	      <th>Delete</th>
	    </tr>
	  </thead>
	  <tbody>
	   <div class="photos">
		
			@foreach($photos as $single_photo)
				<tr>
				  <td><a href="/uploads/{{$single_photo->name}}" title="{{$single_photo->title}}"><img class="admin-thumb" src="/uploads/{{$single_photo->thumb_name}}"></a></td>
			      <td>{{link_to('/uploads/'. $single_photo->name, $single_photo->title)}}</td>
			      <td>{{$single_photo->created_at}}</td>
			      <td>
			      	<a href="/admin/photo/{{$single_photo->id}}/edit">
					  <button class="btn btn-success btn-sm" type="button">
						Edit
					  </button>
					</a>
				  </td>
				  
			      <td>
		      		{{ Form::open(array('url' => 'admin/photo/' . $single_photo->id, 'onsubmit' => 'if(!confirm("Are you sure to delete '. $single_photo->title . ' item?")){return false;};')) }}
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

	


	<?php echo $photos->links(); ?>
@stop