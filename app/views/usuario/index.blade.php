@extends('layouts.default')

@section('assets')
{{ Asset::add('css/bootstrap.css') }}
{{ Asset::add('css/font-awesome.css') }}
{{ Asset::add('css/jasny-bootstrap.min.css') }}
{{ Asset::add('css/style.css') }}
{{ Asset::add('css/widgets.css') }}
{{ Asset::add('css/styl/default.css') }}
{{ Asset::add('js/jquery.js') }}
{{ Asset::add('js/bootstrap.js') }}
{{ Asset::add('js/bootbox.min.js') }}
{{ Asset::add('js/jasny-bootstrap.min.js') }}
{{ Asset::add('js/custom.js') }}

@stop

@section('title')
Administracion de Usuarios - SIGEMIPE
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
				<i class="icon-list-alt"></i> Usuarios
			</h2>

			<!-- Breadcrumb -->
			<div class="bread-crumb pull-right">
				<a href="{{ route('home')}}"><i class="icon-home">Home</i></a>

				<!-- Divider -->
				<span class="divider">/</span>

				<a href="#">Maestros</a>

				<!-- Divider -->
				<span class="divider">/</span>

				<a href="#" class="bread-current">Usuarios</a>			
			</div>
			<div class="clearfix"></div>
		</div>
		<!-- Ends Page Heading -->
		<!-- Matter -->
		<div class="matter">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="widget">
							<div class="widget-head">
								<div class="pull-left">Usuarios</div>

								<div class="pull-right">
									<button class="btn btn-sm btn-default" data-toggle="modal" data-target="#ModalCrear">Nuevo Usuario</button>
								</div>

								<div class="clearfix"></div>
							</div>

							<div class="widget-content">
								<table class="table table-striped table-bordered table-hover">
									<thead>
										<tr>
											<th>#</th>
											<th>Nombre Usuario</th>
											<th>Email</th>
											<th>Rol</th>
											<th>Activo</th>
											<th>Controles</th>
										</tr>
									</thead>
									<tbody>
										@if(isset($usuarios))
										@foreach ($usuarios as $element)
										<tr>
											<td>
												{{ $element->id }}
											</td>
											<td>
												{{ $element->username }}
											</td>
											<td>
												{{ $element->email }}
											</td>
											<td>
												{{ $element->rol }}
											</td>
											<td>
												@if ((boolean) $element->activo)
												<span class="label label-success">Activo</span>
												@else
												<span class="label label-danger">Inactivo</span>
												@endif
											</td>
											<td>
												<button class="btn btn-warning" data-id="{{ $element->id }}" data-username="{{ $element->username }}" data-email="{{ $element->email }}" data-rol="{{ $element->username }}" data-activo="{{ $element->activo }}" data-img="{{ $element->foto }}"><i class="icon-pencil" ></i> </button>
												<button class="btn btn-danger" data-id="{{ $element->id }}"><i class="icon-remove"></i> </button>
											</td>
										</tr>
										@endforeach
										@endif
									</tbody>
								</table>
								<div class="widget-foot">
									@if(isset($usuarios))
									<div class="pull-right">
										{{ $usuarios->links() }}
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
				<h4 class="modal-title" id="myModalLabel">Crear Usuario</h4>
			</div>
			{{	Form::open(array('route' => array('usuarios.store') , 'class' => 'form-horizontal', 'files' => true) ) }}
			<div class="modal-body">
				<div class="form-group">
					{{ Form::label('username', 'Username', array('class' => 'col-lg-4 control-label')) }}
					<div class="col-lg-8">
						{{ Form::text('username', null, array('class' => 'form-control', 'placeholder' => 'Nombre de Usuario')) }}
					</div>
				</div>
				<div class="form-group">
					{{ Form::label('email', 'Email', array('class' => 'col-lg-4 control-label')) }}
					<div class="col-lg-8">
						{{ Form::email('email', null, array('class' => 'form-control', 'placeholder' => 'Email del Usuario')) }}
					</div>
				</div>
				<div class="form-group">
					{{ Form::label('password', 'Password', array('class' => 'col-lg-4 control-label')) }}
					<div class="col-lg-8">
						{{ Form::password('password', array('placeholder' => 'Password','class' => 'form-control' )); }}
					</div>
				</div>
				<div class="form-group">
					{{ Form::label('password_confirmation', 'Confirmar Password', array('class' => 'col-lg-4 control-label')) }}
					<div class="col-lg-8">
						{{ Form::password('password_confirmation', array('placeholder' => 'Confirmar Password','class' => 'form-control' )); }}
					</div>
				</div>
				<div class="form-group">
					{{ Form::label('imagen', 'Imagen', array('class' => 'col-lg-4 control-label')) }}
					<div class="col-lg-8">
						<div class="fileinput fileinput-new" data-provides="fileinput">
							<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
								<img data-src="holder.js/100%x100%" alt="100%x100%" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxOTAiIGhlaWdodD0iMTQwIj48cmVjdCB3aWR0aD0iMTkwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI2VlZSI+PC9yZWN0Pjx0ZXh0IHRleHQtYW5jaG9yPSJtaWRkbGUiIHg9Ijk1IiB5PSI3MCIgc3R5bGU9ImZpbGw6I2FhYTtmb250LXdlaWdodDpib2xkO2ZvbnQtc2l6ZToxMnB4O2ZvbnQtZmFtaWx5OkFyaWFsLEhlbHZldGljYSxzYW5zLXNlcmlmO2RvbWluYW50LWJhc2VsaW5lOmNlbnRyYWwiPjE5MHgxNDA8L3RleHQ+PC9zdmc+" style="height: 100%; width: 100%; display: block;">
							</div>
							<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
							<div>
								<span class="btn btn-default btn-file">
									<span class="fileinput-new">Select image</span>
									<span class="fileinput-exists">Change</span>
									{{Form::file('imagen')}}
									<!-- <input type="file" name="">-->
								</span>
								<a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput" id="remove_img">Remove</a>
							</div>
						</div>
					</div>
				</div>
					<div class="form-group">
					{{ Form::label('rol', 'Rol', array('class' => 'col-lg-4 control-label')) }}
					<div class="col-lg-8">
						<div class="make-switch has-switch" data-on="success" data-off="info">
                         <div class="switch-off switch-animate">
                         	<input type="checkbox" checked="">
                         	<span class="switch-left switch-info">Administrador</span>
                         	<label>&nbsp;</label>
                         	<span class="switch-right switch-success">Usuario</span>
                         </div>
                     </div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				{{ Form::submit('Crear', ['class' => 'btn btn-success']) }}
				{{ Form::reset('Cerrar', ['class' => 'btn btn-default', 'id' => 'cerrar_crear'])}}
			</div>
			{{ Form::close() }}
		</div>
	</div>
</div>
@stop


@section('scripts')
{{ Asset::js() }}
<script type="text/javascript">
	var URL = '{{ route('usuarios.index') }}';

	$('#cerrar_crear').on('click', function(){
		$('#remove_img').click();
		$('#ModalCrear').modal('hide');
	});
</script>
@stop