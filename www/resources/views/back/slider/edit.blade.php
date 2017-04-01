@extends('layout.admin')
	@section('script')
		<script src="{{asset('/assets/plugins/jquery-validation/js/jquery.validate.min.js')}}" type="text/javascript"></script>
		<script src="{{asset('/assets/js/slider/edit.js')}}"></script>
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
			    <form id="form-agregar" role="form" autocomplete="off" method="POST" action="{{url('/administrador/modificar/slider' . $id . '.html')}}" enctype="multipart/form-data">
			    	{!!csrf_field()!!}
			    	<input type="hidden" name="_method" value="PATCH">
		      		<div class="row clearfix">
			        	<div class="col-sm-12">
			          		<div class="form-group form-group-default" aria-required="true">
			            		<label for="titulo">Título</label>
			            		<input type="text" id="titulo" class="form-control required" name="titulo" value="{{$slider->titulo}}" required="required" aria-required="true" aria-invalid="true">
			          		</div>
			        	</div>
			      	</div>

					<div class="row clearfix">
						<div class="col-sm-12">
							<div class="form-group form-group-default" >
								<label><input type="checkbox" name="is_show_title" {{$slider->is_show_title==1 ? "checked" : ""}} ><span>Show Title to mark check box</span></label>
							</div>
						</div>
					</div>

			      	<div class="row clearfix">
			        	<div class="col-sm-12">
			          		<div class="form-group form-group-default" aria-required="true">
			            		<label for="subtitulo">Subtítulo</label>
			            		<input type="text" id="subtitulo" class="form-control" name="subtitulo" value="{{$slider->subtitulo}}" aria-required="true" aria-invalid="true">
			          		</div>
			        	</div>
			      	</div>

			      	<div class="row clearfix">
			        	<div class="col-sm-12">
			          		<div class="form-group form-group-default" aria-required="true">
			            		<label for="texto">Descripción</label>
			            		<textarea id="texto" class="form-control" name="texto" aria-required="true" aria-invalid="true">{{$slider->texto}}</textarea>
			          		</div>
			        	</div>
			      	</div>

			      	<div class="row clearfix">
			        	<div class="col-sm-12">
			          		<div class="form-group form-group-default" aria-required="true">
			            		<label for="texto_boton">Texto del botón</label>
			            		<input type="text" id="texto_boton" class="form-control required" name="texto_boton" value="{{$slider->texto_boton}}" required="required" aria-required="true" aria-invalid="true">
			          		</div>
			        	</div>
			      	</div>
			      	
	                <div class="row clearfix">
			        	<div class="col-sm-12">
			          		<div class="form-group form-group-default" aria-required="true">
			            		<label for="link">Link</label>
			            		<input type="text" id="link" class="form-control required" name="link" value="{{$slider->link}}" required="required" aria-required="true" aria-invalid="true">
			          		</div>
			        	</div>
			      	</div>

			      	<div class="row clearfix">
			        	<div class="col-sm-12">
			          		<div class="form-group form-group-default" aria-required="true">
			            		<label for="imagen">Imagen</label>
			            		<img src="{{$slider->imagen}}" class="img-responsive img_slider">
			            		<input type="file" id="imagen" class="form-control required" name="imagen" required="required" aria-required="true" aria-invalid="true" style="display:none">
			          		</div>
			        	</div>
			      	</div>

			      	<div class="clearfix"></div>
			      	<input class="btn btn-primary" type="submit" value="Modificar slider">
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