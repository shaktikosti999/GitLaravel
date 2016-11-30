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
			    <form id="form-agregar" role="form" autocomplete="off" method="POST" action="{{url('/administrador/modificar/sucursal' . $id . '.html')}}">
			    	{!!csrf_field()!!}
			    	<input type="hidden" name="_method" value="PATCH">
		      		<div class="row clearfix">
			        	<div class="col-sm-12">
			          		<div class="form-group form-group-default" aria-required="true">
			            		<label for="nombre">Nombre</label>
			            		<input type="text" id="nombre" class="form-control required" name="nombre" value="{{$sucursal->nombre}}" required="required" aria-required="true" aria-invalid="true">
			          		</div>
			        	</div>
			      	</div>
			      	<div class="row clearfix">
			        	<div class="col-sm-12">
			          		<div class="form-group form-group-default" aria-required="true">
			            		<label for="ciudad">Ciudad</label>
			            		<select id="ciudad" class="form-control" name="ciudad" aria-required="true" aria-invalid="true">
			            			<option value="">Seleccione una...</option>
			            			@foreach( $ciudades as $item)
			            			<option value="{{$item->id_ciudad}}" {{$item->id_ciudad == $sucursal->id_ciudad ? 'selected' : ''}}>{{$item->ciudad}}</option>
			            			@endforeach
			            		</select>
			          		</div>
			        	</div>
			      	</div>
			      	<div class="row">
			        	<div class="col-sm-12">
			          		<div class="form-group form-group-default">
			            		<label for="direccion">Dirección</label>
			            		<input type="text" id="direccion" class="form-control required" name="direccion" value="{{$sucursal->direccion}}" aria-required="true" aria-invalid="true" >
			          		</div>
			          	</div>
			      	</div>
			      	<div class="row clearfix">
			        	<div class="col-sm-12">
			          		<div class="form-group form-group-default" aria-required="true">
			            		<label for="slug">Slug</label>
			            		<input type="text" id="slug" class="form-control required" name="slug" value="{{$sucursal->slug}}" required="required" aria-required="true" aria-invalid="true">
			          		</div>
			        	</div>
			      	</div>
			      	<div class="row clearfix">
			        	<div class="col-sm-12">
			          		<div class="form-group form-group-default" aria-required="true">
			            		<label for="latitud">Latitud</label>
			            		<input type="text" id="latitud" class="form-control required" name="latitud" value="{{$sucursal->latitud}}" required="required" aria-required="true" aria-invalid="true">
			          		</div>
			        	</div>
			      	</div>
			      	<div class="row clearfix">
			        	<div class="col-sm-12">
			          		<div class="form-group form-group-default" aria-required="true">
			            		<label for="longitud">Longitud</label>
			            		<input type="text" id="longitud" class="form-control required" name="longitud" value="{{$sucursal->longitud}}" required="required" aria-required="true" aria-invalid="true">
			          		</div>
			        	</div>
			      	</div>
			      	<div class="row">
			        	<div class="col-sm-12">
			          		<div class="form-group form-group-default">
			            		<label for="horario">Horario</label>
			            		<input type="text" id="horario" class="form-control required" name="horario" value="{{$sucursal->horario}}" aria-required="true" aria-invalid="true" >
			          		</div>
			          	</div>
			      	</div>
			      	<div class="row">
			        	<div class="col-sm-12">
			          		<div class="form-group form-group-default">
			            		<label for="telefono">Teléfonos</label>
			            		<input type="text" id="telefono" class="form-control required" name="telefono" value="{{$sucursal->telefono}}" aria-required="true" aria-invalid="true" >
			          		</div>
			          	</div>
			      	</div>
			      	<div class="row">
			        	<div class="col-sm-12">
			          		<div class="form-group form-group-default">
			            		<label for="instrucciones">Cómo llegar</label>
			            		<textarea id="instrucciones" class="form-control" name="instrucciones" aria-required="true" aria-invalid="true">{{$sucursal->instrucciones}}</textarea>
			          		</div>
			          	</div>
			      	</div>
			      	<div class="clearfix"></div>
			      	<input class="btn btn-primary" type="submit" value="Modificar Sección">
			    </form>
		  	</div>
		</div>
		<!-- END PANEL -->
	</div>
	@stop