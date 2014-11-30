@extends('layouts.admin')


@section('content')


<h1 class="page-header">Create Post</h1>

	{{ Form::open(array('url' => 'admin/post')) }}

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
			{{ Form::label('tags[]', 'Post Tags') }}
			{{ Form::select('tags[]', $tag_names, '', array('multiple', 'class' => 'form-control')) }}
		</div>

		<div class="form-group ajaxable">
			{{ Form::label('photo', 'Thumbnail') }}
			<select multiple="multiple" class="form-control image-picker" name="photos[]">
				@foreach($photo_names as $photo_id => $photo_name)

					<option data-img-src="/uploads/{{$photo_name}}" value="{{$photo_id}}">{{$photo_name}}</option>
					
				@endforeach
				
			</select>
			<div class="ajax-pagination">
				<?php echo $photos->links(); ?>
			</div>
		</div>

		



		<div class="field">
			{{Form::submit('Create Post!', array('class'=> 'btn btn-success'))}}
		</div>

	{{ Form::close() }}

@stop

