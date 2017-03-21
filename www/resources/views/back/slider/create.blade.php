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
			    <form id="form-agregar" role="form" autocomplete="off" method="POST" action="{{url('/administrador/agregar/slider.html')}}" enctype="multipart/form-data">
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

			      	{{--<div class="row clearfix">--}}
			        	{{--<div class="col-sm-12">--}}
			          		{{--<div class="form-group form-group-default" aria-required="true">--}}
			            		{{--<label for="subtitulo">subtítulo</label>--}}
			            		{{--<input type="text" id="subtitulo" class="form-control required" name="subtitulo" required="required" aria-required="true" aria-invalid="true">--}}
			          		{{--</div>--}}
			        	{{--</div>--}}
			      	{{--</div>--}}

			      	<div class="row clearfix">
			        	<div class="col-sm-12">
			          		<div class="form-group form-group-default" aria-required="true">
			            		<label for="tipo">Tipo</label>
			            		<select id="tipo" class="form-control required" name="tipo" required="required" aria-required="true" aria-invalid="true">
			            			<option value="1">Home</option>
			            			<option value="0">Quiniela</option>
			            			<option value="3">Ubicaciones</option>
			            			<option value="2">Promociones</option>
			            		</select>
			          		</div>
			        	</div>
			      	</div>

			      	<!--<div class="row clearfix">
			        	<div class="col-sm-12">
			          		<div class="form-group form-group-default" aria-required="true">
			            		<label for="texto">Descripción</label>
			            		<input type="text" id="texto" class="form-control required" name="texto" required="required" aria-required="true" aria-invalid="true">
			          		</div>
			        	</div>
			      	</div>

			      	<div class="row clearfix">
			        	<div class="col-sm-12">
			          		<div class="form-group form-group-default" aria-required="true">
			            		<label for="texto_boton">Texto del botón</label>
			            		<input type="text" id="texto_boton" class="form-control required" name="texto_boton" required="required" aria-required="true" aria-invalid="true">
			          		</div>
			        	</div>
			      	</div>
			      	
	                <div class="row clearfix">
			        	<div class="col-sm-12">
			          		<div class="form-group form-group-default" aria-required="true">
			            		<label for="link">Link</label>
			            		<input type="text" id="link" class="form-control required" name="link" required="required" aria-required="true" aria-invalid="true">
			          		</div>
			        	</div>
			      	</div>
-->
			      	<div class="row clearfix">
			        	<div class="col-sm-12">
			          		<div class="form-group form-group-default" aria-required="true">
			            		<label for="imagen">Imagen</label>
			            		<input type="file" id="imagen" class="form-control required" name="imagen" required="required" aria-required="true" aria-invalid="true">
			          		</div>
			        	</div>
			      	</div>

			      	<div class="clearfix"></div>
			      	<input class="btn btn-primary" type="submit" value="Agregar Slider">
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