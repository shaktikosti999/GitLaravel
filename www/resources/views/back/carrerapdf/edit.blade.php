@extends('layout.admin')
	@section('script')
		<script src="{{asset('/assets/plugins/jquery-validation/js/jquery.validate.min.js')}}" type="text/javascript"></script>
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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
			    <form id="form-agregar" role="form" autocomplete="off" method="POST" action="{{url('/administrador/modificar/pdfcarrera' . $id . '.html')}}" enctype="multipart/form-data">
			    	{!!csrf_field()!!}
			    	<input type="hidden" name="_method" value="PATCH">
		      		<div class="row clearfix">
				        	<div class="col-sm-12">
				          		<div class="form-group form-group-default" aria-required="true">
				            		<label for="titulo">Título</label>
				            		<input type="text" id="titulo" class="form-control required" name="titulo" value="{{$carrera->titulo}}" required="required" aria-required="true" aria-invalid="true">
				          		</div>
				        	</div>
				      	</div>
			      		<div class="row clearfix">
				        	<div class="col-sm-12">
				          		<div class="form-group form-group-default" aria-required="true">
				            		<label for="juego">Juego</label>
				            		<select id="juego" class="cs-select cs-skin-slide" name="juego" data-init-plugin="cs-select" required="required" aria-required="true" aria-invalid="true">
				            			@foreach($juegos as $juego)
				            			<option value="{{$juego->id}}" {{$carrera->id_juego == $juego->id ? "selected" : ""}}>{{$juego->nombre}}</option>
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
				                      	<option value="{{$sucursal->id}}" {{$carrera->id_sucursal == $sucursal->id ? "selected" : ""}}>{{$sucursal->nombre}}</option>
				                      	@endforeach
		                    		</select>
		                    	</div>
		                	</div>
		                </div>
		                <div class="row clearfix">
				        	<div class="col-sm-12">
				          		<div class="form-group form-group-default" aria-required="true">
				            		<label for="fecha">Fecha</label>
				            		<input type="text" id="fecha" class="form-control required" name="fecha" required="required" value="{{ date('m/d/Y',strtotime($carrera->fecha)) }}" aria-required="true" aria-invalid="true">
				          		</div>
				        	</div>
				      	</div>
		                <div class="row clearfix">
				        	<div class="col-sm-12">
				          		<div class="form-group form-group-default" aria-required="true">
				            		<label for="archivo">Archivo</label>
				            		<input type="file" id="archivo" class="form-control" name="archivo" aria-required="true" aria-invalid="true">
									<a href="{{url($carrera->archivo)}}" target="_blank" class="btn btn-default">
	                              		<span class="p-t-5 p-b-5">
	                              			<i class="fa fa-external-link fs-15"></i>
	                              		</span>
	                              		<br>
	                              		<span class="fs-11 font-montserrat text-uppercase">Ver</span>
	                              	</a>
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