@extends('layouts.admin')


@section('content')

	<h1>Dashboard<h1>

	<h2>Welcome. Your email address is {{Auth::user()->email}}</h2>


@stop