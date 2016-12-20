@extends('layout.admin')
	@section('script')		
		<script src="{{asset('/assets/plugins/jquery-validation/js/jquery.validate.min.js')}}" type="text/javascript"></script>
		<script src="{{asset('/assets/js/notify.min.js')}}"></script>
		<script src="{{asset('/assets/js/paginas/edit.js')}}"></script>
	@stop
	@section('contenido')
		<!--Campos ocultos-->
		<input type="hidden" id="base_url" value="{{url('/')}}">
   		<input type="hidden" id="token" value="{{{csrf_token()}}}">
   		
		<div class="col-lg-7 col-md-6 col-md-offset-3">
			<!-- START PANEL -->
			<div class="panel panel-transparent">
		  		<div class="panel-body">
				    <form id="form-agregar" role="form" autocomplete="off" method="POST" action="{{url('/administrador/agregar/pagina_de_contenido.html')}}" enctype="multipart/form-data">
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
				          		<div class="form-group form-group-default">
				            		<label for="padre">Padre</label>
				            		<select id="padre" class="form-control" name="padre" aria-required="true" aria-invalid="true">
				            			<option value="null">Opciones...</option>
				            			@foreach($paginas as $padre)
				            				<option value="{{$padre->id}}">{{$padre->titulo}}</option>
				            			@endforeach
				            		</select>
				          		</div>
				          	</div>
				      	</div>
				      	<div class="row clearfix">
				        	<div class="col-sm-10">
				          		<div class="form-group form-group-default">
				            		<label for="img_principal">Imagen Principal</label>
				            		<input type="file" id="img_principal" class="form-control" name="img_principal" aria-invalid="true">
				          		</div>
				          	</div>
				          	<div class="col-sm-2">
				            	<button class="btn btn-danger" id="elimina_img">Eliminar</button>
				          	</div>
				      	</div>	
				      	
						<div class="row clearfix">
				        	<div class="col-sm-12">
				          		<div class="form-group" aria-required="true" >
				            		<label for="contenido">Contenido</label>
				            		<textarea id="contenido" class="form-control required summernote" name="contenido" aria-invalid="true" rows="10"></textarea>
				          		</div>
				        	</div>
				      	</div>

				      	<div class="row clearfix">
				        	<div class="col-sm-12">
				          		<div class="form-group" aria-required="true">
				            		<div>
									  	<label>
									    	<input type="checkbox" name="menu_principal" id="menu_principal" value="1">
									    	Menú principal
									  	</label>
									</div>
									<div>
									  	<label>
									    	<input type="checkbox" name="menu_inferior" id="menu_inferior" value="1">
									    	Menú inferior
									  	</label>
									</div>
				          		</div>
				        	</div>
				      	</div>	
				      	<div class="row clearfix">
				        	<div class="col-sm-12">
				          		<div class="form-group form-group-default" aria-required="true">
				            		<label for="slug">Slug</label>
				            		<input type="text" id="slug" class="form-control" name="slug" aria-invalid="true" value="">
				          		</div>
				        	</div>
				      	</div>
				      	<div class="row clearfix">
				        	<div class="col-sm-12">
				          		<div class="form-group form-group-default" aria-required="true">
				            		<label for="orden">Orden</label>
				            		<input type="number" id="orden" class="form-control" name="orden" aria-invalid="true" value="0">
				          		</div>
				        	</div>
				      	</div>
				      	<div class="row clearfix">
				        	<div class="col-sm-12">
				          		<div class="form-group form-group-default" aria-required="true">
				            		<label for="link">Link</label>
				            		<input type="url" id="link" class="form-control" name="link" aria-invalid="true">
				          		</div>
				        	</div>
				      	</div>							      	
				      	
				      	<input class="btn btn-primary" type="submit" value="Agregar página">
				    </form>
			  	</div>
			</div>
			<!-- END PANEL -->
		</div>
	@stop