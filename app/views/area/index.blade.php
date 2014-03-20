@extends('layouts.default')

@section('assets')
{{ Asset::add('css/bootstrap.css') }}
{{ Asset::add('css/font-awesome.css') }}
{{ Asset::add('css/style.css') }}
{{ Asset::add('css/widgets.css') }}
{{ Asset::add('js/jquery.js') }}
{{ Asset::add('js/bootstrap.js') }}
@stop

@section('title')
AREA - SIGEMIPE
@stop

@section('css')
{{ Asset::css() }} 	
@stop

@section('content')
	@include('layouts.navbar')
@stop

@section('scripts')
{{ Asset::js() }}
@stop