@extends('layouts.default')

@section('assets')
{{ Asset::add('css/bootstrap.css') }}
{{ Asset::add('css/font-awesome.css') }}
{{ Asset::add('css/style.css') }}
{{ Asset::add('css/widgets.css') }}
{{ Asset::add('css/styl/default.css') }}
{{ Asset::add('js/jquery.js') }}
{{ Asset::add('js/bootstrap.js') }}
{{ Asset::add('js/bootbox.min.js') }}
{{ Asset::add('js/noty/packaged/jquery.noty.packaged.min.js') }}
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
@include('layouts.header')
@stop

@section('content')
<div class="content">
	@include('layouts.sidebar')
	<!-- Main Bar -->
	<div class="mainbar">
		<!-- Page Heading -->
		<div class="page-head">
			<h2 class="pull-left">
				<i class="icon-list-alt"></i> Área
			</h2>

			<!-- Breadcrumb -->
			<div class="bread-crumb pull-right">
				<a href="{{ route('home') }}"><i class="icon-home"> Home </i></a>

				<!-- Divider -->
				<span class="divider">/</span>

				<a href="#">Maestros</a>				

				<!-- Divider -->
				<span class="divider">/</span>

				<a href="" class="bread-current">Áreas</a>

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
								<div class="pull-left">Áreas </div>

								<div class="pull-right">
									<button class="btn btn-sm btn-default" data-toggle="modal" data-target="#ModalCrear"> Nueva Área </button>
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
											<th>Controles</th>
										</tr>
									</thead>
									<tbody>
										@if(isset($areas))
										@foreach ($areas as $element)
										<tr>
											<td> {{ $element->id }}</td>
											<td> {{ $element->nombre }}</td>
											<td>
												<button class="btn btn-warning" data-id="{{ $element->id }}" data-nombre="{{ $element->nombre }}"><i class="icon-pencil" ></i> </button>
												<button class="btn btn-danger" data-id="{{ $element->id }}"><i class="icon-remove"></i> </button>
											</td>
										</tr>
										@endforeach
										@endif
									</tbody>
								</table>
								<div class="widget-foot">
									@if(isset($areas))
									<div class="pull-right">
										{{ $areas->links() }}
									</div>
									@endif
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
<!-- Modal de Create -->
<div class="modal fade" id="ModalCrear" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Crear Area</h4>
			</div>
			<form class="form-horizontal" role="form" accept-charset="UTF-8" method="POST" action="{{ route('areas.store') }}">
				<div class="modal-body">
					{{ Form::token() }}

					@if(Session::get('Error_Store'))
					@if ($errors->any())
					<div class="alert alert-danger alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						{{ implode('', $errors->all('<li class="error">:message</li>')) }}
					</div>
					@endif
					@endif

					<div class="form-group">
						{{ Form::label('nombre','Nombre', array('class' => 'col-lg-4 control-label'))}}
						<div class="col-lg-8">
							{{ Form::text('nombre', null, array('placeholder' => 'Nombre del Area', 'class' => 'form-control', 'id' => 'nombre_crear')) }}
						</div>
					</div>
				</div>
				<div class="modal-footer">
					{{ Form::submit('Crear', array('class' => 'btn btn-success')) }} 
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Modal de Edit -->
<div class="modal fade" id="ModalEditar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Editar Area</h4>
			</div>
			{{ Form::model($areas, array('method' => 'PATCH', 'route' => array('areas.update'), 'class' => 'form-horizontal')) }}
			<div class="modal-body">

				@if(Session::get('Error_Update'))
				@if ($errors->any())
				<div class="alert alert-danger alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					{{ implode('', $errors->all('<li class="error">:message</li>')) }}
				</div>
				@endif
				@endif

				<div class="form-group">
					<label for="id" class="col-lg-4 control-label">Id</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" placeholder="id" name="id" disabled id="id_editar">
					</div>
				</div>
				<div class="form-group">
					<label for="nombre" class="col-lg-4 control-label">Nombre</label>
					<div class="col-lg-8">
						{{ Form::text('nombre', null, array('placeholder' => 'Nombre del Area', 'class' => 'form-control', 'id' => 'nombre_editar')) }}
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-success">Actualizar</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			</div>
			{{ Form::close() }}
		</div>
	</div>
</div>

<div id="div_eliminar" style="display:none">
	{{ Form::open(array('method' => 'DELETE', 'route' => array('areas.destroy'))) }}
	{{ Form::submit('Eliminar', array('class' => 'btn btn-danger')) }}
	{{ Form::close()}}
</div>


@stop


@section('scripts')
{{ Asset::js() }}
<script type="text/javascript">

var URL = '{{ route('areas.index') }}';

	@if(Session::get('Guardado'))
	noty({layout : 'topCenter', type : 'success', text: '{{Session::get('Guardado')}}', timeout : 2000, modal: true});
	@endif

	@if(Session::get('Actualizado'))
	noty({layout : 'topCenter', type : 'warning', text: '{{Session::get('Actualizado')}}', timeout : 2000, modal: true});
	@endif

	@if(Session::get('Borrado'))
	noty({layout : 'topCenter', type : 'error', text: '{{Session::get('Borrado')}}', timeout : 2000, modal: true});
	@endif

	@if(Session::get('Error_Store'))
	@if ($errors->any())
		$('#ModalCrear').modal('show');
		$('#id_editar').val('');
		$('#nombre_editar').val('');
	@endif
	@endif

	@if(Session::get('Error_Update'))
	@if ($errors->any())
	var id ={{Session::get('id')}};
	$('#id_editar').val(id);
	$('#ModalEditar form').attr('action', URL+'/'+id);
	$('#ModalEditar').modal('show');
	$('#nombre_crear').val('');
	@endif
	@endif

	$('.btn-warning').on('click', function(){
		var id = $(this).data('id');
		var nombre = $(this).data('nombre');
		$('#ModalEditar  .alert  button').click()
		$('#ModalEditar form').attr('action', URL+'/'+id);
		$('#id_editar').val(id);
		$('#nombre_editar').val(nombre);
		$('#ModalEditar').modal('show');
	});

	$('.btn-danger').on('click', function(){
		var id = $(this).data('id');
		bootbox.dialog({
			message: 'Realmente desea eliminar el area con Id :<strong>' + id + '</strong>',
			buttons: {
				si : {
					label : "Confirmar",
					className :"btn-danger",
					callback: function(){
						$("#div_eliminar form").attr('action', URL +'/'+id);
						$("#div_eliminar form").submit();
					}
				},
				no : {
					label : "Cancelar",
					className : "btn-default",
					callback : function(){
					}
				}
			}
		});
	});
</script>
@stop