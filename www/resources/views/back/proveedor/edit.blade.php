@extends('layout.admin')
	@section('script')
		<script src="{{asset('/assets/plugins/jquery-validation/js/jquery.validate.min.js')}}" type="text/javascript"></script>
		<script src="{{asset('/assets/js/proveedor/edit.js')}}"></script>
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
			    <form id="form-agregar" role="form" autocomplete="off" method="POST" action="{{url('/administrador/modificar/proveedor' . $id . '.html')}}" enctype="multipart/form-data">
			    	{!!csrf_field()!!}
			    	<input type="hidden" name="_method" value="PATCH">
		      		<div class="row clearfix">
			        	<div class="col-sm-12">
			          		<div class="form-group form-group-default" aria-required="true">
			            		<label for="nombre">Nombre</label>
			            		<input type="text" id="nombre" value="{{$proveedor->nombre}}" class="form-control required" name="nombre" required="required" aria-required="true" aria-invalid="true">
			          		</div>
			        	</div>
			      	</div>
			      	<div class="row">
	        			<div class="col-sm-12">
	        				<div class="form-group form-group-default">
	        					<label for="link">Enlace</label>
				      			<input type="text" id="link" value="{{$proveedor->link}}" class="form-control required url" name="link" required="required" aria-required="true" aria-invalid="true">
	                    	</div>
	                	</div>
	                </div>
			      	<div class="row clearfix">
			        	<div class="col-sm-12">
			          		<div class="form-group form-group-default" aria-required="true">
			            		<label for="archivo">Imagen</label>
			            		<img src="{{$proveedor->archivo}}" class="img-responsive img_proveedor">
			            		<input type="file" id="archivo" class="form-control required" name="archivo" required="required" aria-required="true" aria-invalid="true" style="display:none">
			          		</div>
			        	</div>
			      	</div>
			      	<div class="clearfix"></div>
			      	<input class="btn btn-primary" type="submit" value="Modificar Proveedor">
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