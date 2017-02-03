@extends('layout.admin')
	@section('script')
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		<script src="{{asset('/assets/plugins/jquery-validation/js/jquery.validate.min.js')}}" type="text/javascript"></script>
		<script src="{{asset('/assets/js/promocion/edit.js')}}"></script>
		<script>
		$(function(){
			$('#form-agregar').validate();
			$('[type="date"').datepicker({
				dateFormat: "yy-mm-dd"
			});
		});
		</script>
	@stop

	@section('css')
		<link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
		<link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-timepicker/bootstrap-timepicker.min.css')}}">
	@stop

	@section('contenido')
		
		<div class="col-lg-7 col-md-6 col-md-offset-3">
		<!-- START PANEL -->
		<div class="panel panel-transparent">
	  		<div class="panel-body">
			    <form id="form-agregar" role="form" autocomplete="off" method="POST" action="{{url('/administrador/modificar/promocion' . $id . '.html')}}" enctype="multipart/form-data">
			    	{!!csrf_field()!!}
			    	<input type="hidden" name="_method" value="PATCH">

		      		<div class="row clearfix">
			        	<div class="col-sm-12">
			          		<div class="form-group form-group-default" aria-required="true">
			            		<label for="nombre">Nombre</label>
			            		<input type="text" id="nombre" class="form-control required" name="nombre" value="{{$promocion->nombre}}" required="required" aria-required="true" aria-invalid="true">
			          		</div>
			        	</div>
			      	</div>

			      	<div class="row clearfix">
			        	<div class="col-sm-12">
			          		<div class="form-group form-group-default" aria-required="true">
			            		<label for="juego">Juego</label>
			            		<select id="juego" class="form-control required" name="juego" required="required" aria-required="true" aria-invalid="true">
			            			@foreach( $juegos as $item )
			            			<option value="{{$item->id}}" {{$promocion->id_juego == $item->id ? 'selected' : ''}}>{{$item->nombre}}</option>
			            			@endforeach
			            		</select>
			          		</div>
			        	</div>
			      	</div>

			      	<div class="row">
	        			<div class="col-sm-12">
	        				<div class="form-group form-group-default">
	        					<label for="slug">Slug</label>
				      			<input type="text" id="slug" class="form-control" name="slug" value="{{$promocion->slug}}" aria-required="true" aria-invalid="true">
	                    	</div>
	                	</div>
	                </div>

	                <div class="row">
	        			<div class="col-sm-12">
	        				<div class="form-group form-group-default">
	        					<label for="resumen">Resumen</label>
				      			<textarea id="resumen" class="form-control required" name="resumen" required="required" aria-required="true" aria-invalid="true">{{$promocion->resumen}}</textarea>
	                    	</div>
	                	</div>
	                </div>

	                <div class="row">
	        			<div class="col-sm-12">
	        				<div class="form-group form-group-default">
	        					<label for="descripcion">Descripción</label>
				      			<textarea id="descripcion" class="form-control required" name="descripcion" required="required" aria-required="true" aria-invalid="true">{{$promocion->descripcion}}</textarea>
	                    	</div>
	                	</div>
	                </div>

	                <div class="row">
	        			<div class="col-sm-12">
	        				<div class="form-group form-group-default">
	        					<label for="fecha_inicio">Inicio</label>
				      			<input type="date" id="fecha_inicio" class="form-control required" name="fecha_inicio" value="{{date('Y-m-d',strtotime($promocion->fecha_inicio))}}" required="required" aria-required="true" aria-invalid="true">
	                    	</div>
	                	</div>
	                </div>

	                 <div class="row">
	        			<div class="col-sm-12">
	        				<div class="form-group form-group-default">
	        					<label for="fecha_fin">Fin</label>
				      			<input type="date" id="fecha_fin" class="form-control required" name="fecha_fin" value="{{date('Y-m-d',strtotime($promocion->fecha_fin))}}" required="required" aria-required="true" aria-invalid="true">
	                    	</div>
	                	</div>
	                </div>
			      	<div class="row clearfix">
			        	<div class="col-sm-12">
			          		<div class="form-group form-group-default" aria-required="true">
			            		<label for="imagen">Imagen</label>
			            		<img src="{{$promocion->imagen}}" class="img-responsive img_promocion">
			            		<input type="file" id="imagen" class="form-control required" name="imagen" required="required" aria-required="true" aria-invalid="true" style="display:none">
			          		</div>
			        	</div>
			      	</div>
			      	<div class="row clearfix">
			        	<div class="col-sm-12">
			          		<div class="form-group form-group-default" aria-required="true">
			            		<label for="thumb">Imagen pequeña</label>
			            		<img src="{{$promocion->thumb}}" class="img-responsive img_thumb">
			            		<input type="file" id="thumb" class="form-control required" name="thumb" required="required" aria-required="true" aria-invalid="true" style="display:none">
			          		</div>
			        	</div>
			      	</div>
			      	<div class="clearfix"></div>
			      	<input class="btn btn-primary" type="submit" value="Modificar Promocion">
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