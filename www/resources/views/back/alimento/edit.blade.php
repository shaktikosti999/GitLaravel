@extends('layout.admin')
	@section('script')
		<script src="{{asset('/assets/plugins/jquery-validation/js/jquery.validate.min.js')}}" type="text/javascript"></script>
		<script src="{{asset('/assets/js/alimento/edit.js')}}"></script>
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
			    <form id="form-agregar" role="form" autocomplete="off" method="POST" action="{{url('/administrador/modificar/alimento' . $id . '.html')}}" enctype="multipart/form-data">
			    	{!!csrf_field()!!}
			    	<input type="hidden" name="_method" value="PATCH">
		      		<div class="row clearfix">
			        	<div class="col-sm-12">
			          		<div class="form-group form-group-default" aria-required="true">
			            		<label for="nombre">Nombre</label>
			            		<input type="text" id="nombre" value="{{$alimento->nombre}}" class="form-control required" name="nombre" required="required" aria-required="true" aria-invalid="true">
			          		</div>
			        	</div>
			      	</div>
			      	<div class="row">
	        			<div class="col-sm-12">
	        				<div class="form-group form-group-default">
	        					<label for="tipo_alimento">Tipo de alimento</label>
				      			<select class="cs-select cs-skin-slide" data-init-plugin="cs-select" name="tipo_alimento" id="tipo_alimento">
				      				@foreach($tipo_alimento as $tipo)
			                      	<option value="{{$tipo->id}}" {{$selected = $alimento->tipo_alimento == $tipo->id ? "selected" : ""}}>{{$tipo->nombre}}</option>
			                      	@endforeach
	                    		</select>
	                    	</div>
	                	</div>
	                </div>
	                <div class="row clearfix">
			        	<div class="col-sm-12">
			          		<div class="form-group form-group-default" aria-required="true">
			            		<label for="descripcion">Descripción</label>
			            		<textarea id="descripcion" class="form-control required" name="descripcion" required="required" aria-required="true" aria-invalid="true">{{$alimento->descripcion}} </textarea>
			          		</div>
			        	</div>
			      	</div>
			      	<div class="row clearfix">
			        	<div class="col-sm-12">
			          		<div class="form-group form-group-default" aria-required="true">
			            		<label for="archivo">Imagen</label>
			            		<img src="{{$alimento->archivo}}" class="img-responsive img_alimento">
			            		<input type="file" id="archivo" class="form-control required" name="archivo" required="required" aria-required="true" aria-invalid="true" style="display:none">
			          		</div>
			        	</div>
			      	</div>
			      	<div class="clearfix"></div>
			      	<input class="btn btn-primary" type="submit" value="Agregar Alimento">
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