@extends('layout.admin')
	@section('script')
		<script src="{{asset('/assets/plugins/jquery-validation/js/jquery.validate.min.js')}}" type="text/javascript"></script>
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
			    <form id="form-agregar" role="form" autocomplete="off" method="POST" action="{{url('/administrador/agregar/slider.html')}}" enctype="multipart/form-data">
			    	{!!csrf_field()!!}
			    	<input type="hidden" name="_method" value="PUT">

		      		<div class="row clearfix">
			        	<div class="col-sm-12">
			          		<div class="form-group form-group-default" aria-required="true">
			            		<label for="titulo">Título</label>
			            		<input type="text" id="titulo" class="form-control" name="titulo"  aria-required="true" aria-invalid="true">
			          		</div>
			        	</div>
			      	</div>

			      	{{--<div class="row clearfix">--}}
			        	{{--<div class="col-sm-12">--}}
			          		{{--<div class="form-group form-group-default" aria-required="true">--}}
			            		{{--<label for="subtitulo">subtítulo</label>--}}
			            		{{--<input type="text" id="subtitulo" class="form-control required" name="subtitulo" required="required" aria-required="true" aria-invalid="true">--}}
			          		{{--</div>--}}
			        	{{--</div>--}}
			      	{{--</div>--}}

			      	<div class="row">
			        	<div class="col-sm-12">
			          		<div class=" form-group-default row" aria-required="true" style="margin-bottom: 0.8em;" >
			            		<label style="font-family: 'Montserrat';font-size: 11px;text-transform: uppercase;font-weight: 600;" >Tipo</label>

								{{--@foreach($sliderType as $val)--}}
									{{--<label class="col-lg-6" >--}}
										{{--<input type="checkbox"  value="{{$val->id}}" name="tipo[]" >{{$val->type_name}}--}}
									{{--</label>--}}
								{{--@endforeach--}}

								<style>
									ul li ul {
										display: none;
									}
								</style>


								<ul class="list">
									@foreach( $juegos as $indexKey => $item )
										<li>
											<a><input type="checkbox" name="juego[]" value="{{$item->id}}"  style="display:{{$item->id==10 || $item->id==13?'none':''}}" ><span>{{$item->nombre}}</span></a>
											@foreach( $sucursales[$indexKey] as $item1 )
												<ul>
													<li class="collapsed"><label><input type="checkbox" name="juegoSub[{{$item->id}}][]" value="{{$item1->id_sucursal}}" ><span>{{$item1->nombre}}</span></label>
												</ul>
											@endforeach
										</li>
									@endforeach

								</ul>

			          		</div>
			        	</div>
			      	</div>

			      	<!--<div class="row clearfix">
			        	<div class="col-sm-12">
			          		<div class="form-group form-group-default" aria-required="true">
			            		<label for="texto">Descripción</label>
			            		<input type="text" id="texto" class="form-control required" name="texto" required="required" aria-required="true" aria-invalid="true">
			          		</div>
			        	</div>
			      	</div>

			      	<div class="row clearfix">
			        	<div class="col-sm-12">
			          		<div class="form-group form-group-default" aria-required="true">
			            		<label for="texto_boton">Texto del botón</label>
			            		<input type="text" id="texto_boton" class="form-control required" name="texto_boton" required="required" aria-required="true" aria-invalid="true">
			          		</div>
			        	</div>
			      	</div>
			      	
	                <div class="row clearfix">
			        	<div class="col-sm-12">
			          		<div class="form-group form-group-default" aria-required="true">
			            		<label for="link">Link</label>
			            		<input type="text" id="link" class="form-control required" name="link" required="required" aria-required="true" aria-invalid="true">
			          		</div>
			        	</div>
			      	</div>
-->

					<div class="row clearfix">
						<div class="col-sm-12">
							<div class="form-group form-group-default" >
								<label><input type="checkbox" name="is_show_title" ><span>Show Title to mark check box</span></label>
							</div>
						</div>
					</div>

					<div class="row clearfix">
						<div class="col-sm-12">
							<div class="form-group form-group-default" aria-required="true">
								<label for="subtitulo">Subtítulo</label>
								<input type="text" id="subtitulo" class="form-control" name="subtitulo"  aria-required="true" aria-invalid="true">
							</div>
						</div>
					</div>

					<div class="row clearfix">
						<div class="col-sm-12">
							<div class="form-group form-group-default" aria-required="true">
								<label for="texto">Descripción</label>
								<textarea id="texto" class="form-control" name="texto" aria-required="true" aria-invalid="true"></textarea>
							</div>
						</div>
					</div>

					<div class="row clearfix">
						<div class="col-sm-12">
							<div class="form-group form-group-default" >
								<label><input type="checkbox" name="is_btn_active" ><span>BOTÓN DE URL EXTERNO ACTIVO</span></label>
							</div>
						</div>
					</div>

					<div class="row clearfix">
						<div class="col-sm-12">
							<div class="form-group form-group-default" aria-required="true">
								<label for="texto_boton">Texto del botón</label>
								<input type="text" id="texto_boton" class="form-control " name="texto_boton"  aria-required="true" aria-invalid="true">
							</div>
						</div>
					</div>

					<div class="row clearfix">
						<div class="col-sm-12">
							<div class="form-group form-group-default" aria-required="true">
								<label for="link">Link</label>
								<label><input type="text" id="link" class="form-control" name="link"  aria-required="true" aria-invalid="true"></label>
							</div>
						</div>
					</div>


					<div class="row clearfix">
						<div class="col-sm-12">
							<div class="form-group form-group-default" >
								<label><input type="checkbox" name="is_new_tab" ><span> URL Open New Tab</span></label>
							</div>
						</div>
					</div>

					<div class="row clearfix">
			        	<div class="col-sm-12">
			          		<div class="form-group form-group-default" aria-required="true">
			            		<label for="imagen">Imagen</label>
			            		<input type="file" id="imagen" class="form-control" name="imagen" aria-required="true" aria-invalid="true">
			          		</div>
			        	</div>
			      	</div>

					<div class="row clearfix">
						<div class="col-sm-12">
							<div class="form-group form-group-default" aria-required="true">
								<label for="link">Video URL</label>
								<input type="text" id="video_url" class="form-control" name="video_url"  aria-invalid="true">
							</div>
						</div>
					</div>

					<div class="row clearfix">
						<div class="col-sm-12">
							<div class="form-group form-group-default" aria-required="true">
								{{--<label for="showImage">What should be show</label>--}}
								<label><input type="radio" id="showImageVideo" name="showImageVideo" value="showImage" checked>Show Image as a Slider</label>
								<label><input type="radio" id="showImageVideo" name="showImageVideo" value="showVideo">Show Video as a Slider</label>
							</div>
						</div>
					</div>

			      	<div class="clearfix"></div>
			      	<input class="btn btn-primary" type="submit" value="Agregar Slider">
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