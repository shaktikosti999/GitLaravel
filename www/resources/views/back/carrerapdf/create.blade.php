@extends('layout.admin')
	@section('script')
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		<script src="{{asset('/assets/plugins/jquery-validation/js/jquery.validate.min.js')}}" type="text/javascript"></script>
		<script>
		$(function(){
			$('#form-agregar').validate();
			$('[name="fecha"]').datepicker();
		});
		</script>
	@stop

	@section('contenido')
		
		<div class="col-lg-7 col-md-6 col-md-offset-3">
		<!-- START PANEL -->
			<div class="panel panel-transparent">
		  		<div class="panel-body">
				    <form id="form-agregar" role="form" autocomplete="off" method="POST" action="{{url('/administrador/agregar/pdfcarrera.html')}}" enctype="multipart/form-data">
				    	{!!csrf_field()!!}
				    	<input type="hidden" name="_method" value="PUT">
				    	<div class="row clearfix">
				        	<div class="col-sm-12">
				          		<div class="form-group form-group-default" aria-required="true">
				            		<label for="titulo">Título</label>
				            		<input type="text" id="titulo" class="form-control required" name="titulo" required="required" aria-required="true" aria-invalid="true">
				          		</div>
				        	</div>
				      	</div>
			      		<div class="row clearfix">
				        	<div class="col-sm-12">
				          		<div class="form-group form-group-default" aria-required="true">
				            		<label for="juego">Juego</label>
				            		<select id="juego" class="cs-select cs-skin-slide" name="juego" data-init-plugin="cs-select" required="required" aria-required="true" aria-invalid="true">
				            			@foreach($juegos as $juego)
				            			<option value="{{$juego->id}}">{{$juego->nombre}}</option>
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
				                      	<option value="{{$sucursal->id}}">{{$sucursal->nombre}}</option>
				                      	@endforeach
		                    		</select>
		                    	</div>
		                	</div>
		                </div>
		                <div class="row clearfix">
				        	<div class="col-sm-12">
				          		<div class="form-group form-group-default" aria-required="true">
				            		<label for="fecha">Fecha</label>
				            		<input type="text" id="fecha" class="form-control required" name="fecha" required="required" aria-required="true" aria-invalid="true">
				          		</div>
				        	</div>
				      	</div>
		                <div class="row clearfix">
				        	<div class="col-sm-12">
				          		<div class="form-group form-group-default" aria-required="true">
				            		<label for="archivo">Archivo</label>
				            		<input type="file" id="archivo" class="form-control required" name="archivo" required="required" aria-required="true" aria-invalid="true">
				          		</div>
				        	</div>
				      	</div>
				      	<div class="clearfix"></div>
				      	<input class="btn btn-primary" type="submit" value="Agregar">
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

	@section('css')
		<link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	@stop