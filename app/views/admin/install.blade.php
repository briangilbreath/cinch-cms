@extends('layouts/master')


@section('content')

	
<h1 class="page-header">Create Admin User</h1>

	{{ Form::open(array('url' => 'installing')) }}

		<div class="form-group">
			{{ Form::label('username', 'Username') }}
			{{ Form::text('username', null, array('class' => 'form-control')) }}
			<?php echo $errors->first('username'); ?>
		</div>

		<div class="form-group">
			{{ Form::label('email', 'Email') }}
			{{ Form::text('email', null, array('class' => 'form-control')) }}
			<?php echo $errors->first('email'); ?>
		</div>

		<div class="form-group">
			{{ Form::label('password', 'Password') }}
			{{ Form::password('password', null, array('class' => 'form-control')) }}
			<?php echo $errors->first('password'); ?>
		</div>



		<div class="field">
			{{Form::submit('Create User', array('class'=> 'btn btn-success'))}}
		</div>

	{{ Form::close() }}



@stop