@extends('layouts/master')


@section('content')




	{{ Form::open(array('route' => 'sessions.store')) }}

		<div class="form-group">
			{{ Form::label('email', 'Email') }}
			{{ Form::text('email', null, array('class' => 'form-control')) }}
			<?php echo $errors->first('email'); ?>
		</div>

		<div class="form-group">
			{{ Form::label('password', 'Password') }}
			{{ Form::password('password', array('class' => 'form-control')) }}
			<?php echo $errors->first('password'); ?>
		</div>
		
		<div class="form-group">
			{{Form::submit('Log in!', array('class' => 'btn btn-success'))}}
		</div>

	{{ Form::close() }}

@stop

