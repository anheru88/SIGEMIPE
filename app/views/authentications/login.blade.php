@extends('layouts.default')

@section('assets')
{{ Asset::add('css/bootstrap.css')}}
{{ Asset::add('css/font-awesome.css')}}
{{ Asset::add('css/style.css')}}
@stop

@section('title')
SIGEMIPE - ADMIN - LOGIN
@stop

@section('css')
{{ Asset::css() }} 	
@stop

@section('content')
<!-- Form area -->
<div class="admin-form">
	<div class="container">

		<div class="row">
			<div class="col-md-12">
				<!-- Widget starts -->
				<div class="widget worange">
					<!-- Widget head -->
					<div class="widget-head">
						<i class="icon-lock"></i> Login - <span>Sistema de Gestion Misional Personeria de Cartagena<span>
					</div>

					<div class="widget-content">
						<div class="padd">
							<!-- Login form -->
							{{ Form::open(array('route' => 'Authentication.store', 'class' => 'form-horizontal'))}}
								<!-- Email -->
								<div class="form-group">
								{{ Form::label('username', 'Usuario', array('class' => 'control-label col-lg-3')) }}
									<div class="col-lg-9">
									{{ Form::text('username', null, array('placeholder' => 'Usuario', 'id' => "inputEmail", 'class' =>"form-control")) }}
									</div>
								</div>
								<!-- Password -->
								<div class="form-group">
									{{ Form::label('password', 'Password', array('class' => 'control-label col-lg-3')) }}
									<div class="col-lg-9">
										{{ Form::password('password', array('placeholder' => 'Password', 'id' => "inputPassword", 'class' =>"form-control")) }}
									</div>
								</div>
								<div class="col-lg-9 col-lg-offset-2">
									{{ Form::submit('Ingresar', array('class' => 'btn btn-success')) }}
									<button type="reset" class="btn btn-default" id="borrar">Borrar</button>
								</div>
								<br>
							{{ Form::close() }}

						</div>
					</div>

					<div class="widget-foot">
						No Registrado?. Favor Comunicarse con el Administrador del Sistema.
					</div>
				</div>  
			</div>
		</div>
	</div> 
</div>
@stop

@section('script')
@stop