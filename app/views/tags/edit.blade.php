@extends('layouts/master')


@section('content')




	{{ Form::model($tag, array('route' => array('admin.tag.update', $tag->id), 'method' => 'PUT'))}}

		<div class="field">
			{{ Form::label('name', 'Tag name') }}
			{{ Form::text('name') }}
			<?php echo $errors->first('name'); ?>
		</div>

		<div class="field">
			{{Form::submit('Update tag!')}}
		</div>

	{{ Form::close() }}

	{{ Form::open(array('url' => 'admin/tag/' . $tag->id, 'onsubmit' => 'if(!confirm("Are you sure to delete this item?")){return false;};')) }}
        {{ Form::hidden('_method', 'DELETE') }}
        {{ Form::submit('Delete?', array('class' => 'btn btn-warning')) }}
    {{ Form::close() }}




@stop

