@extends('layouts.admin')


@section('content')


		<h1>Update Profile<h1>

		<h2>Welcome {{Auth::user()->username}}. Your email address is {{Auth::user()->email}}</h2>


		<hr>

		{{ Form::open(array('route' => array('admin.user.update', $user->id), 'method' => 'PUT'))}}

			<div class="form-group">
				{{ Form::label('current_password', 'Current Password') }}
				{{ Form::text('current_password', null, array('class' => 'form-control')) }}
				<?php echo $errors->first('current_password'); ?>
			</div>

			<div class="form-group">
				{{ Form::label('password', 'Password') }}
				{{ Form::text('password', null, array('class' => 'form-control')) }}
				<?php echo $errors->first('password'); ?>
			</div>


			<div class="form-group">
				{{Form::submit('Update User!', array('class' => 'btn btn-success'))}}
			</div>

		{{ Form::close() }}



@stop