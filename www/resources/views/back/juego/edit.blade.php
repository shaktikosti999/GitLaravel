@extends('layout.admin')
	@section('script')
		<script src="{{asset('/assets/plugins/jquery-validation/js/jquery.validate.min.js')}}" type="text/javascript"></script>
		<script>
		$(function(){
			$('#form-agregar').validate();
			$('.img_juego').on('click', function(){
				$('#archivo').click();
			});
			$('#archivo').on('change',function(evt){
		 		$('.img_juego').attr('src', URL.createObjectURL(evt.target.files[0]));
		 	});
		});
		</script>
	@stop

	@section('contenido')
		<div class="col-lg-7 col-md-6 col-md-offset-3">
		<!-- START PANEL -->
		<div class="panel panel-transparent">
	  		<div class="panel-body">
			    <form id="form-agregar" role="form" autocomplete="off" method="POST" action="{{url('/administrador/modificar/juego' . $id . '.html')}}" enctype="multipart/form-data">
			    	{!!csrf_field()!!}
			    	<input type="hidden" name="_method" value="PATCH">

		      		<div class="row clearfix">
			        	<div class="col-sm-12">
			          		<div class="form-group form-group-default" aria-required="true">
			            		<label for="nombre">Nombre</label>
			            		<input type="text" id="nombre" value="{{$juego->nombre}}" class="form-control required" name="nombre" required="required" aria-required="true" aria-invalid="true">
			          		</div>
			        	</div>
			      	</div>

			      	<div class="row">
			        	<div class="col-sm-12">
			          		<div class="form-group form-group-default">
			            		<label for="titulo">Título</label>
			            		<input type="text" id="titulo" value="{{$juego->titulo}}" class="form-control required" name="titulo" aria-required="true" aria-invalid="true" >
			          		</div>
			          	</div>
			      	</div>

			      	<div class="row">
			        	<div class="col-sm-12">
			          		<div class="form-group form-group-default">
			            		<label for="linea">Linea de Juego</label>
			            		<select id="linea" class="form-control required" name="linea" aria-required="true" aria-invalid="true">
			            			<option value="null">Seleccione una...</option>
			            			@foreach($lineas as $val)
			            			<option value="{{$val->id}}" {{$s = $val->id == $juego->id_linea  ? "selected" : ""}}>{{$val->nombre}}</option>
			            			@endforeach
			            		</select>
			          		</div>
			          	</div>
			      	</div>

			      	<div class="row">
			        	<div class="col-sm-12">
			          		<div class="form-group form-group-default">
			            		<label for="categoria">Categoría</label>
			            		<select id="categoria" class="form-control" name="categoria">
			            			<option value="null">Seleccione una...</option>
			            			@foreach($categorias as $val)
			            			<option value="{{$val->id}}" {{$val->id == $juego->id_categoria  ? "selected" : ""}}>{{$val->nombre}}</option>
			            			@endforeach
			            		</select>
			          		</div>
			          	</div>
			      	</div>

			      	<div class="row">
			        	<div class="col-sm-12">
			          		<div class="form-group form-group-default">
			            		<label for="resumen">Resumen</label>
			            		<textarea id="resumen" class="form-control" name="resumen" aria-required="true" aria-invalid="true">{{$juego->resumen}}</textarea>
			          		</div>
			          	</div>
			      	</div>

			      	<div class="row">
			        	<div class="col-sm-12">
			          		<div class="form-group form-group-default">
			            		<label for="aprender">Aprender a Jugar</label>
			            		<textarea id="aprender" class="form-control" name="aprender" aria-required="true" aria-invalid="true">{{$juego->aprender}}</textarea>
			          		</div>
			          	</div>
			      	</div>

			      	<div class="row">
			        	<div class="col-sm-12">
			          		<div class="form-group form-group-default">
			            		<label for="reglas">Reglas del Juego</label>
			            		<textarea id="reglas" class="form-control" name="reglas" aria-required="true" aria-invalid="true">{{$juego->reglas}}</textarea>
			          		</div>
			          	</div>
			      	</div>

			      	<div class="row">
			        	<div class="col-sm-12">
			          		<div class="form-group form-group-default">
			            		<label for="archivo">Imagen</label>
			            		<img src="{{$juego->imagen}}" class="img-responsive img_juego">
			            		<input type="file" id="archivo" class="form-control required" name="archivo" aria-required="true" aria-invalid="true" style="display:none;">
			          		</div>
			          	</div>
			      	</div>

			      	<div class="clearfix"></div>
			      	<input class="btn btn-primary" type="submit" value="Modificar Sección">
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