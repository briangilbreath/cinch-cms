@extends('layouts.admin')


@section('content')


	{{ Form::open(array('route' => 'admin.tag.store')) }}

		<div class="form-group">
			{{ Form::label('name', 'Tag name') }}
			{{ Form::text('name', null, array('class' => 'form-control')) }}
			<?php echo $errors->first('name'); ?>
		</div>
		
		<div class="field">
			{{Form::submit('Create Tag!', array('class' => 'btn btn-success'))}}
		</div>

	{{ Form::close() }}

@stop

