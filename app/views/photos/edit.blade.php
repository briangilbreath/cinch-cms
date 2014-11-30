@extends('layouts.admin')


@section('content')


<h1>Upload a new photo</h1>

	{{ Form::model($photo, array('route' => array('admin.photo.update', $photo->id), 'method' => 'PUT'))}}

		<div class="form-group">
			{{ Form::label('title', 'Title') }}
			{{ Form::text('title', null, array('class' => 'form-control')) }}
			<?php echo $errors->first('title'); ?>
			
		</div>

		<div class="field">
			{{Form::submit('Update Photo', array('class'=> 'btn btn-success'))}}
		</div>

	{{ Form::close() }}

@stop

