@extends('layouts.default')

@section('assets')
{{ Asset::add('css/bootstrap.css') }}
{{ Asset::add('css/font-awesome.css') }}
{{ Asset::add('css/style.css') }}
{{ Asset::add('css/widgets.css') }}
{{ Asset::add('js/jquery.js') }}
{{ Asset::add('js/bootstrap.js') }}
{{ Asset::add('js/bootbox.min.js') }}
{{ Asset::add('js/custom.js') }}

@stop

@section('title')
@stop

@section('css')
{{ Asset::css() }} 	
@stop

@include('layouts.navbar')

@section('header')
@stop

@section('content')
@stop


@section('modals')
@stop


@section('scripts')
{{ Asset::js() }}
@stop