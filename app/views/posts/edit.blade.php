@extends('layouts.admin')


@section('content')

<div class="row">
<h1> Edit Post </h1>  <a class="btn btn-success view-post-button" href="/{{ $post->slug }}" target="_blank">View Post</a>
<div class="form-group">
	{{ Form::label('', 'Url') }}
	<div class="well well-sm">
		{{ $post->slug }}
	</div>



	
</div>


	{{ Form::model($post, array('route' => array('admin.post.update', $post->id), 'method' => 'PUT'))}}

		<div class="form-group">
			{{ Form::label('title', 'Post Title') }}
			{{ Form::text('title', null, array('class' => 'form-control')) }}
			<?php echo $errors->first('title'); ?>
		</div>


		<div class="form-group">
			{{ Form::label('body', 'Post Body') }}
			{{ Form::textarea('body', null, array('class' => 'form-control')) }}
			<?php echo $errors->first('body'); ?>
		</div>

		<div class="form-group">
			{{ Form::label('body', 'Post Tags') }}
			{{ Form::select('tags[]', $tags, $selected_tags, array('multiple','class' => 'form-control')) }}
		</div>

		<div class="form-group ajaxable">
			{{ Form::label('photo', 'Thumbnail') }}
	
			<select multiple="multiple" class="form-control image-picker" name="photos[]">
				@foreach($photo_names as $photo_id => $photo_name)

					@if(in_array($photo_id, $selected_photos))
						<option data-img-src="/uploads/{{$photo_name}}" selected value="{{$photo_id}}">{{$photo_name}}</option>
					@else
						<option data-img-src="/uploads/{{$photo_name}}" value="{{$photo_id}}">{{$photo_name}}</option>
					@endif
					
				@endforeach
				
			</select>

			<div class="ajax-pagination">
				<?php echo $photos->links(); ?>
			</div>
		</div>

		<div class="form-group">
			{{Form::submit('Update Post!', array('class' => 'btn btn-success'))}}
		</div>

	{{ Form::close() }}

	{{ Form::open(array('url' => 'admin/post/' . $post->id, 'onsubmit' => 'if(!confirm("Are you sure to delete this item?")){return false;};')) }}
        {{ Form::hidden('_method', 'DELETE') }}
        {{ Form::submit('Delete?', array('class' => 'btn btn-warning')) }}
    {{ Form::close() }}




@stop

