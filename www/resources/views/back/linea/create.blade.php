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
			    <form id="form-agregar" role="form" autocomplete="off" method="POST" action="{{url('/administrador/agregar/linea.html')}}" enctype="multipart/form-data">
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
			      	<div class="row clearfix">
			        	<div class="col-sm-12">
			          		<div class="form-group form-group-default" aria-required="true">
			            		<label for="slug">Slug</label>
			            		<input type="text" id="slug" class="form-control required" name="slug" required="required" aria-required="true" aria-invalid="true">
			          		</div>
			        	</div>
			      	</div>
			      	<div class="row clearfix">
			        	<div class="col-sm-12">
			          		<div class="form-group form-group-default" aria-required="true">
			            		<label for="slogan">Eslogan</label>
			            		<input type="text" id="slogan" class="form-control required" name="slogan" required="required" aria-required="true" aria-invalid="true">
			          		</div>
			        	</div>
			      	</div>
			      	<div class="row clearfix">
			        	<div class="col-sm-12">
			          		<div class="form-group form-group-default" aria-required="true">
			            		<label for="icono">Ícono</label>
			            		<input type="text" id="icono" class="form-control required" name="icono" required="required" aria-required="true" aria-invalid="true">
			          		</div>
			        	</div>
			      	</div>
			      	<div class="row clearfix">
			        	<div class="col-sm-12">
			          		<div class="form-group form-group-default" aria-required="true">
			            		<label for="archivo">Imagen</label>
			            		<input type="file" id="archivo" class="form-control required" name="archivo" required="required" aria-required="true" aria-invalid="true">
			          		</div>
			        	</div>
			      	</div>
			      	<div class="clearfix"></div>
			      	<input class="btn btn-primary" type="submit" value="Agregar Sección">
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