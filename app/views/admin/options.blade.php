@extends('layouts.admin')


@section('content')

	<h1>Options<h1>

	<h2>{{$intro}}</h2>

	<hr />
	<div class="form-group">
		<h3>Clear Site Cache?</h3>
		<a href="/admin/options/clear-cache" class="btn btn-danger">Clear Cache</a>
	</div>


@stop