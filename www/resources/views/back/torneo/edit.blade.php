@extends('layout.admin')
	@section('script')
		<script src="{{asset('/assets/plugins/jquery-validation/js/jquery.validate.min.js')}}" type="text/javascript"></script>
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		<script src="{{asset('/assets/js/torneo/edit.js')}}"></script>
		<script>
		$(function(){
			$('[name="fecha"]').datepicker();
			$('#form-agregar').validate();
		});
		</script>
	@stop

	@section('css')
		<link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	@stop

	@section('contenido')
		
		<div class="col-lg-7 col-md-6 col-md-offset-3">
		<!-- START PANEL -->
		<div class="panel panel-transparent">
	  		<div class="panel-body">
			    <form id="form-agregar" role="form" autocomplete="off" method="POST" action="{{url('/administrador/modificar/torneo' . $id . '.html')}}" enctype="multipart/form-data">
			    	{!!csrf_field()!!}
			    	<input type="hidden" name="_method" value="PATCH">
		      			<div class="row clearfix">
				        	<div class="col-sm-12">
				          		<div class="form-group form-group-default" aria-required="true">
				            		<label for="titulo">Título</label>
				            		<input type="text" id="titulo" class="form-control required" name="titulo" value="{{$torneo->titulo}}" required="required" aria-required="true" aria-invalid="true">
				          		</div>
				        	</div>
				      	</div>
				      	<div class="row clearfix">
				        	<div class="col-sm-12">
				          		<div class="form-group form-group-default" aria-required="true">
				            		<label for="slug">Slug</label>
				            		<input type="text" id="slug" class="form-control required" name="slug" value="{{$torneo->slug}}" required="required" aria-required="true" aria-invalid="true">
				          		</div>
				        	</div>
				      	</div>
			      		<div class="row clearfix">
				        	<div class="col-sm-12">
				          		<div class="form-group form-group-default" aria-required="true">
				            		<label for="tipo">Tipo de torneo</label>
				            		<select id="tipo" class="cs-select cs-skin-slide" name="tipo" data-init-plugin="cs-select" required="required" aria-required="true" aria-invalid="true">
				            			@foreach($tipos as $tipo)
				            			<option value="{{$tipo->id}}" {{$torneo->tipo_torneo == $tipo->id ? "selected" : ""}}>{{$tipo->nombre}}</option>
				            			@endforeach
				            		</select>
				          		</div>
				        	</div>
				      	</div>
				      	<div class="row">
		        			<div class="col-sm-12">
		        				<div class="form-group form-group-default">
		        					<label for="sucursal">Sucursal</label>
					      			<select class="cs-select cs-skin-slide" data-init-plugin="cs-select" name="sucursal" id="sucursal">
					      				@foreach($sucursales as $sucursal)
				                      	<option value="{{$sucursal->id}}" {{$torneo->id_sucursal == $sucursal->id ? "selected" : ""}}>{{$sucursal->nombre}}</option>
				                      	@endforeach
		                    		</select>
		                    	</div>
		                	</div>
		                </div>
		                <div class="row clearfix">
				        	<div class="col-sm-12">
				          		<div class="form-group form-group-default" aria-required="true">
				            		<label for="descripcion">Descripción</label>
				            		<textarea id="descripcion" class="form-control required" name="descripcion" required="required" aria-required="true" aria-invalid="true">{{$torneo->descripcion}}</textarea>
				          		</div>
				        	</div>
				      	</div>
		                <div class="row clearfix">
				        	<div class="col-sm-12">
				          		<div class="form-group form-group-default" aria-required="true">
				            		<label for="fecha">Fecha</label>
				            		<input type="text" id="fecha" class="form-control required" name="fecha" value="{{$torneo->fecha}}" required="required" aria-required="true" aria-invalid="true">
				          		</div>
				        	</div>
				      	</div>
				      	<div class="row clearfix">
				        	<div class="col-sm-12">
				          		<div class="form-group form-group-default" aria-required="true">
				            		<label for="link">Link</label>
				            		<input type="text" id="link" class="form-control url" name="link" value="{{$torneo->link}}" aria-required="true" aria-invalid="true">
				          		</div>
				        	</div>
				      	</div>
		                <div class="row clearfix">
				        	<div class="col-sm-12">
				          		<div class="form-group form-group-default" aria-required="true">
				            		<label for="archivo">Archivo</label>
				            		<img src="{{$torneo->archivo}}" class="img-responsive img_torneo">
				            		<input type="file" id="archivo" class="form-control required" name="archivo" required="required" aria-required="true" aria-invalid="true" style="display:none;">
				          		</div>
				        	</div>
				      	</div>
				      	<div class="clearfix"></div>
			      	<input class="btn btn-primary" type="submit" value="Modificar">
			    </form>
		  	</div>
		</div>
		@if(count($errors) > 0)
			@foreach($errors->all() as $key => $val)
				<div class="alert alert-danger" role="alert">
					<button class="close" data-dismiss="alert"></button>
		          	<strong>{{$key}}: </strong>{{$val}}
		        </div>
        	@endforeach
        @endif
		<!-- END PANEL -->
	</div>
	@stop