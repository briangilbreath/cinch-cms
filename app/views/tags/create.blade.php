@extends('layouts/master')


@section('content')




	{{ Form::open(array('url' => 'tag')) }}

		<div class="field">
			{{ Form::label('name', 'Tag name') }}
			{{ Form::text('name') }}
			<?php echo $errors->first('name'); ?>
		</div>
		
		<div class="field">
			{{Form::submit('Create Tag!')}}
		</div>

	{{ Form::close() }}

@stop

