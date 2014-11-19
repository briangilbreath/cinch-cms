@extends('layouts/master')


@section('content')


<h1>Upload a new photo</h1>

	{{ Form::open(array('route' => 'admin.photo.store', 'files' =>true)) }}

		<div class="form-group">
			{{ Form::label('title', 'Title') }}
			{{ Form::text('title', null, array('class' => 'form-control')) }}
			<?php echo $errors->first('title'); ?>
			
		</div>

		<div class="form-group">
			{{ Form::label('fileName', 'Upload: ') }}
			{{ Form::file('fileName') }}
			<?php echo $errors->first('fileName'); ?>

		</div>

		<div class="field">
			{{Form::submit('Upload Photo', array('class'=> 'btn btn-success'))}}
		</div>

	{{ Form::close() }}

@stop

