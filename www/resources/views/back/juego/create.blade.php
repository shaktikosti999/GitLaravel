@extends('layout.admin')
	@section('script')
		<script src="{{asset('/assets/plugins/jquery-validation/js/jquery.validate.min.js')}}" type="text/javascript"></script>
		<script>
		$(function(){
			$('#form-agregar').validate();
		});
		</script>
	@stop

	@section('contenido')
		<div class="col-lg-7 col-md-6 col-md-offset-3">
		<!-- START PANEL -->
		<div class="panel panel-transparent">
	  		<div class="panel-body">
			    <form id="form-agregar" role="form" autocomplete="off" method="POST" action="{{url('/administrador/agregar/juego.html')}}">
			    	{!!csrf_field()!!}
			    	<input type="hidden" name="_method" value="PUT">
		      		<div class="row clearfix">
			        	<div class="col-sm-12">
			          		<div class="form-group form-group-default" aria-required="true">
			            		<label for="nombre">Nombre</label>
			            		<input type="text" id="nombre" class="form-control required" name="nombre" required="required" aria-required="true" aria-invalid="true">
			          		</div>
			        	</div>
			      	</div>
			      	<div class="row">
			        	<div class="col-sm-12">
			          		<div class="form-group form-group-default">
			            		<label for="titulo">Título</label>
			            		<input type="text" id="titulo" class="form-control required" name="titulo" aria-required="true" aria-invalid="true" >
			          		</div>
			          	</div>
			      	</div>
			      	<div class="row">
			        	<div class="col-sm-12">
			          		<div class="form-group form-group-default">
			            		<label for="linea">Linea de Juego</label>
			            		<select id="linea" class="form-control required" name="linea" aria-required="true" aria-invalid="true">
			            			<option value="null">Seleccione una...</option>
			            			@foreach($lineas as $val)
			            			<option value="{{$val->id}}">{{$val->nombre}}</option>
			            			@endforeach
			            		</select>
			          		</div>
			          	</div>
			      	</div>
			      	<div class="row">
			        	<div class="col-sm-12">
			          		<div class="form-group form-group-default">
			            		<label for="resumen">Resumen</label>
			            		<textarea id="resumen" class="form-control" name="resumen" aria-required="true" aria-invalid="true"></textarea>
			          		</div>
			          	</div>
			      	</div>
			      	<div class="row">
			        	<div class="col-sm-12">
			          		<div class="form-group form-group-default">
			            		<label for="aprender">Aprender a Jugar</label>
			            		<textarea id="aprender" class="form-control" name="aprender" aria-required="true" aria-invalid="true"></textarea>
			          		</div>
			          	</div>
			      	</div>
			      	<div class="row">
			        	<div class="col-sm-12">
			          		<div class="form-group form-group-default">
			            		<label for="reglas">Reglas del Juego</label>
			            		<textarea id="reglas" class="form-control" name="reglas" aria-required="true" aria-invalid="true"></textarea>
			          		</div>
			          	</div>
			      	</div>
			      	<div class="clearfix"></div>
			      	<input class="btn btn-primary" type="submit" value="Agregar Juego">
			    </form>
		  	</div>
		</div>
		@if(count($errors) > 0)
			@foreach($errors->all() as $key => $val)
				<div class="alert alert-danger" role="alert">
					<button class="close" data-dismiss="alert"></button>
		          	<strong>{{$key+1}}: </strong>{{$val}}
		        </div>
        	@endforeach
        @endif
		<!-- END PANEL -->
	</div>
	@stop