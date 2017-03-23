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
				    <form id="form-agregar" role="form" autocomplete="off" method="POST" action="{{url('/administrador/modificar/pagina_de_contenido'. $pagina->id_contenido . '.html')}}" enctype="multipart/form-data">
				    	{!!csrf_field()!!}
				    	<input type="hidden" name="_method" value="PATCH">
			      		<div class="row clearfix">
				        	<div class="col-sm-12">
				          		<div class="form-group form-group-default" aria-required="true">
				            		<label for="titulo">Título</label>
				            		<input type="text" id="titulo" class="form-control required" name="titulo" required="required" aria-required="true" aria-invalid="true" value="{{$pagina->titulo}}">
				          		</div>
				        	</div>
				      	</div>

						<div class="row clearfix">
							<div class="col-sm-12">
								<div class="form-group form-group-default" >
									<label><input type="checkbox" name="is_show_title" {{$pagina->is_show_title==1 ? "checked" : ""}} ><span>Show Title to mark check box</span></label>
								</div>
							</div>
						</div>
				      	
				      	<div class="row clearfix">
				        	<div class="col-sm-12">
				          		<div class="form-group form-group-default">
				            		<label for="img_principal">Imagen Principal</label>
				            		<input type="file" id="img_principal" class="form-control" {{trim($pagina->imagen_principal) != "" ? 'style=display:none;' : ''}} name="img_principal" aria-invalid="true">
				          		</div>
				          	</div>
				      	</div>
				      	@if($pagina->imagen_principal != "")
					      	<div class="col-sm-6 col-sm-offset-3" id="imagen_principal">
								<button type="button" class="close" id="elimina_imagen" aria-hidden="true">&times;</button>
								<div class="thumbnail">
									<img src="{{$pagina->imagen_principal}}">
								</div>
							</div>
				      	@endif

				      	<input type="hidden" name="eliminada" value="0" id="eliminada">

						<div class="row clearfix">
				        	<div class="col-sm-12">
				          		<div class="form-group" aria-required="true" >
				            		<label for="contenido">Contenido</label>
				            		<textarea id="contenido" class="form-control required summernote" name="contenido" aria-invalid="true" rows="10">{{$pagina->contenido}}</textarea>
				          		</div>
				        	</div>
				      	</div>

				      	<div class="row clearfix">
				        	<div class="col-sm-12">
				          		<div class="form-group" aria-required="true">
									<div>
									  	<label>
									    	<input type="checkbox" name="menu_inferior" id="menu_inferior" value="1" {{$pagina->menu_inferior == 1 ? 'checked' : ''}}>
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
				            		<input type="text" id="slug" class="form-control" name="slug" aria-invalid="true" value="{{$pagina->slug}}">
				          		</div>
				        	</div>
				      	</div>	
				      	<div class="row clearfix">
				        	<div class="col-sm-12">
				          		<div class="form-group form-group-default" aria-required="true">
				            		<label for="link">Link</label>
				            		<input type="url" id="link" class="form-control" name="link" aria-invalid="true" value="{{$pagina->link}}">
				          		</div>
				        	</div>
				      	</div>					      	
				      	<input class="btn btn-primary" type="submit" value="Actualizar página">
				    </form>
			  	</div>
			</div>
			<!-- END PANEL -->
		</div>
	@stop