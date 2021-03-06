@extends('layout.admin')
	@section('script')
		<script src="{{asset('/assets/plugins/jquery-validation/js/jquery.validate.min.js')}}" type="text/javascript"></script>
		<script src="{{asset('/assets/js/slider/edit.js')}}"></script>
		<script>
		$(function(){
			$('#form-agregar').validate();
		});

		$('.button').button();
		$('.list > li a').click(function() {
			$(this).parent().find('ul').toggle();
		});
		</script>
	@stop

	@section('contenido')
		
		<div class="col-lg-7 col-md-6 col-md-offset-3">
		<!-- START PANEL -->
		<div class="panel panel-transparent">
	  		<div class="panel-body">
			    <form id="form-agregar" role="form" autocomplete="off" method="POST" action="{{url('/administrador/modificar/configuracion' . $id . '.html')}}" enctype="multipart/form-data">
			    	{!!csrf_field()!!}
			    	<input type="hidden" name="_method" value="PATCH">
		      		<div class="row clearfix">
			        	<div class="col-sm-12">
			          		<div class="form-group form-group-default" aria-required="true">
			            		<label for="titulo">Título</label>
			            		<input type="text" id="titulo" class="form-control " name="titulo" value="{{$configuracion->titulo}}"  aria-required="true" aria-invalid="true" required>
			          		</div>
			        	</div>
			      	</div>

					<div class="row clearfix">
						<div class="col-sm-12">
							<div class="form-group form-group-default" aria-required="true">
								<label for="subtitulo">Cantidad </label>
								<input type="number" id="cantidad" class="form-control" name="cantidad" value="{{$configuracion->cantidad}}"  aria-required="true" aria-invalid="true" required>
							</div>
						</div>
					</div>

					<div class="row clearfix">
						<div class="col-sm-12">
							<div class="form-group form-group-default" aria-required="true">
								<label for="subtitulo">URL</label>
								<input type="text" id="url" class="form-control" name="url" value="{{$configuracion->url}}"  aria-required="true" aria-invalid="true">
							</div>
						</div>
					</div>

					<div class="row clearfix">
						<div class="col-sm-12">
							<div class="form-group form-group-default" >
								<label><input type="checkbox" name="is_new_tab" {{$configuracion->is_new_tab=='_blank' ? 'checked' : ''}} ><span>URL OPEN NEW TAB</span></label>
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