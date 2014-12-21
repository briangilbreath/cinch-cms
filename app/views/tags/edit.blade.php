@extends('layouts.admin')


@section('content')




	{{ Form::model($tag, array('route' => array('admin.tag.update', $tag->id), 'method' => 'PUT'))}}

		<div class="form-group">
			{{ Form::label('name', 'Tag name') }}
			{{ Form::text('name', null, array('class' => 'form-control')) }}
			<?php echo $errors->first('name'); ?>
		</div>

		<div class="form-group">
			{{Form::submit('Update Tag!', array('class' => 'btn btn-success'))}}
		</div>
		

	{{ Form::close() }}

	{{ Form::open(array('url' => 'admin/tag/' . $tag->id, 'onsubmit' => 'if(!confirm("Are you sure to delete this item?")){return false;};')) }}
        {{ Form::hidden('_method', 'DELETE') }}
        {{ Form::submit('Delete?', array('class' => 'btn btn-warning')) }}
    {{ Form::close() }}




@stop

