@extends('layouts.default')

@section('assets')
{{ Asset::add('css/bootstrap.css') }}
{{ Asset::add('css/font-awesome.css') }}
{{ Asset::add('css/style.css') }}
{{ Asset::add('css/widgets.css') }}
{{ Asset::add('js/jquery.js') }}
{{ Asset::add('js/bootstrap.js') }}
{{ Asset::add('js/custom.js') }}

@stop

@section('title')
AREA - SIGEMIPE
@stop

@section('css')
{{ Asset::css() }} 	
@stop

@include('layouts.navbar')

@section('header')
<!-- Header Starts -->
<header>
	<!-- Container -->
	<div class="container">
		<!-- Row -->
		<div class="row">
			<!-- Logo Section -->
			<div class="col-md-4">
				<!-- Logo -->
				<div class="logo">
					<h1>
						<a href="#">SIGEMIPE</a>
					</h1>
					<p class="meta">Sistema de Gestion Misional Personeria</p>
				</div>
				<!-- Ends Logo -->
			</div>
			<!-- Ends Logo Section -->
			<!-- Button Section -->
			<div class="col-md-4">
				<!-- Buttons -->
				<ul class="nav nav-pills">
					<li class="dropdown dropdown-big">
						<a href="#">
							<i class="icon-envelope-alt"></i>
							Mensajes
						</a>
					</li>
					<li class="dropdown dropdown-big">
						<a href="#">
							<i class="icon-envelope-alt"></i>
							Mensajes
						</a>
					</li>
					<li class="dropdown dropdown-big">
						<a href="#">
							<i class="icon-envelope-alt"></i>
							Mensajes
						</a>
					</li>
				</ul>
				<!-- Ends Buttons -->
			</div>
			<!-- Ends Button Sections -->
		</div>		
		<!-- Fin Row -->
	</div>
	<!-- Fin Continer -->
</header>
@stop

@section('content')
<div class="content">
	@include('layouts.sidebar')
	<!-- Main Bar -->
	<div class="mainbar">
		<!-- Page Heading -->
		<div class="page-head">
			<h2 class="pull-left">
				<i class="icon-list-alt"></i> Area
			</h2>

			<!-- Breadcrumb -->
			<div class="bread-crumb pull-right">
				<a href="{{ route('home') }}"><i class="icon-home"> Home </i></a>

				<!-- Divider -->
				<span class="divider">/</span>

				<a href="#">Maestros</a>				

				<!-- Divider -->
				<span class="divider">/</span>

				<a href="" class="bread-current">Area</a>

			</div>
			<div class="clearfix"></div>
		</div>
		<!-- Ends Page Heading -->
		<!-- Matter -->
		<div class="matter">
			<div class="container">
				<div class="row">
					<!-- Widgets -->
					<div class="col-md-12">
						<div class="widget">
							<!-- Widget Title -->
							<div class="widget-head">
								<!-- Tabla -->
								<div class="pull-left">Areas </div>

								<div class="pull-right">
									<button class="btn btn-sm btn-default" data-toggle="modal" data-target="#ModalCrear"> Nueva Area </button>
									
								</div>

								<div class="clearfix"></div>
							</div>
							<!-- Widget Content -->
							<div class="widget-content">
								<table class="table table-striped table-bordered table-hover">
									<thead>
										<tr>
											<th>#</th>
											<th>Nombre</th>
											<th>Editar</th>
											<th>Eliminar</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($areas as $element)
										<tr>
											<td> {{ $element->id }}</td>
											<td> {{ $element->nombre }}</td>
											<td>
												{{ link_to_route('area.edit', 'Editar', array($element->id), array('class' => 'btn btn-warning')) }}
											</td>
											<td>
												{{Form::open(array('method' => 'DELETE', 'route' => array('area.index', $element->id))) }}
												{{ Form::submit('Eliminar', array('class' => 'btn btn-danger')) }}
												{{ Form::close()}}
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>
								<div class="widget-foot">
									<div class="pull-right">
										{{ $areas->links() }}
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
							<!-- Ends Widget Content -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Ends Main Bar -->
</div>
@stop



@section('modals')
<div class="modal fade" id="ModalCrear" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Crear Area</h4>
			</div>
			<form class="form-horizontal" role="form" accept-charset="UTF-8" method="POST" action="{{ route('area.store') }}">
				<div class="modal-body">
					{{ Form::token() }}
					<div class="form-group">
						<label for="nombre" class="col-lg-4 control-label">Nombre</label>
						<div class="col-lg-8">
							<input type="text" class="form-control" placeholder="Nombre del Area" name="nombre">
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-success">Crear</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				</div>
			</form>
		</div>
	</div>
</div>
@stop

@section('scripts')
{{ Asset::js() }}
@stop