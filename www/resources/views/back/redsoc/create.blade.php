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
			    <form id="form-agregar" role="form" autocomplete="off" method="POST" action="{{url('/administrador/agregar/red.html')}}" enctype="multipart/form-data">
			    	{!!csrf_field()!!}
			    	<input type="hidden" name="_method" value="PUT">
		      		<div class="row clearfix">
			        	<div class="col-sm-12">
			          		<div class="form-group form-group-default" aria-required="true">
			            		<label for="red">Red Social</label>
			            		<select id="red" class="cs-select cs-skin-slide" name="red" data-init-plugin="cs-select" required="required" aria-required="true" aria-invalid="true">
			            			@foreach($redes as $red)
			            			<option value="{{$red->id}}">{{$red->nombre}}</option>
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
			            		<label for="link">URL</label>
			            		<input type="text" id="url" class="form-control required" name="url" required="required" aria-required="true" aria-invalid="true">
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